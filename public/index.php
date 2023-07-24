<?php

declare(strict_types=1);

use Alura\Mvc\Controller\Error404Controller;
use Alura\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();
session_regenerate_id();


$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

$isLoginRoute = $pathInfo === '/login';
if(!array_key_exists('logged', $_SESSION) && !$isLoginRoute){
    header('Location: /login?sucess=0');
    return;
}

if(array_key_exists($key, $routes)){
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    
    $controller = new $controllerClass($videoRepository);
}else{
    
    $controller = new Error404Controller();
}

/** @var Controller $controller */
$controller->processaRequisicao();
