<!--
	Application: CMK Marketing Customer Management System
	Module: Edit Project Information Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Allows user to edit project information.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
	<meta charset="UTF-8">
	<title>Edit Project Information</title>
    <link rel="shortcut icon" href="/favicon.ico">

	<!-- Personal CSS -->
	<link rel="stylesheet" href="/css/main.css">

	<!-- General CDN Additions -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<!-- Bootstrap CDN Additions -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>


<!-- Page Content -->
<body>
	<?php 
		include '../include/navbar.html';
		require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchProject.php";

		$project = $_GET['project']; // get from param
		$project = search_project($project)[0];

		$start_time = new DateTime($project['Start_Date']);
		$start_time = $start_time->format('Y-m-d');

		$finish_time = new DateTime($project['End_Date']);
		$finish_time = $finish_time->format('Y-m-d');
	?>

	<form>
		<div class="container">
			<div class="row">
				<!-- Left Column -->
				<div id="left-column" class="col-md-5 my-4">
					<div class="card mb-4">
						<div class="card-body">
							<input type="text" class="form-control" id="project-name" placeholder="Enter Project Name" value="<?php echo $project['ProjectName'];?>">
						</div>

						<img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

						<div class="card-body">
							<h4 class="card-title">Description</h4>
							<textarea class="form-control" id="subscription-description" rows="3"><?php echo $project['Description'];?></textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-primary btn-lg btn-block green-button">Save Project Info</button>
				</div>

				<!-- Right Column -->
				<div id="right-column" class="col-md-7 my-4">

					<!-- Project Info -->
					<div class="sidebar">
						<h4 class="sidebar-header">Project Info</h4>

						<div class="sidebar-content">
							<div id="project-info" class="editing" class="container">
								<div class="row">
									<div class="col-3">Tracking Location</div>
									<div class="col-9"><input type="text" class="form-control" id="tracking-loc" placeholder="Enter Tracking URL" value="<?php echo $project['Basecamp_URL'];?>"></div>
								</div>
								<div class="row">
									<div class="col-3">Start Date</div>
									<div class="col-9"><input type="date" class="form-control" id="start-date" value="<?php echo $start_time;?>"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Renewal Status -->
					<div class="sidebar">
						<h4 class="sidebar-header">Due Date Status</h4>

						<div class="sidebar-content">
							<div id="renewal-status" class="container editing">
								<div class="row">
									<div class="col-3">Finish Date</div>
									<div class="col-9"><input type="date" class="form-control" id="finish-date" value="<?php echo $finish_time;?>"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Notes on Subscription -->
					<div class="sidebar">
						<h4 class="sidebar-header">Notes on Subscription</h4>

						<div class="sidebar-content">
							<textarea class="form-control" id="content-notes" rows="3"><?php echo $project['Notes'];?></textarea>
						</div>
					</div>

				</div>
			</div>
		</div>
	</form>
</body>

</html>