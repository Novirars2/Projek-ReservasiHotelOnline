<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $table = 'tamu';
    protected $fillable = ['nama_tamu','no_hp','email','tgl_check_in','pesanan','tgl_check_out'];
}
