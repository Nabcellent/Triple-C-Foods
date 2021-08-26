<x-app-layout>
    @section('stylesheets')
        <link rel="stylesheet" href="{{ asset('vendor/dropzone/dropzone.min.css') }}">
    @endsection

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Order') }}
            </h2>
            <a href="{{ route('admin.orders.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">All Orders</a>
        </div>
    </x-slot>

    <div class="bg-white">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                        <button class="mx-2 text-gray-600 border rounded-md p-2">
                            <span class="bg-gray-800 text-white py-1 px-3 rounded-full text-xs font-bold">Order No: #{{ $order->order_no }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="md:flex md:items-center">
                    <div class="w-full h-60 md:w-1/4 lg:h-64 flex items-center justify-center">
                        <?php
                        $images = glob('images/faces/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                        $randomImage = $images[array_rand($images)];
                        ?>
                        <img class="w-60 h-60 rounded-full" src="{{ asset($randomImage) }}" alt=""/>
                    </div>
                    <div class="w-full max-w-xl mx-auto mt-5 md:mt-0 md:w-3/4">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-gray-700 uppercase text-lg">Client: {{ $order->user->name }}</h3>
                                <h5>Email: {{ $order->user->email }}</h5>
                            </div>
                            <div class="border-l-2 pl-8">
                                <h3 class="text-gray-700 uppercase text-lg">No. of items ordered: <span
                                        class="text-pink-900">{{ $order->order_products_count }}</span></h3>
                                @if($order->discount)
                                    <h4 class="text-gray-500 mt-3">Discount - <span class="text-red-700">KES {{ $order->discount }}/-</span></h4>
                                @endif
                                <span class="text-gray-500 mt-3">TOTAL AMOUNT - <span class="text-green-700 font-bold">KES {{ $order->total }}/-</span></span><br>
                                <hr class="my-3">
                                <span class="text-gray-500 mt-3">DATE ORDERED - <span
                                        class="text-pink-900 font-bold">{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->diffForHumans() }}</span></span>
                            </div>
                        </div>
                        <hr class="my-5">
                        <h3>Order Status: {{ ucfirst($order->status) }}</h3>
                        <div class="relative inline-block w-full text-gray-700 mt-3">
                            <form action="{{ route('admin.orders.update.status', $order->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <select name="status"
                                        class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                        aria-label="">
                                    @foreach(orderStatuses() as $status)
                                        <option @if($order->status === $status) selected hidden @endif value="{{ $status }}">{{ Str::title($status) }}</option>
                                    @endforeach
                                </select>
                                <div class="text-right">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mt-3">Change
                                        Order Status
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl text-center font-medium">Other Products</h3>
                    <hr class="my-3">
                    <div class="pb-7 pt-0">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <div class="overflow-x-auto">
                                        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                                            <div class="w-full lg:w-11/12">
                                                <div class="bg-white shadow-md rounded my-6">
                                                    <table class="min-w-max w-full table-auto">
                                                        <thead>
                                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                            <th class="py-3 px-6 text-left">#</th>
                                                            <th class="py-3 px-6 text-left">Title</th>
                                                            <th class="py-3 px-6 text-left">Price</th>
                                                            <th class="py-3 px-6 text-left">Quantity</th>
                                                            <th class="py-3 px-6 text-center">Current Stock</th>
                                                            <th class="py-3 px-6 text-center">Sub Total</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="text-gray-600 text-sm font-light">

                                                        @forelse($order->orderProducts as $order)
                                                            <?php
                                                            $images = glob('images/faces/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                                                            $randomImage = $images[array_rand($images)];
                                                            ?>
                                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                                <th class="py-3 px-6 text-left whitespace-nowrap">{{ $loop->iteration }}</th>
                                                                <td class="py-3 px-6 text-left">
                                                                    <div class="flex items-center">
                                                                        <div class="mr-2">
                                                                            <img class="w-6 h-6 rounded-full"
                                                                                 src="{{ asset('images/kuku/' . $order->product->image) }}" alt=""/>
                                                                        </div>
                                                                        <span>{{ $order->product->title }}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="py-3 px-6 text-center">{{ $order->price }}/=</td>
                                                                <td class="py-3 px-6 text-center text-green-700 font-bold">{{ $order->quantity }}</td>
                                                                <td class="py-3 px-6 text-center">{{ $order->product->stock }}</td>
                                                                <td class="py-3 px-6 text-center">
                                                                    <span
                                                                        class="bg-purple-200 text-blue-600 py-1 px-3 rounded-full font-bold">{{ $order->price * $order->quantity }}/=</span>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7">
                                                                    <div class="text-center my-2">NO ORDERS</div>
                                                                </td>
                                                            </tr>
                                                        @endforelse

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-gray-200">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
                <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
            </div>
        </footer>
    </div>

</x-app-layout>
