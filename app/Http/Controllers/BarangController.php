<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        //
        $query = Barang::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_barang', 'LIKE', "%{$search}%")
                ->orWhere('kategori', 'LIKE', "%{$search}%");
        }

        $data = $query->get();

        return view('barang', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tambah_barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'harga_modal' => 'required|integer',
            'harga_jual' => 'required|integer',
            'barang_terjual' => 'required|integer'
        ]);

        $total_pendapatan = $request->barang_terjual * $request->harga_jual;
        $total_laba = $request->barang_terjual * ($request->harga_jual - $request->harga_modal);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'barang_terjual' => $request->barang_terjual,
            'total_pendapatan' => $total_pendapatan,
            'total_laba' => $total_laba
        ]);

        return redirect('/barang')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Barang::findOrFail($id);
        return view('edit_barang', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'harga_modal' => 'required|integer',
            'harga_jual' => 'required|integer',
            'barang_terjual' => 'required|integer'
        ]);

        $total_pendapatan = $request->barang_terjual * $request->harga_jual;
        $total_laba = $request->barang_terjual * ($request->harga_jual - $request->harga_modal);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'barang_terjual' => $request->barang_terjual,
            'total_pendapatan' => $total_pendapatan,
            'total_laba' => $total_laba
        ]);

        return redirect('/barang')->with('success', 'Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('/barang')->with('success', 'Barang berhasil dihapus');
    }
}
