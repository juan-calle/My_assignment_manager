<?php
/*** The Profile view***/

// Requiring controllers
require_once("../controllers/config.php");
require_once("../controllers/outputs.php");

// Printing HTML header
printHeader("Profile");

// Prints the navigation bar according to the type of user that is logged in.
printNavBar($userData["user_type"], "Profile");
$imgName = $_SERVER{'DOCUMENT_ROOT'}."/My_Assignment_manager/assets/userPics/" . $userData["user_id"] .  ".jpg";

?>
<div class="container">
    <section class="row">
        <div class="col-md-4 col-lg-4 text-center color3 well marginTop">

            <!--Showing the hour from the variable set in profile.php controller-->
            <h1><?php echo $currentHour; ?> h</h1>

        	<div class="container">

            	<!--Displayin the user profile image-->
                <img class="block" src="
                <?php

					// If the column user_profile_pic from the user_table is null (the user has not uploaded a picture yet), then display a default image.
				    if(!is_file($imgName)){
                        echo USER_PICS . 'default.jpg';
                    }

					// Otherwise, get the image from the userPics folder
                    else{

                        echo USER_PICS . $userData["user_id"] . ".jpg";

                    }
                ?>"/>
            <!--BUTTON CHANGE YOUR PICTURE-->
            <button class="btn btn-primary marginTop" type="button" onClick="revealDiv('hiddenDiv')">Change your picture!</button>
  			</div>

            <!--This div will be hidden until user presses "Change your pic button"-->
            <div class="form-group" id="hiddenDiv" style="display:none;">

                <!--Creating a simple form to upload the image-->
                <form action="profile.php" name="picChange" id="picChange" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="task" value="2">
                    <label for="picChange">Upload your new picture here:</label>
                    <input class="form-control" id="picChange" type="file" name="picChange">
                    <!--BUTTON UPLOAD!-->
                    <button class="btn btn-primary marginTop">Upload!</button>
                </form>
            </div>


            <h5 class="marginTop">Name</h5>
            <p class="well well-sm color3"><?php echo $userData["first_name"] . " " . $userData["middle_name"] . " " . $userData["last_name"]; ?></p>
            <h5> ID Number</h5>
            <p class="well well-sm color3"><?php echo $userData["user_id"] ?></p>
            <h5 class="marginTop">Email</h5>
            <p class="well well-sm color3"><?php echo $userData["user_email"] ?></p>

        </div>

        <div class="col-md-1 col-lg-1"></div>
        <div class="col-md-7 col-lg-7 text-center color3 well marginTop">
            <h1>Upcoming deadlines</h1>
                    <?php
						// For each index of the array I give them a name $object
						foreach($retrieveData as $object){
							//var_dump($object);
							$countDown = "-";
							$id = $userData["user_id"] . $object ["assignment_id"];
							if($object["dateTime_uploaded"] == null){
							echo'
							<div class="panel panel-success marginTop">
							  <div class="panel-body success">
								<span class="pull-left">' . $object["dateTime_due"] . '</span>
								<span class="pull-right">' . $countDown . '</span>
							  </div>
							  <div class="panel-footer">
								<p>' . $object["unit_name"] .' - ' . $object["assignment_name"] . '</p>

								<!--BUTTON UPLOAD-->
                    			<button class="btn btn-primary marginTop" type="button" onClick="revealDiv(\''. trim($id) .'\')">Upload</button>
								<div class="col-md-12 col-lg-12 text-center color3 marginTop form-group" id="' . trim($id) .'" style="display:none;">
									<form action="profile.php" name="uploadFiles" id="uploadFiles" method="post" enctype="multipart/form-data">
									<input type="hidden" name="task" value="1">
									<input type="hidden" name="assignmentName" value="' . $object["assignment_name"] .'">;
									<input type="hidden" name="assignmentId" value="' . $object["assignment_id"] .'">';
										if ($userData["user_type"] == 0){
											echo '<label for="uploadFiles">Upload your assignment here:</label>';
										}
										else{
											echo '<label for="uploadFiles">View info about your module</label>';
										}

									echo '<input class="form-control" id="uploadFile" type="file" name="uploadFile">
									<!--BUTTON UPLOAD-->
									<button class="btn btn-primary marginTop">';
										if($userData["user_type"]==0){
											echo'Upload Assignment!';
										}
										else{
											echo'View';
										}
										echo '</button>
									</form>
								</div>
							  </div>
						   </div>';
						}
						}
                   ?>

                </div>
        	</section>
        </div>
<?php
printFooter();
?>
