<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


    <!--CAJA PRINCIPAL-->
    <div id="principal">
        <h1>Crear entradas</h1>

        <p>
            Agrega nuevas entradas al blog para qie los usuarios puedan leerlas
            y disfrutar de nuestro contenido.

        </p>
        <br/>
        <!--Creamos un formulario para crear categorias-->
        <form action="guardar-entrada.php" method="POST">
            <!--Agregamos un campo-->
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo"/>
            <!--Agregamos para mostrar errores-->
            <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>

            <!--Agregar descripcion-->
            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion"></textarea>
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
                    <option value="<?= $categoria['id']?>">
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