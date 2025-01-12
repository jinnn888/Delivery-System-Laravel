<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rider Management') }}
        </h2>
        <div class='mt-4'>
            <a class='bg-cyan-700 text-white rounded text-sm  p-2' href="{{ route('riders.create') }}">New Rider <i class="fa-solid fa-plus"></i></a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 flex flex-row items-center">
                    <table class="flex-grow">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image
                                </th>
                                <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>

                                <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date of birth
                                </th>

                                <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    age
                                </th>

                                <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    address
                                </th>

                                <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    email
                                </th>

                                <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone number
                                </th>

                                <th class="px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($riders as $rider)
                            <tr class=' '>

                                <td class="  px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <img  src="{{ $rider->user->getFirstMediaUrl('profile_images', 'thumb') }}">
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="  px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $rider->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="  px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $rider->user->birth_date }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="  px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $rider->user->age }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="  px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $rider->user->address }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="  px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $rider->user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="  px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                +{{ $rider->user->phone_number }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="  px-6 py-4">
                                    <div class="hidden gap-2 sm:flex sm:items-center sm:ms-6">
                                        <button>
                                            <i class="text-indigo-600 fas fa-edit"></i>
                                        </button>
                                        <button>
                                            <i class="text-red-600 fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
