<?php declare(strict_types=1);

# this is a security issue, we need to only accept the access from our client here
# but as long as we don't know the client, we need the *
header('Access-Control-Allow-Origin: *');

require_once 'autoloader.php';
require_once './router.php';

$router = new Router();
echo $router->load();