<?php
require_once "limpiarurl.php";
use PHPUnit\Framework\TestCase;

class limpiarturlTest extends TestCase{

  public function testlimpiarURL1(){
    $a = "Ciencia Ficción";
    $res = limpiarURL($a);
    $this->assertEquals("ciencia_ficcion", $res);
  }

  public function testlimpiarURL2(){
    $a = "Matemáticas";
    $res = limpiarURL($a);
    $this->assertEquals("matematicas", $res);
  }

  public function testlimpiarURL3(){
    $a = "Ciència Ficció";
    $res = limpiarURL($a);
    $this->assertEquals("ciencia_ficcio", $res);
  }
}
?>
