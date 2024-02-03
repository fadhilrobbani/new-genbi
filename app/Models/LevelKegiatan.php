<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelKegiatan extends Model
{
    use HasFactory;

    protected $table = 'level_kegiatans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'level',
        'poin',
    ];

    public function kegiatan()
    {
    	return $this->hasMany(Kegiatan::class);
    }
    
    public function berita()
    {
    	return $this->hasMany(Berita::class);
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
