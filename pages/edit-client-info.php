<!--
	Application: CMK Marketing Customer Management System
	Module: Edit Client Information Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Quick page to let the user edit client details in the database.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
    <meta charset="UTF-8">
    <title>Edit Client Information</title>
    <?php include '../include/header-files.php'; ?>
</head>


<!-- Page Content -->
<body>
<?php
include '../include/navbar.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";

$company = $_GET['client']; // get from param
$company = search_company($company)[0];
?>

<form name="form" action="" method="post">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div id="left-column" class="col-md-5 my-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <input type="text" class="form-control" id="company-name" name="company-name"
                               placeholder="Enter Name" value="<?php echo $company['Companyname']; ?>">
                    </div>

                    <img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

                    <div class="card-body">
                        <h4 class="card-title">Description</h4>
                        <textarea class="form-control" name="company-description" id="company-description"
                                  rows="3"><?php echo $company['Description']; ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block green-button">Save Client Info</button>
            </div>

            <!-- Right Column -->
            <div id="right-column" class="col-md-7 my-4">
                <!-- Main Contact Info -->
                <div class="sidebar">
                    <h4 class="sidebar-header">Main Contact Info</h4>

                    <div class="sidebar-content">
                        <ul id="client-info" class="list-group">
                            <li class="client-name list-group-item">
                                <img src="../img/icons/person.png" alt="Person Icon" width="24" height="24">
                                <input type="text" class="form-control" id="contact-name" placeholder="Enter Name"
                                       name=contact-name value="<?php echo $company['Contactname']; ?>">
                            </li>
                            <li class="client-phone list-group-item">
                                <img src="../img/icons/phone.png" alt="Phone Icon" width="24" height="24">
                                <input type="phone" class="form-control" id="contact-number"
                                       placeholder="Enter Phone Number (digits only)" name="contact-number"
                                       value="<?php echo $company['Phone']; ?>">
                            </li>
                            <li class="client-email list-group-item">
                                <img src="../img/icons/mail.png" alt="Mail Icon" width="24" height="24">
                                <input type="email" class="form-control" id="contact-email" placeholder="Enter Email"
                                       name="contact-email" value="<?php echo $company['Email']; ?>">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/modCompany.php";

if (isset($_POST['company-name'])) {
    $array = array(
        "Company_ID" => $company['Company_ID'],
        "Companyname" => $_POST['company-name'],
        "Status" => "1",
        "Contactname" => $_POST['contact-name'],
        "Description" => $_POST['company-description'],
        "Email" => $_POST['contact-email'],
        "Image_URL" => "Companyname.jpg",
        "Phone" => $_POST['contact-number'],
    );
    try {
        modCompany($array);
        echo "<script>
                window.location.href='/pages/client-info.php?client=$_GET[client]';
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
