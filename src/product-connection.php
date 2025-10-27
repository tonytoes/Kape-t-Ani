<?php
$link = mysqli_connect("localhost", "root", "", "kapetani");

if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($link, "kapetani") or die(mysqli_error($link));
