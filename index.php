<?php
require_once "vendor/autoload.php";
require_once "controler/load.php";
require_once "model/load.php";
require_once "config.php";

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);

$app = new Slim\App($c);

//Dependencias
$c = $app->getContainer();
$c['view'] = function(){
    global $c;
    $renderer = new Slim\Views\PhpRenderer('view');
    $renderer->addAttribute("BASE_URL", $c->get('request')->getUri()->getBasePath());
    return $renderer;
};
    //nombre interno
$c['data'] = function(){
    global $db;
    $dataAccess = new DataAccess($db);
    return $dataAccess;
};

//URLs
$app->get("/", "\WebControler:cargarHome");
$app->get("/temas", "\WebControler:listarTemas");
$app->get("/temas/validar", "\WebControler:validar");
$app->get("/temas/{nombre}", "\WebControler:mostrarPreguntas");
$app->get("/crear-pregunta", "\WebControler:nuevaPreguntaForm");
$app->get("/enviar-pregunta", "\WebControler:crearPregunta");


$app->run();
?>
