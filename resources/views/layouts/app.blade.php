<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Layanan Desa') - DesaHub Desa Tebel</title>

    <!-- Theme Initialization (Prevent FOUT) -->
    <script>
        if (localStorage.getItem('desahub_theme') === 'dark' || (!('desahub_theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Tailwind CSS CDN -->
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
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Secondary Gradient Definition: Hijau Tua ke Hijau Muda */
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
        .dark .text-secondary-gradient {
            background: linear-gradient(135deg, #34D399 0%, #10B981 50%, #6EE7B7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glass {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
        }
        .dark .glass {
            background: rgba(16, 26, 21, 0.75);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
        }
        .glass-card {
            background: #ffffff;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease-in-out;
        }
        .dark .glass-card {
            background: rgba(18, 28, 22, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.07);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        .glass-card:hover {
            border-color: rgba(16, 185, 129, 0.4);
            box-shadow: 0 10px 25px -5px rgba(6, 78, 59, 0.1);
        }
        .dark .glass-card:hover {
            border-color: rgba(52, 211, 153, 0.35);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.4);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(241, 245, 249, 0.8);
        }
        .dark .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(15, 23, 19, 0.8);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(16, 185, 129, 0.4);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(16, 185, 129, 0.7);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-[#f8fafc] text-slate-800 dark:bg-[#070e0a] dark:text-slate-100 min-h-screen flex flex-col antialiased selection:bg-emerald-600 selection:text-white transition-colors duration-200">

    <!-- Top Glow Effect with Green secondary tone -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-3/4 max-w-4xl h-48 bg-gradient-to-r from-emerald-600/10 via-emerald-400/15 to-emerald-600/10 blur-[130px] rounded-full pointer-events-none -z-10 dark:from-emerald-900/20 dark:via-emerald-500/15 dark:to-emerald-900/20"></div>

    <!-- Navigation Bar -->
    <header class="sticky top-4 z-50 px-4 md:px-8">
        <nav class="glass max-w-6xl mx-auto px-5 py-3.5 rounded-full flex justify-between items-center transition-all duration-300">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group transition {{ request()->routeIs('home') ? 'text-emerald-700 dark:text-emerald-400' : 'text-slate-700 dark:text-gray-300' }}">
                <div class="w-8 h-8 rounded-full bg-secondary-gradient flex items-center justify-center text-white font-black text-sm group-hover:scale-105 transition shadow-sm">
                    D
                </div>
                <span class="text-lg md:text-xl font-bold tracking-wider text-slate-900 dark:text-white">DesaHub<span class="text-emerald-500">.</span></span>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center gap-6 text-sm font-medium">
                <li>
                    <a href="{{ route('home') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('home') ? 'text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-600 dark:text-gray-300' }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('profil') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('profil*') ? 'text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-600 dark:text-gray-300' }}">
                        Profil Desa
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan.kependudukan') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('layanan.kependudukan*') ? 'text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-600 dark:text-gray-300' }}">
                        Administrasi Kependudukan
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan.surat-keterangan') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('layanan.surat-keterangan*') ? 'text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-600 dark:text-gray-300' }}">
                        Surat Keterangan Desa
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan.perizinan-usaha') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('layanan.perizinan-usaha*') ? 'text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-600 dark:text-gray-300' }}">
                        Perizinan Usaha (UMKM)
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan.tracking') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('layanan.tracking*') ? 'text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-600 dark:text-gray-300' }}">
                        Status Permohonan
                    </a>
                </li>
            </ul>

            <!-- Action Button & Dark Mode Toggle -->
            <div class="flex items-center gap-2.5">
                <!-- Dark Mode Toggle Button -->
                <button type="button" class="theme-toggle-btn p-2 rounded-full border border-slate-200 dark:border-white/10 text-slate-700 dark:text-gray-200 hover:bg-slate-100 dark:hover:bg-white/10 transition shadow-sm" aria-label="Ganti Mode Gelap/Terang" title="Ganti Mode Gelap/Terang">
                    <!-- Moon Icon (light mode active -> click to switch dark) -->
                    <svg class="w-4 h-4 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                    <!-- Sun Icon (dark mode active -> click to switch light) -->
                    <svg class="w-4 h-4 hidden dark:block text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                <a href="{{ route('layanan.tracking') }}" class="hidden sm:inline-flex items-center gap-2 bg-secondary-gradient hover:opacity-95 text-white px-4 py-2 rounded-full text-xs md:text-sm font-bold transition shadow-md shadow-emerald-900/10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span>Lacak Berkas</span>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" type="button" class="lg:hidden p-2 text-slate-700 dark:text-gray-300 hover:text-black dark:hover:text-white rounded-lg focus:outline-none" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer Menu -->
        <div id="mobileMenu" class="hidden lg:hidden glass mt-2 mx-auto max-w-6xl rounded-2xl p-5 border border-slate-200 dark:border-white/10 space-y-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('home') ? 'bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-700 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-white/5' }}">Beranda</a>
            <a href="{{ route('profil') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('profil*') ? 'bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-700 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-white/5' }}">Profil Desa</a>
            <a href="{{ route('layanan.kependudukan') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('layanan.kependudukan*') ? 'bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-700 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-white/5' }}">Administrasi Kependudukan</a>
            <a href="{{ route('layanan.surat-keterangan') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('layanan.surat-keterangan*') ? 'bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-700 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-white/5' }}">Surat Keterangan Desa</a>
            <a href="{{ route('layanan.perizinan-usaha') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('layanan.perizinan-usaha*') ? 'bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-700 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-white/5' }}">Perizinan Usaha (UMKM)</a>
            <a href="{{ route('layanan.tracking') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('layanan.tracking*') ? 'bg-emerald-500/15 text-emerald-700 dark:text-emerald-400 font-semibold' : 'text-slate-700 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-white/5' }}">Status Permohonan</a>
        </div>
    </header>

    <!-- Global Notifications / Alerts -->
    <div class="max-w-6xl mx-auto w-full px-4 md:px-8 mt-6">
        @if(session('success'))
            <div class="bg-emerald-50 dark:bg-[#112419] border border-emerald-500/40 rounded-2xl p-5 flex items-start gap-4 shadow-lg shadow-emerald-950/5">
                <div class="w-10 h-10 rounded-full bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="flex-grow">
                    <h4 class="text-emerald-800 dark:text-emerald-400 font-bold text-base">Berhasil Terdata Dalam Sistem!</h4>
                    <p class="text-emerald-900/80 dark:text-gray-300 text-sm mt-1 leading-relaxed">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="bg-red-50 dark:bg-[#2e1313] border border-red-500/40 rounded-2xl p-5 flex items-start gap-4 shadow-lg shadow-red-950/5">
                <div class="w-10 h-10 rounded-full bg-red-500/20 text-red-600 dark:text-red-400 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div class="flex-grow">
                    <h4 class="text-red-800 dark:text-red-400 font-bold text-base">Terdapat Kesalahan Pengisian Form:</h4>
                    <ul class="list-disc list-inside text-red-900/80 dark:text-gray-300 text-sm mt-1 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-[#050907] mt-24 pt-16 pb-8 px-6 border-t border-slate-200 dark:border-gray-800 transition-colors">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-bold tracking-wider text-slate-900 dark:text-white">DesaHub<span class="text-emerald-500">.</span></span>
                    </div>
                    <p class="text-slate-600 dark:text-gray-400 text-sm max-w-md leading-relaxed">
                        Sistem Informasi & Pelayanan Administrasi Terpadu Desa Tebel, Kecamatan Gedangan, Kabupaten Sidoarjo. Memberikan kemudahan bagi warga dalam mengurus dokumen secara online, cepat, dan transparan.
                    </p>
                </div>

                <div>
                    <h5 class="text-slate-900 dark:text-white font-semibold mb-4 text-sm uppercase tracking-wider">Layanan Desa</h5>
                    <ul class="space-y-2.5 text-sm text-slate-600 dark:text-gray-400">
                        <li><a href="{{ route('layanan.kependudukan') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">Administrasi Kependudukan</a></li>
                        <li><a href="{{ route('layanan.surat-keterangan') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">Surat Keterangan Desa</a></li>
                        <li><a href="{{ route('layanan.perizinan-usaha') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">Perizinan Usaha (UMKM)</a></li>
                        <li><a href="{{ route('layanan.tracking') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">Cek Status Berkas</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-slate-900 dark:text-white font-semibold mb-4 text-sm uppercase tracking-wider">Kontak Pelayanan</h5>
                    <ul class="space-y-2 text-sm text-slate-600 dark:text-gray-400">
                        <li class="flex items-center gap-2 text-slate-900 dark:text-white font-medium">Balai Desa Tebel</li>
                        <li>Jl. Raya Tebel No. 123, Gedangan</li>
                        <li>Sidoarjo, Jawa Timur 61254</li>
                        <li class="pt-2 text-slate-900 dark:text-white font-medium">+62 812-3456-7890</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-200 dark:border-gray-800/80 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-slate-500 dark:text-gray-500">
                <p>&copy; {{ date('Y') }} Pemerintah Desa Tebel, Sidoarjo. Terintegrasi DesaHub.</p>
                <div class="flex gap-4">
                    <a href="{{ route('home') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">Beranda</a>
                    <a href="{{ route('profil') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">Profil Desa</a>
                    <a href="{{ route('layanan.tracking') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition">Pelacakan Berkas</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        const mobileBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Dark mode toggle functionality
        document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('desahub_theme', isDark ? 'dark' : 'light');
            });
        });
    </script>
    @stack('scripts')
</body>
</html>