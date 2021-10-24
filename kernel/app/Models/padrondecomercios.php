<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class padrondecomercios extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "padrondecomercios";
    protected $primaryKey = "id_padron_comercios";
    protected $fillable =['id_padron_comercios','rfc', 'nombre'];
}
