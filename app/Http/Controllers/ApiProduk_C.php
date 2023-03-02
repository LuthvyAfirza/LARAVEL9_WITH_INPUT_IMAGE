<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M_Produk;
use App\Http\Resources\ProdukResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ApiProduk_C extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = M_Produk::all();
        Log::info("User sedang melihat data produk");
        return new ProdukResource(true, 'List Data Produk', $produk);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //define validation rules
        $validator = Validator::make($request->all(), [
            'judulProduk'     => 'required',
            'deskripsi'   => 'required',
            'harga'   => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
            //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
            //upload image
        $image = $request->file('gambar');
        $image->storeAs('img/', $image->hashName());
        
            //create post
        $produk = M_produk::create([
            'judulProduk'     => $request->judulProduk,
            'deskripsi'   => $request->deskripsi,
            'harga'   => $request->harga,
            'gambar'     => $image->hashName(),
        ]);

        Log::info("User sedang menambahkan data");
        
            //return response
        return new ProdukResource(true, 'Data Produk Berhasil Ditambahkan!', $produk);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = M_Produk::find($id);
        Log::info("User sedang mencari data produk");
            //return single post as a resource
        return new ProdukResource(true, 'Data Produk Ditemukan!', $produk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = M_Produk::find($id);
        
            //check if image is not empty
        if ($request->hasFile('gambar')) {
        
                //upload image
        $image = $request->file('gambar');
        $image->storeAs('img/', $image->hashName());
        
                //delete old image
        Storage::delete('img/'.$produk->gambar);
        
                //update post with new image
        $produk->update([
            'judulProduk'     => $request->judulProduk,
            'deskripsi'   => $request->deskripsi,
            'harga'   => $request->harga,
            'gambar'     => $image->hashName(),
        ]);

        Log::info("User sedang memperbarui data");

                //return response
            return new ProdukResource(true, 'Data Produk Berhasil Diubah!', $produk);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = M_Produk::find($id);

            //delete image
        Storage::delete('img/'.$produk->gambar);

            //delete produk
        $produk->delete();

        Log::info("User sedang menghapus data");
        
            //return response
        return new ProdukResource(true, 'Data Produk Berhasil Dihapus!', null);
    }
}
