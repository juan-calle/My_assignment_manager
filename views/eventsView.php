<?php
/*** The Events view is not finished yet. I will populate all the select values as a result of a foreach loop that will pull out data from the user from the database***/

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
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8 text-center color3 well">
            <h1>Create a new Deadline:</h1>
            <p class="alignLeft"> Choose a module:
            <select name="module">
              <option value="401">401</option>
              <option value="402">402</option>
            </select>
         	</p>
            <p class="alignLeft"> Choose a unit:
            <select name="unit">
              <option value="001">HTML/CSS</option>
              <option value="002">Intro to Javascript</option>
              <option value="003">Principles of Design</option>
              <option value="004">Human Computer Interaction</option>
              <option value="005">PHP/MySQL</option>
              <option value="002">Intro to flash</option>
            </select>
            </p>
            <p class="alignLeft"> Choose an assignment:
            <select name="assignment">
              <option value="0001">Website Proposal</option>
              <option value="0002">Website Project</option>
              <option value="0003">Form Validation</option>
              <option value="0004">Image Gallery</option>
              <option value="0005">Art Movement Based Layout</option>
              <option value="0006">Usability Report</option>
              <option value="0007">Dynamic Website Proposal</option>
              <option value="0008">Dynamic Website Project</option>
              <option value="0009">Animated Logo</option>
              <option value="0010">Interactive Banner</option>
              <option value="0011">Flash Website</option>
            </select>
            </p>
            <p class="alignLeft"> Choose a date and a time: </p>
            <div class="container-fluid">
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" name="date" id="date" class="form-control"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            <select name="time">
              <option value="0000">00:00</option>
              <option value="0100">01:00</option>
              <option value="0200">02:00</option>
              <option value="0300">03:00</option>
              <option value="0400">04:00</option>
              <option value="0500">05:00</option>
              <option value="0600">06:00</option>
              <option value="0700">07:00</option>
              <option value="0800">08:00</option>
              <option value="0900">09:00</option>
              <option value="1000">10:00</option>
              <option value="1100">11:00</option>
              <option value="1200">12:00</option>
              <option value="1300">13:00</option>
              <option value="1400">14:00</option>
              <option value="1500">15:00</option>
              <option value="1600">16:00</option>
              <option value="1700">17:00</option>
              <option value="1800">18:00</option>
              <option value="1900">19:00</option>
              <option value="2000">20:00</option>
              <option value="2100">21:00</option>
              <option value="2200">22:00</option>
              <option value="2300">23:00</option>
            </select>
            </div>
			</div>
           	<button class="btn btn-primary marginTop alignLeftt">Create!</button>
     	</div>
	</section>
</div>

<?php
printFooter();
?>
