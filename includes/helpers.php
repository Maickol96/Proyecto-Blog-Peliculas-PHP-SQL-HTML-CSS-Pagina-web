<?php

//CREAMOS UNA FUNCION PARA LA SESION Y MOSTRAR ERRORES
function mostrarError($errores, $campo){
    $alert = '';
    //si existe errores y no esta vacio
    if (isset($errores[$campo]) && !empty($campo)) {
        $alert = "<div class = 'alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alert;
}

// CREAMOS UNA FUNCION PARA CREAR ERRORES
function borrarErrores()
{
    $_SESSION['errores'] = null ;
    unset($_SESSION['errores']);
    return  true;

}
?>