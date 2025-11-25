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

    
    <div class="mb-10 text-center">
        <h1 class="text-5xl font-light mb-3 text-gray-900 dark:text-white tracking-tight">
            Welcome to PSM
        </h1>
        <p class="text-lg font-light text-gray-600 dark:text-gray-400">Product & Stock Management System</p>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        
        <a href="<?php echo e(route('filament.admin.resources.orders.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-blue-300 dark:hover:border-blue-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-shopping-cart text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Orders</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.sales.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-green-300 dark:hover:border-green-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-cash-register text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Sales</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.products.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-purple-300 dark:hover:border-purple-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-box text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Products</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.pages.stock-management')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-orange-300 dark:hover:border-orange-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-warehouse text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Stock Management</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.clients.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-pink-300 dark:hover:border-pink-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-pink-500 to-pink-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Clients</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.suppliers.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-indigo-300 dark:hover:border-indigo-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-truck text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Suppliers</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.wallets.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-yellow-300 dark:hover:border-yellow-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-yellow-500 to-yellow-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-wallet text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Wallets</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.pages.transfer-money')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-emerald-300 dark:hover:border-emerald-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-exchange-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Transfer Money</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.categories.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-lime-300 dark:hover:border-lime-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-lime-500 to-lime-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-tags text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Categories</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.transit-receipts.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-red-300 dark:hover:border-red-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-clipboard-check text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Transit Receipts</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.resources.earnings.index')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-amber-300 dark:hover:border-amber-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-money-bill-wave text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Earnings</h3>
            </div>
        </a>

        
        <a href="<?php echo e(route('filament.admin.pages.credentials')); ?>"
           class="group block bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-violet-300 dark:hover:border-violet-600">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-violet-500 to-violet-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-normal text-gray-900 dark:text-white">Credentials</h3>
            </div>
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
<?php endif; ?><?php /**PATH /Users/p3f/www/out-workspace/PSM/resources/views/filament/pages/dashboard.blade.php ENDPATH**/ ?>