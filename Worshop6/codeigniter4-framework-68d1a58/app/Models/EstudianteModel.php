<?php

namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model
{
    protected $table      = 'estudiantes';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre', 'apellido', 'email', 'carrera_id'];
    protected $useTimestamps = true;
}