<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Connection to the database -->
    <?php
  $conn = mysqli_connect('localhost', 'root', '123456', 'unn_15042400');
  if (mysqli_connect_errno()) {
		echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
  }
?>
    <title>Connection - Chollerton Tearooms</title>
</head>

</html>