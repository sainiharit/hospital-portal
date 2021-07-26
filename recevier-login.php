<?php
  include 'header.php';
  include 'nav-bar.php';
  ?>


<main class="form-signin">
    <div>
      <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h1 class="h3 mb-3 fw-normal">Receiver Login</h1>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="phone" required>
          <label for="floatingInput">Phone</label>
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
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    $sql = "SELECT phone, password FROM receiver WHERE phone = '$phone' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['phone'] = $row['phone'];
            echo "<script>window.location.href='receiver.php';</script>";
            //header('Location: receiver.php');
        }
    } else {
        echo "<script type='text/JavaScript'> alert('Incorrect Email or Password'); </script>";
    }
}
include 'footer.php';
?>
