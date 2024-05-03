<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Piletum
 *
 * @property $id
 * @property $user_id
 * @property $fecha_suscripcion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Piletum extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id','nombre','apellido',  'fecha_suscripcion', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'user_id', 'id');
    }
    
}
