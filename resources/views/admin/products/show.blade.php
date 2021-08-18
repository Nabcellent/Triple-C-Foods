<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Kitchen') }}
            </h2>
            <a href="{{ route('admin.kitchen.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
        </div>
    </x-slot>

    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                        <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                <span class="bg-green-200 text-{{ $product->status ? 'green' : 'orange' }}-600 py-1 px-3 rounded-full text-xs">
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                        </button>
                    </div>
                    <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                        Product
                    </div>

                </div>
            </div>
        </header>
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="md:flex md:items-center">
                    <div class="w-full h-64 md:w-1/2 lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{ asset('images/kuku/' . $product->image) }}"
                             alt="Nike Air">
                    </div>
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                        <h3 class="text-gray-700 uppercase text-lg">{{ $product->title }}</h3>
                        <span class="text-gray-500 mt-3">KES {{ $product->price }}/-</span>
                        <hr class="my-3">
                        <div class="mt-2">
                            <label class="text-gray-700 text-sm" for="count">Stock:</label>
                            <div class="flex items-center mt-1">
                                <p>{{ $product->stock }}</p>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="mt-2">
                            <label class="text-gray-700 text-sm" for="count">Description:</label>
                            <div class="flex items-center mt-1">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                        <div class="flex items-center mt-6">
                            <a href="{{ route('admin.kitchen.edit', ['id' => $product->id]) }}"
                               class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                                <i class="fas fa-pen"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">Other Products</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        @foreach($otherProducts as $otherProduct)
                            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                <div class="flex items-end justify-end h-56 w-full bg-cover"
                                     style="background-image: url('{{ asset('images/kuku/' . $otherProduct->image) }}')">
                                    <a href="{{ route('admin.kitchen.show', ['id' => $otherProduct->id]) }}"
                                        class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                        <i class="fas fa-eye" title="View Product"></i>
                                    </a>
                                </div>
                                <div class="px-5 py-3">
                                    <h3 class="text-gray-700 uppercase">{{ $otherProduct->title }}</h3>
                                    <span class="text-gray-500 mt-2">KES {{ $otherProduct->price }}</span>
                                </div>
                            </div>
                        @endforeach
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
