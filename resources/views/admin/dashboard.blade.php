@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Kartu Statistik 1 -->
        <div class="bg-white dark:bg-gray-800/60 border border-slate-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm">
            <h3 class="text-slate-500 dark:text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Total Permohonan</h3>
            <p class="text-3xl font-extrabold text-slate-900 dark:text-white">12</p>
        </div>

        <!-- Kartu Statistik 2 -->
        <div class="bg-white dark:bg-gray-800/60 border border-slate-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm">
            <h3 class="text-slate-500 dark:text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Menunggu Verifikasi</h3>
            <p class="text-3xl font-extrabold text-emerald-700 dark:text-emerald-400">8</p>
        </div>

        <!-- Kartu Statistik 3 -->
        <div class="bg-white dark:bg-gray-800/60 border border-slate-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm">
            <h3 class="text-slate-500 dark:text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Selesai Diproses</h3>
            <p class="text-3xl font-extrabold text-slate-900 dark:text-white">4</p>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800/40 border border-slate-200 dark:border-gray-700 rounded-3xl p-8 text-center py-14 shadow-sm">
        <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-secondary-gradient flex items-center justify-center text-white font-bold text-2xl shadow-md">
            D
        </div>
        <h2 class="text-2xl text-slate-900 dark:text-white font-extrabold mb-2">Selamat datang di Dasbor DesaHub</h2>
        <p class="text-slate-500 dark:text-gray-400 text-sm max-w-md mx-auto leading-relaxed">
            Pilih menu navigasi di sebelah kiri untuk mulai meninjau dan mengelola berkas permohonan warga Desa Tebel.
        </p>
    </div>
@endsection
