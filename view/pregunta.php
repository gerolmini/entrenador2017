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
            <h1>Preguntas por tema</h1>

            <h3>Tema elegido: <?php  ?></h3>


          <form class="" action="index.html" method="get">

              <?php
                  echo "<input type='text' value='{$preg['pregunta']}' /> <br />";
                    foreach ($resp as $r) {
                      echo "<input type='radio' name='resp' value='{$r['respuesta']}'>{$r['respuesta']}<br />";
                    }
              ?>
              <input type="submit" value="enviar respuesta">
              <a href="pregunta.php">Siguiente pregunta</a>
        </form>

          <?php
                //if(isset($_GET['resp'])) $id = $_GET['resp'];
           ?>

        </main>
        <?php require_once "section/footer.php"; ?>
    </body>
</html>