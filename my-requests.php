<?php include 'header.php'; ?>
<?php if($_SESSION['phone']==NULL) { header ( 'Location:recevier-login.php'); } ?>
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

	<div class="container mt-5">

		<h2>My Blood Sample Requests</h2>
		<table class="table mt-3">
		  <thead class="table-dark">
		    <td>Request ID</td>
		    <td>Blood Id</td>
		    <td>Blood Group</td>
		    <td>Hospital</td>
		    <td>Date Created</td>
		    <td>Status</td>
		    
		  </thead>
		  <tbody>

		  	<?php
		 		$phone = $_SESSION['phone'];
		  		$sql = "SELECT * FROM requests 
		  				LEFT JOIN hospitals ON requests.license = hospitals.license 
		  				LEFT JOIN samples ON requests.blood_id = samples.blood_id
		  				WHERE requests.receiver_id = '$phone'";
		  		$result = $conn->query($sql);
		  		if ($result->num_rows > 0)
		  		{
				  while($row = $result->fetch_assoc()) {
				    echo "<tr><td>".$row['request_id']."</td><td>".$row['blood_id']."</td><td>".$row['blood']."</td><td>".$row['name']."</td><td>".$row['date']."</td><td>".$row['req_status']."</td></tr>";
				  }
				}

		  	?>

		  </tbody>
		</table>
		
	</div>

<?php include 'logout.php' ?>
<?php include 'footer.php'; ?>
