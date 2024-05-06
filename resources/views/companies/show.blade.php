<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-lg font-semibold">Company Name:</h3>
                            <p>{{ $company->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Email:</h3>
                            <p>{{ $company->email }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Logo:</h3>
                            @if($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="h-24">
                            @else
                                <p>No logo available</p>
                            @endif
                            
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Website:</h3>
                            <p><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
