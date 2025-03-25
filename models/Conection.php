<?php
namespace models;

use PDO;

trait Conection{
  
    private $Conection = null;
    public  $pps;
    public String $Query;
    /**
     * Método para realizar la conexión
     */

     public function getConexion(){
       try {
         $this->Conection = new PDO(
            "mysql:host=".SERVER.";dbname=".DATABASE,
            USUARIO,
            PASSWORD
         );

         $this->Conection->exec("set names utf8");

         return $this->Conection;
       } catch (\Throwable $th) {
        echo "<h1 style='color:red'>".$th->getMessage()."</h1>";
        exit;
       }
     }

     /*LIBERAR RECURSOS */
     public function CloseConection(){
        if($this->Conection != null){
            $this->Conection = null;
        }

        if($this->pps != null){
            $this->pps = null;
        }
     }
}