<?php
//Iniciamos la sesion - > debemos validar si la sesion no esta ya iniciada, para poder iniciar la sesion, ya que si la sesion ya esta iniciada nos da un error
if (!isset($_SESSION)){
    session_start();
}

//validacion => si sesion de usuario existe, redirigirme a la pantalla de index
    if(!isset($_SESSION['usuario'])){
        //redireccion a la pantalla de index.php
    header("Location: index.php");

    }