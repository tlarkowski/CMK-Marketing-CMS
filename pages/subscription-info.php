<!--
	Application: CMK Marketing Customer Management System
	Module: Subscription Information Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Shows the details of the client's subscription being examined.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
    <meta charset="UTF-8">
    <title>CMS Subscription Information</title>

    <!-- Personal CSS -->
    <link rel="stylesheet" href="/css/main.css">

    <!-- General CDN Additions -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <!-- Bootstrap CDN Additions -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
</head>


<!-- Page Content -->
<body>
<?php
include '../include/navbar.html';
require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/subscription.php";


$subscription = $_GET['subscription']; // get from param
$subscription = search_subscription_ID($subscription)[0];
$client = find_subscription_client($subscription)[0];
?>

<!-- Subscription Content -->
<div class="container">
    <div class="row">
        <!-- Left Column -->
        <div id="left-column" class="col-md-5 my-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title" style="margin-bottom:0;"><?php echo $subscription['Site_Name']; ?></h4>
                </div>

                <img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

                <div class="card-body">
                    <h4 class="card-title">Description</h4>
                    <p class="card-text"><?php echo $subscription['Description']; ?></p>
                </div>
            </div>

            <button type="button" class="btn btn-primary btn-lg btn-block green-button">Back to Client Page</button>

            <button type="button" class="btn btn-primary btn-lg btn-block blue-button">Edit Subscription Information
            </button>

            <button type="button" class="btn btn-primary btn-lg btn-block red-button">Archive Subscription Information
            </button>
        </div>

        <!-- Right Column -->
        <div id="right-column" class="col-md-7 my-4">

            <!-- Subscription Info -->
            <div class="sidebar">
                <h4 class="sidebar-header">Subscription Info</h4>

                <div class="sidebar-content">
                    <div id="subscription-info" class="container">
                        <div class="row">
                            <div class="col-3">Domain Name</div>
                            <div class="col-9"><?php
                                echo '<a href="http://' . $subscription['Domain'] . '" target="_blank">' . $subscription['Domain'] . '</a>'; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">Hosted Location</div>
                            <div class="col-9"><?php echo $subscription['Host_Location']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Cost</div>
                            <div class="col-9"><?php echo '$' . $subscription['Project_Cost_Billed']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Go Live Date</div>
                            <div class="col-9"><?php
                                $go_live_time = new DateTime($subscription['GoLive_Date']);

                                echo $go_live_time->format('M. d, Y');
                                ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Start Date</div>
                            <div class="col-9"><?php
                                $start_time = new DateTime($subscription['Project_Start']);

                                echo $start_time->format('M. d, Y');
                                ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Website Type</div>
                            <div class="col-9"><?php echo $subscription['Type']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Hours Planned</div>
                            <div class="col-9"><?php echo $subscription['Hours_Planned']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Hours Tracked</div>
                            <div class="col-9"><?php echo $subscription['Hours_Tracked']; ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Renewal Status -->
            <div class="sidebar">
                <h4 class="sidebar-header">Renewal Status</h4>

                <div class="sidebar-content">
                    <div id="renewal-status" class="container">
                        <div class="row">
                            <div class="col-3">Renewal Date</div>
                            <div class="col-3"><?php
                                $renewal_time = new DateTime($subscription['Annual_Renewal']);

                                echo $renewal_time->format('M. d, Y');
                                ?></div>
                            <div class="col-6">
                                <button type="button"
                                        class="btn btn-primary btn-lg btn-block red-button due-date-button">
                                    <small class="due-date-btn"><strong>Payment Due</strong></small>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notes on Subscription -->
            <div class="sidebar">
                <h4 class="sidebar-header">Notes on Subscription</h4>

                <div class="sidebar-content">
                    <p id="content-notes"><?php echo $subscription['Notes']; ?></p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Subscription Content -->
</body>

</html>