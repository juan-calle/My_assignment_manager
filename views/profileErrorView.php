<?php

require_once("../controllers/config.php");
require_once("../controllers/outputs.php");

// This function makes sure to retrieve an error if the connection with the database was not possible. It is called by the controller "profile.php"
	
	printHeader("Profile Page");
	echo error($errMessage);
	printFooter();

?>