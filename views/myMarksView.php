<?php
/*** The My Marks view***/

// Requiring controllers
require_once("../controllers/config.php");
require_once("../controllers/outputs.php");

// Printing HTML header
printHeader("My Marks");

// Prints the navigation bar according to the type of user that is logged in.
printNavBar($userData["user_type"], "My Marks");

?>

<div class="container">
    <section class="row">
        <div class="col-md-3 col-lg-3"></div>
        <div class="col-md-6 col-lg-6 text-center color3 well marginTop">
            <h1>My Marks</h1>
            
			<?php
			
                // For each index of the array I give them a name $object
                foreach($retrieveMarksData as $object){
					
					// If the field mark is not null, display the panel with info about unit, assignment and mark
					if($object["mark"]!= null){
						echo'
						<div class="panel panel-success marginTop">
						  <div class="panel-body success">'
						  . $object["unit_name"] . 
						  '</div>
						  <div class="panel-footer alignLeft">
							<p>
								<span class="pull-left">' . $object["assignment_name"] . '</span>
								<span class="pull-right">' . $object["mark"] .'</span>
							</p>
						  </div> 
					   </div>';
					}
				// otherwise show a panel with a generic message
				else{
				echo '
						<div class="panel panel-success marginTop">
						  <div class="panel-body success">'
						  . $object["unit_name"] . 
						  '</div>
						  <div class="panel-footer alignLeft">
							<h4>No data to show yet</h4>
						  </div> 
					   </div>';
	      		}
			}
printFooter();
?>