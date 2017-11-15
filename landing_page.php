<!--
	Application: CMK Marketing Customer Management System
	Module: Main Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: The main page of system for logged-in users.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
    <meta charset="UTF-8">
    <title>Client Management Homepage</title>

    <!-- Personal CSS -->
    <link rel="stylesheet" href="/css/main.css">

    <link rel="stylesheet" href="/css/landing_page.css">

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

    <!-- Found on https://mdbootstrap.com/content/tables/ -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>

<!-- Taken from: https://mdbootstrap.com/content/tables/ -->
<!-- Inline Javascript for now, change it later -->
<script>
    $(document).ready(function () {
        $('#example').DataTable();
        $('#example1').DataTable();
        $('#example5').DataTable();
        // $('select').addClass('mdb-select');
        // $('.mdb-select').material_select();
    });
</script>

<!-- Page Content -->
<body>
<?php include 'include/navbar.html';
?>

<div class="container my-4">
    <div class="row" id="main-search">
        <div class="col-md-3">
            <a class="btn btn-primary btn-block green-button search-btn" href="pages/add-new-client.php">Add New Client</a>
        </div>

        <div class="col-md-9">
            <div class="input-group stylish-input-group">
					<span class="input-group-addon">
						<button type="submit">
							<img alt="Search" src="/img/icons/search.png" width="24" height="24">
						</button>
					</span>
                <input type="text" class="form-control" placeholder="Search Clients">
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <div class="col">

            <!-- Project List -->
            <div class="category-list" id="project-category">

                <div class="category-header">
                    <div class="row">
                        <div class="col col-3">Project</div>
                        <div class="col col-5">Planning URL</div>
                        <div class="col col-2">Client</div>
                        <div class="col col-2 dropdown-elem">
                            <div class="dropdown show">
                                <a class="btn btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Due in: 2 Weeks
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">2 Weeks</a>
                                    <a class="dropdown-item" href="#">1 Month</a>
                                    <a class="dropdown-item" href="#">3 Months</a>
                                    <a class="dropdown-item" href="#">6 Months</a>
                                    <a class="dropdown-item" href="#">1 Year</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry-wrapper">
                	<?php
                    require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/subscription.php";
                    $all_projects = all_project();

                    foreach ($all_projects as $project) {
                        echo '<a href="' . "/pages/subscription-info.php?subscription=" .
                            $project['Project_ID'] . '"class="entry-link">';
                        echo '<div class="subscription-entry category-entry">';
                        echo '<div class="row">';
                        echo '<div class="col col-3">' . $project['ProjectName'] . '</div>';
                        echo '<div class="col col-5">' . $project['Basecamp_URL'] . '</div>';

                        $name_of_client = find_project_client($project)[0];
                        echo '<div class="col col-2">' . $name_of_client['Companyname'] . '</div>';
                        echo '<div class="col col-2 date-field"><span>' . $project['End_Date'] . '</span></div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                    ?>
                    <!-- <a href="#" class="entry-link">
                        <div class="project-entry category-entry">
                            <div class="row">
                                <div class="col col-3">7-R058 Year-End Sale Email</div>
                                <div class="col col-5">https://basecamp.com/####/projects/####/</div>
                                <div class="col col-2">Client</div>
                                <div class="col col-2 date-field">
                                    <span>Mar. 15, 2018</span>
                                </div>
                            </div>
                        </div>
                    </a> -->
                </div>

            </div>

            <!-- Subscriptions List -->
            <div class="category-list" id="subscription-category">

                <div class="category-header">
                    <div class="row">
                        <div class="col col-3">Website</div>
                        <div class="col col-2">Domain</div>
                        <div class="col col-3">Hosted Location</div>
                        <div class="col col-2">Client</div>
                        <div class="col col-2 dropdown-elem">
                            <div class="dropdown show">
                                <a class="btn btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Due in: 2 Weeks
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">2 Weeks</a>
                                    <a class="dropdown-item" href="#">1 Month</a>
                                    <a class="dropdown-item" href="#">3 Months</a>
                                    <a class="dropdown-item" href="#">6 Months</a>
                                    <a class="dropdown-item" href="#">1 Year</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry-wrapper">
                	<?php
                    require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/subscription.php";
                    $all_subscriptions = all_subscription();

                    foreach ($all_subscriptions as $subscription) {
                        echo '<a href="' . "/pages/subscription-info.php?subscription=" .
                            $subscription['Website_ID'] . '"class="entry-link">';
                        echo '<div class="subscription-entry category-entry">';
                        echo '<div class="row">';
                        echo '<div class="col col-3">' . $subscription['Site_Name'] . '</div>';
                        echo '<div class="col col-2">' . $subscription['Domain'] . '</div>';
                        echo '<div class="col col-3">' . $subscription['Host_Location'] . '</div>';

                        $name_of_client = find_subscription_client($subscription)[0];
                        echo '<div class="col col-2">' . $name_of_client['Companyname'] . '</div>';
                        echo '<div class="col col-2 date-field"><span>' . $subscription['Annual_Renewal'] . '</span></div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                    ?>
                    <!-- <a href="#" class="entry-link">
                        <div class="subscription-entry category-entry">
                            <div class="row">
                                <div class="col col-3">Pocket of Sunshine</div>
                                <div class="col col-2">sunshine-pocket.com</div>
                                <div class="col col-3">https://www.link.com/</div>
                                <div class="col col-2">Wolters Kluwer</div>
                                <div class="col col-2 date-field">
                                    <span>Mar. 15, 2018</span>
                                </div>
                            </div>
                        </div>
                    </a> -->
                </div>

            </div>

            <!-- Client List -->
            <div class="category-list" id="client-category">

                <div class="category-header">
                    <div class="row">
                        <div class="col col-3">Client</div>
                        <div class="col col-2">Main Contact</div>
                        <div class="col col-3">Contact Email</div>
                        <div class="col col-2">Subscriptions</div>
                        <div class="col col-2">Projects</div>
                    </div>
                </div>

                <div class="entry-wrapper">
                    <?php
                    require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";
                    $all_companies = all_company();

                    foreach ($all_companies as $company) {
                        echo '<a href="' . "/pages/client-info.php?client=" .
                            $company['Companyname'] . '"class="entry-link">';
                        echo '<div class="client-entry category-entry">';
                        echo '<div class="row">';
                        echo '<div class="col col-3">' . $company['Companyname'] . '</div>';
                        echo '<div class="col col-2">' . $company['Contactname'] . '</div>';
                        echo '<div class="col col-3">' . $company['Email'] . '</div>';
                        echo '<div class="col col-2">1</div>';
                        echo '<div class="col col-2">0</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                    ?>
                    <!-- <a href="#" class="entry-link">
                        <div class="client-entry category-entry">
                            <div class="row">
                                <div class="col col-3">Wolters Kluwer</div>
                                <div class="col col-2">Sally Goldberg</div>
                                <div class="col col-3">email.address@gmail.com</div>
                                <div class="col col-2">1</div>
                                <div class="col col-2">1</div>
                            </div>
                        </div>
                    </a> -->
                </div>

            </div>
        </div>
    </div>
</div>
</body>

</html>
