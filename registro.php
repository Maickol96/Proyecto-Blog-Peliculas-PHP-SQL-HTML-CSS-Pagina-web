<?php

session_start();
//Recoger por post los datos que me llegan del formulario

if (isset($_POST)) { //si existe (isset($_POST['submit']) significa que me estan llegando los datos del formulario


    //RECOGER LOS VALORES DEL FORMULARIO DE REGISTRO
    //Comprobar que los datos existen con un if
    if (isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
    }else{
        $nombre = false;
    }

    //Vamos a comprobar si los datos existe usando un operador ternario.
    //Si existe el dato apellidos = true ? -> "entonses" asignele el dato y si no existe : -> "entoce" el dato asignar false
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;


    /*ARRAY ERRORES
    Para guardar los posibles errores que salgan del formulario
    */
    $errores = array();


    /*VALIDAR INFORMACION ANTES DE GUARDAR EN LA BASE DE DATOS
    Si no esta vacio y no es numerico => comprobamos que no venga un numero de [0-9]
    Validacion campo nombre*/

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)){
       $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }


    //Validacion campo apellido
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/', $apellidos)){
        $apellidos_validado = true;
    }else {
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }


    /*validacion campo email
    si el campo no esta vacio y validamos que el formato de email cumpla */
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }


    /*Validacion campo password
    Solo se valida que no este vacia*/
    if (!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La password no puede estar vacia";
    }


    //Validamos => Solo podemos registrar un usuario en la base de datos cuando no existe ningun error
    $guardar_usuario = false;

   if (count($errores) == 0){
       /*Si el conteo de errores es igual a cero
       INSERTAR USUARIO A LA BASE DE DATOS EN LA TABLA CORRESPONDIENTE*/
       $guardar_usuario = true;
   }else{
       //Si no es es igual a cero el conteo no se deja insertar el dato, se crea una sesion
       $_SESSION['errores'] =  $errores;
       header('Location: index.php');
   }
}

?>