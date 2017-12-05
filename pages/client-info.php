<!--
	Application: CMK Marketing Customer Management System
	Module: Client Information Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Shows the details of the client being examined - including their subscriptions and projects.
-->


<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
    <meta charset="UTF-8">
    <title>CMS Client Information</title>
    <?php include '../include/header-files.php';?>
</head>


<!-- Page Content -->
<body>
    <?php include '../include/navbar.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/modCompany.php";

        $company = $_GET['client']; // get from param
        $company = search_company($company)[0];
        $all_subscriptions = search_company_subscription($company);
        $all_projects = search_company_project($company);
    ?>

    <!-- Client Content -->
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div id="left-column" class="col-md-4 my-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title" style="margin-bottom:0;"> <?php echo $company['Companyname'] ?></h4>
                    </div>

                    <img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

                    <div class="card-body">
                        <h4 class="card-title">Description</h4>
                        <p class="card-text"><?php echo nl2br($company['Description'], false); ?>
                        </p>
                    </div>
                </div>

                <a href="/pages/edit-client-info.php?client=<?php echo $_GET['client'];?>" class="btn btn-primary btn-lg btn-block blue-button">Edit Client Information</a>

                <!-- Archiving Button + Modal Confirmation -->
                <button type="button" data-toggle="modal" data-target="#client-archive" id="archive-btn" class="btn btn-primary btn-lg btn-block red-button">Archive Client Information</button>

                <div class="modal fade" id="client-archive" tabindex="-1" role="dialog" aria-labelledby="client-archive-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="client-archive-label">Archive Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                            Are you sure you want to archive this client? If you do, any related projects and subscriptions will be archived as well - and so not accessible via this application.
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary gray-button" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary green-button" onclick="archiveClient(<?php echo $company['Company_ID'];?>);">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div id="right-column" class="col-md-8 my-4">

                <!-- Main Contact Info -->
                <div class="sidebar">
                    <h4 class="sidebar-header">Main Contact Info</h4>

                    <div class="sidebar-content">
                        <ul id="client-info" class="list-group">
                            <li class="client-name list-group-item">
                                <img src="../img/icons/person.png" alt="Person Icon" width="24" height="24">
                                <span class="name"><?php echo $company['Contactname'] ?></span>
                            </li>
                            <li class="client-phone list-group-item">
                                <img src="../img/icons/phone.png" alt="Phone Icon" width="24" height="24">
                                <span class="phone"><?php echo '(' . substr($company['Phone'], 0, 3) . ')-'
                                        . substr($company['Phone'], 3, 3) .
                                        '-' . substr($company['Phone'], 6, 3) ?></span>
                            </li>
                            <li class="client-email list-group-item">
                                <img src="../img/icons/mail.png" alt="Mail Icon" width="24" height="24">
                                <span class="email"><?php echo $company['Email'] ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Subscriptions -->
                <div id="subscriptions" class="sidebar">
                    <a href="/pages/add-new-subscription.php?client=<?php echo $company['Companyname'] ?>" class="btn btn-primary add-subscription rounded-circle blue-button">
                        <strong>&#43;</strong></a>

                    <h4 class="sidebar-header">Subscriptions</h4>

                    <div class="sidebar-content list-group">
                        <?php foreach ($all_subscriptions as $subscription):?>
                            <a href="/pages/subscription-info.php?subscription=<?php echo $subscription['Website_ID'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $subscription['Site_Name']; ?></h5>
                                </div>
                                <p class="mb-1 text-muted"><?php echo $subscription['Domain']; ?></p>
                                <small class="due-date"><strong>Deadline: <?php
                                    $time = new DateTime($subscription['Annual_Renewal']);
                                    echo $time->format('M. d, Y'); ?>
                                </strong></small>
                            </a>
                        <?php endforeach;?>
                    </div>

                </div>

                <!-- Projects -->
                <div id="projects" class="sidebar">
                    <a href="/pages/add-new-project.php?client=<?php echo $company['Companyname'] ?>" class="btn btn-primary add-project rounded-circle blue-button">
                        <strong>&#43;</strong></a>

                    <h4 class="sidebar-header">Projects</h4>

                    <div class="sidebar-content list-group">
                        <?php foreach ($all_projects as $project):?>
                            <a href="/pages/project-info.php?project=<?php echo $project['Project_ID'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $project['ProjectName']; ?></h5>
                                </div>
                                <p class="mb-1 text-muted"><?php echo $project['Basecamp_URL']; ?></p>
                                <small class="due-date"><strong>Deadline: <?php
                                    $time = new DateTime($project['End_Date']);
                                    echo $time->format('M. d, Y'); ?>
                                </strong></small>
                            </a>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Client Content -->
</body>

</html>