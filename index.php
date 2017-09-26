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

//Middleware protocolo https oscar *ignacio
$app->add(new \Slim\Middleware\SafeURLMiddleware());

//Dependencias
$c = $app->getContainer();
$c['view'] = function(){
    global $c;
    $renderer = new Slim\Views\PhpRenderer('view');
    $renderer->addAttribute("BASE_URL", $c->get('request')->getUri()->getBasePath());
    return $renderer;
};

$c['data'] = function(){
    global $db;
    $dataAccess = new DataAccess($db);
    return $dataAccess;
};

//URLs
$app->get("/", "\WebControler:cargarHome");

$app->run();
?>


