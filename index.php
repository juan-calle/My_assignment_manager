<?php
// Project by Juan Carlos Munoz Calle - 2018

/*** Index.php is the landing page of the site. It displays the login form and calls "access.php" controler upon form submition for it to manage the access of the user to the site***/


// Requiring the controllers holding the data base connection and definition of constants.
require_once("controllers/outputs.php");
require_once("controllers/config.php");

// If an 'error' index exists in $_GET array,
if(isset($_GET['error'])){

	// Create a variable that will hold the value of that index
	$error = $_GET['error'];
}

// Otherwise, we set the value of the index to -1 (no value)
else{
	$error = -1;
}

// Print the HTML code block for the header
printHeader("Login");

?>

<!--The following block of code will display the welcome image-->
<header id="header">
    <div class="container-fluid">
        <img src="assets/cover.jpg" alt="Cover Image">
    </div>
</header>

<!--This div will hold the login form-->
<div class="container">
    <div class="row col-md-12">
        <h1 class="text-center color2">My Assignment Manager</h1>
    </div>
</div>

<!--Login Form-->
<div class="container">
    <section class="main row">
        <div class="col-md-4 col-lg-4"></div>
        <div class="col-md-4 col-lg-4 text-center">
        <!--When submitted, the controller "access.php" will be called-->
        <form action="controllers/access.php" method="post" name="loginForm">

            <?php
				// If $error exists and its value is
                switch ($error){

					// 0, then display the error message 0, defined in "config.php" through the error() function created in "outputs.php"
                    case 0:
                        echo error(ERROR0);
                    break;

					// 1, then display the error message 1, defined in "config.php" through the error() function created in "outputs.php"
                    case 1:
                        echo error(ERROR1);
                    break;

                    default:
                    break;
                }
            ?>

            <!--Email input field of the form-->
            <div class="form-group">
                <label class="color2" for="email">Email:</label>
                <input class="form-control" id="email" type="text" placeholder="Email:" name="email">
            </div>

            <!--Password input field of the form-->
            <div class="form-group">
                <label class="color2" for="passwword">Password:</label>
                <input class="form-control" id="password" type="password" placeholder="Password:" name="password">
            </div>

            <!--Submit button-->
            <div class="form-group">
            <button class="btn btn-primary" type="button" onclick="loginValidated()">Go!</button>
            </div>

            <!--Link to activation page-->
            <p class="color2">First time? <a href="controllers/activation.php" class="hover color2"> Activate your account here.</a></p>

        </form>
        </div>
        <div class="col-md-4 col-lg-4"></div>
    </section>
</div>

<?php

	// Function created in "outputs.php" that prints the footer containing the js scripts.
	printFooter();

?>
