<?php
session_start();

//db informations
define("DB_HOST", "localhost");
define("DB_NAME", "erebos");
define("DB_USER", "root");
define("DB_PASS", "");


// include_once 'classes/Autoloader.php';
// Autoloader::load();

include_once 'classes/Core.php';
include_once 'classes/Erebos.php';
include_once 'classes/Desktop.php';
include_once 'classes/Command.php';