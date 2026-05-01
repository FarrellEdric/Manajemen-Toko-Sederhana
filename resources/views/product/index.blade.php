<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <div class="flex items-center gap-4">

                    <div>
                        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Product Dashboard</h1>
                        <p class="text-slate-500 text-sm mt-1">Manage your inventory with ease</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">

                    <!-- Add Product -->
                    <a href="{{ route('product.create') }}"
                        class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-black font-medium rounded-xl shadow-lg shadow-indigo-200 hover:shadow-xl hover:scale-105 transition-all duration-200">
                        + Add Product
                    </a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-600 hover:text-rose-600 transition">
                            Logout
                        </button>
                    </form>

                </div>
            </div>

            {{-- STATS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
                {{-- Total --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total Products</p>
                            <p class="text-3xl font-bold text-slate-800 mt-2">{{ $products->count() }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 h-1 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500"></div>
                </div>

                {{-- In Stock --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">In Stock</p>
                            <p class="text-3xl font-bold text-emerald-600 mt-2">
                                {{ $products->where('stock', '>', 0)->count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-emerald-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 h-1 rounded-full bg-gradient-to-r from-emerald-400 to-emerald-600"></div>
                </div>

                {{-- Out of Stock --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Out of Stock</p>
                            <p class="text-3xl font-bold text-rose-600 mt-2">
                                {{ $products->where('stock', '=', 0)->count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-rose-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 h-1 rounded-full bg-gradient-to-r from-rose-400 to-rose-600"></div>
                </div>
            </div>

            {{-- TABLE CARD --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                {{-- Card Header --}}
                <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">Product List</h2>
                        <p class="text-sm text-slate-500 mt-0.5">A complete list of products in your inventory</p>
                    </div>
                    <div
                        class="hidden md:flex items-center gap-2 px-3 py-2 bg-slate-50 rounded-lg border border-slate-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" placeholder="Search products..."
                            class="bg-transparent border-0 outline-none text-sm placeholder:text-slate-400 w-48" />
                    </div>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-6 py-4 font-semibold">#</th>
                                <th class="px-6 py-4 font-semibold">Name</th>
                                <th class="px-6 py-4 font-semibold">Code</th>
                                <th class="px-6 py-4 font-semibold">Stock</th>
                                <th class="px-6 py-4 font-semibold">Price</th>
                                <th class="px-6 py-4 font-semibold text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($products as $product)
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="px-6 py-4 text-slate-400 font-medium">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center text-indigo-600 font-bold">
                                                {{ strtoupper(substr($product->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-slate-800">{{ $product->name }}</p>
                                                <p class="text-xs text-slate-400">Product item</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 bg-slate-100 text-slate-700 rounded-md text-xs font-mono">
                                            {{ $product->code }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($product->stock > 10)
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full border border-emerald-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                {{ $product->stock }} available
                                            </span>
                                        @elseif ($product->stock > 0)
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-700 text-xs font-semibold rounded-full border border-amber-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                                Low ({{ $product->stock }})
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-rose-50 text-rose-700 text-xs font-semibold rounded-full border border-rose-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                                Out of stock
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-slate-800">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('product.show', $product->id) }}"
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition"
                                                title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition"
                                                title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition"
                                                    title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-16">
                                        <div class="flex flex-col items-center gap-3">
                                            <div
                                                class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-slate-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                </svg>
                                            </div>
                                            <p class="text-slate-500 font-medium">No products yet</p>
                                            <p class="text-slate-400 text-sm">Start by adding your first product</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>