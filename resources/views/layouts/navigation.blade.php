<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT -->
            <div class="flex items-center gap-6">

                <!-- Logo -->
                <a href="{{ route('product.index') }}" class="text-lg font-bold">
                    TOKO
                </a>

                <!-- Menu -->
                <a href="{{ route('product.index') }}"
                   class="text-gray-700 hover:text-blue-600 font-medium">
                    Products
                </a>

            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-4">

                <!-- User -->
                <span class="text-sm text-gray-600">
                    {{ auth()->user()->name }}
                </span>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white text-xs rounded-full hover:bg-red-600">
                        Logout
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>