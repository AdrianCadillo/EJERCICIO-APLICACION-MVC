<?php
use models\Producto;

require 'models/Producto.php';
$accion = $_GET["accion"];
$Errors = [];
switch($accion):
 case "productos":
  $producto = new Producto;

  $productos = $producto->showProductos();

  include 'views/productos.php';
  
 break;   

 case "create":
    include 'views/create.php';
 break;   

 case "save":
    $producto = new Producto;

    if(empty($_POST["nombre_producto"])){
        $Errors[] = "Ingrese el nombre del producto!!";
    }else{
        $_SESSION["nombre_producto"] = $_POST["nombre_producto"];
    }

    if(empty($_POST["precio_producto"])){
        $Errors[] = "Ingrese el precio del producto!!";
    }else{
        $_SESSION["precio_producto"] = $_POST["precio_producto"];
    }

    if(empty($_POST["stock_producto"])){
        $Errors[] = "Ingrese el stock del producto!!";
    }else{
        $_SESSION["stock_producto"] = $_POST["stock_producto"];
    }

    if(count($Errors) == 0){

    $NombreProducto = $_POST["nombre_producto"];
    $PrecioProducto = $_POST["precio_producto"];
    $StockProducto =  $_POST["stock_producto"];

    $response = $producto->saveProducto(
        $NombreProducto,
        $PrecioProducto,
        $StockProducto
    );

    if($response === 'ok'){
        $_SESSION["success"] = "Producto registrado correctamente!!";
        header("location:".URL_BASE."index.php?accion=productos");
        exit;
    }else{
        if($response === 'existe'){
            $_SESSION["existe"] = "El producto que deseas registrar ya existe!!!";
        }else{
            $_SESSION["error"] = "Error al registrar al producto!!!";
        }
    }
  }else{
    $_SESSION["errors"] = $Errors;
  }
    header("location:".URL_BASE."index.php?accion=create");
 break;  
 
 case "editar":

    if(isset($_GET["id"])){
            $producto = new Producto;

            $producto_ = $producto->ConsultarProductoPorId($_GET["id"]);

            $producto_ ? include 'views/editar.php':RedirectPage("productos");
    }else{
        RedirectPage("productos");
    }
 break; 
 
 case "update":
    $producto = new Producto;

    $NombreProducto = $_POST["nombre_producto"];
    $PrecioProducto = $_POST["precio_producto"];
    $StockProducto =  $_POST["stock_producto"];
    $response = $producto->updateProducto(
        $_GET["id"],
        $NombreProducto,
        $PrecioProducto,
        $StockProducto
    );
    if($response === 'ok'){
        $_SESSION["success"] = "Producto modificado correctamente!!";
        RedirectPage("productos");
        exit;
    }else{
            $_SESSION["error"] = "Error al modificar al producto!!!";
    }
    RedirectPage("editar&&id=".$_GET["id"]);
 break;  
 
 case "delete":
   if(isset($_GET["id"])){
     $producto = new Producto;

     $response = $producto->EliminarProducto($_GET["id"]);

     if($response === "ok"){
        $_SESSION["success"] = "Producto eliminado correctamente!!";
     }else{

     $_SESSION["error"] = "Error al eliminar producto!!!";
     }

     RedirectPage("productos");
   }
 break;   
endswitch;    
