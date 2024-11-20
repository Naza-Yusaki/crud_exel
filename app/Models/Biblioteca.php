<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Biblioteca
 *
 * @property $id
 * @property $name
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Biblioteca extends Model
{
    // Nombre explícito de la tabla
    protected $table = 'biblioteca'; // Esto asegura que se use la tabla correcta

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'cantidad'];
}
