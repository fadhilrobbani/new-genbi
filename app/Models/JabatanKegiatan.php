<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan_kegiatans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'jabatan',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function panitiaKegiatan()
    {
        return $this->hasMany(PanitiaKegiatan::class);
    }

    public function pesertaKegiatan()
    {
        return $this->hasMany(PesertaKegiatan::class);
    }

    public function absensiKegiatan()
    {
        return $this->hasMany(AbsensiKegiatan::class);
    }
}
