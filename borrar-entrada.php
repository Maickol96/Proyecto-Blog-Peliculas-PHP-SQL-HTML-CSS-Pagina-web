<?php
//llamamos el archivo
include_once  'includes/conexion.php';

//validacion -> si existe la sesion de usuario con usuario-id -> y existe el id por la url ->  entramos
if (isset($_SESSION['usuario']) && isset($_GET['id'])){
    $entrada_id = $_GET['id'];//capturamos el id de la url
    $usuario_id = $_SESSION['usuario']['id']; //capturamos el "usuario" y "id" de la sesion

    $sql = "DELETE FROM entradas WHERE usuarios_id =  $usuario_id AND id = $entrada_id "; // Borrar los datos de la tabla usuarios cuando -> 'usuario_id' =  '$usuario_id'(usuario capturado en la sesion y 'id' = 'entrada_id'(id capturado en la url)

    $borrar = mysqli_query($db, $sql);
   ;
}
header("Location: index.php");