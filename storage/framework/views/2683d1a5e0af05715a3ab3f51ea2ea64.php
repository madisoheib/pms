<?php if (isset($component)) { $__componentOriginalb525200bfa976483b4eaa0b7685c6e24 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb525200bfa976483b4eaa0b7685c6e24 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-widgets::components.widget','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-widgets::widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalee08b1367eba38734199cf7829b1d1e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee08b1367eba38734199cf7829b1d1e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.section.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="space-y-4">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0">
                    <svg class="w-12 h-12 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        <?php echo e(__('Welcome to PSM Business Management')); ?>

                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        <?php echo e(__('Hello')); ?>, <strong><?php echo e(auth()->user()->name); ?></strong>!
                        <?php echo e(__("You're logged in as")); ?>

                        <span class="font-semibold text-primary-600 dark:text-primary-400">
                            <?php echo e(auth()->user()->getRoleNames()->first() ?? __('User')); ?>

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
                            <p class="text-xs font-medium text-success-600 dark:text-success-400"><?php echo e(__('System Status')); ?></p>
                            <p class="text-sm font-semibold text-success-900 dark:text-success-100"><?php echo e(__('All Systems Operational')); ?></p>
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
                            <p class="text-xs font-medium text-warning-600 dark:text-warning-400"><?php echo e(__('Last Login')); ?></p>
                            <p class="text-sm font-semibold text-warning-900 dark:text-warning-100"><?php echo e(now()->format('M d, Y H:i')); ?></p>
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
                            <p class="text-xs font-medium text-info-600 dark:text-info-400"><?php echo e(__('Quick Access')); ?></p>
                            <p class="text-sm font-semibold text-info-900 dark:text-info-100"><?php echo e(__('Use sidebar to navigate')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee08b1367eba38734199cf7829b1d1e9)): ?>
<?php $attributes = $__attributesOriginalee08b1367eba38734199cf7829b1d1e9; ?>
<?php unset($__attributesOriginalee08b1367eba38734199cf7829b1d1e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee08b1367eba38734199cf7829b1d1e9)): ?>
<?php $component = $__componentOriginalee08b1367eba38734199cf7829b1d1e9; ?>
<?php unset($__componentOriginalee08b1367eba38734199cf7829b1d1e9); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb525200bfa976483b4eaa0b7685c6e24)): ?>
<?php $attributes = $__attributesOriginalb525200bfa976483b4eaa0b7685c6e24; ?>
<?php unset($__attributesOriginalb525200bfa976483b4eaa0b7685c6e24); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb525200bfa976483b4eaa0b7685c6e24)): ?>
<?php $component = $__componentOriginalb525200bfa976483b4eaa0b7685c6e24; ?>
<?php unset($__componentOriginalb525200bfa976483b4eaa0b7685c6e24); ?>
<?php endif; ?>
<?php /**PATH /Users/p3f/www/out-workspace/PSM/resources/views/filament/widgets/welcome-widget.blade.php ENDPATH**/ ?>