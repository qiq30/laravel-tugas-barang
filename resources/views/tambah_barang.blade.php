@extends('app')

@section('content')
    <div class="container max-w-4xl mx-auto mt-6 px-4">
        <h3 class="text-3xl font-semibold text-gray-800 mb-4">Form Barang</h3>

        <!-- Form Barang -->
        <form action="{{ route('barang.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Nama Barang -->
                <div>
                    <label for="nama_barang" class="block text-lg font-medium text-gray-700">Nama Barang</label>
                    <input value="{{ old('nama_barang') }}" type="text" name="nama_barang" id="nama_barang"
                        class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Nama Barang">
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-lg font-medium text-gray-700">Kategori</label>
                    <input value="{{ old('kategori') }}" type="text" name="kategori" id="kategori"
                        class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Kategori">
                </div>

                <!-- Stok -->
                <div>
                    <label for="stok" class="block text-lg font-medium text-gray-700">Stok</label>
                    <input value="{{ old('stok') }}" type="number" name="stok" id="stok"
                        class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Stok Barang">
                </div>

                <!-- Harga Modal -->
                <div>
                    <label for="harga_modal" class="block text-lg font-medium text-gray-700">Harga Modal</label>
                    <input value="{{ old('harga_modal') }}" type="number" name="harga_modal" id="harga_modal"
                        class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Harga Modal">
                </div>

                <!-- Harga Jual -->
                <div>
                    <label for="harga_jual" class="block text-lg font-medium text-gray-700">Harga Jual</label>
                    <input value="{{ old('harga_jual') }}" type="number" name="harga_jual" id="harga_jual"
                        class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Harga Jual">
                </div>

                <!-- Barang Terjual -->
                <div>
                    <label for="barang_terjual" class="block text-lg font-medium text-gray-700">Barang Terjual</label>
                    <input value="{{ old(key: 'barang_terjual') }}" type="number" name="barang_terjual" id="barang_terjual"
                        class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Barang Terjual">
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 transition duration-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
