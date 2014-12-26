<?php
session_start();
error_reporting(E_ALL);

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, HEAD");
    header("Access-Control-Allow-Headers', 'Authorization, X-Authorization, Origin, Accept, Content-Type, X-Requested-With, X-HTTP-Method-Override");
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])){
        header("Access-Control-Allow-Methods: GET, PUT, DELETE, OPTIONS");
    }
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }
    exit(0);
}

define('DS', DIRECTORY_SEPARATOR);
require __DIR__ . DS . 'vendor' . DS . 'autoload.php';

$app = new \Slim\Slim();

$app->map('/:controller(/:action)(/:params+)', function($controller, $action = null, $params = []) use ($app){
	require __DIR__ . DS . 'config' . DS . 'bootstrap.php';

	$app->config(['debug'=> $condig['debug']]);
	
	$file_controller = __DIR__ . DS . "src" . DS . "controller" . DS . ucfirst($controller) . 'Controller.php';

	if (file_exists($file_controller)) {
		$class_name = ucfirst($controller) . 'Controller';
		require $file_controller;
		$obj = new $class_name;

		if (!$action) {
			switch ($app->request->getMethod()) {
				case 'GET':
					$action = "index";
					break;
				case 'POST':
					$action = "add";
					break;
			}
		} else {
			if(is_numeric($action)){
				switch ($app->request->getMethod()) {
					case 'GET':
						$action = "view";
						break;
					case 'PUT':
						$action = "edit";
						break;
					case 'DELETE':
						$action = "delete";
						break;
				}
			}
		}


		if (method_exists($obj, $action)) {
			$obj->request = $app->request;
			if ($config['responseType'] == 'JSON') {
				echo json_encode(call_user_func_array([$obj, $action], $params));
			}
			
		} else {
			$app->halt(404, 'Method not found');	
		}
	} else {
		$app->halt(404, 'Controller Not Found');
	}
})
->via('GET', 'POST', 'PUT', 'DELETE');

$app->run();
?>