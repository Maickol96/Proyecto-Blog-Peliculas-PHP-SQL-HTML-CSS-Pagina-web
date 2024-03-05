<?php require_once 'includes/redireccion.php'?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php';?>


<!--CAJA PRINCIPAL-->
<div id = "principal">
    <h1>Crear categorias</h1>

    <p>
        Agrega nuevas categorias al blog para qie los usuarios puedan usarlas
        al crear sus entradas.

    </p>
    <br/>
    <!--Creamos un formulario para crear categorias-->
    <form action="guardar-categoria.php" method="POST">
        <!--Agregamos un campo-->
        <label for="nombre">Nombre de la categoria</label>
        <input type="text" name="nombre"/>

        <input type="submit" value="Guardar">
    </form>
</div>


<?php require_once 'includes/pie.php'?>