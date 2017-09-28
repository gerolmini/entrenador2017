<?php
/**
 * A Slim 3 middleware to redirect an HTTP URL to an HTTPS URL.
 *
 * @author      Anonimus MOD 3 <anonimo@anonimo.com>
 * @copyright   Curso Desarrollo web MOD 3
 * @link        https://github.com/toyouthat/entrenador2017/visitas-url-middleware
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @version     1.0
 */
namespace Slim\Middleware;


class StatsMiddleware
{

    public function __invoke($request, $response, $next){
        // informacion de la url de $request
        $url=$request->getUri();
        $url=$url->getPath();
         try{
            $con = new PDO('mysql:host=localhost;dbname=bd', "root");
        }catch(PDOException $e){
            echo "<div class='error'>".$e->getMessage()."</div>";
            die();
          }
        $sql="SELECT * FROM estadistica WHERE visitas ='$url'";
        $res=$con->query($sql);
        foreach($res as $fila)
        {
          $contador=$fila['visitas'];
         $contador++;
        }
         $sql= "UPDATE `estadistica` SET `visitas` = '$contador' WHERE `estadistica`.`visitas` = '$url';";
        $res=$con->exec($sql);
    
        //die();
        return $next($request, $response);
    }
}

?>