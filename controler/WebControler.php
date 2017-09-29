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
        $data['tema']= $nombre;
        $response = $this->c->view->render($response, "pregunta.php", $data);
        return $response;
    }

    public function validar($request, $response, $args){

      $id = $request->getQueryParam('resp');
      $data['verdadera'] = $this->c->data->validar($id)['verdadera'];
      $response = $this->c->view->render($response, "respuesta.php", $data);
      return $response;

    }

    public function nuevaPreguntaForm($request, $response, $args){

        $data['tema'] = $this->c->data->getTemas();
        $response = $this->c->view->render($response, "newquestion.php", $data);
        return $response;
    }

    public function crearPregunta($request, $response, $args){

        $correcta = $request->getQueryParam('correcta');
        $tema = $request->getQueryParam('tema');
        $preg = $request->getQueryParam('question');
        $resp = $request->getQueryParam('respuestas');
        //$data = [$correcta, $tema, $preg, $resp];

        $data[] = $this->c->data->newQuestion($tema, $preg, $resp, $correcta);
        $response = $this->c->view->render($response, "showquestion.php", $data);
        return $response;
    }
}
?>
