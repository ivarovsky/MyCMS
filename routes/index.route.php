<?php
$route->get('/', function() 
{

//	$lang=site_lang("");
	obj::View('index',['lang'=>[]]);

});