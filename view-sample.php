<?php include 'header.php'; 
if($_SESSION['phone']==NULL) 
{ echo "<script>window.location.href='receiver-login.php';</script>"; } ?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.84.0">
	<title>Blood Bank</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">
	<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		.bd-placeholder-img {
		                font-size: 1.125rem;
		                text-anchor: middle;
		                -webkit-user-select: none;
		                -moz-user-select: none;
		                user-select: none;
		              }
		        
		              @media (min-width: 768px) {
		                .bd-placeholder-img-lg {
		                  font-size: 3.5rem;
		                }
		              }
	</style>
	<!-- Custom styles for this template -->
	<link href="style.css" rel="stylesheet">
</head>

<body>
	<main>
		<header class="p-3 bg-dark text-white">
			<div class="container">
				<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
					<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
						<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
							<use xlink:href="#bootstrap" />
						</svg>
					</a>
					<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
						<li><a href="receiver.php" class="nav-link px-2 text-secondary">Home</a>
						</li>
						<li><a href="view-sample.php" class="nav-link px-2 text-white">Blood Samples</a>
						</li>
						<li><a href="my-requests.php" class="nav-link px-2 text-white">My Requests</a>
						</li>
					</ul>
					<div class="text-end">
						<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
							<input type="submit" class="btn btn-outline-warning" type="button" value="Logout" name="Logout">
						</form>
					</div>
				</div>
			</div>
			</div>
		</header>
	</main>

	<div class="container p-5">
		<h2>Avalaible Blood Samples</h2><br>

		<table class="table table-hover">
			  <thead class="table-dark">
			    <td>Blood ID</td>
			    <td>Blood Group</td>
			    <td>Units</td>
			    <td>Date Created</td>
			    <td>Hospital</td>
			    <td>Info   </td>
			  </thead>
			  <tbody>

			  	<?php

			  		$sql = "SELECT * FROM samples LEFT JOIN hospitals ON samples.license = hospitals.license WHERE status = 'Active'";
			  		$result = $conn->query($sql);

			  		if ($result->num_rows > 0)
			  		{
					  while($row = $result->fetch_assoc()) {
					    echo "<tr><td>".$row['blood_id']."</td><td>".$row['blood']."</td><td>".$row['units']."</td><td>".$row['date']."</td><td>".$row['name']."</td><td><a href=request-sample.php?blood_id=".$row['blood_id']."&license=".$row['license']." class='btn btn-sm btn-info'>Request Sample</a></td></tr>";
					  }
					} else {
					  echo "<script> alert('Error displaying sample!! try again later'); </script>";
					}
			  	?>

			  </tbody>
		</table>


	</div>

<?php include 'logout.php'; include 'footer.php'; ?>

