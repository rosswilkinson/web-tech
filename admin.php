<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" id="standardStyles" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,900italic" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/script.js"></script>

    <title>Admin - Chollerton Tearooms</title>
    <meta charset="utf-8" />
    <meta name="description" content="Admin for Chollerton Tearooms" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0" />

</head>

<body id="mainBody">

    <!-- Container div contains main content of website + adds margins. -->
    <div class="container">
        <header>
            <div class="top-banner">
                <a class="access-bar pointer" id="changeCSS" onclick="cssFile();">Inverted colours 
                <i class="fa fa-adjust"></i>
                </a>
                
                <p class="access-bar"> | </p>
                <a class="access-bar pointer" id="fontIncrease" onmousedown="changeFontSize('mainBody','100%'); offerAppear('fontDecrease','fontDecrease','visible');;offerAppear('fontIncrease','fontIncrease','hidden')">Increase text size <i class="fa fa-text-height"></i>
                </a>
                
                <a class="access-bar pointer" style="visibility: hidden" id="fontDecrease" onmousedown="changeFontSize('mainBody','63.5%'); offerAppear('fontIncrease','fontIncrease','visible'); offerAppear('fontDecrease','fontDecrease','hidden')">Decrease text size <i class="fa fa-text-height"></i>
                </a>
            </div>


            <!-- Header logo -->
            <img class="banner-image" alt="Chollerton Tearooms full logo" src="images/chollerton-logo-2.png">

            <!-- Navigation -->
            <nav>
                <ul>
                    <li><a href="index.html" tabindex="1" accesskey="h" title="Home page">Home</a></li>
                    <li><a href="findoutmore.html" tabindex="2" accesskey="f" title="Find out more page">Find out more</a></li>
                    <li><a href="offer.html" tabindex="3" accesskey="o" title="Offers page">Offer</a></li>
                    <li><a href="credits.html" tabindex="4" accesskey="c" title="Credits page">Credits</a></li>
                    <li class="currentpage"><a href="admin.php" tabindex="5" accesskey="a" title="Admin page" class="currentpage">Admin</a></li>
                    <li><a href="wireframe.html" tabindex="6" accesskey="w" title="Wireframe page">Wireframe</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main content -->
        <main>

            <!-- Find out more -->
            <div class="content-box-1 spacer">
                <h1>Admin</h1>
    <!-- Displays every item from the database in formatted div -->
    <?php
    // Create connection and test
	include 'database_conn.php';

    // Chooses fields and adds matching value from database
	$fields = "SELECT forename, surname, postalAddress, postCode, landLineTelNo, mobileTelNo, email, sendMethod 
			   FROM CT_expressedInterest";
    
    // Checks connection and fields or stops if connection error
	$queryresult = mysqli_query($conn, $fields) or die(mysqli_error($conn));

    // This while loop posts details if the query result is confirmed
    while ($row = mysqli_fetch_assoc($queryresult)) {
           $forename = $row['forename']; 
           $surname = $row['surname']; 
           $postalAddress = $row['postalAddress']; 
           $postCode = $row['postCode'];
           $landLineTelNo = $row['landLineTelNo'];
           $mobileTelNo = $row['mobileTelNo'];
   	 	   $email = $row['email'];
           $sendMethod = $row['sendMethod'];
	
             echo "<div class=\"content-box-2 spacer\"><p><b>$forename $surname</b>
             <br /> Address: $postalAddress $postCode
			 <br /> Landline: $landLineTelNo 
			 <br /> Mobile: $mobileTelNo
			 <br /> Email: $email
			 <br /> Receive by: $sendMethod</p><br /></div>";
    } 
                
    // The queryresult is freed up and the connection is closed
	mysqli_free_result($queryresult); 
    mysqli_close($conn);
    ?>
                
            </div>

        </main>
    </div>

    <!-- Footer -->
    <footer>

        <!-- First column -->
        <div class="container">
            <div class="footer-box">
                <img class="footer-logo" alt="Chollerton logo" src="images/chollerton-logo-solo-2.png">
            </div>

            <!-- Second column -->
            <div class="footer-box footer-bg">
                <address>
                <b>Chollerton Tearooms</b><br />
                Chollerton,<br />
                North Tyne Valley,<br />
                Tyne and Wear<br />
                NE1 1TB
            </address>
                <p><a href="tel:0123456789"><i class="fa fa-phone"></i> 0123 456789</a></p>
                <p><a href="mailto:hi@chollertontea.com"><i class="fa fa-envelope"></i> hi@chollertontea.com</a></p>

            </div>
            <!-- Copyright information -->
            <div class="content-box-1">
                <p class="copyright">Copyright &copy; Chollerton Tearooms 2015. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    
</body>
</html>