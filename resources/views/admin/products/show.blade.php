<x-app-layout>
    @section('stylesheets')
        <link rel="stylesheet" href="{{ asset('vendor/dropzone/dropzone.min.css') }}">
    @endsection

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('Kitchen') }}
            </h2>
            <a href="{{ route('admin.kitchen.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
        </div>
    </x-slot>

    <div class="bg-white">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                        <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                <span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">{{ $product->discount }}% off</span>
                        </button>
                    </div>
                    <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">Product</div>
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
                        <div class="flex justify-between">
                            <div>
                                <h3 class="text-gray-700 uppercase text-lg">{{ $product->title }}</h3>
                                @if($product->discount)
                                    <del class="text-gray-500 mt-3">KES {{ $product->price }}/-</del>
                                    <span class="text-gray-500 mt-3">KES {{ calcDiscountPrice($product) }}/-</span>
                                @else <span class="text-gray-500 mt-3">KES {{ $product->price }}/-</span> @endif
                            </div>
                            <div>
                                <label class="text-gray-700 text-sm" for="count">Stock</label>
                                <p>{{ $product->stock }}</p>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="mt-2">
                            <label class="text-gray-700 text-sm" for="count">THUMBNAILS:</label>
                            <form action="{{ route('admin.kitchen.image.store')}}" class="dropzone" id="my-awesome-dropzone">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </form>
                            <div id="img-button" class="text-right mt-3" style="display: none">
                                <button
                                    class="px-6 py-1 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                                    Upload
                                </button>
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

    @push('scripts')
        <script src="{{ asset('vendor/dropzone/dropzone.min.js') }}"></script>
        <script>
            Dropzone.autoDiscover = false;

            $(() => {
                const dropZone = new Dropzone("#my-awesome-dropzone", {
                    paramName: 'images',
                    maxFiles: 3,
                    acceptedFiles: 'image/*',
                    withCredentials: '{{ csrf_token() }}',
                    headers: {"_token": "{{ csrf_token() }}"},
                    uploadMultiple: true,
                    parallelUploads: 3,
                    autoProcessQueue: false,
                    addRemoveLinks: true
                });

                dropZone.on("addedfile", function () {
                    if (dropZone.getAddedFiles().length) $('#img-button').show(300);
                });

                dropZone.on("removedfile", function (file) {
                    if (!dropZone.getAcceptedFiles().length) {
                        $('#img-button').hide(300)

                        $.ajax({
                            url: `{{ route('admin.kitchen.image.destroy') }}/` + file.id,
                            method: 'DELETE',
                        });
                    }
                });

                $('#img-button button').on('click', () => { dropZone.processQueue() });

                if ({{ count($product->productImages) > 0 ? 'true' : 'false' }}) {
                    @foreach($product->productImages as $productImage)
                    dropZone.displayExistingFile({
                        name: 'image ' + {{ $loop->iteration }},
                        size: '3000',
                        id: {{ $productImage->id }}
                    }, '{{ asset('images/kuku/' . $productImage->image) }}')
                    @endforeach
                }
            })
        </script>
    @endpush

</x-app-layout>
