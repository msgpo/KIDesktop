<?php
ini_set("display_errors", "on");
error_reporting(E_ERROR | E_PARSE | E_WARNING);
date_default_timezone_set("Europe/Berlin");

if(isset($_GET["fw_goto"])) {
	define("rewriteLinks", false);
	define("baseHref", "");
}

define('projectPath', dirname(__FILE__));
include './fastfw3/class.fastfw.php';

define('HTML_CHARACTERSET', 'utf-8');

define('tpl_main', 'main/tpl.main.php');

$FW = new fastfw();
include libPath.'/inc.init.php';
$FW->setDevelop(true, ''); // if you have tidy installed and accessable, set second parameter to "tidy"
$res = $FW->run();
if(!isset($nooutput)) {
	echo $res;
}

?>