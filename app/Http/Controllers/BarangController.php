<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Hanya menampilkan barang milik user yang login
        $query = Barang::where('user_id', Auth::id());

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'LIKE', "%{$search}%")
                    ->orWhere('kategori', 'LIKE', "%{$search}%");
            });
        }

        $data = $query->get();
        return view('barang', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer|min:0',
            'harga_modal' => 'required|integer|min:0',
            'harga_jual' => 'required|integer|min:0',
            'barang_terjual' => 'required|integer|min:0'
        ]);

        // Validasi barang terjual tidak boleh lebih dari stok
        if ($request->barang_terjual > $request->stok) {
            return redirect()->back()
                ->withErrors(['barang_terjual' => 'Jumlah barang terjual tidak boleh lebih dari stok.'])
                ->withInput(); // Menyimpan input ke form agar tidak hilang
        }

        $total_pendapatan = $request->barang_terjual * $request->harga_jual;
        $total_laba = $request->barang_terjual * ($request->harga_jual - $request->harga_modal);

        // Simpan data
        $barang = Barang::create([
            'user_id' => Auth::id(),
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'barang_terjual' => $request->barang_terjual,
            'total_pendapatan' => $total_pendapatan,
            'total_laba' => $total_laba
        ]);

        // Pastikan data benar-benar tersimpan sebelum menampilkan notifikasi
        if ($barang) {
            \Flasher\Laravel\Facade\Flasher::addSuccess('Barang berhasil ditambahkan');
        } else {
            \Flasher\Laravel\Facade\Flasher::addError('Gagal menambahkan barang');
        }

        return redirect('/barang');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Barang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('edit_barang', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer|min:0',
            'harga_modal' => 'required|integer|min:0',
            'harga_jual' => 'required|integer|min:0',
            'barang_terjual' => 'required|integer|min:0'
        ]);

        $barang = Barang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Validasi barang terjual tidak boleh lebih dari stok
        if ($request->barang_terjual > $request->stok) {
            return redirect()->back()
                ->withErrors(['barang_terjual' => 'Jumlah barang terjual tidak boleh lebih dari stok.'])
                ->withInput();
        }

        $total_pendapatan = $request->barang_terjual * $request->harga_jual;
        $total_laba = $request->barang_terjual * ($request->harga_jual - $request->harga_modal);

        // Simpan data baru ke model tanpa langsung update
        $barang->fill([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'barang_terjual' => $request->barang_terjual,
            'total_pendapatan' => $total_pendapatan,
            'total_laba' => $total_laba
        ]);

        // Periksa apakah ada perubahan pada data sebelum menyimpan
        if ($barang->isDirty()) {
            $barang->save(); // Hanya update jika ada perubahan
            \Flasher\Laravel\Facade\Flasher::addSuccess('Barang berhasil diperbarui');
        } else {
            \Flasher\Laravel\Facade\Flasher::addInfo('Tidak ada perubahan data');
        }

        return redirect('/barang');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $barang->delete();

        return redirect('/barang')->with('success', 'Barang berhasil dihapus');
    }
}
