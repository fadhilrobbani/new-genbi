<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

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
