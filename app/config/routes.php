<?php

use Phalcon\Mvc\Router;

$router = new Router();

$router->addGet(
    "/",
    array(
        "controller" => "index",
    )
);

$router->addPost(
    "/new",
    array(
        "controller" => "new",
    )
);

// Covers /v/ and /view/
$router->addGet(
    "/v(iew)?/([a-zA-Z0-9]{1,13})",
    array(
        "controller" => "view",
        "id"     => 2 // ([a-zA-Z0-9]{1,13})
    )
);

$router->addGet(
    "/v(iew)?/([a-zA-Z0-9]{1,13})/raw",
    array(
        "controller" => "view",
        "action" => "raw",
        "id"     => 2 // ([a-zA-Z0-9]{1,13})
    )
);

$router->removeExtraSlashes(true);
return $router;
