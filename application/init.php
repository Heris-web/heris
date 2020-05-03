<?php


define("HOST", "localhost");
define("DBNAME", "heris");
define("USER", "root");
define("PASS", "");
define("SITE", "http://localhost/heris/public");
define("SESS", md5("herisstore"));


require_once "../application/libraries/database.php";
require_once "../application/libraries/session.php";
require_once "../application/libraries/standard.php";

require_once "../application/core/app.php";
require_once "../application/core/controller.php";
require_once "../application/core/model.php";


?>
