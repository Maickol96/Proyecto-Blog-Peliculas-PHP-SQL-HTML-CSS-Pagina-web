<!--Llamo la otra parte de html que me lleve a la pantalla CONEXION Y HELPERS-->
<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>
<?php
$categoria_actual = conseguirCategoria($db, $_GET['id']);//  $_GET['id'] -> captura el ii que llega por la URL
if (!isset($categoria_actual['id'])) {
    header("Location: index.php");
}
?>

<!--Llamo la otra parte de html que me lleve a la pantalla CABECERA Y LATERAL-->
<!---->
<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php' ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <h1>Entradas de <?= $categoria_actual['nombre'] ?></h1>

    <?php
    $entradas = conseguirEntradas($db, null, $_GET['id']); //$_GET['id'] -> Recogemos el parametro que me llega por la URL

    // comprobar si no esta vacio
    if (!empty($entradas)):
        while ($entrada = mysqli_fetch_assoc($entradas)):
            ?>
            <article class="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
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


