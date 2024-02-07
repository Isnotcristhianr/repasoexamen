<?php

namespace App\Models;

use CodeIgniter\Model;

class modelHome extends Model
{
    //listar productos
    public function listarProductos()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT PR.PROD_ID, P.PROV_ID, P.PROV_NOMBRE, C.CAT_NOMBRE, PR.PROD_NOMBRE
        FROM tbl_proveedor P
        JOIN tbl_productos PR ON P.PROV_ID = PR.PROV_ID
        JOIN tbl_categorias C ON PR.CAT_ID = C.CAT_ID");
        return $query->getResult();
    }



    public function updateProveedor($idProveedor, $idProducto) {
        try {
            $db = \Config\Database::connect();
            $query = $db->query("UPDATE `tbl_productos` SET `PROV_ID` = $idProveedor WHERE `PROD_ID` = $idProducto");
            
            // Mensaje de éxito o algo útil
            echo "Consulta ejecutada correctamente";
            return $query->getResult();
        } catch (\Exception $e) {
            // Log del error o mensaje de error
            echo "Error en la consulta: " . $e->getMessage();
            throw new \Exception('Error al actualizar proveedor: ' . $e->getMessage());
        }
    }
    
    
    
}
