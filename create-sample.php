<?php include 'header.php'; ?>
<?php if($_SESSION[ 'license']==NULL) { header ( 'Location:hospital-login.php'); } ?>
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
	<div class="container">
		<center>
			<div class="col-md-7 col-lg-8">
				<h4 class="mt-5 mb-3">Add Blood Samples</h4>
				<form class="needs-validation" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
					<div class="row g-3">
						<div class="col-md-6">
							<label for="blood" class="form-label">Blood Group</label>
							<select class="form-select" name="blood" required>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
							</select>
							<div class="invalid-feedback">Please select a valid Blood Group.</div>
						</div>
						<div class="col-sm-6">
							<label for="units" class="form-label">No. of Units Available</label>
							<input type="number" class="form-control" id="units" name="units" placeholder="" value="" required>
							<div class="invalid-feedback">Required.</div>
						</div>
						<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
				</form>
				</div>
			</div>
		</center>
	</div>
<?php
if (isset($_REQUEST['submit'])) {
    $blood    = $_REQUEST['blood'];
    $units    = $_REQUEST['units'];
    $license  = $_SESSION['license'];
    $blood_id = rand();
    $sql      = "INSERT INTO samples (blood_id, license, blood, units) VALUES ('$blood_id', '$license', '$blood', '$units')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Blood Sample Added!!');  window.location.href='create-sample.php';</script>";
    } else {
        echo "<script type='text/javascript'> alert('Error Creating Record! Please Try again later')</script>";
    }
}
?>


<div class="container mt-5 mb-5 w-50">
	<center><h3>Avaliable Blood Samples</h3></center>
	<table class="table mt-3">
  <thead class="table-dark">
    <td>Blood ID</td>
    <td>Blood Group</td>
    <td>Units</td>
    <td>Date Created</td>
    <td>Status</td>
    <td>Modify Status</td>
  </thead>
  <tbody>

  	<?php
  		$license = $_SESSION['license'];

  		$sql = "SELECT * FROM samples WHERE license ='$license'";

  		$result = $conn->query($sql);

  		if ($result->num_rows > 0)
  		{
		  while($row = $result->fetch_assoc()) 
		  {
		    echo "<tr><td>".$row['blood_id']."</td><td>".$row['blood']."</td><td>".$row['units']."</td><td>".$row['date']."</td><td>".$row['status']."</td><td><a href=modify-status.php?blood_id=".$row['blood_id']."&status=Active class='btn btn-info btn-sm'>Active</a> &nbsp; <a href=modify-status.php?blood_id=".$row['blood_id']."&status=Deleted class='btn btn-danger btn-sm'>Delete</a></td></tr>";
		  }
		}
  	?>
  </tbody>
</table>
<br><br>
</div>


<?php
include 'logout.php';
include 'footer.php';
?>