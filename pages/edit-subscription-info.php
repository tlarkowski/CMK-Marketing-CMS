<!--
	Application: CMK Marketing Customer Management System
	Module: Edit Subsription Information Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Allows user to edit subscription information.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
	<meta charset="UTF-8">
	<title>Client Management Homepage</title>

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
	<?php include '../include/navbar.html';?>

	<form>
		<div class="container">
			<div class="row">
				<!-- Left Column -->
				<div id="left-column" class="col-md-5 my-4">
					<div class="card mb-4">
						<div class="card-body">
							<input type="text" class="form-control" id="website-name" placeholder="Enter Website Name">
						</div>

						<img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

						<div class="card-body">
							<h4 class="card-title">Description</h4>
							<textarea class="form-control" id="subscription-description" rows="3">Current Description Text</textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-primary btn-lg btn-block green-button">Save Subscription Info</button>
				</div>

				<!-- Right Column -->
				<div id="right-column" class="col-md-7 my-4">

					<!-- Subscription Info -->
					<div class="sidebar">
						<h4 class="sidebar-header">Subscription Info</h4>

						<div class="sidebar-content">
							<div id="subscription-info" class="editing" class="container">
								<div class="row">
									<div class="col-3">Domain Name</div>
									<div class="col-9"><input type="text" class="form-control" id="domain-name" placeholder="Enter Domain Name"></div>
								</div>
								<div class="row">
									<div class="col-3">Hosted Location</div>
									<div class="col-9"><input type="text" class="form-control" id="hosted-loc" placeholder="Enter Hosted Location"></div>
								</div>
								<div class="row">
									<div class="col-3">Cost</div>
									<div class="col-9"><input type="number" class="form-control" id="cost"></div>
								</div>
								<div class="row">
									<div class="col-3">Go Live Date</div>
									<div class="col-9"><input type="date" class="form-control" id="go-live-date"></div>
								</div>
								<div class="row">
									<div class="col-3">Start Date</div>
									<div class="col-9"><input type="date" class="form-control" id="start-date"></div>
								</div>
								<div class="row">
									<div class="col-3">Website Type</div>
									<div class="col-9"><input type="text" class="form-control" id="web-type" placeholder="Enter Website Type"></div>
								</div>
								<div class="row">
									<div class="col-3">Hours Planned</div>
									<div class="col-9"><input type="number" class="form-control" id="planned-hours"></div>
								</div>
								<div class="row">
									<div class="col-3">Hours Tracked</div>
									<div class="col-9"><input type="number" class="form-control" id="tracked-hours"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Renewal Status -->
					<div class="sidebar">
						<h4 class="sidebar-header">Renewal Status</h4>

						<div class="sidebar-content">
							<div id="renewal-status" class="container editing">
								<div class="row">
									<div class="col-3">Renewal Date</div>
									<div class="col-9"><input type="date" class="form-control" id="payment-due-date"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Notes on Subscription -->
					<div class="sidebar">
						<h4 class="sidebar-header">Notes on Subscription</h4>

						<div class="sidebar-content">
							<textarea class="form-control" id="content-notes" rows="3">Current Note Text</textarea>
						</div>
					</div>

				</div>
			</div>
		</div>
	</form>
</body>

</html>