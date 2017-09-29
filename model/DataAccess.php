<?php
/**
* Una clase es un concepto OOP (Object Oriented Programming).
*
* @param class es un concepto OOP (Object Oriented Programming), y PHP es un lenguaje de procedimiento y OOP amigable.
* @param private  A los miembros declarados como 'private' únicamente se puede acceder desde la clase que los definió.
*
*/
class DataAccess{
    private $pdo;
    /**
    * Crea una instancia de PDO para representar una conexión a la base de datos.
    *
    * @param __construct Abre una nueva conexión al servidor de MySQL
    * @param PDO Define interfaz para acceder a bases de datos
    *
    */
    public function __construct($db){
        $this->pdo = new PDO("{$db['type']}:host={$db['host']};port={$db['port']};dbname={$db['name']}", $db['user'], $db['pass']);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    /**
    * Función que realiza consulta a la Base de Datos
    *
    * @param int $sql variable donde se guarda la consulta a la BBDD
    * @return int[] $res Devuelve un array que contiene todas las filas del conjunto de resultados
    *
    */
    public function getTemas(){
        $sql = "select * from temas;";
        $res = $this->pdo->query($sql);
        return $res->fetchAll();
    }

}
?>
