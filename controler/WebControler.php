<?php
class WebControler{
    private $c;

    public function __construct(Interop\Container\ContainerInterface $ci){
        $this->c = $ci;
    }

    public function cargarHome($request, $response, $args){
        $data['tema'] = $this->c->data->getTemas();
        $response = $this->c->view->render($response, "home.php", $data);
        return $response;
    }

    public function listarTemas($request, $response, $args){
        $data['tema'] = $this->c->data->getTemas();
        $response = $this->c->view->render($response, "temas.php", $data);
        return $response;
    }

    public function mostrarPreguntas($request, $response, $args){
        $nombre = $args['nombre'];
        $data = $this->c->data->getQuestion($nombre);
        $response = $this->c->view->render($response, "pregunta.php", $data);
        return $response;
    }

    public function nuevaPreguntaForm($request, $response, $args){

        $data['tema'] = $this->c->data->getTemas();
        $response = $this->c->view->render($response, "newquestion.php", $data);
        return $response;
    }

    public function crearPregunta($request, $response, $args){
        $nombre = $args['nombre'];
        $data = $this->c->data->getQuestion($nombre);
        $response = $this->c->view->render($response, "pregunta.php", $data);
        return $response;
    }
}
?>
