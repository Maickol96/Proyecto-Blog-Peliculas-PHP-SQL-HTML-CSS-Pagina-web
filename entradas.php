<!--Llamo la otra parte de html que me lleve a CABECERA-->
<!---->
<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php' ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <h1>Todas las entradas</h1>

    <?php
    $entradas = conseguirEntradas($db);
    // comprobar si no esta vacio
    if (!empty($entradas)):
        while ($entrada = mysqli_fetch_assoc($entradas)):
            ?>
            <article class="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                    <h2><?= $entrada['titulo'] ?></h2>
                    <!--para mostrar la categoria y la fecha-->
                    <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                    <p>
                        <!--para limitar el numero de caracteres, substr(le pasamos los el string que vamos a limitar, numero unicio, numero total de caracteres)-->
                        <?=substr($entrada['descripcion'], 0 , 180)."..."?>
                    </p>
                </a>
            </article>

        <?php
        endwhile;
    endif;
    ?>

</div><!--fin principal-->


<?php require_once 'includes/pie.php' ?>


