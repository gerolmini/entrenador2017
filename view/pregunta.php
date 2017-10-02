
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Entrenador 2017</title>
        <link rel="stylesheet" href="<?php echo $BASE_URL ?>/view/css/style.css">

        <style media="screen">
        /*    .pregunta input[type=text]{

                  width: 80%;
              }

            .pregunta input[type=submit]{

              border-radius:10px;
              padding: 0.7%;

            }

            .pregunta input[type=radio]{

              font-size: 1.4em;

            }

            .pregunta a {
              border: 1px solid grey;
              border-radius: 10px;
              font-size: 1.4em;
              padding:0.5%;
              margin-left: 1%;
              background-color: royalblue;
              color: white;
            }

            .tema{
              font-size: 1.5em;
              color: blue;
            }
              */

        </style>

    </head>
    <body>
        <?php require_once "section/header.php"; ?>
        <?php require_once "section/nav.php"; ?>
        <main>

          <section>
              <h1>Preguntas por tema</h1>

              <h3>Tema elegido: <?php echo "<span class='eleccion'>$tema</span>"; ?></h3>
              <?php
              if (!isset($preg) || $preg == []) {

                  echo "<p>
                  No existen Preguntas con este tema <a href='$BASE_URL/crear-pregunta'>¿Quieres crear una pregunta?</a>
                  </p>";
              }else{
                 ?>
                    <form class="pregunta" action="<?php echo $BASE_URL ?>/temas/validar" method="get">

                          <?php
                              echo "<input type='text' value='{$preg['pregunta']}'  /> <br />";

                                foreach ($resp as $r) {
                                  echo "<input type='radio' name='resp' value='{$r['id']}'>{$r['respuesta']}<br />";
                                }
                                  
                          ?>
                          <input type="submit" value="enviar respuesta">
                          <a href="<?php echo $BASE_URL; ?>/temas/<?php echo $tema; ?>">Siguiente pregunta</a>
                          <a href="<?php echo $BASE_URL; ?>/temas">Elegir otro tema</a>

                      </form>
                  <?php } ?>
            </section>
        </main>
        <?php require_once "section/footer.php"; ?>
    </body>
</html>
