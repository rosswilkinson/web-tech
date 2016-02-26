<?php
	include 'database_conn.php';	  // make db connection

$sql = "SELECT filmID, title, categoryName, notes FROM film";

	$queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));

      while ($row = mysqli_fetch_assoc($queryresult)) {
      	$filmID = $row['filmID'];
            $filmTitle = $row['title'];
            $filmCat = $row['categoryName'];
	      $filmNotes = $row['notes']; 
	
            echo "<div>$filmID, $filmTitle, $filmCat, $filmNotes</div>";
        } 
 
	mysqli_free_result($queryresult); 
      mysqli_close($conn);
?>