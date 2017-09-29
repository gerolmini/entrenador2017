<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Entrenador 2017</title>
        <link rel="stylesheet" href="<?php echo $BASE_URL ?>/view/css/style.css">
        <style media="screen">


          section{
            width: 80%;
            margin: auto;
            height: auto;
            background-color: lightgrey;
            margin-top: 2%;
            margin-bottom: 2%;
          }
          label, input, fieldset{
            font-size: 1.2em;
            margin: 0.7em;
            padding: 0.4em;
          }
          .but{
            border-radius: 10px;
            background-color: blue;
            color: white;
            padding: 5px;
            font-size: 1em;
            margin-left: 1%;

          }


        </style>

    </head>
    <body>
    
        <?php require_once "section/header.php"; ?>
        <?php require_once "section/nav.php"; ?>
        <main>
        <datalist id="temas">
          <?php

            foreach ($tema as $fila) {
              echo "<option value='{$fila['titulo']}'>";
            }

           ?>
        </datalist>

              <section>

                    <form class="" action="<?php echo $BASE_URL; ?>/enviar-pregunta" method="get">

                    <label for="Q">Ingrese la pregunta:</label>
                    <input type="text" id="q" name="question" value="" size="120" required placeholder="Es esto un ejemplo?" autofocus><br />
                    <label for="cl">Tema:</label>
                    <input type="text" id="cl" name="tema" list="temas" value="" size="60"><br />

                    <fieldset id="resp">

                          <legend>Respuestas (solo 1 correcta)</legend>

                          <button type="button" class="but" onclick="nuevoInputRespuesta();"> | + |  </button>

                    </fieldset>

                      <button type="submit" class="but">Añadir respuesta</button>

                  </form>

            </section>

        </main>
        <script src="<?php echo $BASE_URL ?>/view/js/respuesta.js"></script>
        <?php require_once "section/footer.php"; ?>
    </body>
</html>
