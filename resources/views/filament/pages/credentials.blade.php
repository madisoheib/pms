<x-filament-panels::page>
    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-light text-gray-900 dark:text-white flex items-center">
            <i class="fas fa-shield-alt mr-3 text-violet-500"></i>
            Credentials
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Manage users, roles, and permissions</p>
    </div>

    {{-- Main Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Users --}}
        <a href="{{ route('filament.admin.resources.users.index') }}"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-teal-300 dark:hover:border-teal-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-teal-500 to-teal-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-user-friends text-3xl text-white"></i>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Users</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Manage system users and their accounts</p>
                </div>
            </div>
        </a>

        {{-- Roles --}}
        <a href="{{ route('filament.admin.resources.roles.index') }}"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-violet-300 dark:hover:border-violet-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-violet-500 to-violet-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-user-shield text-3xl text-white"></i>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Roles</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Configure user roles and responsibilities</p>
                </div>
            </div>
        </a>

        {{-- Permissions --}}
        <a href="{{ route('filament.admin.resources.permissions.index') }}"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-purple-300 dark:hover:border-purple-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-key text-3xl text-white"></i>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Permissions</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Set and manage access permissions</p>
                </div>
            </div>
        </a>

    </div>

    {{-- Back to Dashboard --}}
    <div class="mt-8">
        <a href="{{ route('filament.admin.pages.dashboard') }}"
           class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Dashboard
        </a>
    </div>

</x-filament-panels::page>