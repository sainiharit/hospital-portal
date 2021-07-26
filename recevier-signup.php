<?php
  include 'header.php';
  include 'nav-bar.php';
  ?>

  <main>

    <div class="container">
    <div class="row m-5">

      <div class="col-md-8 col-lg-8">
        <h4 class="mb-3">Register As Receiver</h4>
        <form class="needs-validation" method="POST" action="">
          <div class="row g-3">
            <div class="col-9">
              <label for="Name" class="form-label">Name of Receiver</label>
              <input type="text" class="form-control" name="name" placeholder="" value="" required>
              <div class="invalid-feedback">
                Name is required.
              </div>
            </div>

            <div class="col-3">
              <label for="Name" class="form-label">Blood Group</label>
              <input type="text" class="form-control" name="blood_group" placeholder="" value="" required>
              <div class="invalid-feedback">
                Blood Group is required.
              </div>
            </div>

            <div class="col-6">
              <label for="phone" class="form-label">Contact Number</label>
              <input type="phone" class="form-control" name="phone" required>
              <div class="invalid-feedback">
                Please enter a valid phone number.
              </div>
            </div>

            <div class="col-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your address.
              </div>
            </div>

            <div class="col-md-7">
              <label for="state" class="form-label">State</label>
              <select class="form-select" name="state" required>
                <option value="">Choose...</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-5">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" name="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>

            <div class="col-md-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>

          </div>
          <br>

          <button class="w-100 btn btn-primary btn-lg" name="submit" value="submit" type="submit">Signup</button>
        </form>
      </div>
    </div>
  </div>
  </main>


<?php
if(isset($_REQUEST['submit']))
{
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $blood = $_REQUEST['blood_group'];
  $address = $_REQUEST['address'];
  $state = $_REQUEST['state'];
  $phone = $_REQUEST['phone'];
  $zip = $_REQUEST['zip'];
  $password = $_REQUEST['password'];

  $sql = "INSERT INTO receiver (name, blood, email, phone, address, state, zip, password) VALUES ('$name', '$blood', '$email', '$phone', '$address', '$state', '$zip', '$password')";


  if ($conn->query($sql) === TRUE) 
  {
  	$_SESSION['phone'] = $phone;
  	echo "<script> alert('Registeration Completed!');  window.location.href='receiver.php'; </script>";
  } else 
  {
    echo "<script type='text/javascript'> alert('Error Creating Record! Please Try again later')</script>";
  }
}
?>


<?php
include 'footer.php';
?>
