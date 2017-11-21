<!--
	Application: CMK Marketing Customer Management System
	Module: Project Information Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Shows the details of the client's project being examined.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
	<meta charset="UTF-8">
	<title>CMS Project Information</title>
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
		require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/modProject.php";

		$project = $_GET['project']; // get from param
		$project = search_project($project)[0];
		$client_name = find_project_client($project)[0];
	?>

	<!-- Project Content -->
	<div class="container">
		<div class="row">
			<!-- Left Column -->
			<div id="left-column" class="col-md-5 my-4">
				<div class="card mb-4">
					<div class="card-body">
						<h4 class="card-title" style="margin-bottom:0;"><?php echo $project['ProjectName'];?></h4>
					</div>

					<img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

					<div class="card-body">
						<h4 class="card-title">Description</h4>
						<p class="card-text"><?php echo $project['Description'];?></p>
					</div>
				</div>

				<a href="/pages/client-info.php?client=<?php echo $client_name;?>" class="btn btn-primary btn-lg btn-block green-button">Back to Client Page</a>

				<a href="/pages/edit-project-info.php?project=<?php echo $_GET['project'];?>" type="button" class="btn btn-primary btn-lg btn-block blue-button">Edit Project Information</a>

				<a href="/pages/client-info.php?client=<?php echo $client_name;?>" type="button" onclick="<?php archiveProject($project);?>" class="btn btn-primary btn-lg btn-block red-button">Archive Project Information</a>
			</div>

			<!-- Right Column -->
			<div id="right-column" class="col-md-7 my-4">

				<!-- Project Info -->
				<div class="sidebar">
					<h4 class="sidebar-header">Project Info</h4>

					<div class="sidebar-content">
						<div id="project-info" class="container">
							<div class="row">
								<div class="col-3">Tracking Location</div>
								<div class="col-9">
									<?php
										echo '<a href="' . $project['Basecamp_URL'] . '" target="_blank">' . $project['Basecamp_URL'] . '</a>';
									?>
								</div>
							</div>
							<div class="row">
								<div class="col-3">Start Date</div>
								<div class="col-9">
									<?php
				                        $start_time = new DateTime($project['Start_Date']);

										echo $start_time->format('M. d, Y');
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Due Date Status -->
				<div class="sidebar">
					<h4 class="sidebar-header">Due Date Status</h4>

					<div class="sidebar-content">
						<div id="renewal-status" class="container">
							<div class="row">
								<div class="col-3">Finish Date</div>
								<div class="col-3">
									<?php
				                        $end_time = new DateTime($project['End_Date']);

										echo $end_time->format('M. d, Y');
									?>
								</div>
								<div class="col-6">
									<button type="button" class="btn btn-primary btn-lg btn-block red-button due-date-button"><small class="due-date-btn"><strong>Upcoming Deadline</strong></small></button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Notes on Project -->
				<div class="sidebar">
					<h4 class="sidebar-header">Notes on Project</h4>

					<div class="sidebar-content">
						<p id="content-notes"><?php echo $project['Notes'];?></p>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Project Content -->
</body>

</html>