<?php if(isset($_REQUEST['Logout']))
{ session_unset();
  session_destroy(); 
  echo "<script>window.location.href='index.html';</script>"; 
} ?>