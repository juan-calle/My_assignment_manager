<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>My Assignment Manager - Profile</title>
  		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
	</head>
	<body class="color1">

		<header id="header">
        	<nav class="navbar navbar-inverse" role="navigation">
            	<div class="fluid-container">
                	<ul class="nav navbar-nav">
                        <li><a href="#">Profile <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">My Modules</a></li>
                        <li class="active"><a href="#">Events</a></li>
                 	</ul>
                </div>
            	<div class="navbar-right">
                	<ul class="nav navbar-nav">
                        <li><a href="#">Log Out</a></li>
					</ul>
             	</div>
          	</nav>
   		</header>

		<div class="container">
       		<section class="row">
            	<div class="col-md-2 col-lg-2"></div>
                <div class="col-md-8 col-lg-8 text-center color3 well">
                	<h1>Create a new Deadline:</h1>
                    <p> Choose a module:
                    <select>
                      <option value="401">401</option>
                      <option value="402">402</option>
                    </select>
                    </p>
                    <p> Choose a unit:
                    <select>
                      <option value="HTML/CSS">HTML/CSS</option>
                      <option value="Intro to Javascript">Intro to Javascript</option>
                      <option value="Principles of Design">Principles of Design</option>
                      <option value="Human Computer Interaction">Human Computer Interaction</option>
                      <option value="PHP/MySQL">PHP/MySQL</option>
                      <option value="Intro to Flash">Intro to flash</option>
                    </select>
                    <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>
                    </p>
           		</div>

]        	</section>
        </div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>';
	</body>
</html>
