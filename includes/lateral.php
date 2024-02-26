<?php include_once 'cabecera.php'?>
<?php include_once 'conexion.php'?>
<!--BARRA LATERAL-->
<aside id = "sidebar">

    <!--Formulario para iniciar sesion-->
    <div id = "login" class="bloque">
        <h3>Identificate</h3>
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
    <div id = "register" class="bloque">
        <h3>Registrate</h3>
        <form action="register.php" method="POST">
            <!--boton para nombre-->
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"/>

            <!--boton para apellido-->
            <label for="apellido">Apellido</label>
            <input type="text" name="apellidos"/>

            <!--boton para email-->
            <label for="email">Email</label>
            <input type="email" name="email"/>

            <!--boton para password-->
            <label for="password">Contraseña</label>
            <input type="password" name="password"/>

            <!--boton submit registrar-->
            <input type="submit" value="Registrar"/>
        </form>
    </div>
</aside>
