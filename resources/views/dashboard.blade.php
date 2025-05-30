<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Welcome to your Dashboard!</h3>
                <p class="text-gray-600">Here you can manage your account, view statistics, and more.</p>

                <!-- Add your custom dashboard content here -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                    <div class="bg-blue-100 p-4 rounded-lg shadow">
                        <h4 class="font-semibold">Section 1</h4>
                        <p>Details about this section.</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow">
                        <h4 class="font-semibold">Section 2</h4>
                        <p>Details about this section.</p>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-lg shadow">
                        <h4 class="font-semibold">Section 3</h4>
                        <p>Details about this section.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
