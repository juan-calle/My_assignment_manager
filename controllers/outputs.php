<?php
/* This controller gathers a series of functions that will dinamically create the structure of the pages within the site (header, navigation bar, footer and errors) */



/*** FUNCTION: printHeader(). This function, when called from a .php file will print the header. The variable $title will change according to what page the user is into. ***/
function printHeader($title){

	// Create a variable that holds an absolute path to the site's folder
	$rootPath = "http://localhost:8888/My_Assignment_manager/";

	// Echo the html code containing the header which will be the same through the site (excepting login and activation pages).
	echo
		'<!doctype html>
		<html>
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>'. $title . '</title>
				<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
				<link rel="stylesheet" href="'. $rootPath .'css/style.css">
				<link rel="stylesheet" href="'. $rootPath .'css/jquery-ui.css">
			</head>
			<body class="color1">';
}



/*** FUNCTION: printFooterr(). This function, when called from a .php file will print the footer that contains the script links and closing of body and html document***/
function printFooter(){

	// Create a variable that holds an absolute path to the site's folder
	$rootPath = "http://localhost:8888/My_Assignment_manager/";

	// Echo the html code containing the footer and scripts.
	echo
	   '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	    <script src="'. $rootPath .'js/jsFunctions.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	    <script src="../js/jquery-ui.js"></script>
	</body>
</html>';
}



/*** FUNCTION: error(). This function handles the display of errors to the user. $message represents a parameter passed to this function that will vary according to the error message to be displayed ***/
function error($message){

	// When this function is called, an HTML div will be returned with $message being the text to display inside that div. The message will dinamically change depending on the value of the paramater passed to the function.
	return '<div class= "alert-danger">'.$message.'</div>';
}



/*** FUNCTION: printNavBar(). This function manages what navigation bar will be printed according to the user's role (student (0), teacher(1) or administrator(2)) and to the active link ***/
function printNavBar($user_type , $item){

	  // Echo the HTML code of the navigation bar just up to the begining of the <li> items, which are different for student, teacher or admin.
		echo
		'<header id="header">
        	<nav class="navbar navbar-inverse" role="navigation">
            	<div class="fluid-container">
                	<ul class="nav navbar-nav">';

						// Create dynamic list items that will vary depending on the value of $user_type
						switch($user_type){

							// If $user_type is 0, then print the student navigation bar
							case 0:

							// If the current page is profile, make its link appear as active
							echo '<li';
							if($item == "Profile"){
								echo ' class="active"';
							}
							echo '><a href="profile.php">Profile</a></li>';

							// If the current page is My Files, make its link appear as active
							echo '<li';
							if($item == "My Files"){
								echo ' class="active"';
							}
							echo '><a href="myFiles.php">My Files</a></li>';

							// If the current page is My Marks, make its link appear as active
							echo '<li';
							if($item == "My Marks"){
								echo ' class="active"';
							}
							echo '><a href="myMarks.php">My Marks</a></li>';

							break;

							// If $user_type is 1, then print the teacher navigation bar
							case 1:

							// If the current page is profile, make its link appear as active
							echo '<li';
							if($item == "Profile"){
								echo ' class="active"';
							}
							echo '><a href="profile.php">Profile</a></li>';

							// If the current page is My Modules, make its link appear as active
							echo '<li';
							if($item == "My Modules"){
								echo ' class="active"';
							}
							echo '><a href="myModules.php">My Modules</a></li>';

							// If the current page is Eventss, make its link appear as active
							echo '<li';
							if($item == "Events"){
								echo ' class="active"';
							}
							echo '><a href="events.php">Events</a></li>';

							break;

							// If $user_type is 2 (admin), then no buttons (excepting log out) will be needed in the navigation bar.
							case 2:
							break;

							// Default is also empty because the values of $user_type are allways going to be either 0, 1 or 2.
							default:
							break;
						}

		// Echo the remaining HTML block of code to complete the navigation bar.
		echo
                '</ul>
                </div>
            	<div class="navbar-right">
                	<ul class="nav navbar-nav">
                        <li><a href="logOut.php">Log Out</a></li>
					</ul>
             	</div>
          	</nav>
   		</header>';
}

?>
