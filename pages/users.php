<!--
	Application: CMK Marketing Customer Management System
	Module: Users Page

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: List the systems currently logged employee users.
-->

<!DOCTYPE html>
<html>

<!-- Header Info -->
<head>
	<meta charset="UTF-8">
	<title>List of System Users</title>
    <?php include '../include/header-files.php';?>
</head>

<!-- Page Content -->
<body>
	<?php include '../include/navbar.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchUser.php";

        $all_users = all_users();
    ?>

    <div class="container my-4">
		<div class="row">
			<div class="col">
				<!-- Client List -->
				<div class="category-list" id="user-category">

					<div class="category-header">
						<div class="row">
							<div class="col col-4">First Name</div>
							<div class="col col-4">Last Name</div>
							<div class="col col-4">User Email</div>
						</div>
					</div>

					<div class="entry-wrapper">
						<?php foreach ($all_users as $user):?>
							<div class="user-entry category-entry">
								<div class="row">
									<div class="col col-4"><?php echo $user["FirstName"];?></div>
									<div class="col col-4"><?php echo $user["LastName"];?></div>
									<div class="col col-4"><?php echo $user["Email_Address"];?></div>
								</div>
							</div>
                        <?php endforeach;?>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>


</html>
