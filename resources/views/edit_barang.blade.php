@extends('app')
@section('content')
    <div class="container max-w-4xl mx-auto mt-6">
        <h3 class="text-3xl font-semibold text-gray-800 mb-4">Edit Data Barang</h3>

        <!-- Form Edit Barang -->
        <form action="{{ route('barang.update', $data->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <!-- Nama Barang -->
            <div class="mb-4">
                <label for="nama_barang" class="block text-lg font-medium text-gray-700">Nama Barang</label>
                <input class="form-control w-full p-3 border border-gray-300 rounded-md shadow-sm" type="text"
                    name="nama_barang" id="nama_barang" value="{{ $data->nama_barang }}" placeholder="Masukkan Nama Barang">
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="kategori" class="block text-lg font-medium text-gray-700">Kategori</label>
                <input class="form-control w-full p-3 border border-gray-300 rounded-md shadow-sm" type="text"
                    name="kategori" id="kategori" value="{{ $data->kategori }}" placeholder="Masukkan Kategori">
            </div>

            <!-- Stok -->
            <div class="mb-4">
                <label for="stok" class="block text-lg font-medium text-gray-700">Stok</label>
                <input class="form-control w-full p-3 border border-gray-300 rounded-md shadow-sm" type="number"
                    name="stok" id="stok" value="{{ $data->stok }}" placeholder="Masukkan Stok Barang">
            </div>

            <!-- Harga Modal -->
            <div class="mb-4">
                <label for="harga_modal" class="block text-lg font-medium text-gray-700">Harga Modal</label>
                <input class="form-control w-full p-3 border border-gray-300 rounded-md shadow-sm" type="number"
                    name="harga_modal" id="harga_modal" value="{{ $data->harga_modal }}" placeholder="Masukkan Harga Modal">
            </div>

            <!-- Harga Jual -->
            <div class="mb-4">
                <label for="harga_jual" class="block text-lg font-medium text-gray-700">Harga Jual</label>
                <input class="form-control w-full p-3 border border-gray-300 rounded-md shadow-sm" type="number"
                    name="harga_jual" id="harga_jual" value="{{ $data->harga_jual }}" placeholder="Masukkan Harga Jual">
            </div>

            <!-- Barang Terjual -->
            <div class="mb-4">
                <label for="barang_terjual" class="block text-lg font-medium text-gray-700">Barang Terjual</label>
                <input class="form-control w-full p-3 border border-gray-300 rounded-md shadow-sm" type="number"
                    name="barang_terjual" id="barang_terjual" value="{{ $data->barang_terjual }}"
                    placeholder="Masukkan Barang Terjual">
            </div>

            <!-- Tombol Submit -->
            <div class="mt-4">
                <input type="submit"
                    class="btn btn-success w-full py-2 text-white font-semibold rounded-md shadow-md hover:bg-green-700 transition duration-300"
                    value="Save">
            </div>
        </form>
    </div>
@endsection
