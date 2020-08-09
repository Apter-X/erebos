<?php
session_start();
$_SESSION['user'] = (isset($_GET['user'])) ? $_GET['user'] : 0;

//db informations
define("DB_HOST", "localhost");
define("DB_NAME", "erebos");
define("DB_USER", "root");
define("DB_PASS", "");

include_once 'classes/Core.php';
include_once 'classes/Erebos.php';