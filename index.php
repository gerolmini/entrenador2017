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

//Middleware protocolo https oscar 
$app->add(new \Slim\Middleware\SafeURLMiddleware());

// slim-basic-auth básico de autenticación
$app -> add(new \Slim\Middleware\HttpBasicAuthentication([ 
"users"=>["root"=>"root","nombre"=>"123456"]]));

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


