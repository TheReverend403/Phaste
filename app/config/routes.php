<?php

use Phalcon\Mvc\Router;

$router = new Router();

$router->add(
    "/",
    array(
        "controller" => "index",
        "action"     => "index",
    )
);

$router->add(
    "/v/",
    array(
        "controller" => "index",
        "action"     => "index",
    )
);

$router->add(
    "/v/([a-zA-Z0-9]{1,12})",
    array(
        "controller" => "view",
        "action"     => "show",
        "id"     => 1,
    )
);

$router->add(
    "/v/([a-zA-Z0-9]{1,12})/raw",
    array(
        "controller" => "view",
        "action"     => "show",
        "id"     => 1,
        "raw"    => true,
    )
);

return $router;
