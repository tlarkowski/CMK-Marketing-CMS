<!--
	Application: CMK Marketing Customer Management System
	Module: Add New Subsription Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Allows user to add a new subscription (client depends on which client page the "add" button was clicked on).
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
    <meta charset="UTF-8">
    <title>Add New Subscription</title>
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- Personal CSS -->
    <link rel="stylesheet" href="/css/main.css">

    <!-- Personal JS -->
    <script src="/js/general.js"></script>

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
<?php include '../include/navbar.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/modSubscription.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";

?>


<form name="form" action="" method="post">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div id="left-column" class="col-md-5 my-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <input type="text" class="form-control" name="website-name" id="website-name"
                               placeholder="Enter Website Name"
                               required>
                    </div>

                    <img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

                    <div class="card-body">
                        <h4 class="card-title">Description</h4>
                        <textarea class="form-control" id="subscription-description" name="subscription-description"
                                  rows="3"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block green-button">Save New Subscription
                </button>
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
                                <div class="col-9"><input type="text" class="form-control" id="domain-name"
                                                          name='domain-name' placeholder="Enter Domain Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">Hosted Location</div>
                                <div class="col-9"><input type="text" class="form-control" id="hosted-loc"
                                                          name="hosted-loc" placeholder="Enter Hosted Location"
                                                          required></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Cost</div>
                                <div class="col-9"><input type="number" class="form-control" id="cost" name="cost"
                                                          required></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Go Live Date</div>
                                <div class="col-9"><input type="date" class="form-control" id="go-live-date"
                                                          name="go-live-date" required></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Start Date</div>
                                <div class="col-9"><input type="date" class="form-control" id="start-date"
                                                          name="start-date" required></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Website Type</div>
                                <div class="col-9"><input type="text" class="form-control" id="web-type" name="web-type"
                                                          placeholder="Enter Website Type" required></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Hours Planned</div>
                                <div class="col-9"><input type="number" class="form-control" id="planned-hours"
                                                          name="planned-hours" required></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Hours Tracked</div>
                                <div class="col-9"><input type="number" class="form-control" id="tracked-hours"
                                                          name="tracked-hours" required></div>
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
                                <div class="col-9"><input type="date" class="form-control" id="payment-due-date"
                                                          name="payment-due-date" required></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notes on Subscription -->
                <div class="sidebar">
                    <h4 class="sidebar-header">Notes on Subscription</h4>

                    <div class="sidebar-content">
                        <textarea class="form-control" id="content-notes" name="content-notes" rows="3"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<?php

$company = search_company($_GET['client'])[0];
if (isset($_POST['website-name'])) {

    $array = array(
        "Site_Name" => $_POST['website-name'],
        "Status" => "1",
        "Domain" => $_POST['domain-name'],
        "Company_ID" => $company['Company_ID'],
        "GoLive_Date" => $_POST['go-live-date'],
        "Project_Start" => $_POST['start-date'],
        "Hours_Tracked" => $_POST['tracked-hours'],
        "Hours_Planned" => $_POST['planned-hours'],
        "Type" => $_POST['web-type'],
        "Pay" => $_POST['cost'],
        "Host_Location" => $_POST['hosted-loc'],
        "Annual_Renewal" => $_POST['payment-due-date'],
        "Notes" => $_POST['content-notes']
    );
    try {
        addSubscription($array);
        echo '<script language="javascript">';
        echo 'alert("' . 'add successful' . '")';
        echo '</script>';

    } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("' . $e->getMessage() . '")';
        echo '</script>';
    }
}
echo '<script language="javascript">';
echo 'alert("' . 'not a valid string' . '")';
echo '</script>';


?>


</body>

</html>
