<?php
namespace AHT\Webroot;

use AHT\Config\Database;
use AHT\Dispatcher;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT. 'vendor/autoload.php');
require(ROOT. 'Config/core.php');
require(ROOT . 'router.php');
require(ROOT . 'request.php');
require(ROOT . 'dispatcher.php');

new Database;

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>