<!--
	Application: CMK Marketing Customer Management System
	Module: Main Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: The main page of system for logged-in users.
-->
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/accounts/auth.php"; ?>

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
    <meta charset="UTF-8">
    <title>Client Management Homepage</title>
    <?php include './include/header-files.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";
    ?>
</head>

<!-- Page Content -->
<body>
<?php include 'include/navbar.php'; ?>

<div class="container my-4">
    <div class="row" id="main-search">
        <div class="col-md-3">
            <a class="btn btn-primary btn-block green-button search-btn" href="pages/add-new-client.php">Add New
                Client</a>
        </div>
        <form method="post" action="">
            <div class="col-md-9">
                <div class="input-group stylish-input-group">
    					<span class="input-group-addon">
    						<button id="search" type="submit">
    							<img alt="Search" src="/img/icons/search.png" width="24" height="24">
    						</button>
    					</span>
                    <input id="SearchClients" name="search" type="text" class="form-control"
                           placeholder="Search Clients">
                </div>
            </div>
        </form>
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
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        value="2 Week">
                                    Due in: <span id="project-span">2 Weeks</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" value="2 week">2 Weeks</button>
                                    <button class="dropdown-item" type="button" value="1 month">1 Month</button>
                                    <button class="dropdown-item" type="button" value="3 month">3 Months</button>
                                    <button class="dropdown-item" type="button" value="6 month">6 Months</button>
                                    <button class="dropdown-item" type="button" value="all">All Projects</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry-wrapper">
                    <?php
                    require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchProject.php";
                    $upcoming_projects = project_due("2 week");

                    foreach ($upcoming_projects as $project) {
                        echo '<a href="' . "/pages/project-info.php?project=" .
                            $project['Project_ID'] . '"class="entry-link">';
                        echo '<div class="project-entry category-entry">';
                        echo '<div class="row">';
                        echo '<div class="col col-3">' . $project['ProjectName'] . '</div>';
                        echo '<div class="col col-5">' . $project['Basecamp_URL'] . '</div>';

                        $client = all_project_client_info($project)[0];
                        $time = new DateTime($project['End_Date']);


                        echo '<div class="col col-2">' . $client['Companyname'] . '</div>';
                        echo '<div class="col col-2 date-field"><span>' . $time->format('M. d, Y') . '</span></div>';
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
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        value="2 week">
                                    Due in: <span id="subscription-span">2 Weeks</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" value="2 week">2 Weeks</button>
                                    <button class="dropdown-item" type="button" value="1 month">1 Month</button>
                                    <button class="dropdown-item" type="button" value="3 month">3 Months</button>
                                    <button class="dropdown-item" type="button" value="6 month">6 Months</button>
                                    <button class="dropdown-item" type="button" value="all">All Subscriptions</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry-wrapper">
                    <?php
                    require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchSubscription.php";
                    $upcoming_subscriptions = subscription_due("2 week");

                    foreach ($upcoming_subscriptions as $subscription) {
                        echo '<a href="' . "/pages/subscription-info.php?subscription=" .
                            $subscription['Website_ID'] . '"class="entry-link">';
                        echo '<div class="subscription-entry category-entry">';
                        echo '<div class="row">';
                        echo '<div class="col col-3">' . $subscription['Site_Name'] . '</div>';
                        echo '<div class="col col-2">' . $subscription['Domain'] . '</div>';
                        echo '<div class="col col-3">' . $subscription['Host_Location'] . '</div>';

                        $client = all_subscription_client_info($subscription)[0];
                        $time = new DateTime($subscription['Annual_Renewal']);

                        echo '<div class="col col-2">' . $client['Companyname'] . '</div>';
                        echo '<div class="col col-2 date-field"><span>' . $time->format('M. d, Y') . '</span></div>';
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
                    $all_companies = all_companies();

                    foreach ($all_companies as $company) {
                        echo '<a href="' . "/pages/client-info.php?client=" .
                            $company['Companyname'] . '"class="entry-link">';
                        echo '<div class="client-entry category-entry">';
                        echo '<div class="row">';
                        echo '<div class="col col-3">' . $company['Companyname'] . '</div>';
                        echo '<div class="col col-2">' . $company['Contactname'] . '</div>';
                        echo '<div class="col col-3">' . $company['Email'] . '</div>';

                        $subscription_count = company_subscription_count($company);
                        $project_count = company_project_count($company);

                        echo '<div class="col col-2">' . $subscription_count . '</div>';
                        echo '<div class="col col-2">' . $project_count . '</div>';
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

<?php
echo '<div class="container my-4">';
echo '<div class="category-list" id="client-category">';
echo '<div class="category-header">
    <div class="row">
        <div class="col col-3">Client</div>
        <div class="col col-2">Main Contact</div>
        <div class="col col-3">Contact Email</div>
        <div class="col col-2">Subscriptions</div>
        <div class="col col-2">Projects</div>
    </div>
</div>';
echo '<div class="entry-wrapper">';
if (isset($_POST['search'])) {

    $company_info = $_POST['search'];
    $result = search_company_Like($company_info);
    foreach($result as $item) {
    // echo $item["Companyname"];
    // echo $item["Contactname"];
    // echo $item["Email"];
    //
    // // to know what's in $item
    // echo '<pre>'; var_dump($item);


    require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";

        echo '<a href="' . "/pages/client-info.php?client=" .
              $item["Companyname"]  . '"class="entry-link">';
        echo '<div class="client-entry category-entry">';
        echo '<div class="row">';
        echo '<div class="col col-3">' .   $item["Companyname"]  . '</div>';
        echo '<div class="col col-2">' .   $item["Companyname"]  . '</div>';
        echo '<div class="col col-3">' .   $item["Email"] . '</div>';
        echo '<div class="col col-2">' . $subscription_count . '</div>';
        echo '<div class="col col-2">' . $project_count . '</div>';

        echo '</div>';
        echo '</div>';
        echo '</a>';

}
echo '</div>';
echo '</div>';
echo '</div>';

    // print_r($result);
}
?>
</body>

</html>
