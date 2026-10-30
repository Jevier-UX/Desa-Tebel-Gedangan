@extends('layouts.admin')
@section('title', 'Berita & Pengumuman')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-1">Kelola Berita & Informasi</h2>
        <p class="text-sm text-slate-500 dark:text-gray-400">Tambahkan informasi, pengumuman, atau agenda desa terbaru.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 dark:text-emerald-400 p-4 rounded-xl mb-6 text-sm flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Form Tambah Berita -->
    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl p-6 mb-8 shadow-sm">
        <h3 class="text-base font-semibold text-slate-800 dark:text-white mb-4">Tulis Berita / Agenda Baru</h3>
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1">Judul Berita</label>
                <input type="text" name="judul" required placeholder="Masukkan judul pengumuman atau kabar desa..."
                    class="w-full bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-800 dark:text-white rounded-lg p-2.5 outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1">Isi / Konten</label>
                <textarea name="konten" rows="4" required placeholder="Tuliskan isi informasi lengkap di sini..."
                    class="w-full bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-800 dark:text-white rounded-lg p-2.5 outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-gray-300 mb-1">Foto / Gambar (Opsional)</label>
                <input type="file" name="gambar" accept="image/*"
                    class="text-sm text-slate-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-secondary-gradient file:text-white hover:file:opacity-95 cursor-pointer">
            </div>
            <button type="submit"
                class="bg-secondary-gradient hover:opacity-95 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md transition inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Publikasikan Berita
            </button>
        </form>
    </div>

    <!-- Tabel Daftar Berita -->
    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100 dark:border-gray-800">
            <h3 class="font-semibold text-slate-800 dark:text-white text-base">Daftar Berita Terpublikasi</h3>
        </div>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 dark:bg-gray-800/50 border-b border-slate-200 dark:border-gray-800 text-xs uppercase text-slate-500 dark:text-gray-400 font-semibold">
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Judul</th>
                    <th class="p-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-slate-100 dark:divide-gray-800">
                @forelse($berita as $item)
                    <tr class="hover:bg-slate-50/70 dark:hover:bg-gray-800/40 transition">
                        <td class="p-4 text-slate-600 dark:text-gray-300 font-medium whitespace-nowrap">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="p-4 text-slate-800 dark:text-white font-medium">{{ $item->judul }}</td>
                        <td class="p-4 text-right">
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-600 dark:text-rose-400 dark:hover:text-rose-300 text-xs font-semibold px-2 py-1 rounded hover:bg-rose-50 dark:hover:bg-rose-950/30 transition"
                                    onclick="return confirm('Hapus berita ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-8 text-center text-slate-400 dark:text-gray-500">Belum ada berita terpublikasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if(method_exists($berita, 'hasPages') && $berita->hasPages())
            <div class="p-4 border-t border-slate-100 dark:border-gray-800">
                {{ $berita->links() }}
            </div>
        @endif
    </div>
@endsection
