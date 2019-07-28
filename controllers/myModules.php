<?php
/*** myModules controller will manage the info of the modules teached by the teacher logged in***/

// requiring controllers and model
require_once("config.php");
require_once("controlAccess.php");
require_once("../models/myModulesModel.php");

// This function will retireve the data to be shown to the user within its profile.
function showData($idNumber){
	
	// This variable will hold the current hour in a 24h format HH:MM:SS
	$currentHour = date("H:i");
	
	// Creating a data base helper which is an instance of ProfileModel class
	$dbh = new myModulesModel();
	
	// Storing the state of the connection in a variable, to check if it is on.
	$checkConn = $dbh->connect(HOST,USER,PASSWORD,DB_NAME); 
	
	// If the connection with the database is off require code from "profileErrorView.php" which manages errors.
	if($checkConn == false){
		$errMessage = 'Data base connection failed!';
		require("../views/myModulesErrorView.php");
	}
	
	// Otherwise,(the connection is on)
	else{
		// store user data in a variable
		$userData = $dbh->getUserData($idNumber);
		$retrieveModulesData = $dbh->retrieveModulesData($idNumber);
		//var_dump($retrieveStudentData[0]);
		require("../views/myModulesView.php");
		
	}
}
showData($id);
?>