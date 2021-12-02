<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $table = 'encuestas';
    protected $guarded = [];

    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'encuesta_id');
    }
}
