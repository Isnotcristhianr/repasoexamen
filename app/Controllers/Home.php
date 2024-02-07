<?php

namespace App\Controllers;

use App\Models\modelHome;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $modelo = new modelHome();
        $query = $modelo->listarProductos();
        $data = ['datos' => $query];

        /* UPDATE PROVEEDOR */


        return view('welcome_message', $data);
    }

    public function updateProveedor($idProveedor, $idProducto) {
        try {
            $modelo = new modelHome();
            $modelo->updateProveedor($idProveedor, $idProducto);
    
            // Mensaje de éxito o algo útil
            echo "Actualización exitosa";
            return $this->response->setJSON(['success' => true]);
        } catch (\Exception $e) {
            // Log del error o mensaje de error
            echo "Error: " . $e->getMessage();
            return $this->response->setJSON(['error' => $e->getMessage()]);
        }
    }
    
    
}
