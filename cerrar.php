<?php
//Inicia la sesion en este file
session_start();

//Validamos => Si existe la sesion "usuarios" destruirla
if (isset($_SESSION['usuarios'])){
    session_destroy();
}

//Redirigios a la cabecera o pantalla index.php
header("Location: index.php");