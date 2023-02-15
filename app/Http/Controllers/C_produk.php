<?php

namespace App\Http\Controllers;

use App\Models\M_produk;
use Illuminate\Http\Request;

class C_produk extends Controller
{
    public function index(){
      $produk = M_produk::all();
      return view ('crud.produk',compact(['produk']));
    }
    public function create()
    {
       return view('crud.create');
    }
    public function store(Request $request)
    {
      $request->validate([
          'judulProduk' => 'required',
          'deskripsi' => 'required',
          'harga' => 'required',
          'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $input = $request->all();

      if ($gambar = $request->file('gambar')) {
          $destinationPath = 'foto/';
          $fotogambar = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
          $gambar->move($destinationPath, $fotogambar);
          $input['gambar'] = "$fotogambar";
      }
  
      M_produk::create($input);
   
      return redirect('/produk');
  
  }

    public function edit($id)
    {
        $produk = M_produk::find($id);
        return view('crud.edit',compact(['produk']));
    }
    
    public function update($id, Request $request, M_produk $produk)
    {
        $produk = M_produk::find($id);
        $request->validate([
            'judulProduk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'foto/';
            $fotogambar = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $fotogambar);
            $input['gambar'] = "$fotogambar";
        }else{
            unset($input['gambar']);
        }
    
        $produk->update($input);
        
        return redirect('/produk')->with('success','Produk Berhasil Diupdate!');
    }
    

    public function destroy($id)
    {
        $produk = M_produk::find($id);
        $produk->delete();
        return redirect('/produk');
    }
    
}
