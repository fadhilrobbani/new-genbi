<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komisariat extends Model
{
    use HasFactory;

    protected $table = 'komisariats';

    protected $primaryKey = 'id';

    protected $fillable = [
        'komisariat',
    ];
}
