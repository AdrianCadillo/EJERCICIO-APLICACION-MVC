<?php
namespace models;
require 'Conexion.php';
class Producto{
   
    
    /**
     * DEVOLVER LOS PRODUCTOS EXISTENTES
     */

    public function showProductos(): array
    {
        $conexion = new Conexion;

        $conexion->Query = "SELECT *FROM productos";


        try {
            $conexion->pps = $conexion->getConexion()->prepare($conexion->Query);
            $conexion->pps->execute();

            return $conexion->pps->fetchAll(\PDO::FETCH_OBJ);

             
        } catch (\Throwable $th) {
            echo "<h1 style='color:red'>" . $th->getMessage() . "</h1>";
            exit;
        } finally {
            $conexion->CloseConection();
        }
    }
}