<?php
/*Iniciar la sesion y la conexion a la base de datos*/

global $db;
require_once 'includes/conexion.php';


/*Recoger los datos del formulario*/
if (isset($_POST)) {
    //trim()=> me sirbe para recoger el email sin espacios
    $email = trim($_POST['email']);
    $password = $_POST['password'];


    //Consult para comprobar las credenciales del usuario
    //seleccione todos los dato de la tabla usuarios cuando el email sea el mismo
    $sql = "SELECT * FROM usuarios WHERE  email = '$email'";
    //Realizo la consulta
    $login = mysqli_query($db, $sql);

    //Si login da true y si el numero de lineas que me devuelve la consulta es igual a 1 entre a la condicion
    if ($login && mysqli_num_rows($login) == 1) {

        // mysqli_fetch_assoc(me saca un objeto o un array asociativo)
        $usuario = mysqli_fetch_assoc($login);

        /*Comprobar la password/cifrar
        Se comprueba las password con => */
        $verify = password_verify($password, $usuario['password']); // Si esta variable $verify = true, significa que usuario se logeo correctamente

        //validacion para verificar si da true
        if ($verify) {
            /*Utilizar una sesion para guardar los datos del usuario logueado*/
            $_SESSION['usuario'] = $usuario;

            //  En caso de que se logee correctamente se debe cerrar la sesion
            if (isset($_SESSION['error_login'])) {
                session_unset($_SESSION['error_login']);
            }

        } else {
            /*Si algo falla crear una sesion con el fallo*/
            $_SESSION['error_login'] = "login incorrecto!!";
        }


    } else {
        //Mensaje de error
        $_SESSION['error_login'] = "login incorrecto!!";
    }
}
/*Redirigir al index.php*/
header('Location: index.php');
?>
