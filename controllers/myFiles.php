<?php
/*** My Files controller will manage the the view and download of files uploaded by the student***/

// requiring controllers and model
require_once("config.php");
require_once("controlAccess.php");
require_once("../models/myFilesModel.php");

// Defining constants (tasks)
define("FILE_DATA",0);
define("DOWNLOAD",1);

// If $_POST['task'] is empty, create a variable  equals to FILE_DATA constant, with value 0
if (empty($_POST['task'])){
	$task = FILE_DATA;
}

// Otherwise...
else{
	$task = $_POST['task'];
}

// If the task is:
switch($task){

	// FILE_DATA: call the function fileData() and pass $id as a parameter.
	case FILE_DATA:
		// $id comes from controlAccess controller.
		fileData($id);
	break;

	// DOWNLOAD: call the function download().
	case DOWNLOAD:
		download($id);
	break;

	default:
	break;
}

// This function will retireve the data to be shown in the My Files page.
function fileData($idNumber){

	// Creating a data base helper which is an instance of MyFilesModel class
	$dbh = new MyFilesModel();

	// Storing the state of the connection in a variable, to check if it is on.
	$checkConn = $dbh->connect(HOST,USER,PASSWORD,DB_NAME);

	// If the connection with the database is off require code from "myFilesErrorView.php" which manages errors.
	if($checkConn == false){
		$errMessage = 'Data base connection failed!';
		require("../views/myFilesErrorView.php");
	}

	// Otherwise,(the connection is on)
	else{
		// store user data in a variable
		$userData = $dbh->getUserData($idNumber);
		$retrieveFileData = $dbh->retrieveFileData($idNumber);
//print "<pre>";
//var_dump($retrieveFileData);
//print "</pre>";
		require("../views/myFilesView.php");

	}
}

// Function to download the files uploaded by the user
function download($idNumber){
	$fileFolder = $_SERVER{'DOCUMENT_ROOT'}."/My_Assignment_manager/uploads/";
	$fileName = $idNumber ."-". $_POST["fileName"] . ".zip";
	$filePath = $fileFolder . $fileName;

	// if the targeted file is an actual file, download it
	if (is_file($filePath)){

		//$file = file($fileName);
		header("Content-Transfer-Encoding: binary");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=" . $fileName . "");
		header("Content-Length: " . filesize($filePath));
	}

	else{
		echo"Download Error";
	}
}
?>
