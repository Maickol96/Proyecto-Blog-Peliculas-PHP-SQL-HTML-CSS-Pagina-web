<?php
//GUARDAR CATEGORIA

if (isset($_POST)) {
    require_once 'includes/conexion.php';

    //Hacemos una ternaria -> Si me existe $_POST['nombre'] que me llega por el formulario -> ? comprobamos las caracteres especiales que me llegan por el formulario y si no es false;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;


    //Array de errores
    $errores = array();


    //validar los datos antes de guardarlos en la base de datos
    //validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", '$nombre')) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre es invalido";
    }
    if (count($errores) == 0) {
        $sql = "INSERT INTO categorias VALUES(null, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }

}
header("Location: index.php");