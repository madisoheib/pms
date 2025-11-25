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

    
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h1 class="text-3xl font-light text-gray-900 dark:text-white flex items-center">
                <i class="fas fa-exchange-alt mr-3 text-emerald-500"></i>
                Transfer Money
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Transfer funds between wallets with automatic currency conversion</p>
        </div>
        <a href="<?php echo e(route('filament.admin.resources.exchange-rates.index')); ?>"
           class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition-colors">
            <i class="fas fa-cog mr-2"></i>
            Manage Exchange Rates
        </a>
    </div>

    
    <div class="max-w-4xl mx-auto">
        <form wire:submit.prevent="transfer">
            <?php echo e($this->form); ?>


            <div class="mt-6 flex gap-3">
                <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['type' => 'submit','size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','size' => 'lg']); ?>
                    <i class="fas fa-paper-plane mr-2"></i>
                    Transfer Money
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['type' => 'button','color' => 'gray','size' => 'lg','wire:click' => '$set(\'data\', [])','outlined' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','color' => 'gray','size' => 'lg','wire:click' => '$set(\'data\', [])','outlined' => true]); ?>
                    <i class="fas fa-undo mr-2"></i>
                    Reset Form
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
            </div>
        </form>
    </div>

    
    <?php
        $recentTransfers = \App\Models\WalletTransfer::with(['fromWallet', 'toWallet'])
            ->latest()
            ->take(5)
            ->get();
    ?>

    <?php if($recentTransfers->count() > 0): ?>
        <div class="mt-12">
            <h2 class="text-xl font-light text-gray-900 dark:text-white mb-4">Recent Transfers</h2>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-700">
                                <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">From</th>
                                <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">To</th>
                                <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Amount</th>
                                <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Converted</th>
                                <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            <?php $__currentLoopData = $recentTransfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        <?php echo e($transfer->fromWallet->name); ?>

                                        <span class="text-gray-500 dark:text-gray-400">(<?php echo e($transfer->from_currency); ?>)</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        <?php echo e($transfer->toWallet->name); ?>

                                        <span class="text-gray-500 dark:text-gray-400">(<?php echo e($transfer->to_currency); ?>)</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        <?php echo e($transfer->from_currency); ?> <?php echo e(number_format($transfer->amount, 2)); ?>

                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        <?php echo e($transfer->to_currency); ?> <?php echo e(number_format($transfer->converted_amount, 2)); ?>

                                        <?php if($transfer->exchange_rate != 1): ?>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                (<?php echo e(number_format($transfer->exchange_rate, 4)); ?>)
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <?php if($transfer->status === 'approved'): ?>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                                <i class="fas fa-check-circle mr-1"></i> Approved
                                            </span>
                                        <?php elseif($transfer->status === 'pending'): ?>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                                <i class="fas fa-times-circle mr-1"></i> Rejected
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                        <?php echo e($transfer->created_at->format('M d, Y H:i')); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
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
<?php endif; ?><?php /**PATH /Users/p3f/www/out-workspace/PSM/resources/views/filament/pages/transfer-money.blade.php ENDPATH**/ ?>