<div>

  @if(session()->has('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 2000)"
        x-show="show"
        x-transition
        class="mb-4 rounded-lg border border-green-300 bg-green-100 px-4 py-3 text-green-700"
    >
        {{ session('success') }}
    </div>
@endif

    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Asset Inventory
            </h1>

            <p class="text-gray-500">
                Manage and monitor all company assets.
            </p>
        </div>

        <a href="{{ route('items.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            + Add Asset
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Total Assets</p>
            <h2 class="text-3xl font-bold text-blue-600">{{ $totalAssets }}</h2>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Assigned</p>
            <h2 class="text-3xl font-bold text-green-600">{{ $assignedAssets }}</h2>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Available</p>
            <h2 class="text-3xl font-bold text-yellow-600">{{ $availableAssets }}</h2>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Maintenance</p>
            <h2 class="text-3xl font-bold text-red-600">{{ $maintenanceAssets }}</h2>
        </div>

    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-xl shadow p-4 mb-6">

        <div class="grid md:grid-cols-4 gap-4">

            <input
                type="text"
                placeholder="Search asset..."
                class="border rounded-lg px-4 py-2 w-full"
            >

            <select class="border rounded-lg px-4 py-2">
                <option>All Categories</option>
                <option>Laptop</option>
                <option>Desktop</option>
                <option>Monitor</option>
                <option>Printer</option>
            </select>

            <select class="border rounded-lg px-4 py-2">
                <option>All Status</option>
                <option>Available</option>
                <option>Assigned</option>
                <option>Maintenance</option>
            </select>

            <button class="bg-gray-800 text-white rounded-lg px-4 py-2">
                Filter
            </button>

        </div>

    </div>

    <!-- Asset Table -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>

                    <th class="text-left px-6 py-4">Asset Tag</th>
                    <th class="text-left px-6 py-4">Asset Name</th>
                    <th class="text-left px-6 py-4">Category</th>
                    <th class="text-left px-6 py-4">Brand</th>
                    <th class="text-left px-6 py-4">Status</th>
                    <th class="text-left px-6 py-4">Assigned To</th>
                    <th class="text-left px-6 py-4">Date Assigned</th>

                </tr>
            </thead>

           <tbody>
    @forelse ($items as $item)
        <tr class="border-t hover:bg-gray-50">

   <td class="px-6 py-4 font-medium">
    <a
        href="{{ route('items.edit', $item->id) }}"
        class="text-blue-600 hover:underline font-semibold"
    >
        {{ $item->asset_tag }}
    </a>
</td>

            <td class="px-6 py-4">
                {{ $item->item_name }}
            </td>

            <td class="px-6 py-4">
                {{ $item->category }}
            </td>

            <td class="px-6 py-4">
                {{ $item->brand ?? 'N/A' }}
            </td>

            <td class="px-6 py-4">
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                    {{ $item->status }}
                </span>
            </td>

    <td class="px-6 py-4">
    {{ $item->assigned_to ?: 'No User Assigned' }}
</td>

<td class="px-6 py-4">
    {{ $item->date_assigned
        ? \Carbon\Carbon::parse($item->date_assigned)->format('M d, Y')
        : 'Not Yet Assigned'
    }}
</td>


        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                No assets found yet.
            </td>
        </tr>
    @endforelse
</tbody>

        </table>

    </div>
</div>