<!--Llamo la otra parte de html que me lleve a la pantalla CONEXION Y HELPERS-->
<?php require_once 'includes/conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>


<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);//  $_GET['id'] -> captura el ii que llega por la URL
if (!isset($entrada_actual['id'])) {
    header("Location: index.php");
}
?>

<!--Llamo la otra parte de html que me lleve a la pantalla CABECERA Y LATERAL-->
<!---->
<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php' ?>

<!--CAJA PRINCIPAL-->
<!--maquetamos donde se mostrara toda la categoria -->
<div id="principal">
    <h1><?= $entrada_actual['titulo'] ?></h1>
    <a href="categoria.php?id= <?= $entrada_actual['categoria_id']?>">
    <h2><?= $entrada_actual['categoria'] ?></h2>
    </a>
    <h4><?= $entrada_actual['fecha'] ?></h4>
    <p>
        <?= $entrada_actual['descripcion'] ?>
    </p>


</div><!--fin principal-->


<?php require_once 'includes/pie.php' ?>


