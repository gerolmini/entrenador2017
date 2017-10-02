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

          <section id="respuesta">
            <?php

            if ($verdadera==0) {
                echo "<h2 class='error'>
                Respuesta incorrecta
                </h2>";
              } else{
                echo "<h2 class='ok'>
                Respuesta correcta
                </h2>";
              }
        
          ?>
            <a href="<?php echo $BASE_URL; ?>/temas/<?php echo $titulo_url[0]; ?>">Siguiente pregunta</a>
        </section>


        </main>
        <?php require_once "section/footer.php"; ?>
    </body>
</html>
