<?php

//CREAMOS UNA FUNCION PARA LA SESION Y MOSTRAR ERRORES
function mostrarError($errores, $campo)
{
    $alert = '';
    //si existe errores y no esta vacio
    if (isset($errores[$campo]) && !empty($campo)) {
        $alert = "<div class = 'alerta alerta-error'>" . $errores[$campo] . '</div>';
    }
    return $alert;
}

// CREAMOS UNA FUNCION PARA CREAR ERRORES
/*function borrarErrores(){
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = session_unset($_SESSION['errores']);
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        session_unset($_SESSION['completado']);
    }
    return $borrado;
}
*/
function borrarErrores() {
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        unset($_SESSION['errores']);
        $borrado = true;
    }

    if (isset($_SESSION['completado'])) {
        unset($_SESSION['completado']);
        $borrado = true;
    }

    return $borrado;
}
?>