<?php

namespace App\Models;

use App\Models\Kegiatan;
use App\Models\JabatanKegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanitiaKegiatan extends Model
{
    use HasFactory;

    protected $table = 'panitia_kegiatans';

    protected $primaryKey = 'id';

    protected $guarded = null;

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
