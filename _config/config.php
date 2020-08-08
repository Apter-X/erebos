<?php
//--------------------------//
//      ERRORS             //
//------------------------//
error_reporting(E_ALL);
ini_set('display_errors', true);

//--------------------------//
//      SESSIONS           //
//------------------------//
ini_set('session.cookie_lifetime',false);
session_start();

// ini_set("SMTP", "https://localhost");
// ini_set("smtp_port", "465");

//--------------------------//
//      Constants           //
//------------------------//

//paths
define("PATH_REQUIRE",substr($_SERVER['SCRIPT_FILENAME'], 0, -9));//inclusion php
define("PATH",substr($_SERVER['PHP_SELF'], 0 , -9));//pour les images et les fichiers

//website information 
define("WEBSITE_TITLE","Erebos");
define("WEBSITE_NAME", "Erebos");
define("WEBSITE_URL", "https://erebos.com");
define("WEBSITE_DESCRIPTION", "Hack Simulator");
define("WEBSITE_KEYWORDS", "");
define("WEBSITE_LANGUAGE", "");
define("WEBSITE_AUTHOR", "RAIHANI ILIASS");
define("WEBSITE_AUTHOR_MAIL", "zorbgame@gmail.com");

//facebook open graph tags
define("WEBSITE_FACEBOOK_NAME", "");
define("WEBSITE_FACEBOOK_DESCRIPTION", "");
define("WEBSITE_FACEBOOK_URL", "");
define("WEBSITE_FACEBOOK_IMAGE", "");

//db informations
define("DB_HOST", "localhost");
define("DB_NAME", "erebos");
define("DB_USER", "root");
define("DB_PASS", "");

//language 
define("DEFAULT_LANGUAGE","en");