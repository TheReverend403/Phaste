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
    // Add anything here as long as it's listed in https://cdnjs.com/libraries/highlight.js/
    'highlight_languages' => array(
		'auto' => 'Autodetect',
		'armasm' => 'ARM ASM',
		'apache' => 'Apache',
		'bash' => 'Bash',
		'coffeescript' => 'CoffeeScript',
		'cmake' => 'CMake',
		'cpp' => 'C++',
		'cs' => 'C#',
		'css' => 'CSS',
		'diff' => 'Diff',
		'dns' => 'DNS Zone File',
		'erlang' => 'Erlang',
		'fortran' => 'Fortran',
		'haskell' => 'Haskell',
		'json' => 'JSON',
		'xml' => 'HTML/XML',
		'http' => 'HTTP',
		'ini' => 'INI',
		'java' => 'Java',
		'javascript' => 'JavaScript',
		'kotlin' => 'Kotlin',
		'lua' => 'Lua',
		'makefile' => 'Makefile',
		'markdown' => 'Markdown',
		'matlab' => 'Matlab',
		'nginx' => 'Nginx',
		'objectivec' => 'Objective-C',
		'perl' => 'Perl',
		'php'  => 'PHP',
		'none' => 'Plain Text',
		'python' => 'Python',
		'ruby' => 'Ruby',
		'rust' => 'Rust',
		'sql' => 'SQL',
		'tcl' => 'Tcl',
		'vbnet' => 'VB.net',
		'vim' => 'Vim',
		'x86asm' => 'x86 ASM'
	)
));

$config->merge($app_config);
return $config;
