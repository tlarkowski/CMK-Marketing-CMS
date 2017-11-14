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
	$(document).ready(function() {
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
		<div class="row">
			<div class="col">
				<a href="/pages/client-info.php"><h2>Client Info</h2></a>

				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Project</th>
							<th>Planning URL</th>
							<th>Client</th>
							<th>Due Date</th>
							<!-- <th>Age</th>
							<th>Start date</th>
							<th>Salary</th> -->
						</tr>
					</thead>
					
					<tfoot>
						<tr>
							<th>Project</th>
							<th>Planning URL</th>
							<th>Client</th>
							<th>Due Date</th>
							<!-- <th>Age</th>
							<th>Start date</th>
							<th>Salary</th> -->
						</tr>
					</tfoot>
					
					<tbody>
						<tr>
							<td>End Sale Email</td>
							<td>basecamp.com</td>
							<td>Joe Smith</td>
							<td>2011/04/25</td>
							<!-- <td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td> -->
						</tr>
					</tbody>
				</table>

				<table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Website</th>
							<th>Domain</th>
							<th>URL</th>
							<th>Client</th>
							<!-- <th>Age</th>
							<th>Start date</th>
							<th>Salary</th> -->
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th>Website</th>
							<th>Domain</th>
							<th>URL</th>
							<th>Client</th>
							<!-- <th>Age</th>
							<th>Start date</th>
							<th>Salary</th> -->
						</tr>
					</tfoot>

					<tbody>
						<tr>
							<td>Pocket of Sunshine</td>
							<td>sunshine-pocket.com</td>
							<td>http://www.link.com</td>
							<td>Winters Klower</td>
							<!-- <td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td> -->
						</tr>
						<tr>
							<td>Pocket of Sunshine</td>
							<td>sunshine-pocket.com</td>
							<td>http://www.link.com</td>
							<td>Winters Klower</td>
							<!-- <td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td> -->
						</tr>
					</tbody>
				</table>

				<table id="example5" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Client</th>
							<th>Main Contact</th>
							<th>Contact Email</th>
							<!-- <th>Age</th>
							<th>Start date</th>
							<th>Salary</th> -->
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th>Client</th>
							<th>Main Contact</th>
							<th>Contact Email</th>
							<!-- <th>Age</th>
							<th>Start date</th>
							<th>Salary</th> -->
						</tr>
					</tfoot>

					<tbody>
						<tr>
							<td>Addam's Company Matters</td>
							<td>John Smith</td>
							<td>contact-email@gmail.com</td>
							<!-- <td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td> -->
						</tr>
						<tr>
							<td>Addam's Company Matters</td>
							<td>John Smith</td>
							<td>contact-email@gmail.com</td>
							<!-- <td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td> -->
						</tr>
						<tr>
							<td>Addam's Company Matters</td>
							<td>John Smith</td>
							<td>contact-email@gmail.com</td>
							<!-- <td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td> -->
						</tr>
						<tr>
							<td>Addam's Company Matters</td>
							<td>John Smith</td>
							<td>contact-email@gmail.com</td>
							<!-- <td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td> -->
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>
