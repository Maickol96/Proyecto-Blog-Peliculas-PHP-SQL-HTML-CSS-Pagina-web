  <!--//va a llevar toda la parte de arriba de la web
//CONEXION-->
<?php require_once 'conexion.php' ?>

<!--Llamamos el archivo de nuestras funciones-->
<?php require_once 'helpers.php'; ?>

<!DOCTYPE>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Blog de videojuegos</title>
    <!--conexion a css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
</head>
<body>
<!--CABECERA-->
<header id="cabecera">
    <!--LOGO-->
    <div id="logo">
        <a href="index.php">
            Blog de videojuegos
        </a>
    </div>

    <!--MENU-->

    <nav id="menu">
        <ul>
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <!--Se crea bucle-->
            <?php
                global$db;
                $categorias = conseguirCategorias($db);
                //if para comprobar que no este vacio
                if (!empty($categorias)):
                    while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                            <li><!--se le va pasar el id por la url-->
                                <a href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria['nombre'] ?></a>
                            </li>
            <?php
                    endwhile;
                endif;
            ?>

            <li>
                <a href="index.php">Contacto</a>
            </li>
        </ul>
    </nav>

    <div class="clearfix"></div><!--para que borre los flotados y no se mezcle lo de arriba con lo de abajo-->
</header>

<div id="contenedor">