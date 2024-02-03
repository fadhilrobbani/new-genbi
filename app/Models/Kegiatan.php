<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';

    protected $primaryKey = 'id';
    protected $guarded = NULL;
    
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
