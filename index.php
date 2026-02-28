<?php 
require('./classes/base.php');


$app            = System\App::instance();
$app->request   = System\Request::instance();
$app->route     = System\Route::instance($app->request);


$route=$app->route;
    $dir      = new RecursiveDirectoryIterator("./routes/");
    $iterator = new RecursiveIteratorIterator($dir);
    
	foreach ($iterator as $file) 
		{
        $fname = $file->getFilename();
		if (str_contains($fname, '.route.php')) require($file->getPathname());
		}

$route->end();
