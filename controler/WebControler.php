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

    public function estadisticasUrl($request, $response, $args){
        $data['tema'] = $this->c->data->getTemas();
        $response = $this->c->view->render($response, "view/chart.php", $data);
        return $response;
    }

}
?>
