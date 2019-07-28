<?php
/*** My Marks controller will manage the display of marks obtained by the student***/

// requiring controllers and model
require_once("config.php");
require_once("controlAccess.php");
require_once("../models/myMarksModel.php");

// This function will retireve the data to be shown in the My Marks page.
function marksData($idNumber){
		
	// Creating a data base helper which is an instance of MyMarksModel class
	$dbh = new MyMarksModel();
	
	// Storing the state of the connection in a variable, to check if it is on.
	$checkConn = $dbh->connect(HOST,USER,PASSWORD,DB_NAME); 
	
	// If the connection with the database is off require code from "myMarksErrorView.php" which manages errors.
	if($checkConn == false){
		$errMessage = 'Data base connection failed!';
		require("../views/myMarksErrorView.php");
	}
	
	// Otherwise,(the connection is on)
	else{
		// store user data in a variable
		$userData = $dbh->getUserData($idNumber);
		$retrieveMarksData = $dbh->retrieveMarksData($idNumber);
//print "<pre>";
//var_dump($retrieveMarksData);
//print "</pre>";
		require("../views/myMarksView.php");
		
	}
}

marksData($id);
