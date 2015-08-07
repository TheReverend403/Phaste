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

$router->addGet(
    "/v/([a-zA-Z0-9]{1,13})",
    array(
        "controller" => "view",
        "slug"     => 1,
    )
);

$router->addGet(
    "/v/([a-zA-Z0-9]{1,13})/raw",
    array(
        "controller" => "view",
        "slug"     => 1,
        "raw"    => true,
    )
);

$router->addGet(
    "/view/([a-zA-Z0-9]{1,13})",
    array(
        "controller" => "view",
        "slug"     => 1,
    )
);

$router->addGet(
    "/view/([a-zA-Z0-9]{1,13})/raw",
    array(
        "controller" => "view",
        "slug"     => 1,
        "raw"    => true,
    )
);

$router->removeExtraSlashes(true);
return $router;
