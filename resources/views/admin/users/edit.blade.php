<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit user') }}
        </h2>
    </x-slot>

    <div id="user-edit">
        <div class="py-7">
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-lg mx-auto">
                    <div class="p-6 border-b border-gray-200">
                        @if($errors->any())
                            <div class="bg-orange-100 border-l-4 border-red-600 text-red-600 p-4 mb-3" role="alert">
                                <p class="font-bold">Oops..!</p>
                                <p>{{ $errors->first() }}</p>
                            </div>
                        @endif
                        {{--    COMPONENT    --}}
                        <form action="{{ route('admin.users.update.profile', ['id' => $user->id]) }}" method="POST" class="w-full">
                            @csrf @method('PUT')
                            <div class="flex flex-wrap -mx-3 mb-3">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="grid-first-name">Name</label>
                                    <input class="mb-3 leading-tight" name="name" type="text" placeholder="Jane" aria-label value="{{ $user->name }}">
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="grid-last-name">Email</label>
                                    <input class="leading-tight focus:border-gray-500" name="email" aria-label
                                           type="text" placeholder="Doe" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">
                                    Update profile
                                </button>
                            </div>
                        </form>
                        <hr class="my-6">
                        <form action="{{ route('admin.users.update.password', ['id' => $user->id]) }}" method="POST" class="w-full">
                            @csrf @method('PUT')
                            <div class="flex flex-wrap -mx-3 mb-3">
                                <div class="w-full px-3">
                                    <label for="grid-password">Current Password</label>
                                    <input class="mb-3 leading-tight focus:border-gray-500" name="current_password"
                                           id="grid-password" type="password" placeholder="********">
                                    <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-3">
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="grid-password">New Password</label>
                                    <input class="mb-3 leading-tight focus:border-gray-500" name="password"
                                           id="grid-password" type="password" placeholder="New user password">
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="grid-password">Confirm Password</label>
                                    <input class="mb-3 leading-tight focus:border-gray-500" name="password_confirmation"
                                           id="grid-password" type="password" placeholder="confirm user password">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">
                                    Update password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
