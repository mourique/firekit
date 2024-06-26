<?php

define("KIRBY_HELPER_DUMP", false); // dump() is set by Laravel Herd

use Kirby\Cms\App;

//define("KIRBY_HELPER_ATTR", false); // attr is set by tailwind-merge

$base = dirname(__DIR__ ); // this should not have to have a path here?

require $base . '/kirby/bootstrap.php';
require $base . '/vendor/autoload.php';

$kirby = new App([
	'roots' => [
		'index'    => __DIR__,
		'base'     => $base,
		'site'     => $base . '/site',
		'data'     => $data = $base . '/data',
		'content'  => $data . '/storage/content',
		'accounts' => $data . '/storage/accounts',
		'license'  => $data . '/storage/.license',
		'cache'    => $data . '/runtime/cache',
		'logs'     => $data . '/runtime/logs',
		'sessions' => $data . '/runtime/sessions',
	]
]);

echo $kirby->render();