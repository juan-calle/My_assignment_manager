<?php
/* This controller regulates the access to the platform. There ara two ways of accesing the platform. First one from the login page and second one from the activation page after succesful activation of a new user - in this case, the user will be redirected to its profile page straight away- */

// Defining constants that will be used in this controller to know wether a user access the site from the login page or from the activation page.
define('LOGIN', 0);
define('ACTIVATION', 1);


// Requiring connection with database and config files.
require_once("dbCon.php");																					
require_once("config.php");		
		
																	
// Assigning values to variables depending on where they come from ("login.php" or "activation.php". For this I use idNumber as index of $_POST because this value is only present in the activation page
// If $_POST contains the value 'idNumber' it means the user is accesing the platform from the activation page because that value only be inserted from that page's form
if (isset($_POST['idNumber'])){
	$email = $_POST['email'];																					
	$pass = $_POST['choosePassword'];		
	$idNumber = $_POST['idNumber'];		
	// If there is an Id number entered into the form, then we know the user is accesing the site from the activation page. $origin will hold this data
	$origin = ACTIVATION;																	
}

// Otherwise, if $_POST does not contain the above-mentioned idNumber value, then I know the user is accesing from the login page
else{
	
	$email = $_POST['email'];																					
	$pass = $_POST['password'];	
	$origin = LOGIN;																	
}


// Getting the required data from the Database to access the site and setting up the conditions on which a user can acces the platform, depending on where they ar trying to access from wether there are records about it in the database or not.
try{		
	
	// If the user is accesing from the login page
	if($origin == LOGIN){
		
		// Prepare a SQL query. Prepared queries provide better security standards by preventing from SQL injection. The resulting statement is stored into $dbQuery which is an array. Here we access the PDO object $handle (coming from "dbConn.php")
		$dbQuery = $handle->prepare("SELECT * FROM " . USER_TABLE . " WHERE user_email = ? and user_password = ?");	
		
		// Binding the values from $email and $pass. This changes the ? signs for the values of these variables.
		$dbQuery->bindParam(1, $email);
		$dbQuery->bindParam(2, $pass);
		
		// Executing the prepared query.
		$dbQuery->execute();
		
		// Storing the result of the SQL query into an associative array.
		$fetchResult = $dbQuery->fetch();		
		
		// If the result of the sql query is null
		if ($fetchResult == null){
			
			// Close the connection with the database
			$handle = null;		
			
			// Go back to index.php and show an error -errors are defined in "confing.php" and error() in "outputs.php"-								
			header("Location: ../index.php?error=0");					
			exit();
		}
		
		// if everything goes well, store the id number in a variable for later use
		else{
			$idNumber = $fetchResult['user_id'];
		}
	}
	
	// Otherwise, the user is accesing platform from the activation page; do this:
	else{
		
		// Preparing a SQL query and storing the result into $dbQuery
		$dbQuery = $handle->prepare("SELECT * FROM " . USER_TABLE . " WHERE user_id = ? and active = false");	
		
		// Binding parameters. 'Active' boolean from the prepared query will be set to true (the user will be activated)
		$dbQuery->bindParam(1, $idNumber);
		
		// Executing the prepared query.
		$dbQuery->execute();
		
		// Storing the result of the query into an array
		$fetchResult = $dbQuery->fetch();	
		
		// Here I make sure the user exists into the database. If it exists
		if($fetchResult != null){
			
			// Prepared statements provide better security levels standards by preventing from SQL injection.
			$dbQuery = $handle->prepare("UPDATE " . USER_TABLE . " SET user_password = ? , active = true WHERE user_id = ?");	
			
			// Binding the values from $idNumber and $pass to $dbQuery parameters.
			$dbQuery->bindParam(1, $pass);
			$dbQuery->bindParam(2, $idNumber);
			
			// Executing the prepared query.
			$dbQuery->execute();
		}
		else{
			// Close the connection with the database
			$handle = null;		
			
			// Redirect back to activation page and show an error -errors are defined in "confing.php"-								
			header("Location: activation.php?error=2");					
			exit();
		}
	}																								
}

// If something goes wrong during the execution of the code above, The script will stop running, and an exception will be catched. A custom error message will be shown too
catch(PDOException $e){		
								
	echo"Error: Database connection failed";
	die();
}

// If the script runs up to this point it means everything went well and the user is allowed to access its profile page. So we create a session.
// Name the session
session_name("userLogin");  

// Initiate the session							
session_start();	

// Create and insert the value "logged" in the global $_SESSION array, and assign it a value of 1. It allows me to know if the user is logged in									
$_SESSION["logged"] = 1;

// Create and insert the value "idNumber" in the global $_SESSION array, and assign it the value of $idNumber that was obtained in line 64
$_SESSION["idNumber"] = $idNumber;		

// Close the onnection with data base	
$handle = null;

// Redirect to user's "profile.php"
header("Location: profile.php");

?> 