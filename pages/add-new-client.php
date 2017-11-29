<!--
	Application: CMK Marketing Customer Management System
	Module: Add Client Information Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Quick page to let the user add a new client to the database.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
    <meta charset="UTF-8">
    <title>Add New Client</title>
    <?php include '../include/header-files.php';?>
</head>


<!-- Page Content -->
<body>
<?php include '../include/navbar.php'; ?>

<form name="form" action="" method="post">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div id="left-column" class="col-md-5 my-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <input type="text" name="company-name" class="form-control" id="company-name"
                               placeholder="Enter Name" required>
                    </div>

                    <img class="card-img-top" src="/img/no-image.jpg" alt="Company Image" width="100%" height="auto">

                    <div class="card-body">
                        <h4 class="card-title">Description</h4>
                        <textarea class="form-control" name="company-description" id="company-description"
                                  rows="3"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-md btn-block green-button" onclick="">Add Client Info</button>
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
                                <input type="text" class="form-control" name="contact-name" id="contact-name"
                                       placeholder="Enter Name" required>
                            </li>
                            <li class="client-phone list-group-item">
                                <img src="../img/icons/phone.png" alt="Phone Icon" width="24" height="24">
                                <input type="phone" class="form-control" name="contact-number" id="contact-number"
                                       placeholder="Enter Phone Number (digits only)" required>
                            </li>
                            <li class="client-email list-group-item">
                                <img src="../img/icons/mail.png" alt="Mail Icon" width="24" height="24">
                                <input type="email" class="form-control" name="contact-email" id="contact-email"
                                       placeholder="Enter Email" required>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</form>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/modCompany.php";

if (isset($_POST['company-name'])) {
    $array = array(
        "Companyname" => $_POST['company-name'],
        "Status" => "1",
        "Contactname" => $_POST['contact-name'],
        "Description" => $_POST['company-description'],
        "Email" => $_POST['contact-email'],
        "Image_URL" => "Companyname.jpg",
        "Phone" => $_POST['contact-number'],
    );
    try {
        addCompany($array);
        echo "<script>window.location.href='/';</script>";
    } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("' . $e->getMessage() . '")';
        echo '</script>';
    }
}

?>

</body>

</html>
