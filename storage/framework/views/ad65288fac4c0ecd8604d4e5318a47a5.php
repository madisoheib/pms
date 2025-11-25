<?php if (isset($component)) { $__componentOriginal166a02a7c5ef5a9331faf66fa665c256 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.page.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    
    <div class="mb-8">
        <h1 class="text-3xl font-light text-gray-900 dark:text-white flex items-center">
            <i class="fas fa-warehouse mr-3 text-orange-500"></i>
            Stock Management
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Manage your inventory, stock hubs, and track losses</p>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        
        <a href="<?php echo e(route('filament.admin.resources.stock-hubs.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-cyan-300 dark:hover:border-cyan-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-cyan-500 to-cyan-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-warehouse text-3xl text-white"></i>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Stock Hubs</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Manage warehouse locations and distribution centers</p>
                </div>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.stocks.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-orange-300 dark:hover:border-orange-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-boxes text-3xl text-white"></i>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Stock</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">View and manage inventory levels across locations</p>
                </div>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.losses.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-rose-300 dark:hover:border-rose-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-rose-500 to-rose-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-exclamation-triangle text-3xl text-white"></i>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Stock Losses</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Track and record inventory losses and damages</p>
                </div>
            </div>
        </a>

    </div>

    
    <div class="mt-8">
        <a href="<?php echo e(route('filament.admin.pages.dashboard')); ?>"
           class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Dashboard
        </a>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $attributes = $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $component = $__componentOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?><?php /**PATH /Users/p3f/www/out-workspace/PSM/resources/views/filament/pages/stock-management.blade.php ENDPATH**/ ?>