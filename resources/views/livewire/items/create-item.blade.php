<div>

    <!-- Page Header -->
    <div class="mb-8">
        <a href="{{ route('items.index') }}"
           class="mb-4 inline-flex items-center gap-1.5 text-sm font-medium text-slate-500 transition-colors hover:text-brand-600">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Back to Asset Inventory
        </a>

        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            Add New IT Asset
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Register a new asset into the inventory system. Asset tag is auto-generated on save.
        </p>
    </div>

    @if(session()->has('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800"
        >
            <svg class="h-5 w-5 shrink-0 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Card -->
    <div class="mx-auto max-w-3xl overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">

        <div class="border-b border-slate-100 bg-gradient-to-r from-brand-50/80 to-white px-6 py-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 text-white shadow-lg shadow-brand-600/25">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-semibold text-slate-900">Asset Details</h2>
                    <p class="text-xs text-slate-500">Fields marked with * are required</p>
                </div>
            </div>
        </div>

        <form wire:submit.prevent="save" class="space-y-6 p-6">

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                <div class="sm:col-span-2">
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">
                        Item Name <span class="text-rose-500">*</span>
                    </label>
                    <input
                        type="text"
                        wire:model="item_name"
                        placeholder="e.g. Dell Latitude 5540"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-800 transition-colors placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 @error('item_name') border-rose-300 ring-2 ring-rose-500/20 @enderror"
                    >
                    @error('item_name')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">
                        Category <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select
                            wire:model="category"
                            class="w-full appearance-none rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 pr-10 text-sm text-slate-800 transition-colors focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 @error('category') border-rose-300 ring-2 ring-rose-500/20 @enderror"
                        >
                            <option value="">Select Category</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Desktop">Desktop</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Printer">Printer</option>
                            <option value="Keyboard">Keyboard</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Network Device">Network Device</option>
                            <option value="Server">Server</option>
                            <option value="Other">Other</option>
                        </select>
                        <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    @error('category')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">
                        Brand
                    </label>
                    <input
                        type="text"
                        wire:model="brand"
                        placeholder="e.g. Dell, HP, Lenovo"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-800 transition-colors placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20"
                    >
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">
                        Model
                    </label>
                    <input
                        type="text"
                        wire:model="model"
                        placeholder="e.g. Latitude 5540"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-800 transition-colors placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20"
                    >
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">
                        Serial Number
                    </label>
                    <input
                        type="text"
                        wire:model="serial_number"
                        placeholder="SN123456789"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-800 transition-colors placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 @error('serial_number') border-rose-300 ring-2 ring-rose-500/20 @enderror"
                    >
                    @error('serial_number')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-slate-700">
                        Date Purchased
                    </label>
                    <input
                        type="date"
                        wire:model="date_purchased"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-800 transition-colors focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 @error('date_purchased') border-rose-300 ring-2 ring-rose-500/20 @enderror"
                    >
                    @error('date_purchased')
                        <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <input type="hidden" wire:model="status">

            <div>
                <label class="mb-1.5 block text-sm font-medium text-slate-700">
                    Status
                </label>
                <div class="flex items-center gap-3 rounded-xl border border-amber-200/80 bg-amber-50/50 px-4 py-3">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700 ring-1 ring-amber-200/80">
                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                        Available
                    </span>
                    <p class="text-xs text-slate-500">
                        New assets are automatically marked as Available.
                    </p>
                </div>
            </div>

            <div>
                <label class="mb-1.5 block text-sm font-medium text-slate-700">
                    Remarks
                </label>
                <textarea
                    wire:model="remarks"
                    rows="4"
                    placeholder="Additional notes about this asset..."
                    class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm text-slate-800 transition-colors placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20"
                ></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">

                <a href="{{ route('items.index') }}"
                   class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 transition-colors hover:bg-slate-50">
                    Cancel
                </a>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-brand-600/25 transition-all duration-200 hover:bg-brand-700 hover:shadow-brand-700/30 disabled:opacity-60"
                >
                    <svg wire:loading wire:target="save" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span wire:loading.remove wire:target="save">Save Asset</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </button>

            </div>

        </form>

    </div>

</div>
