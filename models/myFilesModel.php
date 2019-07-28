<?php
/* This model creates a class that will manaage the data flow from the data base */

// Calling the config controller
require_once("../controllers/config.php");

// Creating the class
class MyFilesModel{
	
	// Private variable
	private $handle;
	
	// Constructor
	function __construct(){
	}
	
	// This function will try to connect to the database.
	public function connect($host, $user, $password, $dbName){
		try{
			// Assigning $handle the value of the connection object.
			$this->handle = new PDO('mysql:host='.$host.';dbname='.$dbName,$user, $password);
			$this->handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} 
			
		catch(PDOexception $e){
			// If something goes wrong, the function will return false
			return false;					
		}
		
		// If the script runs up to this point, no exceptions were caught and the function will return true.
		return true;
	}
	
	// Function to get data from the logged user. We pass $idNumber holding the value of user_id, primary key of the user table.  This is gonna retrieve all the data from that user 
	public function getUserData($idNumber){
		try{		
				// Prepared statements provide better security standards by preventing from SQL injection.
				$dbQuery = $this->handle->prepare("SELECT * FROM " . USER_TABLE . " WHERE user_id = ?");	
				
				// Binding  values to $dbQuery parameters.
				$dbQuery->bindParam(1, $idNumber);
				
				// Executing the prepared query.
				$dbQuery->execute();
				
				// Storing the result of the SQL query into an associative array.
				$fetchResult = $dbQuery->fetch();		
			}
			
			catch(PDOException $e){		
				$fetchResult = null;					
			}
			
			// if everything goes well we return data gathered from user table.
			return $fetchResult;
	}
	
	// This function gathers data to be shown in the student's profile page 
	public function retrieveFileData($idNumber){
		try{		
				// Formulating the db query that will be stored in a variable called $query
				$query = "SELECT " . STUDENT_ASSIGNMENT_MARK_TABLE . ".dateTime_uploaded" 
				. ", " . STUDENT_ASSIGNMENT_MARK_TABLE . ".path"
				. ", " . ASSIGNMENT_TABLE . ".assignment_name" 
				. ", " . UNIT_ASSIGNMENT_TABLE . ".unit_name"
				. " FROM " . STUDENT_ASSIGNMENT_MARK_TABLE 
				. " LEFT JOIN " . ASSIGNMENT_TABLE . " ON " . ASSIGNMENT_TABLE . ".assignment_id = " . STUDENT_ASSIGNMENT_MARK_TABLE . ".assignment_id"
				. " LEFT JOIN " . UNIT_ASSIGNMENT_TABLE . " ON " . UNIT_ASSIGNMENT_TABLE . ".assignment_id = " . STUDENT_ASSIGNMENT_MARK_TABLE . ".assignment_id"
				. " WHERE " . STUDENT_ASSIGNMENT_MARK_TABLE . ".student_id = ?";
				//echo $query; 
				
				// Preparing the $query
				$dbQuery = $this->handle->prepare($query);	
				
				// Binding parameters.
				$dbQuery->bindParam(1, $idNumber);
				
				// Executing the prepared query.
				$dbQuery->execute();
				
				// Storing the result of the SQL query into an associative array.
				$fetchResult = $dbQuery->fetchAll();
				//print_r($fetchResult);	
			}
			
			catch(PDOException $e){		
				$fetchResult = null;					
			}
			
			// if everything goes return the data gathered from user table.
			// print_r($fetchResult);
			return $fetchResult;
	}
}
?>