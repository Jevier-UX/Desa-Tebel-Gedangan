@extends('layouts.admin')

@section('title', 'Manajemen Kependudukan')

@section('content')
    <div class="mb-6 flex justify-between items-end">
        <div>
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-1">Permohonan Kependudukan</h2>
            <p class="text-sm text-slate-600 dark:text-gray-400">Kelola data permohonan KTP, KK, Akta Kelahiran, dan Pindah Domisili.</p>
        </div>
    </div>

    <!-- Alert Sukses -->
    @if(session('success'))
        <div class="bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-500/40 text-emerald-800 dark:text-emerald-400 p-4 rounded-xl mb-6 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data -->
    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-gray-800/50 border-b border-slate-200 dark:border-gray-800 text-xs uppercase tracking-wider text-slate-600 dark:text-gray-400 font-bold">
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">No. Registrasi</th>
                        <th class="p-4">Nama Pemohon</th>
                        <th class="p-4">Layanan</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-200 dark:divide-gray-800">
                    @forelse($permohonan as $item)
                        <tr class="hover:bg-slate-50 dark:hover:bg-gray-800/20 transition">
                            <td class="p-4 text-slate-600 dark:text-gray-300">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="p-4 font-mono font-bold text-xs text-emerald-700 dark:text-emerald-400">{{ $item->nomor_registrasi }}</td>
                            <td class="p-4">
                                <p class="text-slate-900 dark:text-white font-semibold">{{ $item->nama_pemohon }}</p>
                                <p class="text-xs text-slate-500 dark:text-gray-400">NIK: {{ $item->nik }}</p>
                            </td>
                            <td class="p-4 text-slate-700 dark:text-gray-300 uppercase text-xs font-medium">{{ str_replace('_', ' ', $item->kategori) }}</td>
                            <td class="p-4">
                                @if($item->status == 'Menunggu Verifikasi')
                                    <span class="px-3 py-1 rounded-full bg-amber-50 dark:bg-yellow-500/10 text-amber-700 dark:text-yellow-500 border border-amber-300 dark:border-yellow-500/20 text-xs font-semibold">Menunggu</span>
                                @elseif($item->status == 'Diproses')
                                    <span class="px-3 py-1 rounded-full bg-sky-50 dark:bg-blue-500/10 text-sky-700 dark:text-blue-500 border border-sky-300 dark:border-blue-500/20 text-xs font-semibold">Diproses</span>
                                @elseif($item->status == 'Selesai')
                                    <span class="px-3 py-1 rounded-full bg-emerald-50 dark:bg-green-500/10 text-emerald-700 dark:text-green-500 border border-emerald-300 dark:border-green-500/20 text-xs font-semibold">Selesai</span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-500 border border-red-300 dark:border-red-500/20 text-xs font-semibold">Ditolak</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <form action="{{ route('admin.kependudukan.status', $item->id) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <select name="status" class="bg-slate-50 dark:bg-gray-800 border border-slate-300 dark:border-gray-700 text-slate-900 dark:text-white text-xs rounded-lg outline-none p-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                        <option value="Menunggu Verifikasi" {{ $item->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Proses</option>
                                        <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Tolak</option>
                                    </select>
                                    <button type="submit" class="bg-secondary-gradient hover:opacity-95 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                                        Simpan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-slate-500 dark:text-gray-400">
                                Belum ada data permohonan kependudukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
