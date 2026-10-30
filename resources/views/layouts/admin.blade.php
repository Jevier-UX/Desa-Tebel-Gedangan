<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DesaHub - @yield('title', 'Dashboard')</title>

    <!-- Theme Initialization (Prevent FOUT) -->
    <script>
        if (localStorage.getItem('desahub_theme') === 'dark' || (!('desahub_theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#FFFFFF',
                        secondary: {
                            DEFAULT: '#064E3B',
                            dark: '#022C22',
                            mid: '#0D7249',
                            light: '#10B981',
                            accent: '#34D399',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .bg-secondary-gradient {
            background: linear-gradient(135deg, #064E3B 0%, #0D7249 50%, #10B981 100%) !important;
        }
        .bg-secondary-gradient-hover:hover {
            background: linear-gradient(135deg, #022C22 0%, #064E3B 50%, #059669 100%) !important;
        }
        .text-secondary-gradient {
            background: linear-gradient(135deg, #064E3B 0%, #10B981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 dark:bg-[#070e0a] dark:text-white flex min-h-screen font-sans transition-colors duration-200">

    <!-- Sidebar Kiri -->
    <aside class="w-64 bg-white dark:bg-gray-900 border-r border-slate-200 dark:border-gray-800 hidden md:flex flex-col transition-colors duration-200">
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-slate-200 dark:border-gray-800">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-secondary-gradient flex items-center justify-center text-white font-black text-xs shadow-sm">
                    D
                </div>
                <h2 class="text-xl font-bold tracking-wider text-slate-900 dark:text-white">DesaHub<span class="text-emerald-500">.</span></h2>
            </a>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
            <!-- Link Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-secondary-gradient text-white font-bold shadow-sm' : 'text-slate-600 dark:text-gray-400 hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white font-medium' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>

            <p class="px-4 pt-5 pb-2 text-xs font-bold text-slate-400 dark:text-gray-500 uppercase tracking-wider">Manajemen Layanan</p>

            <!-- Link Kependudukan -->
            <a href="{{ route('admin.kependudukan.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.kependudukan*') ? 'bg-secondary-gradient text-white font-bold shadow-sm' : 'text-slate-600 dark:text-gray-400 hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white font-medium' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Kependudukan
            </a>

            <!-- Link Surat Keterangan -->
            <a href="{{ route('admin.surat-keterangan.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.surat-keterangan*') ? 'bg-secondary-gradient text-white font-bold shadow-sm' : 'text-slate-600 dark:text-gray-400 hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white font-medium' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Surat Keterangan
            </a>

            <!-- Link Perizinan Usaha -->
            <a href="{{ route('admin.perizinan-usaha.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.perizinan-usaha*') ? 'bg-secondary-gradient text-white font-bold shadow-sm' : 'text-slate-600 dark:text-gray-400 hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white font-medium' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                Perizinan Usaha
            </a>

            <p class="px-4 pt-5 pb-2 text-xs font-bold text-slate-400 dark:text-gray-500 uppercase tracking-wider">Konten Portal</p>

            <!-- Link Berita -->
            <a href="{{ route('admin.berita.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.berita*') ? 'bg-secondary-gradient text-white font-bold shadow-sm' : 'text-slate-600 dark:text-gray-400 hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white font-medium' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2">
                    </path>
                </svg>
                Berita & Pengumuman
            </a>

            <!-- Link Perangkat Desa -->
            <a href="{{ route('admin.perangkat.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.perangkat*') ? 'bg-secondary-gradient text-white font-bold shadow-sm' : 'text-slate-600 dark:text-gray-400 hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white font-medium' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Perangkat Desa
            </a>
        </nav>

        <!-- Tombol Logout di Bawah -->
        <div class="p-4 border-t border-slate-200 dark:border-gray-800">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 px-4 py-2.5 w-full text-left rounded-xl text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-gray-800 hover:text-red-700 dark:hover:text-red-300 font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Area Konten Utama -->
    <main class="flex-1 flex flex-col min-w-0 bg-slate-50 dark:bg-[#070e0a]">
        <!-- Header Atas -->
        <header class="h-16 flex items-center justify-between px-6 md:px-8 border-b border-slate-200 dark:border-gray-800 bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm sticky top-0 z-10 transition-colors duration-200">
            <h1 class="text-xl font-bold text-slate-900 dark:text-white">@yield('title', 'Dashboard')</h1>

            <!-- Aksi & Profil Admin -->
            <div class="flex items-center gap-3 md:gap-4">
                <!-- Dark Mode Toggle Button -->
                <button type="button" class="theme-toggle-btn p-2 rounded-full border border-slate-200 dark:border-white/10 text-slate-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-slate-100 dark:hover:bg-gray-700 transition shadow-sm" aria-label="Ganti Mode Gelap/Terang" title="Ganti Mode Gelap/Terang">
                    <!-- Moon Icon -->
                    <svg class="w-4 h-4 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                    <!-- Sun Icon -->
                    <svg class="w-4 h-4 hidden dark:block text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                <a href="{{ route('home') }}" target="_blank" class="text-xs text-emerald-700 dark:text-emerald-400 font-semibold hover:underline hidden sm:block">
                    Lihat Web &rarr;
                </a>

                <div class="flex items-center gap-3">
                    <span class="text-sm font-medium text-slate-600 dark:text-gray-300 hidden sm:block">Admin Desa Tebel</span>
                    <div class="w-9 h-9 rounded-full bg-secondary-gradient text-white flex items-center justify-center font-bold text-sm shadow-sm">
                        A
                    </div>
                </div>
            </div>
        </header>

        <!-- Konten Halaman yang Berubah-ubah -->
        <div class="p-6 md:p-8 overflow-y-auto">
            @yield('content')
        </div>
    </main>

    <!-- Theme Toggle Script -->
    <script>
        document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('desahub_theme', isDark ? 'dark' : 'light');
            });
        });
    </script>

</body>

</html>