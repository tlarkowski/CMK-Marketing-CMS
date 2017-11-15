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

	<!-- Personal CSS -->
	<link rel="stylesheet" href="/css/main.css">

	<!-- General CDN Additions -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<!-- Bootstrap CDN Additions -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<!-- Found on https://mdbootstrap.com/content/tables/ -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>

	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>

<script>
	$(document).ready(function() {
	    $('#example').DataTable();
	    // $('select').addClass('mdb-select');
	    // $('.mdb-select').material_select();
	});
</script>


<!-- Page Content -->
<body>
	<?php include '../include/navbar.html';?>

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
						<div class="user-entry category-entry">
							<div class="row">
								<div class="col col-4">Caitlin</div>
								<div class="col col-4">Sindoni</div>
								<div class="col col-4">caitlin@cmkmarketing.com</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>


</html>
