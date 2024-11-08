<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'maisonsdemer_clientes'; // Conectar con la tabla existente
    protected $primaryKey = 'id';
    public $incrementing = false; // Si 'id' no es auto incrementado
    public $timestamps = false; // Asumiendo que la tabla no tiene columnas de timestamps de Eloquent

    protected $fillable = [
        'activo',
        'directo',
        'telesales_id',
        'admin_id',
        'fuente_id',
        'estatus_id',
        'nombre',
        'email',
        'telefono',
        'telefono_alt',
        'movil',
        'direccion',
        'localidad',
        'codigo_postal',
        'pais',
        'nacionalidad_id',
        'idioma',
        'notas',
        'criterios_json',
        'frecuencia_json',
        'contenido_json',
        'fecha_creado',
        'fecha_modificado',
        'clientes_tipo_id',
        'fuente',
        'visitadas_json',
        'tipo',
        'pais_id'
    ];
}
