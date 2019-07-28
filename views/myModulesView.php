<?php
/*** The myModules view is not fully completed. I'd like to implement info about the students enrolled in each module, wether they uploaded an assignment or not, and give the teacher the functionality to download and mark each of the assignments uploaded***/

// Requiring controllers
require_once("../controllers/config.php");
require_once("../controllers/outputs.php");

// Printing HTML header
printHeader("My Modules");

// Prints the navigation bar according to the type of user that is logged in.
printNavBar($userData["user_type"], "My Modules");

?>

<div class="container">
    <section class="row">
        <div class="col-md-3 col-lg-3"></div>
        <div class="col-md-6 col-lg-6 text-center color3 well marginTop">            
			<?php
			
                // For each index of the array I give them a name $object
                foreach($retrieveModulesData as $object){
					
						echo'
						<div id="' . $object["module_id"] . '"class="panel panel-success marginTop">
						  <div class="panel-body success">
						  <p><h4>' . $object["module_id"] . '</h4></p>
						  <p>' . $object["module_name"] . '</p> 
						  </div>
						  <div class="panel-footer alignLeft">
							<p><h4>' . $object["unit_name"] . '</h4></p>
							
						  </div> 
					   </div>';
	
	      		}

printFooter();
?>