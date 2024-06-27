<?php

namespace App\Models\Salud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $table = 'salud.cita';
    protected $fillable = [
        'citaid',
        'registro',
        'pacienteid',
        'tiposervicioid',
        'edificioid',
        'medicoid',
        'especialidadid',
        'fecha',
        'hora',
        'costo',
        'estadoid',
        'observacion',
        'referencia',
        'refrenciaid1',
        'refrenciaid2',
        'usuarioid',
        'ip'
    ];
    protected $primaryKey = 'citaid';
    public $incrementing = true;
    public $timestamps = false;
}
