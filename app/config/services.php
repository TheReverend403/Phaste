<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;

// https://stackoverflow.com/a/2510540
function format_bytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

$di->set('config', function() use ($config) {
    return $config;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config)
{
    $url = new UrlResolver();
    $url->setBaseUri($config->app->host);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config)
        {

            $volt = new VoltEngine($view, $di);

            if ($config->dev->debug)
            {
                array_map('unlink', glob($config->application->cacheDir . '*.php'));
            }

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_',
                'compiledAlways' => $config->dev->debug
            ));

            $compiler = $volt->getCompiler();
            $compiler->addFunction('strtotime', 'strtotime');
            $compiler->addFunction('fmt_bytes', 'format_bytes');
            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config)
{
    return new DbAdapter($config->database->toArray());
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function ()
{
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function ()
{
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
* add routing capabilities
*/
$di->set('router', function ()
{
    require 'routes.php';
    return $router;
});

$di->set('flash', function ()
{
    $flash = new FlashSession(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));
    return $flash;
});

$di->set('dispatcher', function()
{
    $eventsManager = new \Phalcon\Events\Manager();

    $eventsManager->attach("dispatch:beforeException", function($event, $dispatcher, $exception)
    {
        if ($exception instanceof \Phalcon\Mvc\Dispatcher\Exception)
        {
            $dispatcher->forward(array(
                'controller' => 'error',
                'action' => 'e404'
            ));
            return false;
        }

        $dispatcher->forward(array(
            'controller' => 'error',
            'action' => 'e500'
        ));
        return false;
    });

    $dispatcher = new \Phalcon\Mvc\Dispatcher();

    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;

}, true);

$di->set('modelsCache', function ()
{
    $frontCache = new FrontendData(array(
        "lifetime" => 172800
    ));

    $cache = new BackendMemcache($frontCache, array(
        "host" => "localhost",
        "port" => "11211"
    ));

    return $cache;
});
