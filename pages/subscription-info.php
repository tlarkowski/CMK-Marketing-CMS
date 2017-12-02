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
    <?php include '../include/header-files.php';?>
</head>


<!-- Page Content -->
<body>
    <?php
      include '../include/navbar.php';
      require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchSubscription.php";
      require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/modSubscription.php";

      $subscription = $_GET['subscription']; // get from param
      $subscription = search_subscription($subscription)[0];
      $client_name = find_subscription_client($subscription)[0];
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
    
                <a href="/pages/client-info.php?client=<?php echo $client_name; ?>" type="button"
                   class="btn btn-primary btn-lg btn-block green-button">Back to Client Page</a>
    
                <a href="/pages/edit-subscription-info.php?subscription=<?php echo $_GET['subscription']; ?>"
                   class="btn btn-primary btn-lg btn-block blue-button">Edit Subscription Information
                </a>
    
                <button type="button" onclick="archiveSubscription(<?php echo $subscription['Website_ID'];?>);" id="archive-btn" class="btn btn-primary btn-lg btn-block red-button">Archive Subscription Information</button>
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