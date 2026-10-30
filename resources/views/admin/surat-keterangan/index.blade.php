@extends('layouts.admin')
@section('title', 'Surat Keterangan')
@section('content')
    <div class="mb-6 flex justify-between items-end">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-1">Permohonan Surat Keterangan</h2>
            <p class="text-sm text-slate-500 dark:text-gray-400">Kelola data permohonan SKTM, SKCK, dan Surat Nikah.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 dark:text-emerald-400 p-4 rounded-xl mb-6 text-sm flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-gray-800/50 border-b border-slate-200 dark:border-gray-800 text-xs uppercase tracking-wider text-slate-500 dark:text-gray-400 font-semibold">
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Nama Pemohon</th>
                        <th class="p-4">Jenis Surat</th>
                        <th class="p-4">Keperluan</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-100 dark:divide-gray-800">
                    @forelse($permohonan as $item)
                        <tr class="hover:bg-slate-50/70 dark:hover:bg-gray-800/40 transition">
                            <td class="p-4 text-slate-600 dark:text-gray-300 font-medium">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="p-4">
                                <p class="text-slate-800 dark:text-white font-semibold">{{ $item->nama_pemohon }}</p>
                                <p class="text-xs text-slate-400 dark:text-gray-500 font-mono">{{ $item->nomor_registrasi }}</p>
                            </td>
                            <td class="p-4 text-slate-600 dark:text-gray-300 uppercase text-xs font-medium">{{ str_replace('_', ' ', $item->jenis_surat) }}</td>
                            <td class="p-4 text-slate-500 dark:text-gray-400 text-xs truncate max-w-xs">{{ $item->keperluan }}</td>
                            <td class="p-4">
                                @if($item->status == 'Menunggu Verifikasi')
                                    <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20 text-xs font-medium">Menunggu</span>
                                @elseif($item->status == 'Diproses')
                                    <span class="px-3 py-1 rounded-full bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-500/20 text-xs font-medium">Diproses</span>
                                @elseif($item->status == 'Selesai')
                                    <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 text-xs font-medium">Selesai</span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20 text-xs font-medium">Ditolak</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <form action="{{ route('admin.surat-keterangan.status', $item->id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    <select name="status" class="bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-800 dark:text-white text-xs rounded-lg outline-none p-1.5 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition">
                                        <option value="Menunggu Verifikasi" {{ $item->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Proses</option>
                                        <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Tolak</option>
                                    </select>
                                    <button type="submit" class="bg-secondary-gradient hover:opacity-95 text-white px-3 py-1.5 rounded-lg text-xs font-semibold shadow-sm transition">Simpan</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-8 text-center text-slate-400 dark:text-gray-500">Belum ada data permohonan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($permohonan, 'hasPages') && $permohonan->hasPages())
            <div class="p-4 border-t border-slate-100 dark:border-gray-800">
                {{ $permohonan->links() }}
            </div>
        @endif
    </div>
@endsection
