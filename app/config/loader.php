<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir
    )
)->register();

$router = new Phalcon\Mvc\Router();

$router->add(
    "/v/",
    array(
        "controller" => "index",
        "action"     => "index",
    )
);

$router->add(
    "/v/:params",
    array(
        "controller" => "view",
        "action"     => "index",
    )
);

$router->handle();
