<?php
/*** The Profile view***/

// Requiring controllers
require_once("../controllers/config.php");
require_once("../controllers/outputs.php");

// Printing HTML header
printHeader("My Files");

// Prints the navigation bar according to the type of user that is logged in.
printNavBar($userData["user_type"], "My Files");

?>

<div class="container">
    <section class="row">
        <div class="col-md-3 col-lg-3"></div>
        <div class="col-md-6 col-lg-6 text-center color3 well marginTop">
            <h1>My Files</h1>
            
			<?php
			
                // For each index of the array I give them a name $object
                foreach($retrieveFileData as $object){
					// If the field datTime_uploaded is not null, then print the panel with the info
					if($object["dateTime_uploaded"] !=null){
//						print_r($object);
						echo'
						<div class="panel panel-success marginTop">
						  <div class="panel-body success">'
						  . $object["unit_name"] . 
						  '</div>
						  <div class="panel-footer alignLeft">
							<p>' . $object["assignment_name"] . '</p>
							<form id="fileUpload" method="post" action="myFiles.php">
							<input type="hidden" name="task" value="1">
							<input type="hidden" name="fileName" value="' . $object["assignment_name"].'">
							<button class="btn btn-primary marginTop block" type="submit">Download</button>
							</form>
						  </div> 
					   </div>';
					}
				// Otherwise print a generic panel with a message.
				else{
				echo '
						<div class="panel panel-success marginTop">
						  <div class="panel-body success">'
						  . $object["unit_name"] . 
						  '</div>
						  <div class="panel-footer alignLeft">
							<h4>No files have been uploaded yet</h4>
						  </div> 
					   </div>';
	      		}
			}
printFooter();
?>