<?php
session_start();
error_reporting(E_ALL);

require dirname(__DIR__) . '/config/bootstrap.php';

use Mayhem\Routing\Dispatcher;
use Mayhem\HTTP\CORS;

CORS::getCors();
Dispatcher::dispatch($config);

?>