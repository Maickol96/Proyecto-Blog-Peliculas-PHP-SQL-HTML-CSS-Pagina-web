<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

    <div id="principal"> <!--Caja Principal -->
        <h1>Mis datos</h1>


        <!--Se crea alerta de formulario pra cuando se llene con exito o con error-->
        <?php if (isset($_SESSION['completado'])): ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif; ?>

        <form action="actualizar-usuario.php" method="POST">
            <!--boton para nombre-->
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>"/> <!--Con el value, precargados los usuario en los campos de actualizar datos-->
            <!--llamo la funcion-->
            <!--usamos operador ternario => si existe sesion o error ejecute la funcion "mostrarError" si no dejar vacio-->
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <!--boton para apellido-->
            <label for="apellido">Apellido</label>
            <input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos']; ?>" /> <!--Con el value, precargados los usuario en los campos de actualizar datos-->
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

            <!--boton para email-->
            <label for="email">Email</label>
            <input type="email" name="email" value="<?= $_SESSION['usuario']['email']; ?> "/> <!--Con el value, precargados los usuario en los campos de actualizar datos-->
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

            <!--boton submit registrar-->
            <input type="submit" name="submit" value="Actualizar"/>
        </form>
        <!--Funcion de borrar errores, paradfg borrar al final del formulario-->
        <?php echo borrarErrores() ?>


    </div> <!--fin principal -->
<?php require_once 'includes/pie.php' ?>