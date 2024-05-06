<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" value="{{ $company->name }}" id="name" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ $company->email }}"  class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Logo</label>
                            <input type="file" name="logo" id="logo" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50">
                            @if($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" class="mt-2 h-20" alt="Company Logo">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Website</label>
                            <input type="url" name="website" id="website" value="{{ $company->website }}"  class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
