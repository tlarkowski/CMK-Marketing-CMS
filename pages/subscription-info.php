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
            <div id="left-column" class="col-md-4 my-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title" style="margin-bottom:0;"><?php echo $subscription['Site_Name']; ?></h4>
                    </div>
    
                    <img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">
    
                    <div class="card-body">
                        <h4 class="card-title">Description</h4>
                        <p class="card-text"><?php echo nl2br($subscription['Description'], false); ?></p>
                    </div>
                </div>
    
                <a href="/pages/client-info.php?client=<?php echo $client_name; ?>" type="button"
                   class="btn btn-primary btn-lg btn-block green-button">Back to Client Page</a>
    
                <a href="/pages/edit-subscription-info.php?subscription=<?php echo $_GET['subscription']; ?>"
                   class="btn btn-primary btn-lg btn-block blue-button">Edit Subscription Information
                </a>
    
                <!-- Archiving Button + Modal Confirmation -->
                <button type="button" data-toggle="modal" data-target="#archive-sub" id="archive-btn" class="btn btn-primary btn-lg btn-block red-button">Archive Subscription Information</button>

                <div class="modal fade" id="archive-sub" tabindex="-1" role="dialog" aria-labelledby="archive-sub-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="archive-sub-label">Archive Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                            Are you sure you want to archive this subscription? It won't be accessible from this application once you do.
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary gray-button" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary green-button" onclick="archiveSubscription(<?php echo $subscription['Website_ID'];?>, '<?php echo $client_name;?>');">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Right Column -->
            <div id="right-column" class="col-md-8 my-4">
    
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
                                    // $today = new DateTime(date("Y-m-d H:i:s"));
                                    // $warning_date = clone $renewal_time;
                                    // $warning_date->modify("-1 month");

                                    echo $renewal_time->format('M. d, Y');
                                    ?></div>
                                <div class="col-6">
                                    <?php if ($subscription['Pay'] == '0'): ?>
                                        <!-- Confirmation Modal for Setting Project Complete/Archiving -->
                                        <button type="button" data-toggle="modal" data-target="#set-invoiced" id="archive-btn" class="btn btn-primary btn-lg btn-block red-button due-date-button">
                                            <small class="due-date-btn">Payment Due</small>
                                        </button>

                                        <div class="modal fade" id="set-invoiced" tabindex="-1" role="dialog" aria-labelledby="set-invoiced-label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="set-invoiced-label">Confirm Company Invoice</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        Are you sure this company has been invoiced? The renewal date will automatically be updated by 1 year and will have reminders sent out accordingly.
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary gray-button" data-dismiss="modal">Close
                                                        </button>
                                                        <button type="button" class="btn btn-primary green-button"
                                                                onclick="setInvoice(<?php echo $subscription['Website_ID'];?>, '<?php echo $subscription['Annual_Renewal'];?>');">
                                                            Confirm
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-8 small-padding">
                                                    <p class="btn btn-primary btn-lg btn-block gray-button due-date-button no-hover">
                                                        <small class="due-date-btn">Invoiced</small>
                                                    </p>
                                                </div>
                                                <div class="col-4 small-padding">
                                                    <!-- Confirmation Modal for Setting Project Incomplete -->
                                                    <button type="button" data-toggle="modal" data-target="#set-incomplete" id="archive-btn" class="btn btn-primary btn-lg btn-block red-button due-date-button">
                                                        <small class="due-date-btn">Reset</small>
                                                    </button>

                                                    <div class="modal fade" id="set-incomplete" tabindex="-1" role="dialog" aria-labelledby="set-incomplete-label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="set-incomplete-label">Confirm Subscription Reset</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    Are you sure you want to reset the invoice status of this subscription? The renewal date will be decreased by 1 year, and the appropriate reminders will be sent out accordingly.
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary gray-button" data-dismiss="modal">Close
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary green-button"
                                                                            onclick="resetInvoice(<?php echo $subscription['Website_ID'];?>, '<?php echo $subscription['Annual_Renewal'];?>');">
                                                                        Confirm
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Notes on Subscription -->
                <div class="sidebar">
                    <h4 class="sidebar-header">Notes on Subscription</h4>
    
                    <div class="sidebar-content">
                        <p id="content-notes"><?php echo nl2br($subscription['Notes'], false); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscription Content -->
</body>

</html>