<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-7">
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
                                            <th class="py-3 px-6 text-left">Order No.</th>
                                            <th class="py-3 px-6 text-left">User</th>
                                            <th class="py-3 px-6 text-left">Items Ordered</th>
                                            <th class="py-3 px-6 text-left">Total</th>
                                            <th class="py-3 px-6 text-center">Order Time</th>
                                            <th class="py-3 px-6 text-center">Status</th>
                                            <th class="py-3 px-6 text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">

                                        <?php $i = $orders->firstItem(); ?>
                                        @forelse($orders as $order)
                                            <?php
                                            $images = glob('images/faces/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                                            $randomImage = $images[array_rand($images)];
                                            $status = $order->status;
                                            $color = match (true) {
                                                $status === 'pending' => 'purple',
                                                $status === 'completed', $status === 'delivered' => 'green',
                                                $status === 'cancelled' => 'red',
                                                $status === 'hold', $status === 'in process' => 'yellow',
                                                default => 'gray'
                                            }
                                            ?>
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <th class="py-3 px-6 text-left whitespace-nowrap">{{ $i }}</th>
                                                <th class="py-3 px-6 text-left whitespace-nowrap">#{{ $order->order_no }}</th>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <div class="mr-2">
                                                            <img class="w-6 h-6 rounded-full" src="{{ asset($randomImage) }}" alt=""/>
                                                        </div>
                                                        <span>{{ $order->user->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-center">{{ $order->order_products_count }}</td>
                                                <td class="py-3 px-6 text-center text-green-700 font-bold">{{ $order->total }}/=</td>
                                                <td class="py-3 px-6 text-center">{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->diffForHumans() }}</td>
                                                <td class="py-3 px-6 text-center">
                                                    <span class="bg-{{$color}}-200 text-{{$color}}-900 py-1 px-3 rounded-full text-xs">{{ ucfirst($order->status) }}</span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                 stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                            </svg>
                                                        </a>
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                 stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                            </svg>
                                                        </div>
                                                        <a href="{{ route('admin.orders.destroy', ['id' => $order->id]) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                 stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>
                                        @empty
                                            <tr><td colspan="7"><div class="text-center my-2">NO ORDERS</div></td></tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                    <div class="paginator">
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
