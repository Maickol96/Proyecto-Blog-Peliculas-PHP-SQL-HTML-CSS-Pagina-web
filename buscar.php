<!--Llamo la otra parte de html que me lleve a la pantalla CONEXION Y HELPERS-->
<?php
//validar si existe datos por post
    if (!isset($_POST['busqueda'])) {
        header("Location: index.php");

    }

?>

<!--Llamo la otra parte de html que me lleve a la pantalla CABECERA Y LATERAL-->
<!---->
<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php' ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <h1>Busqueda: <?=$_POST['busqueda']?></h1>

    <?php
    $entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);//  $_GET['id'] -> captura el ii que llega por la URL

    // comprobar si no esta vacio
    if (!empty($entradas) && mysqli_num_rows($entradas) >= 1):
        while ($entrada = mysqli_fetch_assoc($entradas)):
            ?>
            <article class="entrada">
                <a href="entrada.php?id=<?= $entrada['id'] ?>">
                    <h2><?= $entrada['titulo'] ?></h2>
                    <!--para mostrar la categoria y la fecha-->
                    <span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                    <p>
                        <!--para limitar el numero de caracteres, substr(le pasamos los el string que vamos a limitar, numero unicio, numero total de caracteres)-->
                        <?= substr($entrada['descripcion'], 0, 180) . "..." ?>
                    </p>
                </a>
            </article>

        <?php
        endwhile;
    else:
        ?>
        <div class="alerta">No hay entradas en estas categorias</div>
    <?php
    endif;
    ?>

</div><!--fin principal-->


<?php require_once 'includes/pie.php' ?>


