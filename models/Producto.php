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

    /**
     * Guardar los productos a la base de datos
     */

     public function saveProducto(String $NameProducto,float $PrecioProducto,int $StockProducto):String{
        $conexion = new Conexion;

        try {
            if(count($this->ConsultarProducto($NameProducto)) > 0){
                return "existe";
            }

            $conexion->Query = "INSERT INTO productos(nombre_producto,precio,stock) VALUES(?,?,?)";
            $conexion->pps = $conexion->getConexion()->prepare($conexion->Query);
            $conexion->pps->bindParam(1,$NameProducto);
            $conexion->pps->bindParam(2,$PrecioProducto);
            $conexion->pps->bindParam(3,$StockProducto);

            /// ejecutar la consulta
            return $conexion->pps->execute() ? 'ok' : 'error';

        } catch (\Throwable $th) {
            echo "<h1 style='color:red'>" . $th->getMessage() . "</h1>";
            exit;
        }finally{
            $conexion->CloseConection();
        }
     }

     /// METODO PARA ACTUALIZAR
     public function updateProducto(int $id,String $NameProducto,float $PrecioProducto,int $StockProducto):String{
        $conexion = new Conexion;

        try {
 
            $conexion->Query = "UPDATE productos SET nombre_producto=?,precio=?,stock=? WHERE id_producto=?";
            $conexion->pps = $conexion->getConexion()->prepare($conexion->Query);
            $conexion->pps->bindParam(1,$NameProducto);
            $conexion->pps->bindParam(2,$PrecioProducto);
            $conexion->pps->bindParam(3,$StockProducto);
            $conexion->pps->bindParam(4,$id);

            /// ejecutar la consulta
            return $conexion->pps->execute() ? 'ok' : 'error';

        } catch (\Throwable $th) {
            echo "<h1 style='color:red'>" . $th->getMessage() . "</h1>";
            exit;
        }finally{
            $conexion->CloseConection();
        }
     }

     /** EXISTE PRODUCTO */
     public function ConsultarProducto(String $Producto):array{
        $conexion = new Conexion;

        $conexion->Query = "SELECT *FROM productos WHERE nombre_producto=:nombre_producto";

        try {
            $conexion->pps = $conexion->getConexion()->prepare($conexion->Query);
            $conexion->pps->bindParam(":nombre_producto",$Producto);
            $conexion->pps->execute();

            return $conexion->pps->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            echo "<h1 style='color:red'>" . $th->getMessage() . "</h1>";
            exit;
        } finally {
            $conexion->CloseConection();
        }
     }

     /** CONSULTAR PRODUCTO POR ID*/
     public function ConsultarProductoPorId(int $id):array{
        $conexion = new Conexion;

        $conexion->Query = "SELECT *FROM productos WHERE id_producto=:id_producto";

        try {
            $conexion->pps = $conexion->getConexion()->prepare($conexion->Query);
            $conexion->pps->bindParam(":id_producto",$id);
            $conexion->pps->execute();

            return $conexion->pps->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            echo "<h1 style='color:red'>" . $th->getMessage() . "</h1>";
            exit;
        } finally {
            $conexion->CloseConection();
        }
     }

     /// ELIMINAR PRODUCTO (DELETE FROM WHERE id=1)
     public function EliminarProducto(int $id):String{
        $conexion = new Conexion;

        $conexion->Query = "DELETE FROM productos WHERE id_producto=:id_producto"; 

        try {
            $conexion->pps = $conexion->getConexion()->prepare($conexion->Query);
            $conexion->pps->bindParam(":id_producto",$id);
            return  $conexion->pps->execute() ? 'ok' : 'error';
 
        } catch (\Throwable $th) {
            echo "<h1 style='color:red'>" . $th->getMessage() . "</h1>";
            exit;
        } finally {
            $conexion->CloseConection();
        }
     }
}