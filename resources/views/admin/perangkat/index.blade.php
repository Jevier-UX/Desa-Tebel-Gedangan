@extends('layouts.admin')

@section('title', 'Kelola Perangkat Desa')

@section('content')
    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-2xl p-6 shadow-sm">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">Daftar Perangkat Desa</h2>
                <p class="text-sm text-slate-500 dark:text-gray-400">Susunan kepengurusan dan aparatur pemerintahan desa.</p>
            </div>
            <a href="{{ route('admin.perangkat.create') }}"
                class="bg-secondary-gradient hover:opacity-95 text-white px-4 py-2.5 rounded-xl text-sm font-semibold shadow-md transition inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Aparatur
            </a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 dark:text-emerald-400 p-4 rounded-xl mb-6 text-sm flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600 dark:text-gray-400">
                <thead class="text-xs uppercase bg-slate-50 dark:bg-gray-800 text-slate-500 dark:text-gray-300 font-semibold border-b border-slate-200 dark:border-gray-800">
                    <tr>
                        <th class="px-6 py-3.5 rounded-tl-lg">Profil</th>
                        <th class="px-6 py-3.5">Nama & Jabatan</th>
                        <th class="px-6 py-3.5 text-center">Urutan</th>
                        <th class="px-6 py-3.5 rounded-tr-lg text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-gray-800">
                    @forelse($perangkat as $p)
                        <tr class="hover:bg-slate-50/70 dark:hover:bg-gray-800/40 transition">
                            <td class="px-6 py-4">
                                @if($p->foto)
                                    <img src="{{ asset('storage/' . $p->foto) }}"
                                        class="w-12 h-12 rounded-full object-cover border border-slate-200 dark:border-gray-700 shadow-sm">
                                @else
                                    <div
                                        class="w-12 h-12 rounded-full bg-secondary-gradient text-white flex items-center justify-center font-bold text-base shadow-sm">
                                        {{ substr($p->nama, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-slate-800 dark:text-white font-bold text-base">{{ $p->nama }}</div>
                                <div class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 mt-0.5">{{ $p->jabatan }}</div>
                            </td>
                            <td class="px-6 py-4 text-center w-24">
                                <span class="bg-slate-100 dark:bg-gray-800 px-3 py-1 rounded-full text-slate-700 dark:text-white font-mono text-xs font-semibold border border-slate-200 dark:border-gray-700">{{ $p->urutan }}</span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3 whitespace-nowrap">
                                <a href="{{ route('admin.perangkat.edit', $p->id) }}"
                                    class="text-emerald-600 hover:text-emerald-700 dark:text-emerald-400 dark:hover:text-emerald-300 font-semibold text-xs">Edit</a>
                                <form action="{{ route('admin.perangkat.destroy', $p->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin mencopot aparatur ini dari sistem?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-500 hover:text-rose-600 dark:text-rose-400 dark:hover:text-rose-300 font-semibold text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400 dark:text-gray-500">Belum ada data perangkat desa. Klik
                                "Tambah Aparatur" untuk memulai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($perangkat, 'hasPages') && $perangkat->hasPages())
            <div class="pt-4 border-t border-slate-100 dark:border-gray-800">
                {{ $perangkat->links() }}
            </div>
        @endif
    </div>
@endsection
