<?php
/*** "Activation.php" is the secondary way to access the site. If a user is registered in the database, it can activate its account by filling the form in the page. If the user has been previously inserted in the user_table of the database by the admin, and all the fields are filled correctly, "access.php" will be called and will manage the access of the user into the site ***/

// Requiring connection with database and config controllers.
require_once("config.php");
require_once("outputs.php");

// If the global array $_GET has the index called 'error', we store its value in a variable called $error, that will make it easier to handle and display errors. (different errors are defined in "config.php")
if(isset($_GET['error'])){
	$error = $_GET['error'];
}

// Otherwise, we set the $error variable = to -1.
else{
	$error = -1;
}

// Calling the printHeader() function, created in "outputs.php" will start the dynamic construction of the page by including the header HTML block of code
printHeader('Activation');

?>

<!--The following block of code will display the welcome image-->
<header id="header">
    <div class="container-fluid">
    	<!--Button to go back to the login page-->
        <a href="../index.php"><button class="btn btn-primary over marginTop">Back to login!</button></a>
        <img src="../assets/cover.jpg" alt="cover image">
    </div>
</header>

<div class="container">
    <div class="row col-md-12">
        <h1 class="text-center color2">Activate your account</h1>
    </div>
</div>

<!--This div holds the activation form-->
<div class="container">
    <section class="main row">
        <div class="col-md-4 col-lg-4"></div>
        <div class="col-md-4 col-lg-4 text-center">

        <!--Creation of the form-->
        <form action="access.php" method="post" name="activationForm">

        		<!--If there is a value for 'error' index of $_GET  and its value is 2, error() function, created in "outputs.php", is called and prints a div with error message-->
				<?php
                    switch ($error){
                        case 2:
                            echo error(ERROR2);
                        break;

                        default:
                        break;
                    }

                ?>

                <label class="color2" for="name">ID Number:</label>
                <input class="form-control" id="idNumber" type="text"  placeholder="ID Number:" name="idNumber">

                <label class="color2" for="email">Email:</label>
                <input class="form-control narrower" id="email" type="text" placeholder="Email:" name="email">

                <label class="color2" for="choosePasswword">Choose a password:</label>
                <input class="form-control narrower" id="choosePassword" type="password" placeholder="Choose a password:" name="choosePassword">

                <label class="color2" for="confirmPassword">Confirm your password:</label>
                <input class="form-control narrower" id="confirmPassword" type="password" placeholder="Confirm your password:" name="confirmPassword">

               <div class="form-group marginTop">
                    <button class="btn btn-primary" type="button" onClick="activationValidated()">Go!</button>
               </div>

        </form>
        </div>
        <div class="col-md-4 col-lg-4"></div>

    </section>
</div>

<?php

// Prints the HTML footer
printFooter();

?>
