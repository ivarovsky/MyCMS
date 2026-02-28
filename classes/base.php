<?php
error_reporting(1);
session_start();
ini_set('display_errors', 1);
DEFINE("version","0.1");
DEFINE("protocol","https://");
DEFINE("host",protocol."{$_SERVER['SERVER_NAME']}/");

DEFINE("shost",".{$_SERVER['SERVER_NAME']}/");
DEFINE("defaultlang","ua");
DEFINE("serverfolder","/var/www/");
DEFINE("basefolder",serverfolder);//ATENTION!
DEFINE("tmp",serverfolder."tmp/");
DEFINE("doctype","<!DOCTYPE html>");

DEFINE('viewsfolder',basefolder."views/"); //Views Folder
DEFINE('languagefolder',basefolder."language/"); //Views Folder
DEFINE('routesfolder',basefolder."routes/"); //Routes Folder
DEFINE("classesfolder", serverfolder."classes"); //Classes Folder



$mainSite="mycms.ivarovsky.com"; //Enter Your domain name HERE


		/*require_once("{classesfolder}/database/rb-mysql.php");
	R::setup( 'mysql:host=localhost;dbname=db_name', 'login', 'password' );
	R::ext('xdispense',function($type){return R::getRedBean()->dispense($type);});
	R::freeze( true );*/
	
	/*KERNEL*/
	require_once(classesfolder."/kernel/obj.class.php");
	require_once(classesfolder."/kernel/strings.class.php");
	require_once(classesfolder."/kernel/nezamy/route/system/startup.php");
	/*KERNEL*/
	
function site_lang($language = defaultlang)
	{
	    $lan = $_SESSION['language'] ?? $language ?? 'ua';
	
	    
	    if ($lan == 1) $lan = 'ua';
	    if ($lan == 2) $lan = 'en';
	
		// якщо потрібно — підкоригуй шлях
	    $file = languagefolder . $lan . '.lang.php';
	
	    if (!file_exists($file)) {
	        $file = languagefolder . 'en.lang.php';
	    }
	
	    require_once $file;
	
	    return $lang ?? null;
	}
	function set_language($lang)
{
    $allowed = ['ua', 'en', 'pl'];

    $_SESSION['language'] = in_array($lang, $allowed) ? $lang : 'ua';

    echo json_encode(['succ' => 1]);
}
function get_language_id()
{
	if(isset($_SESSION['language'])) return $_SESSION['language'];
	else return set_language("ua");
}
function str_contains($haystack,$needle)
{
	if (strpos($haystack, $needle) !== false) return 1;
	else return false;
}
	function kyiv_date()
	{
		$zone=new \DateTimeZone('Europe/Kiev');
		$date=new \DateTime('now', $zone);
		return $date->format('Y-m-d H:i');
	}