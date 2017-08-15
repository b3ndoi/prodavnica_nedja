<?php 

defined('DS')? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT','D:'. DS .'xampp'. DS .'htdocs'. DS .'generalimpressum'. DS .'admin');
defined('INCLUDES_PATH')? null : define('INCLUDES_PATH', SITE_ROOT . DS .'includes');

require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("korisnik.php");
require_once("kategorija.php");
require_once("session.php");
require_once("artikal.php");
require_once("tip.php");
require_once("paginate.php");
?>