<?php

use Phalcon\Mvc\Router;

$router = new Router();

$router->addGet(
    "/",
    array(
        "controller" => "index",
        "action"     => "index",
    )
);

$router->addPost(
    "/new",
    array(
        "controller" => "new",
        "action"     => "index",
    )
);

$router->addGet(
    "/v",
    array(
        "controller" => "index",
        "action"     => "index",
    )
);

$router->addGet(
    "/v/([a-zA-Z0-9]{1,13})",
    array(
        "controller" => "view",
        "action"     => "show",
        "id"     => 1,
    )
);

$router->addGet(
    "/v/([a-zA-Z0-9]{1,13})/raw",
    array(
        "controller" => "view",
        "action"     => "show",
        "id"     => 1,
        "raw"    => true,
    )
);

$router->addGet(
    "/view",
    array(
        "controller" => "index",
        "action"     => "index",
    )
);

$router->addGet(
    "/view/([a-zA-Z0-9]{1,13})",
    array(
        "controller" => "view",
        "action"     => "show",
        "id"     => 1,
    )
);

$router->addGet(
    "/view/([a-zA-Z0-9]{1,13})/raw",
    array(
        "controller" => "view",
        "action"     => "show",
        "id"     => 1,
        "raw"    => true,
    )
);

$router->removeExtraSlashes(true);
return $router;
