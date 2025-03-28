<?php

if(PHP_SESSION_ACTIVE != session_status()){
    session_start();
}

require 'config/database.php';
require 'config/app.php';
require 'helpers.php';
/**
 * Importar nuestros controladores
 */
require 'controllers/ProductoController.php';