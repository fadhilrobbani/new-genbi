<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiKegiatan extends Model
{
    use HasFactory;

    protected $table = 'absensi_kegiatans';

    protected $primaryKey = 'id';
    
}
