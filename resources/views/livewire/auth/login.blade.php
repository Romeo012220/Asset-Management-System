<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                IT Asset Management
            </h1>
            <p class="text-gray-500 mt-2">
                Login to your account
            </p>
        </div>

        <form wire:submit.prevent="login" class="space-y-5">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email Address
                </label>

                <input
                    type="email"
                    wire:model="email"
                    placeholder="admin@gmail.com"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >

                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>

                <input
                    type="password"
                    wire:model="password"
                    placeholder="Enter password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >

                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center">
                <input
                    type="checkbox"
                    wire:model="remember"
                    class="rounded border-gray-300 text-blue-600"
                >

                <span class="ml-2 text-sm text-gray-600">
                    Remember me
                </span>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold"
            >
                Login
            </button>

        </form>

    </div>

</div>