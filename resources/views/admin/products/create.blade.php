<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create Food Item') }}
        </h2>
    </x-slot>

    <div id="user-edit">
        <div class="py-7">
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-4xl mx-auto">
                    <div class="p-6 border-b border-gray-200">
                        @if($errors->any())
                            <div class="bg-orange-100 border-l-4 border-red-600 text-red-600 p-4 mb-3" role="alert">
                                <p class="font-bold">Oops..!</p>
                                <p>{{ $errors->first() }}</p>
                            </div>
                        @endif
                        {{--    COMPONENT    --}}
                        <form action="{{ route('admin.kitchen.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-3">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="grid-first-name">Title *</label>
                                    <input class="mb-3" name="title" type="text" placeholder="Food title" aria-label required>
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="grid-last-name">Price *</label>
                                    <input class="leading-tight focus:border-gray-500" name="price" aria-label
                                           type="number" placeholder="Price" required>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-3">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="grid-first-name">Stock</label>
                                    <input class="mb-3" name="stock" type="number" placeholder="Amount of stock" aria-label value="{{ old('stock', 1) }}">
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="grid-first-name">Discount <small>(%)</small></label>
                                    <input class="mb-3" name="discount" type="number" max="100" min="0" step="1" placeholder="Discount" aria-label value="{{ old('discount') }}">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-3">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <div class="bg-grey-lighter">
                                        <label class="flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white">
                                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                            </svg>
                                            <span class="text-base leading-normal">Select an image</span>
                                            <input type='file' class="hidden" name="image" accept="image/*" required/>
                                        </label>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="grid-last-name">Description</label>
                                    <textarea class="h-16 text-base placeholder-gray-600 focus:shadow-outline" placeholder="short description of the food..." name="description" aria-label></textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">
                                    Create Food
                                </button>
                            </div>
                        </form>
                        <hr class="my-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
