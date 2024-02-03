<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesertaKegiatan extends Model
{
    use HasFactory;

    protected $table = 'peserta_kegiatans';

    protected $primaryKey = 'id';
    protected $guarded = NULL;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
    public function jabatanKegiatan()
    {
        return $this->belongsTo(JabatanKegiatan::class, 'jabatan_id');
    }
    public function levelKegiatan()
    {
        return $this->belongsTo(PanitiaKegiatan::class, 'level_id');
    }
}
