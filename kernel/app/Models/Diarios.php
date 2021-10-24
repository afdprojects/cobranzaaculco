<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarios extends Model
{
    use HasFactory;
    protected $table = "diarios";
    protected $primaryKey = "id_ingresos";
    protected $fillable =['id_ingresos','cuenta', 'nombre'];
}
