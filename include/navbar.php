<!--
	Application: CMK Marketing Customer Management System
	Module: Navbar Include

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Code for site's navigation.
-->
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/accounts/auth.php"; ?>


<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
	<div class="container">
		<p class="nav-link" style="margin: 0;color:#ffffff;">Welcome <?php echo $_SESSION['user']['FirstName'] ?> !</p>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="../landing_page.php">All Clients</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/pages/users.php">Admin</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/accounts/logout.php">Log Out</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
