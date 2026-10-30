<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - DesaHub</title>

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
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-800 dark:bg-[#070e0a] dark:text-white flex flex-col items-center justify-center min-h-screen p-4 transition-colors duration-200">

    <!-- Top Glow -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-3/4 max-w-xl h-48 bg-gradient-to-r from-emerald-600/10 via-emerald-400/15 to-emerald-600/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

    <!-- Top Bar with Theme Toggle -->
    <div class="w-full max-w-md flex justify-between items-center mb-6">
        <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-500 dark:text-gray-400 hover:text-emerald-700 dark:hover:text-emerald-400 transition flex items-center gap-1.5">
            <span>&larr;</span>
            <span>Kembali ke Beranda</span>
        </a>

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
    </div>

    <!-- Login Card (Primary White card in light mode, dark card in dark mode) -->
    <div class="w-full max-w-md bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-3xl p-8 shadow-2xl transition-colors duration-200">
        <div class="text-center mb-8">
            <div class="w-12 h-12 mx-auto mb-4 rounded-2xl bg-secondary-gradient flex items-center justify-center text-white font-black text-xl shadow-md">
                D
            </div>
            <!-- Logo DesaHub -->
            <h1 class="text-3xl font-extrabold tracking-wider text-slate-900 dark:text-white mb-2">DesaHub<span class="text-emerald-500">.</span></h1>
            <p class="text-slate-500 dark:text-gray-400 text-sm">Masuk ke panel manajemen desa</p>
        </div>

        <!-- Notifikasi jika terjadi error saat login -->
        @if ($errors->any())
            <div class="bg-red-50 dark:bg-red-950/40 border border-red-500/40 text-red-700 dark:text-red-400 p-3.5 rounded-xl mb-6 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <!-- Input Email -->
            <div class="mb-5">
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-gray-300 mb-2">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    placeholder="admin@tebel.id"
                    class="w-full bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-900 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 p-3.5 outline-none transition">
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-gray-300 mb-2">Password</label>
                <input type="password" name="password" id="password" required placeholder="••••••••"
                    class="w-full bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-900 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 p-3.5 outline-none transition">
            </div>

            <!-- Tombol Login (Secondary Gradient) -->
            <button type="submit"
                class="w-full bg-secondary-gradient text-white font-bold rounded-xl px-5 py-3.5 hover:opacity-95 transition duration-200 shadow-lg shadow-emerald-950/20">
                Masuk ke Dasbor &rarr;
            </button>
        </form>
    </div>

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