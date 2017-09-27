<?php 
ob_start(); 
header("Content-type: text/javascript"); 

// Creamos la conexion 
require_once "config.php";
/* Establecer la conexión con el SGBD */
try{
    $conexion = new PDO("{$db['type']}:host={$db['host']};port={$db['port']}", $db['user'], $db['pass']);
    echo "<li>Conexión con el SGBD: <span class='ok'>OK</span></li>";
}catch(PDOException $e){
    echo "<li>Conexión con el SGBD: <span class='err'>ERROR</span></li>";
}

// Obtenemos, y validamos url 
$url = $_SERVER['HTTP_REFERER']; 
if (!$url || $url == '') { 
    die(); 
} 

// Obtenemos los datos de la bd 
$sql = "SELECT `entrenador2015` FROM `visitas` WHERE `url`='$url'"; 
$query = mysqli_query($con, $sql); 
$row = mysqli_fetch_assoc($query); 

// creamos las querys verificando primero las cookies, para contar visitas y no impresiones
if (isset($_COOKIE[md5($url)])) { 
    // cuando si existe la cookie solo le damos el valor a $visitas
    $visitas = $row['visitas']; 
    echo "document.write($visitas);"; 
} elseif (!isset($_COOKIE[md5($url)])) { 
    // Comprobamos si la url ya esta en la bd 
    $rows = mysqli_num_rows($query); 
    if ($rows > 0) { 
        // Cuando si existe la url actualizamos 
        $SQL = "UPDATE `entrenador2015` SET `visitas`=visitas+1 WHERE `url`='$url'";
        if (mysqli_query($con, $SQL)) { // Si se inserta la visita
            $visitas = ($row['visitas']) + (1); // Le sumamos uno para mostrar la visita actual
            echo "document.write($visitas);"; 
            setcookie(md5($url), '_vStD', time() + 86400); // Y creamos la cookie de 1 dia
        } else { // Si no se inserta la visita 
            $visitas = $row['visitas']; // Solo obtenemos las visitas
            echo "document.write($visitas);"; 
        } 
    } elseif ($rows == 0) { 
        // Cuando no existe la url en la bd la insertamos 
        $SQL = "INSERT INTO `entrenador2015` (`url`,`visitas`) VALUES ('$url',1)";
        if (mysqli_query($con,$SQL)) { // Si se inserta la nueva url
            echo "document.write(1);"; 
            setcookie(md5($url), '_vStD', time() + 86400); // Y creamos la cookie de 1 dia
        } else { // Si no se inserta  
            echo "document.write(0);"; 
        } 
    } 
} 

// Por ultimo cerramos la conexion, y matamos el script 
ob_end_flush(); 
mysqli_close($con); 
die(); 
?>

<!--  Visitas: <script src="../estadisticas/stats.php"></script> -->