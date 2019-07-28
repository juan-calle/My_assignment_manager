<?php
// Connection with database through PDO

// Requiring the outputs controller
require_once("outputs.php");

// Trying and catching exceptions during the connection process
try{
	$handle = new PDO('mysql:host=localhost;dbname=saeDB','root','root');
	$handle -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
catch(PDOexception $e){
	die('Connection with Database Failed');
}

?>
