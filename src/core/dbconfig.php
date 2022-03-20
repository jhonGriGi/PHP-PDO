<?php 
require ('../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

define("DB_DRIVER", $_ENV['DDBB_DRIVER']);
define("DB_HOST", $_ENV['DDBB_HOST']);
define("DB_NAME", $_ENV['DDBB_NAME']);
define("DB_USER", $_ENV['DDBB_USER']);
define("DB_PASS", $_ENV['DDBB_PASSWORD'])
?>