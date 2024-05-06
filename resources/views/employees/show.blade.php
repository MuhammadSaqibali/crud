<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
            {{ __('Show Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
                        <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
                        <p><strong>Company:</strong> {{ $employee->company->name }}</p>
                        <p><strong>Email:</strong> {{ $employee->email }}</p>
                        <p><strong>Phone:</strong> {{ $employee->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
