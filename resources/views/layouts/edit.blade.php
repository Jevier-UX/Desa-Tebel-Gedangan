@extends('layouts.admin')

@section('title', 'Edit Perangkat Desa')

@section('content')
    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-2xl p-6 sm:p-8 max-w-2xl mx-auto shadow-sm">
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-800 dark:text-white mb-1">Edit Data Perangkat Desa</h2>
            <p class="text-sm text-slate-500 dark:text-gray-400">Perbarui informasi aparatur desa yang terdaftar.</p>
        </div>

        <form action="{{ route('admin.perangkat.update', $perangkat->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Input Nama -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Nama Lengkap</label>
                <input type="text" name="nama" required value="{{ old('nama', $perangkat->nama) }}"
                    class="w-full bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-900 dark:text-white rounded-xl px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
            </div>

            <!-- Input Jabatan -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Jabatan</label>
                <input type="text" name="jabatan" required value="{{ old('jabatan', $perangkat->jabatan) }}"
                    class="w-full bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-900 dark:text-white rounded-xl px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
            </div>

            <!-- Input Urutan -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Nomor Urut Tampil</label>
                <input type="number" name="urutan" required value="{{ old('urutan', $perangkat->urutan) }}"
                    class="w-full bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-900 dark:text-white rounded-xl px-4 py-3 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
            </div>

            <!-- Preview & Input Foto -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Foto Saat Ini</label>
                @if($perangkat->foto)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $perangkat->foto) }}"
                            class="w-20 h-20 rounded-full object-cover border-2 border-slate-200 dark:border-gray-700 shadow-sm">
                    </div>
                @else
                    <p class="text-xs text-slate-400 dark:text-gray-500 mb-3">Belum ada foto yang diunggah.</p>
                @endif

                <label class="block text-sm font-semibold text-slate-700 dark:text-gray-300 mb-2">Ganti Foto Baru (Opsional)</label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full text-slate-500 dark:text-gray-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-secondary-gradient file:text-white hover:file:opacity-95 file:transition cursor-pointer">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-4 pt-4 border-t border-slate-100 dark:border-gray-800">
                <a href="{{ route('admin.perangkat.index') }}"
                    class="px-6 py-3 rounded-xl border border-slate-300 dark:border-gray-700 text-slate-700 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-gray-800 transition font-medium text-sm">Batal</a>
                <button type="submit"
                    class="px-6 py-3 rounded-xl bg-secondary-gradient hover:opacity-95 text-white font-bold transition shadow-md text-sm">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
