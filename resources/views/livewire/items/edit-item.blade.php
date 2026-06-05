<div>
    <div class="max-w-5xl mx-auto py-8 px-4">

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">

            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">
                    Edit IT Asset
                </h1>
                <p class="text-blue-100 text-sm">
                    Update asset information.
                </p>
            </div>

            <form wire:submit.prevent="updateItem" class="p-6 space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Item Name *
                        </label>

                        <input
                            type="text"
                            wire:model="item_name"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >

                        @error('item_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

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

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Brand
                        </label>

                        <input
                            type="text"
                            wire:model="brand"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Model
                        </label>

                        <input
                            type="text"
                            wire:model="model"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Serial Number
                        </label>

                        <input
                            type="text"
                            wire:model="serial_number"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >

                        @error('serial_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

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

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status *
                        </label>

                        <select
                            wire:model="status"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >
                            <option value="Available">Available</option>
                            <option value="Assigned">Assigned</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>

                        @error('status')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

       <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Assigned To
    </label>

    <select
        wire:model="assigned_to"
        class="w-full border border-gray-300 rounded-lg px-4 py-2"
    >
        <option value="">Select User</option>

        @foreach($users as $user)
            <option value="{{ $user->name }}">
                {{ $user->name }} | {{ $user->branch }}
            </option>
        @endforeach
    </select>

    @error('assigned_to')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

               

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Date Assigned
                        </label>

                        <input
                            type="date"
                            wire:model="date_assigned"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >

                        @error('date_assigned')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

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

                    @error('remarks')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>