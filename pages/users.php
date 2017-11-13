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
	<title>Client Management Homepage</title>

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

	<!-- Page Content -->
	<div class="container">

		<table id="example" class="table table-striped table-bordered " cellspacing="0" width=auto>
				<thead>
						<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>User Email</th>
								<!-- <th>Age</th>
								<th>Start date</th>
								<th>Salary</th> -->
						</tr>
				</thead>
				<tfoot>
						<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>User Email</th>
								<!-- <th>Age</th>
								<th>Start date</th>
								<th>Salary</th> -->
						</tr>
				</tfoot>
				<tbody>
						<tr>
								<td>Tiger</td>
								<td>Nixon</td>
								<td>tnixon@gmail.com</td>
								<!-- <td>61</td>
								<td>2011/04/25</td>
								<td>$320,800</td> -->
						</tr>
						<tr>
								<td>Garrett</td>
								<td>Winters</td>
								<td>gwinters@gmail.com</td>
								<!-- <td>63</td>
								<td>2011/07/25</td>
								<td>$170,750</td> -->
						</tr>
						<tr>
								<td>Ashton</td>
								<td>Cox</td>
								<td>acox@gmail.com</td>
								<!-- <td>66</td>
								<td>2009/01/12</td>
								<td>$86,000</td> -->
						</tr>
						<tr>
								<td>Cedric</td>
								<td>Kelly</td>
								<td>ckelly@gmail.com</td>
								<!-- <td>22</td>
								<td>2012/03/29</td>
								<td>$433,060</td> -->
						</tr>
					</tbody>
				</table>
	</div>
</body>


</html>
