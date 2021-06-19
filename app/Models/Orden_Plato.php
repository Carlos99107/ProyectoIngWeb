<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden_Plato extends Model
{
    use HasFactory;
    protected $table = 'orden_plato';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_orden',
        'id_plato',
        'fecha',
    ];
}
