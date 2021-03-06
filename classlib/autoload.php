<?php
// Report all PHP errors
error_reporting(E_ALL);

if (!defined('CLASSLIB_DIR')) define('CLASSLIB_DIR',dirname(realpath(__FILE__)).'/');

function __autoload($classname) {
	if (class_exists($classname,false)) return;

	$file = strtr($classname,"\\","/").".php";
	if (is_readable(CLASSLIB_DIR.$file)) {
		require_once(CLASSLIB_DIR.$file);
	} else {
		require_once($file);
	}
	if (method_exists($classname,'__init')) $classname::__init();
}

// Some hard coding...
//define("ENDIANNESS", (pack("d", 1) === "\77\360\0\0\0\0\0\0" ? 0x00 : 0x01));
if (!defined("PMIMPORTER_VERSION")) define("PMIMPORTER_VERSION","2.0dev0-unknown");

//if(version_compare("5.6.0", PHP_VERSION) > 0)
//	die("PHP Version >5.6.0 required - (Using ".PHP_VERSION.")\n");
if(php_sapi_name() !== "cli") die("Must run on CLI API php version\n");

// Other stuff that we want to pre-load...
//require_once(CLASSLIB_DIR."pmimporter/Blocks.php");
//\pmimporter\Blocks::__init();
//require_once(CLASSLIB_DIR."pmimporter/Entities.php");
//\pmimporter\Entities::__init();
define('PM_MAX_HEIGHT',128);
define('PM_HEIGHT_BITS',7);
