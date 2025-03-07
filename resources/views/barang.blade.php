<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Data Barang -->
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
                        <!-- Tombol Cari -->
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Cari
                        </button>
                    </form>
                    <a href="barang/tambah">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto">
                            Tambah Barang
                        </button>
                    </a>
                </div>

                <!-- Tabel Data Barang -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 text-sm sm:text-base">
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Nama Barang</th>
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Kategori</th>
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Stok</th>
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Harga Modal</th>
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Harga Jual</th>
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Barang Terjual</th>
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Total Pendapatan</th>
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Total Laba</th>
                                <th class="border px-2 sm:px-4 py-2 text-blue-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr class="border text-xs sm:text-base">
                                    <td class="border px-2 sm:px-4 py-2 text-gray-900 dark:text-gray-200">
                                        {{ $row->nama_barang }}</td>
                                    <td class="border px-2 sm:px-4 py-2 text-gray-900 dark:text-gray-200">
                                        {{ $row->kategori }}</td>
                                    <td class="border px-2 sm:px-4 py-2 text-gray-900 dark:text-gray-200">
                                        {{ $row->stok }} unit</td>
                                    <td class="border px-2 sm:px-4 py-2 text-gray-900 dark:text-gray-200">
                                        Rp{{ number_format($row->harga_modal, 0, ',', '.') }}
                                    </td>
                                    <td class="border px-2 sm:px-4 py-2 text-gray-900 dark:text-gray-200">
                                        Rp{{ number_format($row->harga_jual, 0, ',', '.') }}
                                    </td>
                                    <td class="border px-2 sm:px-4 py-2 text-gray-900 dark:text-gray-200">
                                        {{ $row->barang_terjual }} unit
                                    </td>
                                    <td class="border px-2 sm:px-4 py-2 text-green-600 font-semibold">
                                        Rp{{ number_format($row->total_pendapatan, 0, ',', '.') }}
                                    </td>
                                    <td class="border px-2 sm:px-4 py-2 text-blue-600 font-semibold">
                                        Rp{{ number_format($row->total_laba, 0, ',', '.') }}
                                    </td>
                                    <td class="border px-2 sm:px-4 py-2">
                                        <div class="flex flex-col sm:flex-row gap-2">
                                            <!-- Tombol Edit -->
                                            <a href="barang/edit/{{ $row->id }}"
                                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto text-center flex items-center justify-center">
                                                Edit
                                            </a>
                                            <!-- Tombol Hapus -->
                                            <a href="barang/hapus/{{ $row->id }}"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto">
                                                Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
