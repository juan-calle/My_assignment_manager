<?php
/* This controller makes sure the user has begun a session before allowing him to see the page. If the user is not logged in the session will be destroyed and the user redirected to the login page*/

// I bring about userLogin session, also created in "acccess.php"
session_name("userLogin");  

// Initiate the session							
session_start();	

// Create and insert the value "logged" in the global $_SESSION array and assign it a value of 1. It allows me to know if the user is logged in	
// If the value is not equal to 1 means the user is not logged in						
if($_SESSION["logged"] != 1){
	
	// Free all the variables possibly created and destroy the session.
	session_unset();
	session_destroy();
	
	// Redirect to "index.php" and stop executing the rest of the code in this script.
	header("Location: ../index.php");
	exit();
}

// Otherwise, store the value of the user_id in a variable $id
else{
	$id = $_SESSION["idNumber"]; 

}
	
?>