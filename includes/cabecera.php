
<!--//va a llevar todo la parte de arriba de la web
//CONEXION-->
<?php require_once 'conexion.php'?>

<!DOCTYPE>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Blog de videojuegos</title>
    <!--conexion a css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
</head>
<body>
<!--CABECERA-->
<header id = "cabecera">
    <!--LOGO-->
    <div id = "logo" >
        <a href="style.css">
            Blog de videojuegos
        </a>
    </div>

    <!--MENU-->
    <nav id = "menu">
        <ul>
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                <a href="index.php">Categoria 1</a>
            </li>
            <li>
                <a href="index.php">Categoria 2</a>
            </li>
            <li>
                <a href="index.php">Categoria 3</a>
            </li>
            <li>
                <a href="index.php">Categoria 4</a>
            </li>
            <li>
                <a href="index.php">Sobre mi</a>
            </li>
            <li>
                <a href="index.php">Contacto</a>
            </li>
        </ul>
    </nav>

    <div class="clearfix"></div><!--para que borre los flotados y no se mezcle lo de arriba con lo de abajo-->
</header>