<?php include 'header.php'; 
      include 'nav-bar.php'; ?>

  <div class="container p-5">
    <h2>Avalaible Blood Samples</h2><br>

    <table class="table table-hover">
        <thead class="table-dark">
          <td>Blood ID</td>
          <td>Blood Group</td>
          <td>Units</td>
          <td>Hospital</td>
          <td>Date Created</td>
          <td>Info   </td>
        </thead>
        <tbody>

          <?php

            $sql = "SELECT * FROM samples LEFT JOIN hospitals ON samples.license = hospitals.license WHERE status='Active'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>".$row['blood_id']."</td><td>".$row['blood']."</td><td>".$row['units']."</td><td>".$row['name']."</td><td>".$row['date']."</td><td><a href=recevier-login.php class='btn btn-sm btn-danger'>Request Sample</a></td></tr>";
            }
          } else {
            echo "<script> alert('Error displaying sample!! try again later'); </script>";
          }
          ?>

        </tbody>
    </table>


  </div>


<?php include 'footer.php'; ?>