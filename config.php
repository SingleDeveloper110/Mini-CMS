<?php
require_once("functions.php");
session_start();

// Constract Variables
define("URL_SITE", $_SERVER["HTTP_HOST"]);
define("DB_NAME", "mini-cms");
define("DB_HOST", "localhost");
define("DB_PASS", "");
define("DB_USER", "root");