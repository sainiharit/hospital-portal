<?php include 'header.php'; ?>
<?php if($_SESSION[ 'license']==NULL) { echo "<script>window.location.href='hospital-login.php';</script>"; } ?>
<!doctype html>
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
					<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
						<li><a href="hospital.php" class="nav-link px-2 text-secondary">Home</a>
						</li>
						<li><a href="create-sample.php" class="nav-link px-2 text-white">Blood Samples</a>
						</li>
						<li><a href="view-request.php" class="nav-link px-2 text-white">View Requests</a>
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

		<h2>Blood Sample Requests</h2>
		<table class="table mt-3">
		  <thead class="table-dark">
		    <td>Request ID</td>
		    <td>Blood Id</td>
		    <td>Blood Group</td>
		    <td>Receiver Number</td>
		    <td>Receiver Name</td>
		    <td>Date Created</td>
		    <td>Status</td>
		    <td>Change Status</td>
		  </thead>
		  <tbody>
		  <?php
			$license = $_SESSION['license'];
			$sql = "SELECT * FROM requests 
					  				LEFT JOIN receiver 
					  				ON requests.receiver_id = receiver.phone 
					  				LEFT JOIN samples 
					  				ON requests.blood_id = samples.blood_id 
					  				WHERE requests.license = '$license'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0)
			{
			    while ($row = $result->fetch_assoc())
			    {
			        echo "<tr><td>" . $row['request_id'] . "</td><td>" . $row['blood_id'] . "</td><td>" . $row['blood'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['name'] . "</td><td>" . $row['date'] . "</td><td>" . $row['req_status'] . "</td><td><a href=approve-request.php?request_id=" . $row['request_id'] . "&status=Approved class='btn btn-sm btn-success'>Approve</a> &nbsp; &nbsp;<a href=approve-request.php?request_id=" . $row['request_id'] . "&status=Denied class='btn btn-sm btn-warning'>Deny</a></td></tr>";
			    }
			}
			else
			{
			    echo $conn->error;
			}
		   ?>
		  </tbody>
		</table>
		
	</div>


	<?php 
	      include 'logout.php';
		  include 'footer.php';
	?>