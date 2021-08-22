<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="flex flex-wrap">
            <div class="flex-shrink-0 w-full flex-1 px-2">
                <div class="bg-green-50 shadow-lg p-4 rounded-2xl">
                    <div class="flex flex-wrap">
                        <div class="flex-shrink-0 w-full flex-1 px-2">
                            <h5 class="text-gray-500">Today's money</h5>
                            <h4>70,000/=</h4>
                        </div>
                        <div class="flex-shrink-0 w-full flex-1 px-2 items-center">
                            <div class="p-2 text-red-900 text-right">
                                <i class="fas fa-money-bill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-full flex-1 px-2">
                <div class="bg-green-50 shadow-lg p-4 rounded-2xl">
                    <div class="flex flex-wrap">
                        <div class="flex-shrink-0 w-full flex-1 px-2">
                            <h5 class="text-gray-500">Today's orders</h5>
                            <h4>+{{ $todaysOrders }}</h4>
                        </div>
                        <div class="flex-shrink-0 w-full flex-1 px-2 items-center">
                            <div class="p-2 text-red-900 text-right">
                                <i class="fas fa-user-tag"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-full flex-1 px-2">
                <div class="bg-green-50 shadow-lg p-4 rounded-2xl">
                    <div class="flex flex-wrap">
                        <div class="flex-shrink-0 w-full flex-1 px-2">
                            <h5 class="text-gray-500">Today's users</h5>
                            <h4>+{{ $todaysUsers }}</h4>
                        </div>
                        <div class="flex-shrink-0 w-full flex-1 px-2 items-center">
                            <div class="p-2 text-red-900 text-right">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-full flex-1 px-2">
                <div class="bg-green-50 shadow-lg p-4 rounded-2xl">
                    <div class="flex flex-wrap">
                        <div class="flex-shrink-0 w-full flex-1 px-2">
                            <h5 class="text-gray-500">Today's stock</h5>
                            <h4>{{ $totalStock }}</h4>
                        </div>
                        <div class="flex-shrink-0 w-full flex-1 px-2 items-center">
                            <div class="p-2 text-red-900 text-right">
                                <i class="fas fa-warehouse"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="max-w-7xl mx-auto">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-wrap">
                <div class="flex-shrink-0 w-full flex-1 px-2">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <div class="text-center">
                                        <h4>New Orders</h4>
                                        <hr>
                                    </div>
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="px-6 py-3 text-left text-xs text-gray-500 uppercase tracking-wider">#</th>
                                            <th class="px-6 py-3 text-left text-xs text-gray-500 uppercase tracking-wider">User</th>
                                            <th class="px-6 py-3 text-left text-xs text-gray-500 uppercase tracking-wider">Order Date</th>
                                            <th class="px-6 py-3 text-left text-xs text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">

                                        @forelse($newOrders as $order)
                                            <?php
                                            $images = glob('images/faces/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                            $randomImage = $images[array_rand($images)];
                                            ?>
                                            <tr class="border-b border-gray-200 {{ fmod($loop->iteration, 2) == 0 ?: ' bg-gray-50' }} hover:bg-gray-100">
                                                <th class="py-3 px-6 text-left whitespace-nowrap">{{ $loop->iteration }}</th>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <div class="mr-2">
                                                            <img class="w-6 h-6 rounded-full" src="{{ asset($randomImage) }}" alt=""/>
                                                        </div>
                                                        <span>{{ $order->user->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-center">{{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->diffForHumans() }}</td>
                                                <td class="py-3 px-6 text-center">
                                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                 stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5"><div class="text-center my-2">NO ORDERS</div></td></tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                    <div class="text-right py-1 px-3">
                                        <small>
                                            <a class="text-pink-900" href="{{ route('admin.orders.index') }}">
                                                View All <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 w-full flex-1 px-2">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="text-center">
                                    <h4>New Users</h4>
                                    <hr>
                                </div>
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th scope="col" class="px-6 py-3 text-left text-xs text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs text-gray-500 uppercase tracking-wider">Role</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">

                                    @foreach($newUsers as $user)
                                        <?php
                                        $images = glob('images/faces/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                        $randomImage = $images[array_rand($images)];
                                        ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-6 w-6 rounded-full" src="{{ asset($randomImage) }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                                        <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                  Active
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user->is_admin ? 'Admin' : 'Customer' }}</td>
                                            <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- More people... -->
                                    </tbody>
                                </table>
                                <div class="text-right py-1 px-3">
                                    <small>
                                        <a class="text-pink-900" href="{{ route('admin.users.index') }}">
                                            View All <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
