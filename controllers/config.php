<?php

/* This controller holds a series of defined constants for efficiency */
	
	// For data base connection
	define("HOST","localhost");
	define("DB_NAME","saeDB");
	define("USER","root");
	define("PASSWORD","root");
	
	// For data base queries
	define("USER_TABLE", "user");
	define("UNIT_TABLE","unit");
	define("MODULE_TABLE","module");
	define("ASSIGNMENT_TABLE","assignment");
	define("STUDENT_MODULE_MARK_TABLE","student_module_mark");
	define("STUDENT_ASSIGNMENT_MARK_TABLE","student_assignment_mark");
	define("UNIT_ASSIGNMENT_TABLE","unit_assignment");
	define("MODULE_UNIT_TABLE","module_unit");
	
	// For exceptions and error handling
	define("ERROR0","Wrong user or pasword");
	define("ERROR1","Session has expired");
	define("ERROR2","User already created or wrong credentials. Please, contact with the adiministrator");
	
	// For file paths
	define("USER_PICS","/PHPfinalProject/assets/userPics/");
?>