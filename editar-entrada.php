<!--Llamo la otra parte de html que me lleve a la pantalla CONEXION Y HELPERS-->
<?php require_once 'includes/redireccion.php' ?>
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
<div id="principal">
    <h1>Editar entradas</h1>

    <p>
        Edita tu entrada <?=$entrada_actual['titulo'] ?><!--Para mostrar el titulo de la entrada-->
    </p>
    <br/>
    <!--Creamos un formulario para crear categorias -> para reutilizar le pasamos un flak por la pagina que ?editar=1-->
    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <!--Agregamos un campo-->
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo'] ?>"/>
        <!--Agregamos para mostrar errores-->
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>

        <!--Agregar descripcion-->
        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion"><?=$entrada_actual['descripcion'] ?></textarea>
        <!--Agregamos para mostrar errores-->
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>

        <!--Agregar categoria-->
        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php
            $categorias = conseguirCategorias($db);
            if (!empty($categorias)):
                while ($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                    <option value="<?= $categoria['id']?>"  <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"': ''?>><!--Ternaria ->  si categoria_id-->

                        <?= $categoria['nombre']?>
                    </option>

                <?php
                endwhile;
            endif;
            ?>
        </select>
        <!--Agregamos para mostrar los errores-->
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria') : ''; ?>

        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/pie.php' ?>

