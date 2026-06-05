<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'IT Asset Management') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-30 flex w-64 flex-col bg-sidebar text-white shadow-2xl shadow-indigo-950/40">

            <!-- Logo -->
            <div class="border-b border-sidebar-border px-6 py-7">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 shadow-lg shadow-brand-600/30">
                        <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold tracking-tight">IT Asset</h1>
                        <p class="text-xs font-medium text-slate-400">Management System</p>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <nav class="flex-1 space-y-1 overflow-y-auto px-4 py-5">

                <p class="mb-2 px-3 text-[11px] font-semibold uppercase tracking-widest text-slate-500">
                    Inventory
                </p>

                <a href="{{ route('items.index') }}"
                   class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition-all duration-200
                          {{ request()->routeIs('items.*')
                              ? 'bg-white/10 text-white shadow-inner shadow-white/5 ring-1 ring-white/10'
                              : 'text-slate-400 hover:bg-sidebar-hover hover:text-white' }}">
                    <svg class="h-[18px] w-[18px] shrink-0 {{ request()->routeIs('items.*') ? 'text-brand-100' : 'text-slate-500 group-hover:text-brand-100' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    Assets List
                </a>

                <a href="#"
                   class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-400 transition-all duration-200 hover:bg-sidebar-hover hover:text-white">
                    <svg class="h-[18px] w-[18px] shrink-0 text-slate-500 group-hover:text-brand-100" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    Assigned Assets
                </a>

                <a href="#"
                   class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-400 transition-all duration-200 hover:bg-sidebar-hover hover:text-white">
                    <svg class="h-[18px] w-[18px] shrink-0 text-slate-500 group-hover:text-brand-100" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                    </svg>
                    Reports
                </a>

                @auth
                    @if(auth()->user()->role === 'Admin')
                        <div class="pt-6">
                            <p class="mb-2 px-3 text-[11px] font-semibold uppercase tracking-widest text-slate-500">
                                Administration
                            </p>

                            <a href="{{ route('users.index') }}"
                               class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition-all duration-200
                                      {{ request()->routeIs('users.*')
                                          ? 'bg-white/10 text-white shadow-inner shadow-white/5 ring-1 ring-white/10'
                                          : 'text-slate-400 hover:bg-sidebar-hover hover:text-white' }}">
                                <svg class="h-[18px] w-[18px] shrink-0 {{ request()->routeIs('users.*') ? 'text-brand-100' : 'text-slate-500 group-hover:text-brand-100' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>
                                User List
                            </a>

                            <a href="{{ route('branches.index') }}"
                               class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition-all duration-200
                                      {{ request()->routeIs('branches.*')
                                          ? 'bg-white/10 text-white shadow-inner shadow-white/5 ring-1 ring-white/10'
                                          : 'text-slate-400 hover:bg-sidebar-hover hover:text-white' }}">
                                <svg class="h-[18px] w-[18px] shrink-0 {{ request()->routeIs('branches.*') ? 'text-brand-100' : 'text-slate-500 group-hover:text-brand-100' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                </svg>
                                Branches
                            </a>
                        </div>
                    @endif
                @endauth

            </nav>

            <!-- User Section -->
            <div class="border-t border-sidebar-border p-4">

                <div class="mb-4 flex items-center gap-3 rounded-xl bg-sidebar-hover p-3 ring-1 ring-white/5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-brand-500 to-brand-700 text-sm font-semibold text-white">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-semibold text-white">
                            {{ auth()->user()->name ?? 'Administrator' }}
                        </p>
                        <p class="truncate text-xs text-slate-400">
                            {{ auth()->user()->role ?? 'User' }}
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm font-medium text-slate-300 transition-all duration-200 hover:border-rose-500/30 hover:bg-rose-500/10 hover:text-rose-200"
                    >
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                        Sign out
                    </button>
                </form>

            </div>

        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex min-h-screen flex-1 flex-col">

            <!-- Top Bar -->
            <header class="sticky top-0 z-20 border-b border-slate-200/80 bg-white/80 px-8 py-5 backdrop-blur-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold tracking-tight text-slate-900">
                            IT Asset Management
                        </h2>
                        <p class="mt-0.5 text-sm text-slate-500">
                            Track, assign, and manage company equipment
                        </p>
                    </div>
                    <div class="hidden items-center gap-2 rounded-full bg-brand-50 px-4 py-1.5 text-xs font-medium text-brand-700 ring-1 ring-brand-100 sm:flex">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-500"></span>
                        </span>
                        System Online
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <section class="flex-1 bg-gradient-to-br from-slate-50 via-white to-brand-50/30 p-8">
                <div class="mx-auto max-w-7xl">
                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </section>

        </main>

    </div>

    @livewireScripts
</body>
</html>
