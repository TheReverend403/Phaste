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
    ),
    'highlight_languages' => array(
		'auto' => 'Autodetect',
		'apache' => 'Apache',
		'bash' => 'Bash',
		'coffeescript' => 'CoffeeScript',
		'cpp' => 'C++',
		'cs' => 'C#',
		'css' => 'CSS',
		'diff' => 'Diff',
		'json' => 'JSON',
		'xml' => 'HTML/XML',
		'http' => 'HTTP',
		'ini' => 'INI',
		'java' => 'Java',
		'javascript' => 'JavaScript',
		'makefile' => 'Makefile',
		'markdown' => 'Markdown',
		'nginx' => 'Nginx',
		'objectivec' => 'Objective-C',
		'php'  => 'PHP',
		'none' => 'Plain Text',
		'python' => 'Python',
		'ruby' => 'Ruby',
		'sql' => 'SQL'
	)
));

$config->merge($app_config);
return $config;
