<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-600 leading-tight">
            {{ __('Welcome to Your Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    {{ __("You're logged in and ready to explore your dashboard!") }}
                </p>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-indigo-600 mb-4">Quick Actions</h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <li class="bg-indigo-100 dark:bg-indigo-800 p-4 rounded-md">
                            <a href="route('profile.edit')" class="block text-indigo-500 dark:text-indigo-300 hover:text-indigo-700 dark:hover:text-indigo-400">
                            {{ __('Profile') }}
                            </a>
                        </li>
                        <li class="bg-indigo-100 dark:bg-indigo-800 p-4 rounded-md">
                            <a href="#" class="block text-indigo-500 dark:text-indigo-300 hover:text-indigo-700 dark:hover:text-indigo-400">
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
