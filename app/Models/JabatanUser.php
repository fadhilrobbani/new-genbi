<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanUser extends Model
{
    use HasFactory;

    protected $table = 'jabatans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'jabatan',
    ];
}
