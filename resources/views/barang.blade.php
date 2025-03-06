@extends('app')

@section('content')
    <div class="container my-5">
        <div class="text-4xl font-extrabold text-center text-blue-600 mb-6">
            Data Barang
        </div>

        <!-- Tambah Barang & Pencarian -->
        <div class="mb-4 flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-3 sm:space-y-0">
            <h3 class="text-2xl font-semibold text-gray-700">Daftar Barang</h3>
            <form action="{{ url('barang') }}" method="GET" class="flex flex-wrap gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="border px-3 py-2 rounded w-full sm:w-64" placeholder="Cari barang...">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <a href="barang/tambah">
                <button class="btn btn-primary w-full sm:w-auto">Tambah Barang</button>
            </a>
        </div>

        <!-- Tabel Data Barang -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-sm sm:text-base">
                        <th class="border px-2 sm:px-4 py-2">Nama Barang</th>
                        <th class="border px-2 sm:px-4 py-2">Kategori</th>
                        <th class="border px-2 sm:px-4 py-2">Stok</th>
                        <th class="border px-2 sm:px-4 py-2">Harga Modal</th>
                        <th class="border px-2 sm:px-4 py-2">Harga Jual</th>
                        <th class="border px-2 sm:px-4 py-2">Barang Terjual</th>
                        <th class="border px-2 sm:px-4 py-2">Total Pendapatan</th>
                        <th class="border px-2 sm:px-4 py-2">Total Laba</th>
                        <th class="border px-2 sm:px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr class="border text-xs sm:text-base">
                            <td class="border px-2 sm:px-4 py-2">{{ $row->nama_barang }}</td>
                            <td class="border px-2 sm:px-4 py-2">{{ $row->kategori }}</td>
                            <td class="border px-2 sm:px-4 py-2">{{ $row->stok }} unit</td>
                            <td class="border px-2 sm:px-4 py-2">Rp{{ number_format($row->harga_modal, 0, ',', '.') }}</td>
                            <td class="border px-2 sm:px-4 py-2">Rp{{ number_format($row->harga_jual, 0, ',', '.') }}</td>
                            <td class="border px-2 sm:px-4 py-2">{{ $row->barang_terjual }} unit</td>
                            <td class="border px-2 sm:px-4 py-2 text-green-600 font-semibold">
                                Rp{{ number_format($row->total_pendapatan, 0, ',', '.') }}
                            </td>
                            <td class="border px-2 sm:px-4 py-2 text-blue-600 font-semibold">
                                Rp{{ number_format($row->total_laba, 0, ',', '.') }}
                            </td>
                            <td class="border px-2 sm:px-4 py-2">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <a href="barang/edit/{{ $row->id }}"
                                        class="btn btn-warning btn-sm w-full sm:w-auto">Edit</a>
                                    <a href="barang/hapus/{{ $row->id }}"
                                        class="btn btn-danger btn-sm w-full sm:w-auto">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
