<?php
  include 'header.php';
  include 'nav-bar.php';
  ?>


<main class="form-signin">
    <div>
      <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h1 class="h3 mb-3 fw-normal">Hospital Login</h1>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>

        <input type="submit" class="w-100 btn btn-lg btn-primary" name="LogIn" value="LogIn">
      </form>
      <br>
      <button class="w-100 btn btn-lg btn-success"><a href="hospital-signup.php" style="text-decoration: none; color: white;">Register Now</a></button>
    </div>
  </main>



<?php
if (isset($_REQUEST['LogIn'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $sql = "SELECT email, password, license FROM hospitals WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['license'] = $row['license'];
            echo "<script>window.location.href='hospital.php';</script>";
            // header('Location:https://harit-saini.000webhostapp.com/hospital.php');
            exit();
        }
    } else {
        echo "<script type='text/JavaScript'> alert('Incorrect Email or Password'); </script>";
    }
}
include 'footer.php';
?>

