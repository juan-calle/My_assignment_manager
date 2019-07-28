<?php
/*** Events controller will manage the creation of new deadlines***/

// requiring controllers and model
require_once("config.php");
require_once("controlAccess.php");
require_once("../models/EventsModel.php");

// Defining constants (tasks)
define("SHOW_FORM",0);
define("CREATE_EVENT",1);

// If $_POST['task'] is empty, create a variable $task equals to SHOW_DATA constant.
if (empty($_POST['task'])){
	$task = SHOW_FORM;
}

// Otherwise, set the value of $_POST['task'] = to 0 or 1.
else{
	$task = $_POST['task'];
}

// If the task is:
switch($task){
	
	// SHOW_FORM: call the function showData() and pass $id as a parameter.
	case SHOW_FORM:
		// $id comes from controlAccess controller.
		showform($id);
	break;
	
	case CREATE_EVENT:
		createEvent($id);
	break;
		
	default:
		// display404()
	break;
}

// This function will retireve the data to be shown in the Events page.
function showForm($idNumber){
		
	// Creating a data base helper which is an instance of EventsModel class
	$dbh = new EventsModel();
	
	// Storing the state of the connection in a variable, to check if it is on.
	$checkConn = $dbh->connect(HOST,USER,PASSWORD,DB_NAME); 
	
	// If the connection with the database is off require code from "eventsErrorView.php" which manages errors.
	if($checkConn == false){
		$errMessage = 'Data base connection failed!';
		require("../views/eventsErrorView.php");
	}
	
	// Otherwise,(the connection is on)
	else{
		// store user data in a variable
		$userData = $dbh->getUserData($idNumber);
		require("../views/eventsView.php");
		
	}
}

function createEvent($idNumber){
	// This function has not been created yet due to a lack of time but I will keep working on this project after submission.
}