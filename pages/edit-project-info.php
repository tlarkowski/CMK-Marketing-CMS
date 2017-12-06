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
    <?php include '../include/header-files.php'; ?>
</head>


<!-- Page Content -->
<body>
<?php
include '../include/navbar.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchProject.php";

$project = $_GET['project']; // get from param
$project = search_project($project)[0];

$start_time = new DateTime($project['Start_Date']);
$start_time = $start_time->format('Y-m-d');

$finish_time = new DateTime($project['End_Date']);
$finish_time = $finish_time->format('Y-m-d');
?>

<form name="form" action="" method="post">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div id="left-column" class="col-md-4 my-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <input type="text" class="form-control" id="project-name" name="project-name"
                               placeholder="Enter Project Name" value="<?php echo $project['ProjectName']; ?>">
                    </div>

                    <img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

                    <div class="card-body">
                        <h4 class="card-title">Description</h4>
                        <textarea class="form-control" id="project-description" name="project-description"
                                  rows="3"><?php echo $project['Description']; ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block green-button">Save Project Info</button>
            </div>

            <!-- Right Column -->
            <div id="right-column" class="col-md-8 my-4">

                <!-- Project Info -->
                <div class="sidebar">
                    <h4 class="sidebar-header">Project Info</h4>

                    <div class="sidebar-content">
                        <div id="project-info" class="editing" class="container">
                            <div class="row">
                                <div class="col-3">Tracking Location</div>
                                <div class="col-9"><input type="text" class="form-control" id="tracking-loc"
                                                          name="tracking-loc" placeholder="Enter Tracking URL"
                                                          value="<?php echo $project['Basecamp_URL']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Start Date</div>
                                <div class="col-9"><input type="date" class="form-control" id="start-date"
                                                          name="start-date" value="<?php echo $start_time; ?>"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Due Date Status -->
                <div class="sidebar">
                    <h4 class="sidebar-header">Due Date Status</h4>

                    <div class="sidebar-content">
                        <div id="renewal-status" class="container editing">
                            <div class="row">
                                <div class="col-3">Finish Date</div>
                                <div class="col-9"><input type="date" class="form-control" id="finish-date"  min="<?php echo date("Y-m-d");?>" name="finish-date" value="<?php echo $finish_time; ?>"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notes on Project -->
                <div class="sidebar">
                    <h4 class="sidebar-header">Notes on Subscription</h4>

                    <div class="sidebar-content">
                        <textarea class="form-control" id="content-notes" name="content-notes"
                                  rows="3"><?php echo $project['Notes']; ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
<?php


require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/modProject.php";

$project = search_project($_GET['project'])[0];
if (isset($_POST['project-name'])) {
    $array = array(
        "Project_ID" => $project['Project_ID'],
        "Company_ID" => $project['Company_ID'],
        "ProjectName" => $_POST['project-name'],
        "Description" => $_POST['project-description'],
        "Basecamp_URL" => $_POST['tracking-loc'],
        "Start_Date" => $_POST['start-date'],
        "End_Date" => $_POST['finish-date'],
        "Notes" => $_POST['content-notes']
    );
    try {
        modProject($array);
        echo "<script>
                window.location.href='/pages/project-info.php?project=$_GET[project]';
                </script>";

    } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("' . $e->getMessage() . '")';
        echo '</script>';
    }
}
?>

</body>

</html>