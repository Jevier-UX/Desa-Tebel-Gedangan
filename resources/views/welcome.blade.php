<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesaHub - Desa Tebel</title>

    <!-- Theme Initialization (Prevent FOUT) -->
    <script>
        if (localStorage.getItem('desahub_theme') === 'dark' || (!('desahub_theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Memanggil Tailwind CSS via CDN -->
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
        /* Kelas custom untuk efek kaca (glassmorphism) */
        .glass {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.25);
        }
        .glass-dark {
            background: rgba(16, 26, 21, 0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.1);
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
</head>

<body class="bg-[#f8fafc] text-slate-800 dark:bg-[#070e0a] dark:text-white antialiased transition-colors duration-200 selection:bg-emerald-600 selection:text-white">

    <!-- SECTION 1: HERO & NAVBAR -->
    <!-- Background dari Hero Section -->
    <section class="relative w-full min-h-screen bg-cover bg-center flex flex-col justify-between pb-12" style="background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        
        <!-- Overlay gelap agar teks tetap terbaca di atas gambar -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/80"></div>

        <!-- Navbar (Bentuk Pill & Efek Kaca) -->
        <header class="relative z-20 px-4 pt-6">
            <nav class="glass mx-auto px-6 py-3.5 rounded-full flex justify-between items-center w-11/12 md:w-3/4 max-w-5xl shadow-2xl">
                <div class="flex items-center gap-2">
                    <!-- Logo DesaHub -->
                    <div class="w-8 h-8 rounded-full bg-secondary-gradient flex items-center justify-center text-white font-black text-sm shadow">
                        D
                    </div>
                    <span class="text-xl font-bold tracking-wider text-white">DesaHub<span class="text-emerald-400">.</span></span>
                </div>
                
                <!-- Menu Navigasi (Sembunyi di HP, muncul di layar sedang/besar) -->
                <ul class="hidden md:flex items-center gap-6 lg:gap-8 text-sm font-medium text-gray-200">
                    <li><a href="{{ route('home') }}" class="text-white font-semibold border-b-2 border-emerald-400 pb-0.5">Beranda</a></li>
                    <li><a href="#profil" class="hover:text-emerald-300 transition">Profil</a></li>
                    <li><a href="#layanan" class="hover:text-emerald-300 transition">Layanan</a></li>
                    <li><a href="#berita" class="hover:text-emerald-300 transition">Berita</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-emerald-300 transition">Login</a></li>
                </ul>

                <!-- Tombol Action & Mode Gelap Switch -->
                <div class="flex items-center gap-2.5">
                    <!-- Dark Mode Toggle Button -->
                    <button type="button" class="theme-toggle-btn p-2 rounded-full bg-black/30 border border-white/20 text-white hover:bg-white/20 transition shadow-sm" aria-label="Ganti Mode Gelap/Terang" title="Ganti Mode Gelap/Terang">
                        <!-- Moon Icon -->
                        <svg class="w-4 h-4 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                        <!-- Sun Icon -->
                        <svg class="w-4 h-4 hidden dark:block text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </button>

                    <a href="{{ route('layanan.tracking') }}" class="bg-secondary-gradient hover:opacity-95 text-white px-5 py-2.5 rounded-full text-xs md:text-sm font-bold transition shadow-lg shadow-emerald-950/30 flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span>Lacak Dokumen</span>
                    </a>
                </div>
            </nav>
        </header>

        <!-- Konten Teks Utama Hero -->
        <div class="relative z-10 flex-grow flex flex-col items-center justify-center text-center px-4 my-16">
            <!-- Label kecil di atas judul -->
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-black/40 backdrop-blur-md border border-white/20 mb-6 shadow-lg">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-xs md:text-sm font-semibold text-gray-100 tracking-wide uppercase">Portal Resmi Desa Tebel</span>
            </div>
            
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-6 max-w-4xl tracking-tight drop-shadow-md">
                Layanan Cerdas Membangun Masa Depan Desa
            </h1>
            
            <p class="text-sm md:text-lg text-gray-200 mb-10 max-w-2xl leading-relaxed drop-shadow">
                Akses mudah dan terpusat untuk layanan administrasi kependudukan, surat keterangan online, perizinan UMKM, dan informasi berita terpadu masyarakat Desa Tebel.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <!-- Primary Button (Warna Putih Bersih) -->
                <a href="#layanan" class="bg-white text-emerald-950 hover:bg-emerald-50 px-8 py-3.5 rounded-full font-bold text-base md:text-lg shadow-2xl hover:scale-105 transition duration-200 flex items-center gap-2">
                    <span>Jelajahi Layanan</span>
                    <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
                <!-- Secondary Button (Hijau Tua Gradasi Hijau Muda) -->
                <a href="{{ route('layanan.tracking') }}" class="bg-secondary-gradient text-white hover:opacity-95 px-8 py-3.5 rounded-full font-bold text-base md:text-lg shadow-xl shadow-emerald-950/40 hover:scale-105 transition duration-200 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Cek Status Berkas</span>
                </a>
            </div>
        </div>

        <!-- Floating Card di Kanan Bawah -->
        <div class="relative z-10 px-8 max-w-7xl mx-auto w-full flex justify-end">
            <div class="glass p-5 rounded-2xl hidden md:block max-w-[270px] shadow-2xl border border-white/20">
                <div class="flex items-center gap-2 text-white font-bold text-sm mb-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>Pusat Layanan Terpadu</span>
                </div>
                <p class="text-xs text-gray-200 leading-relaxed">Balai Desa buka Senin - Jumat <br> 08.00 - 15.00 WIB.</p>
                <a href="#layanan" class="text-xs text-emerald-300 font-semibold mt-3 inline-flex items-center gap-1 hover:underline">
                    Lihat Seluruh Layanan &rarr;
                </a>
            </div>
        </div>

    </section>

    <!-- SECTION 2: PROFIL DESA & STATISTIK -->
    <section id="profil" class="py-24 px-6 bg-white dark:bg-[#090e0c] transition-colors duration-200">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
    
            <!-- Kolom Kiri: Teks Profil -->
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 rounded-full bg-emerald-600 dark:bg-emerald-400"></span>
                    <span class="text-xs md:text-sm font-bold text-emerald-700 dark:text-emerald-400 uppercase tracking-widest">Tentang Desa Tebel</span>
                </div>
    
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white leading-tight mb-6">
                    Membangun komunitas mandiri, inovatif, dan berkelanjutan.
                </h2>
    
                <p class="text-slate-600 dark:text-gray-300 mb-8 leading-relaxed text-base md:text-lg">
                    Desa Tebel merupakan desa yang terus berinovasi dalam mengelola potensi sumber daya alam dan sumber daya
                    manusianya. Melalui DesaHub, kami berkomitmen menghadirkan transparansi informasi dan kemudahan
                    pelayanan publik secara digital bagi seluruh lapisan masyarakat.
                </p>

                <div class="flex items-center gap-4">
                    <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-6 py-3 rounded-full text-sm font-bold hover:opacity-90 transition">
                        <span>Profil Lengkap Desa</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
    
            <!-- Kolom Kanan: Grid Statistik -->
            <div class="grid grid-cols-2 gap-8 lg:gap-10 border-t border-slate-200 dark:border-gray-800 pt-8 lg:border-t-0 lg:pt-0">
                <!-- Stat 1 -->
                <div class="border-b border-slate-200 dark:border-gray-800 pb-6 lg:border-none lg:pb-0">
                    <h3 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-800 to-emerald-500 dark:from-emerald-400 dark:to-emerald-200 mb-2">5,000+</h3>
                    <p class="text-sm text-slate-600 dark:text-gray-400 font-medium">Total Penduduk (Jiwa)</p>
                </div>
    
                <!-- Stat 2 -->
                <div class="border-b border-slate-200 dark:border-gray-800 pb-6 lg:border-none lg:pb-0">
                    <h3 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-2">32</h3>
                    <p class="text-sm text-slate-600 dark:text-gray-400 font-medium">Rukun Tetangga (RT)</p>
                </div>
    
                <!-- Stat 3 -->
                <div>
                    <h3 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-2">120+</h3>
                    <p class="text-sm text-slate-600 dark:text-gray-400 font-medium">UMKM & Usaha Warga</p>
                </div>
    
                <!-- Stat 4 -->
                <div>
                    <h3 class="text-4xl md:text-5xl font-extrabold text-emerald-600 dark:text-emerald-400 mb-2">100%</h3>
                    <p class="text-sm text-slate-600 dark:text-gray-400 font-medium">Layanan Terintegrasi</p>
                </div>
            </div>
    
        </div>
    </section>

    <!-- SECTION 3: STRUKTUR ORGANISASI / APARATUR -->
    <section id="aparatur" class="py-20 bg-slate-50 dark:bg-[#070b09] transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-500/20 text-emerald-800 dark:text-emerald-400 text-xs font-bold mb-3">
                    Aparatur Desa Tebel
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white mb-4">Struktur Organisasi Desa</h2>
                <p class="text-slate-600 dark:text-gray-400 max-w-2xl mx-auto text-sm md:text-base">Susunan kepemimpinan dan aparatur yang siap melayani masyarakat Desa Tebel dengan sepenuh hati.</p>
            </div>
    
            @if(isset($perangkatList) && $perangkatList->count() > 0)
                <div class="flex flex-col items-center">

                    <!-- TINGKAT 1: KEPALA DESA -->
                    @php $kades = $perangkatList->first(); @endphp
                    <div class="w-full max-w-sm relative z-10">
                        <div class="bg-white dark:bg-gray-900/90 border-2 border-emerald-600/30 dark:border-emerald-500/40 rounded-3xl p-8 text-center shadow-xl shadow-emerald-950/5 relative group transition hover:scale-105">
                            <div class="w-32 h-32 mx-auto bg-slate-100 dark:bg-gray-800 rounded-full mb-6 overflow-hidden border-4 border-slate-200 dark:border-gray-700 group-hover:border-emerald-500 transition duration-300 flex items-center justify-center">
                                @if($kades->foto)
                                    <img src="{{ asset('storage/' . $kades->foto) }}" alt="{{ $kades->nama }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-4xl text-slate-400 dark:text-gray-500 font-bold">{{ substr($kades->nama, 0, 1) }}</span>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">{{ $kades->nama }}</h3>
                            <div class="inline-block px-5 py-1.5 rounded-full bg-secondary-gradient text-white text-xs md:text-sm font-bold shadow-md">
                                {{ $kades->jabatan }}
                            </div>
                        </div>
                        @if($perangkatList->count() > 1)
                            <div class="absolute -bottom-10 left-1/2 w-px h-10 bg-slate-300 dark:bg-gray-700 -translate-x-1/2 -z-10"></div>
                        @endif
                    </div>

                    <!-- TINGKAT 2: SEKRETARIS DESA -->
                    @if($perangkatList->count() > 1)
                        @php $sekdes = $perangkatList->skip(1)->first(); @endphp
                        <div class="w-full max-w-sm relative z-10 mt-10">
                            <div class="bg-white dark:bg-gray-900/80 border border-slate-200 dark:border-gray-700 rounded-3xl p-8 text-center shadow-lg hover:border-emerald-500 transition duration-300 group">
                                <div class="w-28 h-28 mx-auto bg-slate-100 dark:bg-gray-800 rounded-full mb-6 overflow-hidden border-4 border-slate-200 dark:border-gray-700 group-hover:border-emerald-500 transition duration-300 flex items-center justify-center">
                                    @if($sekdes->foto)
                                        <img src="{{ asset('storage/' . $sekdes->foto) }}" alt="{{ $sekdes->nama }}" class="w-full h-full object-cover">
                                    @else
                                        <span class="text-3xl text-slate-400 dark:text-gray-500 font-bold">{{ substr($sekdes->nama, 0, 1) }}</span>
                                    @endif
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ $sekdes->nama }}</h3>
                                <div class="inline-block px-4 py-1.5 rounded-full bg-emerald-50 dark:bg-gray-800 border border-emerald-200 dark:border-gray-700 text-emerald-800 dark:text-emerald-400 text-sm font-semibold">
                                    {{ $sekdes->jabatan }}
                                </div>
                            </div>
                            @if($perangkatList->count() > 2)
                                <div class="absolute -bottom-10 left-1/2 w-px h-10 bg-slate-300 dark:bg-gray-700 -translate-x-1/2 -z-10"></div>
                            @endif
                        </div>
                    @endif

                    <!-- TINGKAT 3: JAJARAN KAUR / KASI -->
                    @if($perangkatList->count() > 2)
                        <div class="w-full max-w-5xl relative mt-10">
                            <div class="absolute -top-10 left-[15%] right-[15%] h-px bg-slate-300 dark:bg-gray-700 hidden md:block -z-10"></div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($perangkatList->skip(2) as $p)
                                    <div class="bg-white dark:bg-gray-900/60 border border-slate-200 dark:border-gray-800 rounded-3xl p-6 text-center shadow-sm hover:border-emerald-500 transition duration-300 group relative">
                                        <div class="absolute -top-10 left-1/2 w-px h-10 bg-slate-300 dark:bg-gray-700 -translate-x-1/2 hidden md:block -z-10"></div>

                                        <div class="w-24 h-24 mx-auto bg-slate-100 dark:bg-gray-800 rounded-full mb-4 overflow-hidden border-2 border-slate-200 dark:border-gray-700 group-hover:border-emerald-500 transition duration-300 flex items-center justify-center">
                                            @if($p->foto)
                                                <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" class="w-full h-full object-cover">
                                            @else
                                                <span class="text-2xl text-slate-400 dark:text-gray-500 font-bold">{{ substr($p->nama, 0, 1) }}</span>
                                            @endif
                                        </div>
                                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-1">{{ $p->nama }}</h3>
                                        <div class="text-slate-500 dark:text-gray-400 text-xs font-medium">
                                            {{ $p->jabatan }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            @else
                <div class="text-center py-12 bg-white dark:bg-gray-800/30 rounded-3xl border border-slate-200 dark:border-gray-800 shadow-sm">
                    <p class="text-slate-500 dark:text-gray-400">Data perangkat desa belum tersedia saat ini.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- SECTION 4: DEMOGRAFI & POTENSI & GEOGRAFIS -->
    <section class="py-20 bg-white dark:bg-[#090e0c] transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Demografi -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 text-xs font-bold mb-2">
                        Statistik Kependudukan
                    </div>
                    <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-3">Demografi Penduduk</h2>
                    <p class="text-slate-600 dark:text-gray-400 text-sm">Gambaran umum kependudukan di Desa Tebel saat ini.</p>
                </div>
            
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div class="bg-slate-50 dark:bg-gray-800/40 border border-slate-200 dark:border-gray-700 rounded-2xl p-8 hover:border-emerald-500 transition shadow-sm">
                        <div class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-800 to-emerald-500 dark:from-emerald-400 dark:to-emerald-200 mb-2">4.250</div>
                        <div class="text-slate-600 dark:text-gray-400 text-sm font-semibold">Total Penduduk</div>
                    </div>
                    <div class="bg-slate-50 dark:bg-gray-800/40 border border-slate-200 dark:border-gray-700 rounded-2xl p-8 hover:border-emerald-500 transition shadow-sm">
                        <div class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-2">1.120</div>
                        <div class="text-slate-600 dark:text-gray-400 text-sm font-semibold">Kepala Keluarga</div>
                    </div>
                    <div class="bg-slate-50 dark:bg-gray-800/40 border border-slate-200 dark:border-gray-700 rounded-2xl p-8 hover:border-emerald-500 transition shadow-sm">
                        <div class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-2">2.100</div>
                        <div class="text-slate-600 dark:text-gray-400 text-sm font-semibold">Laki-laki</div>
                    </div>
                    <div class="bg-slate-50 dark:bg-gray-800/40 border border-slate-200 dark:border-gray-700 rounded-2xl p-8 hover:border-emerald-500 transition shadow-sm">
                        <div class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-2">2.150</div>
                        <div class="text-slate-600 dark:text-gray-400 text-sm font-semibold">Perempuan</div>
                    </div>
                </div>
            </div>
            
            <!-- Potensi & UMKM -->
            <div class="mb-20">
                <div class="flex flex-col md:flex-row gap-12 items-center bg-slate-50 dark:bg-gray-900/70 border border-slate-200 dark:border-gray-800 rounded-3xl p-8 md:p-12 shadow-sm">
                    <div class="flex-1 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 text-xs font-bold">
                            Ekonomi & Wirausaha
                        </div>
                        <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white">Potensi & UMKM Lokal</h2>
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed text-sm md:text-base">
                            Desa Tebel memiliki potensi besar di sektor perdagangan dan UMKM. Lokasinya yang strategis di Kecamatan
                            Gedangan membuat denyut nadi perekonomian desa berjalan dinamis dan berdaya saing.
                        </p>
                        <ul class="space-y-3 text-sm text-slate-700 dark:text-gray-300">
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 flex items-center justify-center shrink-0 font-bold">✓</div>
                                <span>Sentra industri rumah tangga dan kerajinan.</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 flex items-center justify-center shrink-0 font-bold">✓</div>
                                <span>Pusat kuliner lokal dan jajanan tradisional khas Sidoarjo.</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 flex items-center justify-center shrink-0 font-bold">✓</div>
                                <span>Pertanian perkotaan skala menengah terintegrasi.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1 grid grid-cols-2 gap-4 w-full">
                        <div class="h-44 bg-slate-200 dark:bg-gray-800 rounded-2xl overflow-hidden shadow-inner">
                            <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="UMKM Kuliner" class="w-full h-full object-cover">
                        </div>
                        <div class="h-44 bg-slate-200 dark:bg-gray-800 rounded-2xl mt-8 overflow-hidden shadow-inner">
                            <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Kerajinan UMKM" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Letak Geografis -->
            <div>
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-2">Letak Geografis</h2>
                    <p class="text-slate-600 dark:text-gray-400 text-sm">Wilayah administratif dan lokasi Balai Desa Tebel.</p>
                </div>
            
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Info Batas Wilayah -->
                    <div class="lg:col-span-1 bg-slate-50 dark:bg-gray-800/40 border border-slate-200 dark:border-gray-700 rounded-2xl p-6 md:p-8 space-y-6 shadow-sm">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Batas Wilayah</h3>
                        <div class="space-y-4 text-sm">
                            <div class="flex justify-between border-b border-slate-200 dark:border-gray-700 pb-2">
                                <span class="text-slate-500 dark:text-gray-400">Utara</span>
                                <span class="text-slate-900 dark:text-white font-medium">Desa Gedangan</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-200 dark:border-gray-700 pb-2">
                                <span class="text-slate-500 dark:text-gray-400">Timur</span>
                                <span class="text-slate-900 dark:text-white font-medium">Desa Ketajen</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-200 dark:border-gray-700 pb-2">
                                <span class="text-slate-500 dark:text-gray-400">Selatan</span>
                                <span class="text-slate-900 dark:text-white font-medium">Desa Punggul</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500 dark:text-gray-400">Barat</span>
                                <span class="text-slate-900 dark:text-white font-medium">Desa Keboansikep</span>
                            </div>
                        </div>
                    </div>
            
                    <!-- Google Maps Embed -->
                    <div class="lg:col-span-2 h-80 md:h-auto min-h-[300px] bg-slate-200 dark:bg-gray-800 rounded-2xl overflow-hidden border border-slate-200 dark:border-gray-700 shadow-sm">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15826.6579624536!2d112.71801835!3d-7.39148415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e44a71a065db%3A0xb309095bc3d8ab5!2sTebel%2C%20Gedangan%2C%20Sidoarjo%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="grayscale opacity-90 hover:grayscale-0 hover:opacity-100 transition duration-500">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: LAYANAN & ADMINISTRASI -->
    <section id="layanan" class="py-24 px-6 bg-slate-50 dark:bg-[#070b09] transition-colors duration-200 border-t border-slate-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto">
    
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center gap-2 mb-4">
                    <span class="w-2 h-2 rounded-full bg-emerald-600 dark:bg-emerald-400"></span>
                    <span class="text-xs md:text-sm font-bold text-emerald-700 dark:text-emerald-400 uppercase tracking-widest">Layanan Masyarakat</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white">Solusi Cerdas Pelayanan Desa</h2>
                <p class="text-slate-600 dark:text-gray-400 text-sm md:text-base mt-2">Urus dokumen resmi desa kapan pun dan di mana pun tanpa antre berlama-lama.</p>
            </div>
    
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
    
                <!-- Kolom Kiri: Gambar & Floating Card -->
                <div class="relative rounded-3xl overflow-hidden h-[450px] lg:h-[580px] w-full shadow-xl border border-slate-200 dark:border-gray-800 group">
                    <img src="https://images.unsplash.com/photo-1644496580843-07a889de9072?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="Suasana Pedesaan Asri" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700">
    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent"></div>
    
                    <div class="absolute bottom-6 left-6 right-6 lg:right-auto lg:w-80 bg-white/95 dark:bg-gray-900/90 backdrop-blur-md border border-slate-200 dark:border-gray-700 p-6 rounded-2xl shadow-2xl">
                        <h4 class="text-slate-900 dark:text-white font-bold mb-4 text-base flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Jam Operasional Balai Desa
                        </h4>
                        <ul class="space-y-3 text-sm">
                            <li class="flex justify-between border-b border-slate-200 dark:border-gray-700/50 pb-2">
                                <span class="text-slate-600 dark:text-gray-300">Senin - Kamis</span>
                                <span class="text-slate-900 dark:text-white font-bold">08.00 - 15.00</span>
                            </li>
                            <li class="flex justify-between border-b border-slate-200 dark:border-gray-700/50 pb-2">
                                <span class="text-slate-600 dark:text-gray-300">Jumat</span>
                                <span class="text-slate-900 dark:text-white font-bold">08.00 - 11.00</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-slate-600 dark:text-gray-300">Sabtu & Minggu</span>
                                <span class="text-rose-600 dark:text-rose-400 font-bold">Tutup / Libur</span>
                            </li>
                        </ul>
                    </div>
                </div>
    
                <!-- Kolom Kanan: Daftar Layanan -->
                <div class="flex flex-col justify-center space-y-4">
    
                    <!-- Item Layanan 1 (Administrasi Kependudukan) -->
                    <a href="{{ route('layanan.kependudukan') }}"
                        class="group block border-2 border-emerald-600/40 dark:border-emerald-500/40 bg-white dark:bg-gray-900/80 rounded-2xl p-7 hover:border-emerald-500 transition duration-300 shadow-md">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block text-[11px] font-bold text-emerald-700 dark:text-emerald-400 uppercase tracking-wider mb-1">KTP &bull; KK &bull; Akta &bull; Pindah Domisili</span>
                                <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                                    Administrasi Kependudukan
                                </h3>
                            </div>
                            <span class="text-xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-800 to-emerald-500 dark:from-emerald-400 dark:to-emerald-200">01</span>
                        </div>
                        <p class="text-slate-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                            Layanan formulir pengurusan KTP, Kartu Keluarga (KK), Akta Kelahiran, dan surat pindah domisili warga lengkap dengan upload berkas terintegrasi.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 dark:text-emerald-400 group-hover:translate-x-1.5 transition duration-200">
                            Buka Formulir & Kelola Data &rarr;
                        </span>
                    </a>
    
                    <!-- Item Layanan 2 (Surat Keterangan Desa) -->
                    <a href="{{ route('layanan.surat-keterangan') }}"
                        class="group block border border-slate-200 dark:border-gray-800 bg-white dark:bg-gray-900/60 rounded-2xl p-7 hover:border-emerald-500 transition duration-300 shadow-sm">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block text-[11px] font-bold text-sky-600 dark:text-sky-400 uppercase tracking-wider mb-1">SKTM &bull; Pengantar SKCK &bull; Surat Nikah</span>
                                <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                                    Surat Keterangan Desa
                                </h3>
                            </div>
                            <span class="text-xl font-bold text-slate-400 dark:text-gray-500">02</span>
                        </div>
                        <p class="text-slate-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                            Pengurusan Surat Keterangan Tidak Mampu (SKTM), Surat Keterangan Catatan Kepolisian (SKCK), dan surat pengantar nikah online dengan upload berkas terpadu.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-600 dark:text-sky-400 group-hover:translate-x-1.5 transition duration-200">
                            Buka Formulir & Ajukan Surat &rarr;
                        </span>
                    </a>
    
                    <!-- Item Layanan 3 (Perizinan Usaha UMKM) -->
                    <a href="{{ route('layanan.perizinan-usaha') }}"
                        class="group block border border-slate-200 dark:border-gray-800 bg-white dark:bg-gray-900/60 rounded-2xl p-7 hover:border-emerald-500 transition duration-300 shadow-sm">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="inline-block text-[11px] font-bold text-emerald-700 dark:text-emerald-400 uppercase tracking-wider mb-1">Legalitas Usaha &bull; SKU &bull; UMKM Warga</span>
                                <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                                    Perizinan Usaha (UMKM)
                                </h3>
                            </div>
                            <span class="text-xl font-bold text-slate-400 dark:text-gray-500">03</span>
                        </div>
                        <p class="text-slate-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                            Fasilitasi penerbitan Surat Keterangan Usaha (SKU) serta pengunggahan berkas perizinan untuk mendukung legalitas bisnis UMKM warga Desa Tebel.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 dark:text-emerald-400 group-hover:translate-x-1.5 transition duration-200">
                            Upload Berkas & Daftar SKU &rarr;
                        </span>
                    </a>
    
                </div>
            </div>
    
        </div>
    </section>

    <!-- SECTION 6: KABAR DESA -->
    <section id="berita" class="py-20 bg-white dark:bg-[#090e0c] border-t border-slate-200 dark:border-gray-800 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-6">
    
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 text-xs font-bold mb-3">
                    Warta & Pengumuman
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white mb-3">Kabar Desa Terbaru</h2>
                <p class="text-slate-600 dark:text-gray-400 max-w-2xl mx-auto text-sm md:text-base">Ikuti informasi, pengumuman resmi, dan kegiatan terkini dari pemerintah Desa Tebel.</p>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if(isset($beritaTerbaru) && $beritaTerbaru->count() > 0)
                    @foreach($beritaTerbaru as $item)
                        <!-- KARTU BERITA -->
                        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-3xl overflow-hidden hover:border-emerald-500 transition duration-300 group flex flex-col shadow-sm hover:shadow-md">
                            <div class="h-48 bg-slate-100 dark:bg-gray-800 relative overflow-hidden">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400 dark:text-gray-600 bg-slate-100 dark:bg-gray-800/50 text-sm">Tanpa Gambar</div>
                                @endif
                            </div>

                            <div class="p-6 flex-1 flex flex-col">
                                <div class="text-xs text-emerald-700 dark:text-emerald-400 mb-2 font-mono font-bold">{{ $item->created_at ? $item->created_at->format('d M Y') : date('d M Y') }}</div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 line-clamp-2">{{ $item->judul }}</h3>
                                <p class="text-slate-600 dark:text-gray-400 text-sm mb-6 line-clamp-3 flex-1 leading-relaxed">{{ $item->konten }}</p>

                                <button type="button" onclick="bukaModalBerita('modal-berita-{{ $item->id }}')"
                                    class="inline-flex items-center gap-1.5 mt-auto text-sm text-emerald-700 dark:text-emerald-400 hover:text-emerald-800 font-bold text-left group-hover:translate-x-1 transition duration-200">
                                    <span>Baca selengkapnya</span>
                                    <span>&rarr;</span>
                                </button>
                            </div>
                        </div>

                        <!-- MODAL BERITA -->
                        <div id="modal-berita-{{ $item->id }}"
                            class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6 opacity-0 transition-opacity duration-300">
                            <div class="absolute inset-0 bg-black/75 backdrop-blur-sm"
                                onclick="tutupModalBerita('modal-berita-{{ $item->id }}')"></div>

                            <div class="relative w-full max-w-3xl bg-white dark:bg-[#0c1410] border border-slate-200 dark:border-gray-800 rounded-3xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col transform scale-95 transition-transform duration-300"
                                id="modal-box-{{ $item->id }}">

                                <div class="flex justify-between items-center p-5 border-b border-slate-200 dark:border-gray-800 bg-slate-50 dark:bg-gray-900">
                                    <span class="text-xs font-bold text-emerald-700 dark:text-emerald-400 tracking-widest uppercase">Kabar Desa Tebel</span>
                                    <button type="button" onclick="tutupModalBerita('modal-berita-{{ $item->id }}')"
                                        class="text-slate-400 hover:text-red-500 transition p-1">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="p-6 md:p-8 overflow-y-auto custom-scrollbar">
                                    <div class="mb-6">
                                        <div class="text-emerald-700 dark:text-emerald-400 text-sm font-mono font-bold mb-2">{{ $item->created_at ? $item->created_at->format('d F Y') : date('d F Y') }}</div>
                                        <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 dark:text-white">{{ $item->judul }}</h2>
                                    </div>

                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                            class="w-full aspect-video object-cover rounded-2xl mb-8 border border-slate-200 dark:border-gray-800">
                                    @endif

                                    <div class="text-slate-700 dark:text-gray-300 whitespace-pre-line leading-relaxed text-base md:text-lg">
                                        {{ $item->konten }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-1 md:col-span-3 text-center py-16 bg-white dark:bg-gray-800/30 rounded-3xl border border-slate-200 dark:border-gray-700 shadow-sm">
                        <p class="text-slate-500 dark:text-gray-400">Belum ada kabar atau pengumuman desa saat ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- SECTION 7: FOOTER -->
    <footer class="bg-slate-950 text-white pt-24 pb-8 px-6 border-t border-slate-800">
        <div class="max-w-7xl mx-auto">
    
            <!-- Top Footer: Tautan & Berlangganan -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
    
                <!-- Kolom 1: Ikuti Kami -->
                <div>
                    <h5 class="text-white font-bold mb-6 text-base tracking-wider uppercase">Ikuti Kami</h5>
                    <div class="flex gap-3 mb-6">
                        <a href="#" class="w-10 h-10 rounded-full border border-gray-700 flex items-center justify-center text-gray-400 hover:text-white hover:border-emerald-500 hover:bg-emerald-500/20 transition">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full border border-gray-700 flex items-center justify-center text-gray-400 hover:text-white hover:border-emerald-500 hover:bg-emerald-500/20 transition">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        DesaHub adalah platform informasi desa terpadu yang dirancang untuk mendukung transparansi, kemudahan, dan inovasi pelayanan masyarakat Desa Tebel.
                    </p>
                </div>
    
                <!-- Kolom 2: Menu Layanan -->
                <div>
                    <h5 class="text-white font-bold mb-6 text-base tracking-wider uppercase">Layanan Online</h5>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('layanan.kependudukan') }}" class="hover:text-emerald-400 transition">Administrasi Kependudukan</a></li>
                        <li><a href="{{ route('layanan.surat-keterangan') }}" class="hover:text-emerald-400 transition">Surat Keterangan Desa</a></li>
                        <li><a href="{{ route('layanan.perizinan-usaha') }}" class="hover:text-emerald-400 transition">Perizinan Usaha (UMKM)</a></li>
                        <li><a href="{{ route('layanan.tracking') }}" class="hover:text-emerald-400 transition">Pelacakan Berkas Terdata</a></li>
                    </ul>
                </div>
    
                <!-- Kolom 3: Tautan Lainnya -->
                <div>
                    <h5 class="text-white font-bold mb-6 text-base tracking-wider uppercase">Informasi Lain</h5>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ route('layanan.kependudukan', ['#ktp']) }}" class="hover:text-emerald-400 transition">Form KTP & Kartu Keluarga</a></li>
                        <li><a href="{{ route('layanan.kependudukan', ['#akta_kelahiran']) }}" class="hover:text-emerald-400 transition">Form Akta Kelahiran</a></li>
                        <li><a href="{{ route('layanan.kependudukan', ['#pindah_domisili']) }}" class="hover:text-emerald-400 transition">Surat Pindah Domisili</a></li>
                        <li><a href="{{ route('layanan.surat-keterangan', ['#sktm']) }}" class="hover:text-emerald-400 transition">Surat Keterangan Tidak Mampu</a></li>
                    </ul>
                </div>
    
                <!-- Kolom 4: Subscribe/Kontak -->
                <div>
                    <h5 class="text-white font-bold mb-6 text-base tracking-wider uppercase">Dapatkan Info Terbaru</h5>
                    <p class="text-gray-400 text-sm mb-4 leading-relaxed">
                        Daftarkan email Anda untuk menerima pembaruan kegiatan dan pengumuman desa.
                    </p>
                    <div class="flex gap-2">
                        <input type="email" placeholder="contoh@email.com"
                            class="bg-gray-900 border border-gray-700 text-white text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 outline-none">
                        <button type="button" class="bg-secondary-gradient text-white px-4 rounded-xl font-medium hover:opacity-95 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
    
            </div>
    
            <!-- Middle Footer: Giant Logo & Kontak -->
            <div class="border-t border-gray-800 py-12 flex flex-col xl:flex-row justify-between items-start xl:items-center gap-10">
                <h2 class="text-6xl md:text-8xl lg:text-[9rem] font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 via-emerald-400 to-green-300 tracking-tighter leading-none">
                    DESAHUB<span class="text-white">.</span>
                </h2>
    
                <div class="flex flex-col md:flex-row gap-8 lg:gap-16 items-start xl:items-center">
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Hubungi Kami</p>
                        <a href="mailto:info@desatebel.id" class="text-white hover:text-emerald-400 block mb-1 font-medium transition">info@desatebel.id</a>
                        <p class="text-white font-medium">+62 812-3456-7890</p>
                    </div>
    
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Alamat Balai Desa</p>
                        <p class="text-white font-medium leading-relaxed">Jl. Raya Tebel No. 123,<br>Gedangan, Sidoarjo 61254</p>
                    </div>
    
                    <a href="#" class="w-12 h-12 shrink-0 rounded-full border border-gray-700 flex items-center justify-center text-gray-400 hover:text-emerald-950 hover:bg-white transition duration-300 ml-auto md:ml-0 shadow">
                        &uarr;
                    </a>
                </div>
            </div>
    
            <!-- Bottom Footer: Hak Cipta -->
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>&copy; 2026 Pemerintah Desa Tebel, Sidoarjo. Terintegrasi DesaHub.</p>
                <div class="flex gap-6">
                    <a href="{{ route('profil') }}" class="hover:text-emerald-400 transition">Profil Lengkap Desa</a>
                    <a href="#" class="hover:text-emerald-400 transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-emerald-400 transition">Syarat Penggunaan</a>
                </div>
            </div>
    
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Dark Mode Toggle
        document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('desahub_theme', isDark ? 'dark' : 'light');
            });
        });

        // Script Modal Berita
        function bukaModalBerita(modalId) {
            const modal = document.getElementById(modalId);
            const box = document.getElementById(modalId.replace('modal-berita', 'modal-box'));

            if (!modal || !box) return;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';

            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }, 10);
        }

        function tutupModalBerita(modalId) {
            const modal = document.getElementById(modalId);
            const box = document.getElementById(modalId.replace('modal-berita', 'modal-box'));

            if (!modal || !box) return;

            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            box.classList.remove('scale-100');
            box.classList.add('scale-95');

            document.body.style.overflow = 'auto';

            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
</body>
</html>