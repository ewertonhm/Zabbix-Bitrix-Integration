<?php

require_once 'config.php';

// API START
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;
use Slim\Exception\HttpNotFoundException;
use Slim\Factory\AppFactory;

$GLOBALS['API_KEY'] = md5('dollyguaraná');

$app = AppFactory::create();

// index and root
$app->redirect('/', '/inicio.php', 301);
$app->redirect('/index.php', '/inicio.php', 301);





// get models
$app->get('/api/get_models/', function(Request $request, Response $response){
    $params = $request->getQueryParams();

    if(ApiKeysQuery::create()->filterByApiKey((string)$params['API_KEY'])->findOne() != null){
        $models = controller\Integration::getTaskModels();
        $payload = json_encode($models);

        $response->getBody()->write($payload);
    }


    return $response
        ->withHeader('content-Type', 'application/json')
        ->withHeader('Access-Control-Allow-Origin', 'http://zabbix.monitor.redeunifique.com.br')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

});

// get models
$app->post('/api/get_models/', function(Request $request, Response $response){
    $params = (array)$request->getParsedBody();

    if(ApiKeysQuery::create()->filterByApiKey((string)$params['API_KEY'])->findOne() != null){
        $models = controller\Integration::getTaskModels();
        $payload = json_encode($models);

        $response->getBody()->write($payload);
    }
    return $response
        ->withHeader('content-Type', 'application/json')
        ->withHeader('Access-Control-Allow-Origin', 'http://zabbix.monitor.redeunifique.com.br')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');

});

$app->options('/api/set_task/', function ($request, $response, $args) {
    return $response
        ->withHeader('Access-Control-Allow-Origin', 'http://zabbix.monitor.redeunifique.com.br')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withHeader('Vary', 'Origin');
});


// set task
$app->post('/api/set_task/', function(Request $request, Response $response){
    $params = (array)$request->getParsedBody();

    if(ApiKeysQuery::create()->filterByApiKey((string)$params['API_KEY'])->findOne() != null){
        $integration = new controller\Integration();

        $task = $integration->createTask($params);
        $response->getBody()->write($task);
    }
    return $response
        ->withHeader('Access-Control-Allow-Origin', 'http://zabbix.monitor.redeunifique.com.br')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
        ->withHeader('Vary', 'Origin');
});


// Catch-all route to serve a 404 Not Found page if none of the routes match
// NOTE: make sure this route is defined last
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});

$app->run();
// API END