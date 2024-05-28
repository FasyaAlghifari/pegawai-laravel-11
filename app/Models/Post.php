<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

     protected $fillable = [
        'image',
        'nama',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'jabatan',
        'masuk_kerja',
        'job',
     ];
}
