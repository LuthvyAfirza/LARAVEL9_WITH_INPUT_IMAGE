<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_produk extends Model
{
    protected $table = "tb_produk";
    protected $guarded = ['id'];
    use HasFactory;
}
