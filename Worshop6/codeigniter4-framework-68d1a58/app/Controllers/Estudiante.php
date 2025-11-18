<?php

namespace App\Controllers;

use App\Models\EstudianteModel;
use App\Models\CarreraModel;

class Estudiante extends BaseController
{
    public function index()
    {
        $model = new EstudianteModel();
        $carreraModel = new CarreraModel();
        
        $estudiantes = $model->findAll();
        foreach($estudiantes as &$estudiante) {
            $carrera = $carreraModel->find($estudiante['carrera_id']);
            $estudiante['carrera_nombre'] = $carrera ? $carrera['nombre'] : 'Sin carrera';
        }
        
        $data['estudiantes'] = $estudiantes;
        return view('estudiantes/index', $data);
    }

    public function create()
    {
        $carreraModel = new CarreraModel();
        $data['carreras'] = $carreraModel->findAll();
        return view('estudiantes/create', $data);
    }

    public function store()
    {
        $model = new EstudianteModel();

        $model->save([
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'carrera_id' => $this->request->getPost('carrera_id'),
        ]);

        return redirect()->to('/estudiantes');
    }

    public function edit($id)
    {
        $model = new EstudianteModel();
        $carreraModel = new CarreraModel();
        
        $data['estudiante'] = $model->find($id);
        $data['carreras'] = $carreraModel->findAll();
        return view('estudiantes/edit', $data);
    }

    public function update($id)
    {
        $model = new EstudianteModel();

        $model->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'carrera_id' => $this->request->getPost('carrera_id'),
        ]);

        return redirect()->to('/estudiantes');
    }

    public function delete($id)
    {
        $model = new EstudianteModel();
        $model->delete($id);
        return redirect()->to('/estudiantes');
    }
}