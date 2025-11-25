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
    
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printable-area, #printable-area * {
                visibility: visible;
            }
            #printable-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                text-align: center;
                padding: 20px;
            }
            .no-print {
                display: none !important;
            }
        }
        #qrcode {
            display: inline-block;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        #qrcode canvas,
        #qrcode img {
            margin: 0 auto;
        }
    </style>

    <div class="space-y-6">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            
            <div class="space-y-6">
                
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                        Product Information
                    </h2>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                            <dd class="mt-1 text-lg text-gray-900 dark:text-white"><?php echo e($record->name); ?></dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">SKU</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white font-mono"><?php echo e($record->sku); ?></dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                    <?php echo e($record->category?->name ?? 'Uncategorized'); ?>

                                </span>
                            </dd>
                        </div>
                        <?php if($record->description): ?>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white"><?php echo e($record->description); ?></dd>
                        </div>
                        <?php endif; ?>
                    </dl>
                </div>

                
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-warehouse mr-2 text-orange-500"></i>
                        Stock & Pricing
                    </h2>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Price per Unit</dt>
                            <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">
                                DZD <?php echo e(number_format($record->price_per_unit, 2)); ?>

                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Stock Quantity</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?php echo e($record->isLowStock() ? 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' : 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400'); ?>">
                                    <i class="fas <?php echo e($record->isLowStock() ? 'fa-exclamation-triangle' : 'fa-check-circle'); ?> mr-1"></i>
                                    <?php echo e($record->stock_quantity); ?> units
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Low Stock Threshold</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white"><?php echo e($record->low_stock_threshold); ?> units</dd>
                        </div>
                        <?php if($record->country_origin): ?>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Country of Origin</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">
                                <i class="fas fa-globe mr-1 text-gray-400"></i>
                                <?php echo e($record->country_origin); ?>

                            </dd>
                        </div>
                        <?php endif; ?>
                    </dl>
                </div>

                
                <?php if($record->photo_path): ?>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-image mr-2 text-purple-500"></i>
                        Product Image
                    </h2>
                    <img src="<?php echo e(Storage::url($record->photo_path)); ?>"
                         alt="<?php echo e($record->name); ?>"
                         class="w-full rounded-lg object-cover"
                         style="max-height: 400px;">
                </div>
                <?php endif; ?>
            </div>

            
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-qrcode mr-2 text-green-500"></i>
                            Product QR Code
                        </h2>
                        <button onclick="printQRCode()"
                                class="no-print inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                            <i class="fas fa-print mr-1.5"></i>
                            Print QR Code
                        </button>
                    </div>

                    <div id="printable-area" class="text-center">
                        <div id="qrcode" class="mb-4"></div>
                        <div class="space-y-2 mt-4">
                            <p class="text-lg font-semibold text-gray-900 dark:text-white"><?php echo e($record->name); ?></p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">SKU: <?php echo e($record->sku); ?></p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Price: DZD <?php echo e(number_format($record->price_per_unit, 2)); ?></p>
                        </div>
                    </div>

                    
                    <div class="mt-6 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">QR Code Contains:</h3>
                        <pre class="text-xs text-gray-600 dark:text-gray-400 overflow-x-auto"><?php echo e($this->getQrCodeData()); ?></pre>
                    </div>
                </div>

                
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-toggle-on mr-2 text-indigo-500"></i>
                        Product Status
                    </h2>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Active Status</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?php echo e($record->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400'); ?>">
                            <i class="fas <?php echo e($record->is_active ? 'fa-check-circle' : 'fa-times-circle'); ?> mr-1"></i>
                            <?php echo e($record->is_active ? 'Active' : 'Inactive'); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Generate QR Code
        document.addEventListener('DOMContentLoaded', function() {
            var qrData = <?php echo json_encode($this->getQrCodeData()); ?>;

            new QRCode(document.getElementById("qrcode"), {
                text: qrData,
                width: 256,
                height: 256,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        });

        // Print QR Code function
        function printQRCode() {
            window.print();
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $attributes = $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $component = $__componentOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?><?php /**PATH /Users/p3f/www/out-workspace/PSM/resources/views/filament/resources/product-resource/pages/view-product.blade.php ENDPATH**/ ?>