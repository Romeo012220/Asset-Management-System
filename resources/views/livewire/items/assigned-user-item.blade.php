<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">Assigned Assets</h1>
        <p class="mt-1 text-sm text-slate-500">
            View all assets currently assigned to users.
        </p>
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">

            <!-- Search and Filters -->
<div class="mb-6 rounded-2xl border border-slate-200/80 bg-white px-4 py-3 shadow-sm">
    <div class="flex flex-wrap items-center gap-3">

        <!-- Search -->
        <div class="relative w-full sm:w-72">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Search asset tag, name, or serial..."
                class="w-full rounded-xl border border-slate-200 bg-slate-50/50 py-2 pl-3 pr-9 text-sm text-slate-800 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20"
            >

            @if($search)
                <button
                    type="button"
                    wire:click="$set('search', '')"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-red-500"
                >
                    ✕
                </button>
            @endif
        </div>

        <!-- Category -->
        <div class="relative w-full sm:w-44">
            <select
                wire:model.live="category"
                class="w-full rounded-xl border border-slate-200 bg-slate-50/50 py-2 pl-3 pr-8 text-sm text-slate-800 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20"
            >
                <option value="">All Categories</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat }}">{{ $cat }}</option>
                @endforeach
            </select>

            @if($category)
                <button
                    type="button"
                    wire:click="$set('category', '')"
                    class="absolute right-8 top-1/2 -translate-y-1/2 text-slate-400 hover:text-red-500"
                >
                    ✕
                </button>
            @endif
        </div>

        <!-- Status -->
        <div class="relative w-full sm:w-40">
            <select
                wire:model.live="status"
                class="w-full rounded-xl border border-slate-200 bg-slate-50/50 py-2 pl-3 pr-8 text-sm text-slate-800 focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20"
            >
                <option value="">All Status</option>
                <option value="In Use">In Use</option>
            </select>

            @if($status)
                <button
                    type="button"
                    wire:click="$set('status', '')"
                    class="absolute right-8 top-1/2 -translate-y-1/2 text-slate-400 hover:text-red-500"
                >
                    ✕
                </button>
            @endif
        </div>

    </div>
</div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px]">

                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/80">
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-slate-500">Asset Tag</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-slate-500">Asset Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-slate-500">Serial Number</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-slate-500">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-slate-500">Brand</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-slate-500">Assigned To</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-slate-500">Date Assigned</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-slate-500">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($items as $item)
                        <tr class="hover:bg-brand-50/40">

                            <td class="px-6 py-4 font-semibold text-brand-600 text-sm">
                                {{ $item->asset_tag }}
                            </td>

                            <td class="px-6 py-4 text-slate-900">
                                {{ $item->item_name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-mono">
    {{ $item->serial_number ?? '—' }}
</td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $item->category }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $item->brand ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-xs font-medium text-slate-800 ">
                                {{ $item->assigned_to }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-500">
                                {{ $item->date_assigned
                                    ? \Carbon\Carbon::parse($item->date_assigned)->format('M d, Y')
                                    : '—'
                                }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-200/80">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    In Use
                                </span>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-sm text-slate-500">
                                No assigned assets found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        @if($items->hasPages())
            <div class="border-t border-slate-100 px-6 py-4">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>