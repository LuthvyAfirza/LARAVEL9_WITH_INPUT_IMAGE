<?php


namespace App\Http\Controllers;

use App\Models\M_produk;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produk = M_produk::count();
        return view('dashboard', compact('produk'));
    }
}
