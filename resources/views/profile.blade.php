@extends('layouts.app')

@section('title', 'Profil Desa Tebel')

@section('content')
    <div class="min-h-screen pt-10 pb-16">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Bagian 1: Sejarah & Visi Misi -->
            <div class="mb-20">
                <div class="text-center mb-14">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 text-xs font-bold mb-3 border border-emerald-500/20">
                        Profil & Selayang Pandang
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white mb-4">Profil Desa Tebel</h1>
                    <p class="text-slate-600 dark:text-gray-400 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
                        Mengenal lebih dekat sejarah, visi, dan misi desa kami dalam mewujudkan masyarakat yang mandiri, inovatif, dan sejahtera.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch">
                    <div class="glass-card p-8 rounded-3xl flex flex-col justify-center">
                        <div class="inline-flex items-center gap-2 mb-4">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Sejarah Singkat</h2>
                        </div>
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed text-sm md:text-base">
                            Desa Tebel merupakan salah satu desa yang terletak di Kecamatan Gedangan, Kabupaten Sidoarjo.
                            Sejak dahulu, desa ini dikenal dengan semangat gotong royong warganya yang tinggi serta potensi
                            sektor UMKM yang terus berkembang pesat. Melalui platform DesaHub, kami berkomitmen membawa pelayanan
                            administrasi desa menuju era digital yang terbuka, akuntabel, dan efisien.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="glass-card p-6 rounded-3xl">
                            <h3 class="text-lg font-bold text-emerald-800 dark:text-emerald-400 mb-2 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-gradient"></span>
                                Visi
                            </h3>
                            <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">
                                Terwujudnya Desa Tebel yang maju, mandiri, berdaya saing tinggi, dan berakhlak mulia melalui penguatan ekonomi kerakyatan dan tata kelola pemerintahan desa yang transparan berbasis teknologi.
                            </p>
                        </div>
                        <div class="glass-card p-6 rounded-3xl">
                            <h3 class="text-lg font-bold text-emerald-800 dark:text-emerald-400 mb-2 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary-gradient"></span>
                                Misi
                            </h3>
                            <ul class="list-disc list-inside text-slate-600 dark:text-gray-300 text-sm space-y-1.5 leading-relaxed">
                                <li>Meningkatkan kualitas pelayanan administrasi desa secara digital.</li>
                                <li>Mendorong pertumbuhan ekonomi warga berbasis UMKM & industri kreatif.</li>
                                <li>Menjaga kelestarian lingkungan dan melestarikan budaya gotong royong.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian 2: Perangkat Desa -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-3">Perangkat Desa</h2>
                    <p class="text-slate-600 dark:text-gray-400 text-sm md:text-base">Struktur organisasi dan aparatur yang siap melayani masyarakat Desa Tebel.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($perangkatList ?? [] as $p)
                        <div class="glass-card p-6 text-center group rounded-3xl transition duration-300 hover:border-emerald-500">
                            <div class="w-24 h-24 mx-auto bg-slate-100 dark:bg-gray-800 rounded-full mb-4 overflow-hidden border-2 border-slate-200 dark:border-gray-700 group-hover:border-emerald-500 transition duration-300 flex items-center justify-center">
                                @if($p->foto)
                                    <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-3xl text-slate-400 dark:text-gray-500 font-bold">{{ substr($p->nama, 0, 1) }}</span>
                                @endif
                            </div>
                            <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">{{ $p->nama }}</h3>
                            <div class="inline-block px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/60 text-emerald-800 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800 text-xs font-semibold">
                                {{ $p->jabatan }}
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-slate-500 dark:text-gray-400 glass-card rounded-3xl">
                            Data perangkat desa belum tersedia saat ini.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
