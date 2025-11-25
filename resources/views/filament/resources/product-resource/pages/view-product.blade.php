<x-filament-panels::page>
    {{-- Include QRCode.js library --}}
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    {{-- Font Awesome CDN --}}
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
        {{-- Product Information Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Left Column - Product Details --}}
            <div class="space-y-6">
                {{-- Product Info Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                        Product Information
                    </h2>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                            <dd class="mt-1 text-lg text-gray-900 dark:text-white">{{ $record->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">SKU</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white font-mono">{{ $record->sku }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                    {{ $record->category?->name ?? 'Uncategorized' }}
                                </span>
                            </dd>
                        </div>
                        @if($record->description)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $record->description }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>

                {{-- Stock & Pricing Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-warehouse mr-2 text-orange-500"></i>
                        Stock & Pricing
                    </h2>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Price per Unit</dt>
                            <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">
                                DZD {{ number_format($record->price_per_unit, 2) }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Stock Quantity</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $record->isLowStock() ? 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' : 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' }}">
                                    <i class="fas {{ $record->isLowStock() ? 'fa-exclamation-triangle' : 'fa-check-circle' }} mr-1"></i>
                                    {{ $record->stock_quantity }} units
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Low Stock Threshold</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $record->low_stock_threshold }} units</dd>
                        </div>
                        @if($record->country_origin)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Country of Origin</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">
                                <i class="fas fa-globe mr-1 text-gray-400"></i>
                                {{ $record->country_origin }}
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>

                {{-- Product Image --}}
                @if($record->photo_path)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-image mr-2 text-purple-500"></i>
                        Product Image
                    </h2>
                    <img src="{{ Storage::url($record->photo_path) }}"
                         alt="{{ $record->name }}"
                         class="w-full rounded-lg object-cover"
                         style="max-height: 400px;">
                </div>
                @endif
            </div>

            {{-- Right Column - QR Code --}}
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
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $record->name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">SKU: {{ $record->sku }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Price: DZD {{ number_format($record->price_per_unit, 2) }}</p>
                        </div>
                    </div>

                    {{-- QR Code Data Display --}}
                    <div class="mt-6 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">QR Code Contains:</h3>
                        <pre class="text-xs text-gray-600 dark:text-gray-400 overflow-x-auto">{{ $this->getQrCodeData() }}</pre>
                    </div>
                </div>

                {{-- Status Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <i class="fas fa-toggle-on mr-2 text-indigo-500"></i>
                        Product Status
                    </h2>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Active Status</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $record->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                            <i class="fas {{ $record->is_active ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                            {{ $record->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Generate QR Code
        document.addEventListener('DOMContentLoaded', function() {
            var qrData = {!! json_encode($this->getQrCodeData()) !!};

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
</x-filament-panels::page>