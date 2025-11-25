<x-filament-panels::page>
    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- Header with Exchange Rate Button --}}
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h1 class="text-3xl font-light text-gray-900 dark:text-white flex items-center">
                <i class="fas fa-exchange-alt mr-3 text-emerald-500"></i>
                Transfer Money
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Transfer funds between wallets with automatic currency conversion</p>
        </div>
        <a href="{{ route('filament.admin.resources.exchange-rates.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition-colors">
            <i class="fas fa-cog mr-2"></i>
            Manage Exchange Rates
        </a>
    </div>

    {{-- Transfer Form --}}
    <div class="max-w-4xl mx-auto">
        <form wire:submit.prevent="transfer">
            {{ $this->form }}

            <div class="mt-6 flex gap-3">
                <x-filament::button type="submit" size="lg">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Transfer Money
                </x-filament::button>

                <x-filament::button type="button" color="gray" size="lg" wire:click="$set('data', [])" outlined>
                    <i class="fas fa-undo mr-2"></i>
                    Reset Form
                </x-filament::button>
            </div>
        </form>
    </div>

    {{-- Recent Transfers --}}
    @php
        $recentTransfers = \App\Models\WalletTransfer::with(['fromWallet', 'toWallet'])
            ->latest()
            ->take(5)
            ->get();
    @endphp

    @if($recentTransfers->count() > 0)
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
                            @foreach($recentTransfers as $transfer)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        {{ $transfer->fromWallet->name }}
                                        <span class="text-gray-500 dark:text-gray-400">({{ $transfer->from_currency }})</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        {{ $transfer->toWallet->name }}
                                        <span class="text-gray-500 dark:text-gray-400">({{ $transfer->to_currency }})</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        {{ $transfer->from_currency }} {{ number_format($transfer->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        {{ $transfer->to_currency }} {{ number_format($transfer->converted_amount, 2) }}
                                        @if($transfer->exchange_rate != 1)
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                ({{ number_format($transfer->exchange_rate, 4) }})
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if($transfer->status === 'approved')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                                <i class="fas fa-check-circle mr-1"></i> Approved
                                            </span>
                                        @elseif($transfer->status === 'pending')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                                <i class="fas fa-times-circle mr-1"></i> Rejected
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $transfer->created_at->format('M d, Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    {{-- Back to Dashboard --}}
    <div class="mt-8">
        <a href="{{ route('filament.admin.pages.dashboard') }}"
           class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Dashboard
        </a>
    </div>

</x-filament-panels::page>