<?php include 'header.php'; ?>
<?php if($_SESSION[ 'phone']==NULL) { echo "<script> window.location.href='recevier-login.php';</script>"; } ?>
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
	<div class="container">
		<div class="alert alert-success mt-5" role="alert">
			<h4 class="alert-heading">Welcome   
	  	<?php
		  $id = $_SESSION['phone'];

		  $sql = "SELECT name FROM receiver WHERE phone = '$id'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
			    echo $row['name'];
			  }
			} else {
			  echo '';
			}
		  ?>
  	
  </h4>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
			<hr>
			<p class="mb-0">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
		</div>
	</div>

<?php include 'logout.php' ?>
	
</body>
</html>