<?php
//conexion a bd
//mysqli_connect($server, $username, $password, $database);
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_master';

$db = mysqli_connect($server, $username, $password, $database);

//Para aceptar valores que vengan con caracteres especiales
mysqli_query($db,"SET NAMES 'utf8'");

//Iniciar la sesio
//session_start();

//Comprobamos que la sesion ya no este iniciada, para poder iniciarla, ya que si esta ya existe nos da error.
if (!isset($_SESSION)){
    session_start();
}
