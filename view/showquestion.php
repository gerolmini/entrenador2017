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

            <section>

              <?php
                if($data ==false){
               // echo "<div class=''><p>Error al insertar los datos.</p><p>".$this->pdo->errorInfo()[2]."</p></div>";
              } else{
                echo "<h3 class='ok'>Pregunta insertada correctamente</h3>";
              }
              ?>
                <a class="sq" href="<?php echo $BASE_URL; ?>/crear-pregunta">crear nueva pregunta</a>
                <a class="sq" href="<?php echo $BASE_URL; ?>/temas ">Ir a Jugar</a>

              </section>
         </main>


            <?php require_once "section/footer.php"; ?>
        </body>
    </html>
