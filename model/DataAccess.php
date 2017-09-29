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
        $sql = "SELECT respuesta from respuestas  WHERE pregunta = {$preg['id']};";
        $res = $this->pdo->query($sql);
        $resp= $res->fetchAll();
      return ["preg"=>$preg, "resp"=>$resp];
    }
}
?>
