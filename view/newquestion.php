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

        <datalist id="temas">
          <?php

            foreach ($tema as $fila) {
              echo "<option value='{$fila['titulo']}'>";
            }

           ?>
        </datalist>

              <section>

                    <form class="newq" action="<?php echo $BASE_URL; ?>/enviar-pregunta" method="post">

                    <label for="Q">Ingrese la pregunta:</label>
                    <input type="text" id="q" name="question" value="" required placeholder="Es esto un ejemplo?" autofocus><br />
                    <label for="cl">Tema:</label>
                    <input type="text" id="cl" name="tema" list="temas" value=""  required> <br />

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
