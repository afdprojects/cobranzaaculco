<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoCuentas extends Model
{
    use HasFactory;
    protected $table = "catalogo_cuentas";
    protected $primaryKey = "id_cuenta";
    protected $fillable =['id_cuenta','cuenta', 'nombrecuenta'];
}
