<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'komisariat_id',
        'jabatan_id',
        'nama',
        'email',
        'no_hp',
        'level',
        'angkatan',
        'tgl_lahir',
        'poin',
        'foto',
        'password',
    ]; 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });
    }

    public function absensiKegiatan()
    {
    	return $this->hasMany(AbsensiKegiatan::class);
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

    public function komisariat()
    {
    	return $this->belongsTo(Komisariat::class, 'komisariat_id');
    }

    public function jabatan()
    {
    	return $this->belongsTo(JabatanUser::class, 'jabatan_id');
    }
    
} 
