<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasHotel extends Model
{
    use HasFactory;
    protected $table = 'fasilitashotels';
    protected $fillable = ['nama_fasilitas','keterangan','image'];
}
