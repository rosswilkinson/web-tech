<!doctype html> 
<html lang="en"> 
<head> 
	<meta charset="UTF-8">    
	<title>A PHP script to get and display form input</title>
</head>
<body>
  	<?php 
		$forename = $_GET['forename'];
        $receive = $_GET['receive'];
 echo "<p>Your name is $forename</p>";
     echo "<p>You want to receive it by $receive</p>";
  	?>
</body>
</html>