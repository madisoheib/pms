@php
    $items = $getRecord()->items()->with('product')->get();
@endphp

<div class="flex items-center gap-2 flex-wrap">
    @forelse ($items->take(3) as $item)
        @php
            $product = $item->product;
            if (!$product) continue;

            $qrData = json_encode([
                'id' => $product->id,
                'sku' => $product->sku,
                'name' => $product->name,
                'qty' => $item->quantity,
            ]);
            $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=40x40&data=' . urlencode($qrData);
        @endphp

        <div class="flex items-center gap-1" title="{{ $product->name }} ({{ $item->quantity }} units)">
            {{-- Product Photo --}}
            @if($product->photo_path)
                <img src="{{ Storage::url($product->photo_path) }}"
                     alt="{{ $product->name }}"
                     class="w-10 h-10 rounded object-cover border border-gray-200 dark:border-gray-700" />
            @else
                <div class="w-10 h-10 rounded bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            @endif

            {{-- QR Code --}}
            <img src="{{ $qrUrl }}"
                 alt="QR Code"
                 class="w-10 h-10"
                 title="{{ $product->sku }}" />

            {{-- Quantity Badge --}}
            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                {{ $item->quantity }}
            </span>
        </div>
    @empty
        <span class="text-gray-500 text-sm">No products</span>
    @endforelse

    @if($items->count() > 3)
        <span class="text-gray-500 text-xs">+{{ $items->count() - 3 }} more</span>
    @endif
</div>