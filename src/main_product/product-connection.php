<?php

  $linkToDB=mysqli_connect("localhost:3306", "root","") or die(mysqli_error($linkToDB));
  mysqli_select_db($linkToDB, "kape_at_ani") or die(mysqli_error($linkToDB));
  
?>