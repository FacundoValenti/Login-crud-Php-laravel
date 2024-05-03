<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $importe_abonado
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Gimnasio[] $gimnasios
 * @property Piletum[] $piletas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'apellido', 'importe_abonado', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gimnasios()
    {
        return $this->hasMany(\App\Models\Gimnasio::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function piletas()
    {
        return $this->hasMany(\App\Models\Piletum::class, 'id', 'user_id');
    }
    
}
