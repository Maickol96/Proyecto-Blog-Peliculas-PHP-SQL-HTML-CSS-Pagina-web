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

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = true;
    }


    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }


    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
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


//Funcion para conseguir 1 categoria
function conseguirCategoria($conexion, $id)
{
    //global $db;
    $sql = "SELECT * FROM categorias WHERE id = $id; ";
    $categorias = mysqli_query($conexion, $sql);

    $result = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = mysqli_fetch_assoc($categorias);
    }
    return $result;
}


//Funcion para conseguir entrada
function conseguirEntrada($conexion, $id)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuarios " .
        "FROM entradas e " .
        "INNER JOIN categorias c ON e.categoria_id = c.id " .
        "INNER JOIN usuarios u ON e.usuarios_id = u.id " .
        "WHERE e.id = $id ";
//echo $sql;
//die();
    $entrada = mysqli_query($conexion, $sql);

    $resultado = array();
    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}


/*Funcion para conseguir las entradas*/
function conseguirEntradas($conexion, $limit = null, $categoria = null, $busqueda = null)
{
    /*tod -> sacar toda de la tabla categorias y entradas INNER JOIN=> combinamos
    tod ->las dos tablas cuando el categorias_id de la tabla entradas sea igual id de la tabla categorias
    tod -> ORDER BY ordenamos por el orden del id de la entrada de manera descendente y le ponemos un LIMIT de 4  */

    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
        "INNER JOIN categorias c ON e.categoria_id = c.id ";

    if (!empty($categoria)) {
        $sql .= "WHERE e.categoria_id = $categoria "; //Concatenamos un trozo de consulta
    }


//consulta para busqueda
    if (!empty($busqueda)) {
        $sql .= "WHERE e.titulo LIKE '%$busqueda%' "; //Concatenamos un trozo de consulta con %para buscar por delante y por detras%
    }


    $sql .= "ORDER BY e.id DESC ";

    if ($limit) {
        //Seria los mismo decir -> $sql = $sql." LIMIT 4";
        $sql .= "LIMIT 4"; //.= Significa que se le concatena lo que ya esta en el $sql mas =
    }
//    echo $sql; //Para imprimir la consulta
//    die();

    $entradas = mysqli_query($conexion, $sql);

    $result = array();
    //Si entradas en true y cuento las entradas y es mayor o igual a uno entonces voy a devolver $result
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }
    return $result;

}


?>