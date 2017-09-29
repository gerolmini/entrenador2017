<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Entrenador 2017</title>
        <link rel="stylesheet" href="<?php echo $BASE_URL ?>/view/css/style.css">
    </head>
    <body>
        <?php require_once "section/header.php"; ?>
        <?php require_once "section/nav.php"; ?>
        <main>
            <h1>Practica Modulo 3</h1>
            <h2>Grupo 2</h2>
            <hr>
            <?php echo $BASE_URL; ?>
            <hr>
            <ul>
            <?php
                foreach ($tema as $fila) {
                    echo "<li>{$fila['titulo']}</li>";
                }
            ?>
            </ul>
        </main>
        <?php require_once "section/footer.php"; ?>
    </body>
</html>