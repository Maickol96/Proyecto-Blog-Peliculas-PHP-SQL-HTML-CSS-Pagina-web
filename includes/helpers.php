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

/*CREAMOR FUNCION PARA CERRAR SESION */
function borrarErrores()
{
    $borrado = false;

//    if (isset($_SESSION['errores'])){
//        $_SESSION['errores'] = null;
//        $borrado = session_unset($_SESSION['errores']);
//    }

    if (isset($_SESSION['errores'])) {
        unset($_SESSION['errores']);
        $borrado = true;
    }

    if (isset($_SESSION['errores_entrada'])) {
       $_SESSION['errores_entrada'] = null;
    }


//    if (isset($_SESSION['completado'])){
//        $_SESSION['completado'] = null;
//        $borrado = session_unset($_SESSION['completado']);
//    }

    if (isset($_SESSION['completado'])) {
        unset($_SESSION['completado']);
        $borrado = true;
    }

    return $borrado;
}


/*Funcion para conseguir las categorias*/
function conseguirCategorias($conexion)
{
    //global $db;
    $sql = "SELECT * FROM categorias ORDER BY id ASC; ";
    $categorias = mysqli_query($conexion, $sql);

    $result = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }
    return $result;
}


/*Funcion para conseguir las entradas*/
function conseguirUltimasEntradas()
{
    global $db;

    /*todo -> sacar todo de la tabla categorias y entradas INNER JOIN=> combinamos
    todo ->las dos tablas cuando el categorias_id de la tabla entradas sea igual id de la tabla categorias
    todo -> ORDER BY ordenamos por el orden del id de la entrada de manera descendente y le ponemos un LIMIT de 4  */

    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
        "INNER JOIN categorias c ON e.categoria_id = c.id " .
        "ORDER BY e.id DESC LIMIT 4";

    $entradas = mysqli_query($db, $sql);

    $result = array();
    //Si entradas en true y cuento las entradas y es mayor o igual a uno entonces voy a devolver $result
    if ($entradas && mysqli_num_rows($entradas) >=1 ){
        $result = $entradas;
    }
    return $result;

}


?>