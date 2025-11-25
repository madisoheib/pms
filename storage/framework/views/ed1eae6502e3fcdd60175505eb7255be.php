<?php
    $items = $getRecord()->items()->with('product')->get();
    $displayLimit = 2;
?>

<div class="flex flex-col gap-1.5 py-1">
    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $items->take($displayLimit); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $product = $item->product;
            if (!$product) continue;
        ?>

        <div class="flex items-center gap-2 group">
            
            <div class="flex-shrink-0">
                <!--[if BLOCK]><![endif]--><?php if($product->photo_path): ?>
                    <img src="<?php echo e(Storage::url($product->photo_path)); ?>"
                         alt="<?php echo e($product->name); ?>"
                         class="w-8 h-8 rounded-md object-cover ring-1 ring-gray-200 dark:ring-gray-700" />
                <?php else: ?>
                    <div class="w-8 h-8 rounded-md bg-gray-100 dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-gray-700 flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                    <?php echo e($product->name); ?>

                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    <?php echo e($product->sku); ?> • <span class="font-medium"><?php echo e($item->quantity); ?> <?php echo e($item->quantity == 1 ? 'unit' : 'units'); ?></span>
                </p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <span class="text-gray-500 dark:text-gray-400 text-sm italic">No products</span>
    <?php endif; ?>

    <!--[if BLOCK]><![endif]--><?php if($items->count() > $displayLimit): ?>
        <div class="pt-1 border-t border-gray-100 dark:border-gray-800">
            <span class="text-xs font-medium text-gray-500 dark:text-gray-400">
                +<?php echo e($items->count() - $displayLimit); ?> more <?php echo e(($items->count() - $displayLimit) == 1 ? 'product' : 'products'); ?>

            </span>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH /var/www/resources/views/filament/tables/columns/order-products.blade.php ENDPATH**/ ?>