<?php
/*** Profile controller will manage what is shown to the user once is logged in according to its role***/

// requiring controllers and model
require_once("config.php");
require_once("controlAccess.php");
require_once("../models/profileModel.php");

// Defining constants (tasks)
define("SHOW_DATA",0);
define("UPLOAD2SERVER",1);
define("UPLOAD_PIC",2);

// If $_POST['task'] is empty, create a variable  equals to SHOW_DATA constant, with value 0
if (empty($_POST['task'])){
	$task = SHOW_DATA;
}

// Otherwise, set the value of $_POST['task'] = to 1 or 2.
else{
	$task = $_POST['task'];
}

// If the task is:
switch($task){
	
	// SHOW_DATA: call the function showData() and pass $id as a parameter. $id comes from controlAccess controller.
	case SHOW_DATA:
		showData($id);
	break;

	// UPLOAD2SERVER: call the function showData() and pass $id as a parameter. $id comes from controlAccess controller.
	case UPLOAD2SERVER:
		upload2Server($id);
	break;
	
	// UPLOAD_PIC: call the function uploadPic(). and pass $id as a parameter. $id comes from controlAccess controller.
	case UPLOAD_PIC:
		uploadPic($id);
	break;
	
	default:
	break;
}

// This function will retireve the data to be shown to the user within its profile.
function showData($idNumber){
	
	// This variable will hold the current hour in a 24h format HH:MM
	$currentHour = date("H:i");
	
	// Creating a data base helper which is an instance of ProfileModel class
	$dbh = new ProfileModel();
	
	// Storing the state of the connection in a variable, to check if it is on.
	$checkConn = $dbh->connect(HOST,USER,PASSWORD,DB_NAME); 
	
	// If the connection with the database is off require "profileErrorView.php" which manages errors.
	if($checkConn == false){
		$errMessage = 'Data base connection failed!';
		require("../views/profileErrorView.php");
	}
	
	// Otherwise,(the connection is on)
	else{
		// store user data in a variable
		$userData = $dbh->getUserData($idNumber);
		
		// If the logged user is a student (0)
		if($userData["user_type"] == 0){
			$retrieveData = $dbh->retrieveDeadlineData($idNumber);
			//var_dump($retrieveStudentData[0]);
		
			// Requires the profileView
			require("../views/profileView.php");
		}
		
		// Also, if the logged user is a teacher (1)
		else if ($userData["user_type"] == 1){
			$retrieveData = $dbh->getTeacherDeadlines($idNumber);		
			require("../views/profileTeacherView.php");
		}
	}
}

// This function will manage the upload of profile pictures to the server
function uploadPic($idNumber){
	$picName = $_FILES['picChange']['name'];
	$tempName = $_FILES['picChange']['tmp_name'];
	$rootPath = "http://localhost/PHPfinalProject/";
	$picsFolder = $_SERVER{'DOCUMENT_ROOT'}."/PHPfinalProject/assets/userPics/";
//	print_r($_FILES['picChange']);
//	echo $_SERVER{'DOCUMENT_ROOT'}."/assets/userPics/";
//	echo is_dir($picsFolder) ?"ok":"ko";

	// If is not a folder display an error sending the user to "profileErrorView.php"
	if(!is_dir($picsFolder)){
		showData($idNumber);
		$errMessage = "Destination folder does not exist!";	
		require("../views/profileErrorView.php");	
	}
	
	// Otherwise, rename the pic to match the user id and store it in the defined folder in the server
	else{
		$picRename = $idNumber . ".jpg";
		if($picName && move_uploaded_file($_FILES['picChange']['tmp_name'], $picsFolder . $picRename)){
			showData($idNumber);
		}
		else{
			$errMessage = 'Upload failed!';
			require("../views/profileErrorView/");
		}
	}
}

// Function that will manage the upload of files to the server
function upload2Server($idNumber){
	$assignmentName = $_POST["assignmentName"];
	$assignmentId = $_POST["assignmentId"];
	$fileName = $_FILES['uploadFile']['name'];
	$fileFolder = $_SERVER{'DOCUMENT_ROOT'}."/PHPfinalProject/uploads/";
	
	// If is not a folder display an error sending the user to "profileErrorView.php"
	if(!is_dir($fileFolder)){
		showData($idNumber);
		$errMessage = "Destination folder does not exist!";	
		require("../views/profileErrorView.php");	
	}
	else{
		$fileRename = $idNumber . "-" . $assignmentName . ".zip";
		if($fileName && move_uploaded_file($_FILES['uploadFile']['tmp_name'], $fileFolder . $fileRename)){
			
	$dbh = new ProfileModel();
	
	// Storing the state of the connection in a variable, to check if it is on.
	$checkConn = $dbh->connect(HOST,USER,PASSWORD,DB_NAME); 
	
			// If the connection with the database is off require code from "profileErrorView.php" which manages errors.
			if($checkConn == false){
				$errMessage = 'Data base connection failed!';
				require("../views/profileErrorView.php");
			}
			
			// Otherwise,(the connection is on)
			else{
				// store user data in a variable
				$userData = $dbh->updateUploadedDB($idNumber, $assignmentId);
				//var_dump($retrieveStudentData[0]);
				showData($idNumber);
			}
		}
		else{
			$errMessage = 'Upload failed!';
			require("../views/profileErrorView/");
		}
	}
}

?>