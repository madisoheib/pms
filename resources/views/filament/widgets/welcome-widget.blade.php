<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-4">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0">
                    <svg class="w-12 h-12 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        {{ __('Welcome to PSM Business Management') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Hello') }}, <strong>{{ auth()->user()->name }}</strong>!
                        {{ __("You're logged in as") }}
                        <span class="font-semibold text-primary-600 dark:text-primary-400">
                            {{ auth()->user()->getRoleNames()->first() ?? __('User') }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <div class="p-4 bg-success-50 dark:bg-success-950 rounded-lg border border-success-200 dark:border-success-800">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-success-100 dark:bg-success-900 rounded-lg">
                            <svg class="w-5 h-5 text-success-600 dark:text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-success-600 dark:text-success-400">{{ __('System Status') }}</p>
                            <p class="text-sm font-semibold text-success-900 dark:text-success-100">{{ __('All Systems Operational') }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-warning-50 dark:bg-warning-950 rounded-lg border border-warning-200 dark:border-warning-800">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-warning-100 dark:bg-warning-900 rounded-lg">
                            <svg class="w-5 h-5 text-warning-600 dark:text-warning-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-warning-600 dark:text-warning-400">{{ __('Last Login') }}</p>
                            <p class="text-sm font-semibold text-warning-900 dark:text-warning-100">{{ now()->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-info-50 dark:bg-info-950 rounded-lg border border-info-200 dark:border-info-800">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-info-100 dark:bg-info-900 rounded-lg">
                            <svg class="w-5 h-5 text-info-600 dark:text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-info-600 dark:text-info-400">{{ __('Quick Access') }}</p>
                            <p class="text-sm font-semibold text-info-900 dark:text-info-100">{{ __('Use sidebar to navigate') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
