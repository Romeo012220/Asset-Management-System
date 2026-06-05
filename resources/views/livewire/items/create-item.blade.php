<div>
    <div class="max-w-5xl mx-auto py-8 px-4">

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">

            <!-- Header -->
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">
                    Add New IT Asset
                </h1>
                <p class="text-blue-100 text-sm">
                    Register a new asset into the inventory system.
                </p>
            </div>

            <!-- Success Message -->
            @if (session()->has('success'))
                <div class="m-6 p-4 rounded-lg bg-green-100 border border-green-300 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="save" class="p-6 space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                 

                    <!-- Item Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Item Name *
                        </label>

                        <input
                            type="text"
                            wire:model="item_name"
                            placeholder="Dell Latitude 5420"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >

                        @error('item_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Category *
                        </label>

                        <select
                            wire:model="category"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
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

                        @error('category')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Brand -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Brand
                        </label>

                        <input
                            type="text"
                            wire:model="brand"
                            placeholder="Dell"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >
                    </div>

                    <!-- Model -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Model
                        </label>

                        <input
                            type="text"
                            wire:model="model"
                            placeholder="Latitude 5420"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >
                    </div>

                    <!-- Serial Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Serial Number
                        </label>

                        <input
                            type="text"
                            wire:model="serial_number"
                            placeholder="SN123456789"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >

                        @error('serial_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Date Purchased -->
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Date Purchased
    </label>

    <input
        type="date"
        wire:model="date_purchased"
        class="w-full border border-gray-300 rounded-lg px-4 py-2"
    >

    @error('date_purchased')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

                </div>

                <!-- Status -->
                <input type="hidden" wire:model="status">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>

                    <input
                        type="text"
                        value="Available"
                        readonly
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-600"
                    >

                    <p class="text-xs text-gray-500 mt-1">
                        New assets are automatically marked as Available.
                    </p>
                </div>

                <!-- Remarks -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Remarks
                    </label>

                    <textarea
                        wire:model="remarks"
                        rows="4"
                        placeholder="Additional notes..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    ></textarea>
                </div>

              <div class="flex justify-end gap-3">

    <a
        href="{{ route('items.index') }}"
        class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300"
    >
        Back
    </a>

    <button
        type="submit"
        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
    >
        Save Asset
    </button>

</div>

            </form>

        </div>

    </div>
</div>