<?php
/* This controller closes and destroys the session and redirects back to index.php*/


require_once("config.php");
require_once("controlAccess.php");
require_once("outputs.php");

session_start();
session_unset();
session_destroy();

header("Location: ../index.php");

?>