<?php
  $conn = mysqli_connect('localhost', 'root', '123456', 'unn_15042400');
  if (mysqli_connect_errno()) {
		echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
  }
?>