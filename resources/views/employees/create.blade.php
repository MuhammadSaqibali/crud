<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50" required>
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50" required>
                        </div>

                        <div class="mb-4">
                            <label for="company_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company</label>
                            <select name="company_id" id="company_id" style="height: 40px" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50" required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                            <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:focus:ring-gray-400 dark:text-gray-400 dark:focus:ring-opacity-50">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
