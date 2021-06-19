<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_orden';
    protected $table = 'orden';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_cliente',
        'id_plato',
        'numero_orden',
        'cantidad',
        'tipo_pago',
        'estado',
        'fecha',

    ];
}
