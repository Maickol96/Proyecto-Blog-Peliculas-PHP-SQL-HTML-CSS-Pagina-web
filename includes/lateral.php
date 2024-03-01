<!--Llamamos el archivo de nuestras funciones-->
<?php require_once 'helpers.php'; ?>

<!--BARRA LATERAL-->
<aside id="sidebar">
    <!--Ponemos un bloque que solo se va mostrar si existe la variable sesion-->
    <!--Cuando la sesion exista muestreme el bloque <div></div>-->

    <?php if (isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos'] ?></h3>

            <!--Botones-->
            <!--Boton de crear entradas-->
            <a href="" class="boton boton-verde">Crear entrada</a>

            <!--Boton crear categorias-->
            <a href="" class="boton boton-azul ">Crear categorias</a>

            <!--Boton para editar mis datos-->
           <a href="" class="boton boton-naranja">Mis datos</a>

            <!--Boton cerrar sesion-->
            <a href="cerrar.php" class="boton boton">Cerrar sesion</a>

        </div>
    <?php endif; ?>


    <!--Formulario para iniciar sesion-->
    <div id="login" class="bloque">
        <h3>Identificate</h3>

        <!--en casi de que no logre identificarse correctamente generar una alerta-->
        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['error_login']; ?>
            </div>
        <?php endif; ?>


        <form action="login.php" method="POST">

            <!--boton para email-->
            <label for="email">Email</label>
            <input type="email" name="email"/>

            <!--boton para password-->
            <label for="password">Contraseña</label>
            <input type="password" name="password"/>

            <!--boton submit envio-->
            <input type="submit" value="Entrar"/>
        </form>
    </div>

    <!--Formulario para registro-->
    <div id="register" class="bloque">
        <h3>Registrate</h3>

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

        <form action="registro.php" method="POST">

            <!--boton para nombre-->
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"/>
            <!--llamo la funcion-->
            <!--usamos operador ternario => si existe sesion o error ejecute la funcion "mostrarError" si no dejar vacio-->
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <!--boton para apellido-->
            <label for="apellido">Apellido</label>
            <input type="text" name="apellidos"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

            <!--boton para email-->
            <label for="email">Email</label>
            <input type="email" name="email"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

            <!--boton para password-->
            <label for="password">Contraseña</label>
            <input type="password" name="password"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

            <!--boton submit registrar-->
            <input type="submit" name="submit" value="Registrar"/>
        </form>
        <!--Funcion de borrar errores, paradfg borrar al final del formulario-->
        <?php echo borrarErrores() ?>
    </div>
</aside>
