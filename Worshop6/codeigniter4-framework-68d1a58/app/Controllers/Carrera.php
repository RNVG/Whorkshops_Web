<?php

namespace App\Controllers;

use App\Models\CarreraModel;

class Carrera extends BaseController
{
    public function index()
    {
        $model = new CarreraModel();
        $data['carreras'] = $model->findAll();
        return view('carreras/index', $data);
    }

    public function create()
    {
        return view('carreras/create');
    }

    public function store()
    {
        $model = new CarreraModel();

        $model->save([
            'nombre' => $this->request->getPost('nombre'),
        ]);

        return redirect()->to('/carreras');
    }

    public function edit($id)
    {
        $model = new CarreraModel();
        $data['carrera'] = $model->find($id);
        return view('carreras/edit', $data);
    }

    public function update($id)
    {
        $model = new CarreraModel();

        $model->update($id, [
            'nombre' => $this->request->getPost('nombre'),
        ]);

        return redirect()->to('/carreras');
    }

    public function delete($id)
    {
        $model = new CarreraModel();
        $model->delete($id);
        return redirect()->to('/carreras');
    }
}