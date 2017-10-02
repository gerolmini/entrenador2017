
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Entrenador 2017 Estadisticas</title>
        <link rel="stylesheet" href="<?php echo $BASE_URL ?>/view/css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.bundle.js"></script>
    </head>

    <body>
        <?php require_once "section/header.php"; ?>
        <?php require_once "section/nav.php"; ?>
        
        <main>
                <div id="container" style="width: 50%;">
                    <canvas id="canvas"></canvas>
                </div>

                <script>

                    var randomScalingFactor = function() {
                        return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
                    };
                    var randomColorFactor = function() {
                        return Math.round(Math.random() * 255);
                    };
                    var randomColor = function() {
                        return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
                    };
                    var barChartData = {
                        labels: [
                            <?php
                                try {
                                $con = new PDO ("mysql:host=localhost;dbname=bd","root");
                                }
                                catch(PDOException $e)
                                    {
                                        echo "Error:".$e->getMessage();
                                        die();
                                    }

                                $sql="SELECT url from estadisticas ORDER BY `url`.`visitas`";
                                $res=$con->query($sql);

                                foreach ($res as $resultado)
                                {
                                    ?>
                                    "<?php echo $resultado['url'];?>",
                                    <?php
                                }
                            ?>

                        ],
                        datasets: [{
                            label: 'Estadisticas',
                            backgroundColor: "rgba(220,220,220,0.5)",
                            data: [
                            <?php
                                try {
                                     $con = new PDO ("mysql:host=localhost;dbname=bd","root");
                                }
                                catch(PDOException $e)
                                    {
                                        echo "Error:".$e->getMessage();
                                        die();
                                }$sql="SELECT visitas from estadisticas ORDER BY `visitas`.`url`";
                                $res=$con->query($sql);

                                foreach ($res as $resultado)
                                {
                                    ?>
                                    "<?php echo $resultado['visitas'];?>",
                                    <?php
                                }
                            ?>
                        ]
                        }]

                    };

                    window.onload = function() {
                        var ctx = document.getElementById("canvas").getContext("2d");
                        window.myBar = new Chart(ctx, {
                            type: 'bar',
                            data: barChartData,
                            options: {
                                elements: {
                                    rectangle: {
                                        borderWidth: 2,
                                        borderColor: 'rgb(0, 255, 0)',
                                        borderSkipped: 'bottom'
                                    }
                                },
                                responsive: true,
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Estadisticas visitas'
                                }
                            }
                        });

                    };

                </script>
        </main>
        <?php require_once "section/footer.php"; ?>
    </body>

</html>
