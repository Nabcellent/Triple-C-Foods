<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight">{{ __('Kitchen') }}</h2>
            <a href="{{ route('admin.kitchen.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">Create</a>
        </div>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <div class="overflow-x-auto">
                        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                            <div class="w-full">
                                <div class="bg-white shadow-md rounded">
                                    <table class="min-w-max w-full table-auto">
                                        <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left font-bold">#</th>
                                            <th class="py-3 px-6 text-left">Title</th>
                                            <th class="py-3 px-6 text-left">Price</th>
                                            <th class="py-3 px-6 text-center">Stock</th>
                                            <th class="py-3 px-6 text-center">Status</th>
                                            <th class="py-3 px-6 text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">

                                        <?php $i = $products->firstItem(); ?>
                                        @forelse($products as $product)
                                            <?php
                                                if(isset($product->image)) {
                                                    $image = asset('images/kuku/' . $product->image);
                                                } else {
                                                    $images = glob('images/faces/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                                                    $image = asset($images[array_rand($images)]);
                                                }
                                            ?>
                                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                                <td class="py-3 px-6 text-center font-bold">{{ $i }}</td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <div class="mr-2">
                                                            <img class="w-6 h-6 rounded-full" src="{{ $image }}" alt=""/>
                                                        </div>
                                                        <span>{{ $product->title }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">Ksh {{ $product->price }}</td>
                                                <td class="py-3 px-6 text-center">
                                                    {{ $product->stock }}
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <span class="bg-green-200 text-{{ $product->status ? 'green' : 'orange' }}-600 py-1 px-3 rounded-full text-xs">
                                                        {{ $product->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <a href="{{ route('admin.kitchen.show', ['id' => $product->id]) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('admin.kitchen.edit', ['id' => $product->id]) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('admin.kitchen.destroy', ['id' => $product->id]) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>
                                        @empty
                                            <tr>
                                                <td colspan="6"><h4 class="text-center pt-2">No products available</h4></td>
                                            </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                    <div class="paginator p-2">
                                        {{ $products->links() }}
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
