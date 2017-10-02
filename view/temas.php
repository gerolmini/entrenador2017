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

            <section>
                  <h2 id="t">Escoge el tema:</h2>
                  <ul class="tema">
                    <?php
                        foreach ($tema as $fila) {
                            echo "<li><a href='temas/{$fila['titulo_url']}'>{$fila['titulo']}</a></li>";
                        }
                    ?>
                    </ul>

            </section>
        </main>
        <?php require_once "section/footer.php"; ?>
    </body>
</html>
