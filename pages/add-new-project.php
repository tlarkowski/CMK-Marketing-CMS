<!--
	Application: CMK Marketing Customer Management System
	Module: Add New Project Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Allows user to add a new project to the database.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
	<meta charset="UTF-8">
	<title>Add New Project</title>
    <?php include '../include/header-files.php';?>
</head>


<!-- Page Content -->
<body>
	<?php include '../include/navbar.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/modProject.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";
    ?>

	<form name="form" action="" method="post">
		<div class="container">
			<div class="row">
				<!-- Left Column -->
				<div id="left-column" class="col-md-5 my-4">
					<div class="card mb-4">
						<div class="card-body">
							<input type="text" class="form-control" name="project-name" id="project-name" placeholder="Enter Project Name" required >
						</div>

						<img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

						<div class="card-body">
							<h4 class="card-title">Description</h4>
							<textarea class="form-control" name="project-description" id="project-description" rows="3" placeholder="Current Description Text"></textarea>
						</div>
					</div>

					<button type="submit" class="btn btn-primary btn-lg btn-block green-button">Add New Project</button>
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
									<div class="col-9"><input type="text" class="form-control" name="tracking-loc" id="tracking-loc" placeholder="Enter Tracking URL"></div>
								</div>
								<div class="row">
									<div class="col-3">Start Date</div>
									<div class="col-9"><input type="date" class="form-control" name="start-date" id="start-date"></div>
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
									<div class="col-9"><input type="date" class="form-control" name="finish-date" id="finish-date" required></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Notes on Subscription -->
					<div class="sidebar">
						<h4 class="sidebar-header">Notes on Project</h4>

						<div class="sidebar-content">
							<textarea class="form-control" name="content-notes" id="content-notes" placeholder="Current Note Text" rows="3"></textarea>
						</div>
					</div>

				</div>
			</div>
		</div>
	</form>

	<?php
        $company = search_company($_GET['client'])[0];

        if (isset($_POST['project-name'])) {
            $array = array(
                "Company_ID" => $company['Company_ID'],
	            "ProjectName" => $_POST['project-name'],
	            "Description" => $_POST['project-description'],
	            "Basecamp_URL" => $_POST['tracking-loc'],
	            "Start_Date" => $_POST['start-date'],
	            "End_Date" => $_POST['finish-date'],
	            "Notes" => $_POST['content-notes']
            );
            try {
                addProject($array);
                echo "<script>window.location.href='/pages/client-info.php?client=$_GET[client]';</script>";
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
            }
        }
    ?>
</body>

</html>
