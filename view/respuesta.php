<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Entrenador 2017</title>
        <link rel="stylesheet" href="<?php echo $BASE_URL ?>/view/css/style.css">

        <style media="screen">
        section{
          width: 20%;
          height: 10%;
          margin-left: 10%;
          background-color: blue;
        }

        .ok {

            background-color: green;
            color: white;
          }

        .error {

              background-color: red;
              color: white;
              text-align: center;
            }

          a{
            color: white;
          }
        </style>

    </head>
    <body>
        <?php require_once "section/header.php"; ?>
        <?php require_once "section/nav.php"; ?>
        <main>
            <h1>Preguntas por tema</h1>



          <section>
            <?php
            
            echo $verdadera;
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
        <a href="pregunta.php">Siguiente pregunta</a>
        </section>


        </main>
        <?php require_once "section/footer.php"; ?>
    </body>
</html>
