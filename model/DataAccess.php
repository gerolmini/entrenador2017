<?php

class DataAccess{
    private $pdo;

    public function __construct($db){
        $this->pdo = new PDO("{$db['type']}:host={$db['host']};port={$db['port']};dbname={$db['name']}", $db['user'], $db['pass']);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getTemas(){
        $sql = "select * from temas;";
        $res = $this->pdo->query($sql);
        return $res->fetchAll();
    }
    public function getQuestion($nombre){

        //Obtener el id minimo y maximo entre los id que cumplen con la condicion (titulo_url=$nombre y t.id = p.tema)
        $sql = "SELECT MIN(p.id) as 'mini', MAX(p.id) as 'maxi' from temas t, preguntas p WHERE t.titulo_url = '$nombre' AND t.id = p.tema;";
        $res = $this->pdo->query($sql);
        $idrango = $res->fetch();

        //Selecciona id al azar
        $id = rand($idrango['mini'], $idrango['maxi']);

        //Seleccion de la pregunta que corresponde al id anterior
        $sql = "SELECT id, pregunta from preguntas  WHERE  id = $id;";
        $res = $this->pdo->query($sql);
        $preg = $res->fetch();

        //Seleccion de las respuestas que contiene la pregunta anterior
        $sql = "SELECT id, respuesta from respuestas  WHERE pregunta = {$preg['id']};";
        $res = $this->pdo->query($sql);
        $resp= $res->fetchAll();


      return ["preg"=>$preg, "resp"=>$resp];

    }

    public function validar($id){

      $sql = "SELECT verdadera from respuestas  WHERE id = {$id};";
      $res = $this->pdo->query($sql);

      return $res->fetch();
    }

    public function newQuestion($tema, $preg, $resp, $vof){
      $temaurl= strtolower($tema);
      //insertar tema
      $sql = "INSERT INTO temas(titulo, titulo_url)
              VALUES ('$tema', '$temaurl');";

          $res = $this->pdo->exec($sql);

        if($res===false){
        echo "<div class=''><p>No se han podido insertar los datos.</p><p>".$this->pdo->errorInfo()[2]."</p></div>";
      }
      //extraer id para insertar en tabla preguntas columna tema
      $sql = "SELECT id FROM temas WHERE titulo = '$tema'";

          $res = $this->pdo->query($sql);

          $idtema = $res->fetch()['id'];
      //insertar pregunta e id del tema
      $sql = "INSERT INTO preguntas(pregunta, tema)
              VALUES ('$preg', $idtema)";

              $res = $this->pdo->exec($sql);

          if($res===false){
          echo "<div class=''><p>No se han podido insertar los datos.</p><p>".$this->pdo->errorInfo()[2]."</p></div>";
        }

      //Extraer id de pregunta para insertar en respuestas
      //$sql = "SELECT id FROM preguntas WHERE tema = '$tema'";
      $sql = "SELECT max(id) AS id FROM preguntas;";

          $res = $this->pdo->query($sql);
          $idpreg = $res->fetch()['id'];

      //insertar respuestas
      foreach ($resp as $i=>$value) {
        $correcta = ($i==$vof)?1:0;
        $sql = "INSERT INTO respuestas(respuesta, verdadera, pregunta)
                VALUES('$value', $correcta, {$idpreg})";
        $res = $this->pdo->exec($sql);

        if($res===false){
        echo "<div class=''><p>No se han podido insertar los datos.</p><p>".$this->pdo->errorInfo()[2]."</p></div>";
      }
      }

        return $res;
    }
}
?>
