<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table='medicamentos';
    protected $fillable=['nome', 'dose', 'descricao', 'fk_medico'];

}
