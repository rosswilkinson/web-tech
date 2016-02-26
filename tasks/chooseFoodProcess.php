<!doctype html> 
<html lang="en"> 
<head> 
	<meta charset="UTF-8" />
	<title>Food results</title>
</head>
<body>
	<?php
		$fName = $_REQUEST['forename'];
		$sName = $_REQUEST['surname'];
		$sLevel = $_REQUEST['studyLevel'];
		$gender = $_REQUEST['gender'];
		$breadChoice = $_REQUEST['bread'];
		$broccoliChoice = $_REQUEST['broccoli'];
          	$chocolateChoice = $_REQUEST['chocolate'];
		$pizzaChoice = $_REQUEST['pizza'];
		$yoghurtChoice = $_REQUEST['yoghurt'];	
	?>
	<h1>Foods that you liked</h1>
	<h2>Your details</h2>

	<?php
		echo "<p>Forename: $fName</p>";
		echo "<p>Surname: $sName</p>";	 
		echo "<p>Level of study: $sLevel</p>";
		echo "<p>Gender: $gender</p>";
	?>   
	<h2>Foods that you like</h2>
	<?php 
         		echo "<p>You like the following type(s) of food:   
         		$breadChoice $broccoliChoice $chocolateChoice 
		$pizzaChoice $yoghurtChoice </p>"; 
         ?>
</body>
</html>