<?php

namespace App\Controllers;

use Config\Database; // 👈 Importa la clase para usar la conexión

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function dbTest()
    {
        // Conecta a la base usando los datos del archivo .env
        $db = Database::connect();

        try {
            // Ejecuta una consulta simple para probar la conexión
            $query = $db->query('SHOW TABLES');
            $tables = $query->getResultArray();

            // Retorna respuesta JSON
            return $this->response->setJSON([
                'connected' => true,
                'database'  => $db->getDatabase(),
                'tables'    => $tables,
            ]);
        } catch (\Throwable $e) {
            // En caso de error, muestra el mensaje
            return $this->response->setJSON([
                'connected' => false,
                'error'     => $e->getMessage(),
            ])->setStatusCode(500);
        }
    }
}