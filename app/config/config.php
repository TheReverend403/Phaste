<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

$app_config_file = APP_PATH . '/config.ini';
$app_config = new \Phalcon\Config\Adapter\Ini($app_config_file);

$config = new \Phalcon\Config(array(
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'cacheDir'       => APP_PATH . '/app/cache/'
    )
));

$config->merge($app_config);
return $config;
