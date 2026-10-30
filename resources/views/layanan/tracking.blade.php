@extends('layouts.app')

@section('title', 'Status & Pelacakan Permohonan')

@section('content')
<div class="max-w-6xl mx-auto px-4 md:px-8 py-10">

    <!-- Header Section -->
    <div class="mb-10 text-center max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-500/20 text-emerald-800 dark:text-emerald-400 text-xs font-bold mb-4">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            Pusat Informasi & Pelacakan
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-4">
            Cek Status Berkas Terdata
        </h1>
        <p class="text-slate-600 dark:text-gray-400 text-sm md:text-base leading-relaxed">
            Pantau proses pengurusan dokumen Anda secara transparan. Masukkan Nomor Induk Kependudukan (NIK) atau Nomor Registrasi permohonan untuk melacak status dokumen Anda.
        </p>
    </div>

    <!-- Search Form (Primary White card in light mode, Dark glass in dark mode) -->
    <div class="glass-card rounded-3xl p-6 md:p-8 max-w-2xl mx-auto mb-12 shadow-xl">
        <form action="{{ route('layanan.tracking') }}" method="GET" class="space-y-4">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-gray-300">
                Nomor Registrasi atau NIK Pemohon
            </label>
            <div class="flex flex-col sm:flex-row gap-2">
                <input type="text" name="keyword" value="{{ request('keyword') }}" required
                    placeholder="Contoh: KTP-20261007-XXXX atau 351508xxxx"
                    class="flex-grow bg-slate-50 dark:bg-gray-900 border border-slate-300 dark:border-gray-700 rounded-2xl px-5 py-3.5 text-sm text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                <button type="submit"
                    class="bg-secondary-gradient hover:opacity-95 text-white px-8 py-3.5 rounded-2xl text-sm font-bold transition flex items-center justify-center gap-2 shadow-lg shadow-emerald-950/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span>Lacak Sekarang</span>
                </button>
            </div>
            <p class="text-xs text-slate-500 dark:text-gray-400">Anda dapat mencari berdasarkan No Registrasi (KTP, KK, AKTA, PNDH, SKTM, SKCK, NIKAH, SKU) atau NIK Pemohon.</p>
        </form>
    </div>

    <!-- Global Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <a href="{{ route('layanan.kependudukan', ['#riwayat']) }}" class="glass-card p-6 rounded-2xl hover:border-emerald-500 transition group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500 dark:text-gray-400 uppercase tracking-wider">Administrasi Kependudukan</span>
                <span class="w-8 h-8 rounded-full bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-400 flex items-center justify-center text-xs font-bold group-hover:bg-secondary-gradient group-hover:text-white transition">&rarr;</span>
            </div>
            <p class="text-3xl font-extrabold text-slate-900 dark:text-white mt-3">{{ $totalKependudukan }}</p>
            <p class="text-xs text-slate-500 dark:text-gray-400 mt-1">KTP, KK, Akta Kelahiran, Pindah Domisili</p>
        </a>

        <a href="{{ route('layanan.surat-keterangan', ['#riwayat']) }}" class="glass-card p-6 rounded-2xl hover:border-emerald-500 transition group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500 dark:text-gray-400 uppercase tracking-wider">Surat Keterangan Desa</span>
                <span class="w-8 h-8 rounded-full bg-sky-50 dark:bg-sky-950/60 text-sky-600 dark:text-sky-400 flex items-center justify-center text-xs font-bold group-hover:bg-sky-600 group-hover:text-white transition">&rarr;</span>
            </div>
            <p class="text-3xl font-extrabold text-slate-900 dark:text-white mt-3">{{ $totalSurat }}</p>
            <p class="text-xs text-slate-500 dark:text-gray-400 mt-1">SKTM, Pengantar SKCK, Surat Nikah</p>
        </a>

        <a href="{{ route('layanan.perizinan-usaha', ['#riwayat']) }}" class="glass-card p-6 rounded-2xl hover:border-emerald-500 transition group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500 dark:text-gray-400 uppercase tracking-wider">Perizinan Usaha (UMKM)</span>
                <span class="w-8 h-8 rounded-full bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-400 flex items-center justify-center text-xs font-bold group-hover:bg-secondary-gradient group-hover:text-white transition">&rarr;</span>
            </div>
            <p class="text-3xl font-extrabold text-slate-900 dark:text-white mt-3">{{ $totalUsaha }}</p>
            <p class="text-xs text-slate-500 dark:text-gray-400 mt-1">Surat Keterangan Usaha (SKU) & UMKM</p>
        </a>
    </div>

    @if(request('keyword'))
        <!-- Results Section -->
        <div class="space-y-8">
            <div class="border-b border-slate-200 dark:border-gray-800 pb-3 flex items-center justify-between">
                <h3 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white">
                    Hasil Pencarian untuk: <span class="text-emerald-700 dark:text-emerald-400">"{{ request('keyword') }}"</span>
                </h3>
                <a href="{{ route('layanan.tracking') }}" class="text-xs text-slate-500 hover:text-slate-900 dark:text-gray-400 dark:hover:text-white font-medium">&times; Bersihkan Pencarian</a>
            </div>

            @php
                $adaHasil = $hasilKependudukan->isNotEmpty() || $hasilSurat->isNotEmpty() || $hasilUsaha->isNotEmpty();
            @endphp

            @if(!$adaHasil)
                <div class="glass-card rounded-3xl p-12 text-center">
                    <svg class="w-16 h-16 text-slate-400 dark:text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white">Data Tidak Ditemukan</h4>
                    <p class="text-sm text-slate-600 dark:text-gray-400 max-w-md mx-auto mt-2">
                        Tidak ada permohonan yang sesuai dengan kata kunci "{{ request('keyword') }}". Pastikan NIK atau Nomor Registrasi yang Anda masukkan sudah benar.
                    </p>
                </div>
            @endif

            <!-- Hasil Kependudukan -->
            @if($hasilKependudukan->isNotEmpty())
                <div class="glass-card rounded-2xl p-6">
                    <h4 class="text-sm font-bold text-emerald-800 dark:text-emerald-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Administrasi Kependudukan ({{ $hasilKependudukan->count() }})
                    </h4>
                    <div class="space-y-4">
                        @foreach($hasilKependudukan as $item)
                            <div class="bg-slate-50 dark:bg-gray-900/60 p-4 rounded-xl border border-slate-200 dark:border-gray-800 flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <div class="flex items-center gap-3">
                                        <span class="font-mono font-bold text-sm text-emerald-700 dark:text-emerald-400">{{ $item->nomor_registrasi }}</span>
                                        <span class="px-2 py-0.5 rounded text-xs bg-slate-200 dark:bg-white/10 text-slate-700 dark:text-gray-300 font-medium">{{ $item->kategori_label }}</span>
                                        <span class="px-2 py-0.5 rounded text-xs bg-emerald-100 dark:bg-emerald-500/10 text-emerald-800 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-500/30 font-semibold">{{ $item->status }}</span>
                                    </div>
                                    <p class="text-slate-900 dark:text-white font-semibold text-sm mt-1">{{ $item->nama_pemohon }} &bull; NIK: {{ $item->nik }}</p>
                                    <p class="text-xs text-slate-500 dark:text-gray-400 mt-0.5">Alamat: {{ $item->alamat }} &bull; Diajukan: {{ $item->created_at->format('d M Y, H:i') }} WIB</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    @if($item->file_path)
                                        <a href="{{ Storage::url($item->file_path) }}" target="_blank"
                                            class="bg-white dark:bg-gray-800 hover:bg-slate-100 dark:hover:bg-gray-700 text-xs px-3.5 py-2 rounded-lg text-slate-800 dark:text-white border border-slate-300 dark:border-gray-700 transition font-medium shadow-sm">
                                            Unduh Berkas
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Hasil Surat Keterangan -->
            @if($hasilSurat->isNotEmpty())
                <div class="glass-card rounded-2xl p-6">
                    <h4 class="text-sm font-bold text-sky-700 dark:text-sky-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                        Surat Keterangan Desa ({{ $hasilSurat->count() }})
                    </h4>
                    <div class="space-y-4">
                        @foreach($hasilSurat as $item)
                            <div class="bg-slate-50 dark:bg-gray-900/60 p-4 rounded-xl border border-slate-200 dark:border-gray-800 flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <div class="flex items-center gap-3">
                                        <span class="font-mono font-bold text-sm text-sky-700 dark:text-sky-400">{{ $item->nomor_registrasi }}</span>
                                        <span class="px-2 py-0.5 rounded text-xs bg-slate-200 dark:bg-white/10 text-slate-700 dark:text-gray-300 font-medium">{{ $item->jenis_surat_label }}</span>
                                        <span class="px-2 py-0.5 rounded text-xs bg-emerald-100 dark:bg-emerald-500/10 text-emerald-800 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-500/30 font-semibold">{{ $item->status }}</span>
                                    </div>
                                    <p class="text-slate-900 dark:text-white font-semibold text-sm mt-1">{{ $item->nama_pemohon }} &bull; NIK: {{ $item->nik }}</p>
                                    <p class="text-xs text-slate-500 dark:text-gray-400 mt-0.5">Keperluan: {{ $item->keperluan }} &bull; Diajukan: {{ $item->created_at->format('d M Y, H:i') }} WIB</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    @if($item->file_path)
                                        <a href="{{ Storage::url($item->file_path) }}" target="_blank"
                                            class="bg-white dark:bg-gray-800 hover:bg-slate-100 dark:hover:bg-gray-700 text-xs px-3.5 py-2 rounded-lg text-slate-800 dark:text-white border border-slate-300 dark:border-gray-700 transition font-medium shadow-sm">
                                            Unduh Berkas
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Hasil Usaha UMKM -->
            @if($hasilUsaha->isNotEmpty())
                <div class="glass-card rounded-2xl p-6">
                    <h4 class="text-sm font-bold text-emerald-800 dark:text-emerald-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Perizinan Usaha UMKM ({{ $hasilUsaha->count() }})
                    </h4>
                    <div class="space-y-4">
                        @foreach($hasilUsaha as $item)
                            <div class="bg-slate-50 dark:bg-gray-900/60 p-4 rounded-xl border border-slate-200 dark:border-gray-800 flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <div class="flex items-center gap-3">
                                        <span class="font-mono font-bold text-sm text-emerald-700 dark:text-emerald-400">{{ $item->nomor_registrasi }}</span>
                                        <span class="px-2 py-0.5 rounded text-xs bg-slate-200 dark:bg-white/10 text-slate-700 dark:text-gray-300 font-medium">{{ $item->nama_usaha }} ({{ $item->jenis_usaha }})</span>
                                        <span class="px-2 py-0.5 rounded text-xs bg-emerald-100 dark:bg-emerald-500/10 text-emerald-800 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-500/30 font-semibold">{{ $item->status }}</span>
                                    </div>
                                    <p class="text-slate-900 dark:text-white font-semibold text-sm mt-1">Pemilik: {{ $item->nama_pemilik }} &bull; NIK: {{ $item->nik }}</p>
                                    <p class="text-xs text-slate-500 dark:text-gray-400 mt-0.5">Lokasi: {{ $item->alamat_usaha }} &bull; Diajukan: {{ $item->created_at->format('d M Y, H:i') }} WIB</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    @if($item->file_path)
                                        <a href="{{ Storage::url($item->file_path) }}" target="_blank"
                                            class="bg-white dark:bg-gray-800 hover:bg-slate-100 dark:hover:bg-gray-700 text-xs px-3.5 py-2 rounded-lg text-slate-800 dark:text-white border border-slate-300 dark:border-gray-700 transition font-medium shadow-sm">
                                            Unduh SKU
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endif

</div>
@endsection
