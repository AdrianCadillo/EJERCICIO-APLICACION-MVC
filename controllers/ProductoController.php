<?php

use models\Producto;

 require 'models/Producto.php';
 $accion = $_GET["accion"];

switch($accion):
 case "productos":
  $producto = new Producto;

  $productos = $producto->showProductos();

  include 'views/productos.php';
  
 break;   
endswitch;    
