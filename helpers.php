<?php

/**Método para no borrar lo que ya se escribio en el input */
function old(String $input){
    $ValueInputOld = "";

    if(isset($_SESSION[$input])){

        $ValueInputOld = $_SESSION[$input];

        unset($_SESSION[$input]);
    }

    return $ValueInputOld;
}

function RedirectPage(String $Pagina){
    header("location:".URL_BASE."index.php?accion=".$Pagina);
}