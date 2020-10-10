<?php
require_once "database/MySqlConnection.php";

define ('BASE_DIR', "http://127.0.0.1/web/");
define ('CONTROLLERS_DIR', "controllers/");
define ('DEFAULT_CONTROLLER', "Home");
define ('DEFAULT_ACTION', "showHome");

define ('DB_USER', "root");
define ('DB_HOST', "127.0.0.1");
define ('DB_PASSWORD', "");
define ('DB_NAME', "db_bloodproject");

$database = new MySqlConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$database->connect();