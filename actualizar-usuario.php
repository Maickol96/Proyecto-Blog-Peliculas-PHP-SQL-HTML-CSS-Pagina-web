<?php


//Recoger por post los datos que me llegan del formulario

if (isset($_POST)) { //si existe (isset($_POST['submit']) significa que me estan llegando los datos del formulario

    //llamamos el file de la conexion a la base de datos
    global $db;
    require_once 'includes/conexion.php';


    //RECOGER LOS VALORES DEL FORMULARIO DE ACTUALIZAR
    //Vamos a comprobar si los datos existe usando un operador ternario.
    //Si existe el dato apellidos = true ? -> "entonses" asignele el dato y si no existe : -> "entonses" el dato asignar false
    //mysqli_rela_escape_string() => me escapa y tod\o lo que le pase por parametros no lo interpreta como parte de la consulta MYSQL+
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;



    /*ARRAY ERRORES
    Para guardar los posibles errores que salgan del formulario
    */
    $errores = array();


    /*VALIDAR INFORMACION ANTES DE GUARDAR EN LA BASE DE DATOS
    Si no esta vacio y no es numerico => comprobamos que no venga un numero de [0-9]
    Validacion campo nombre*/

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }


    //Validacion campo apellido
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/', $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }


    /*validacion campo email
    si el campo no esta vacio y validamos que el formato de email cumpla */
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }


    //Validamos => Solo podemos registrar un usuario en la base de datos cuando no existe ningun error
    $guardar_usuario = false;

    if (count($errores) == 0) {
        /*Si el conteo de errores es igual a cero*/
        $guardar_usuario = true;


        //UPDATE USUARIO A LA BASE DE DATOS EN LA TABLA CORRESPONDIENTE
        $usuario = $_SESSION['usuario'];//Recoger en una variable $usuario el dato que esta en la sesion
        $sql =  "UPDATE usuarios SET ".
                "nombre = '$nombre', ".
                "apellidos = '$apellidos', ".
                "email = '$email'".
                "WHERE id = ".$usuario['id'];//actualizar cuando id se igual al nombre y el id de la sesion
        $guardar = mysqli_query($db, $sql);


        //validamos si esta coorecta la informacion y si no devolvemos un error
        if ($guardar) {
            $_SESSION['usuario']['nombre'] = $nombre;//Actualizar la sesion del usuario
            $_SESSION['usuario']['apellidos'] = $apellidos;//Actualizar la sesion del usuario
            $_SESSION['usuario']['email'] = $email;//Actualizar la sesion del usuario

            $_SESSION['completado'] = "Tus datos se an actualizado con exito";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el actualizar tu datos!!";
        }


    } else {
        //Si no es es igual a cero el conteo no se deja insertar el dato, se crea una sesion
        $_SESSION['errores'] = $errores;

    }
}
//redireccion al index.php
header('Location: mis-datos.php');

?>