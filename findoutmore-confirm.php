<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" id="standardStyles" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,900italic" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="js/script.js"></script>

    <title>Confirmation - Chollerton Tearooms</title>
    <meta charset="utf-8" />
    <meta name="description" content="Find out more about Chollerton Tearooms" />
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
                    <li class="currentpage"><a href="findoutmore.html" tabindex="2" accesskey="f" title="Find out more page" class="currentpage">Find out more</a></li>
                    <li><a href="offer.html" tabindex="3" accesskey="o" title="Offers page">Offer</a></li>
                    <li><a href="credits.html" tabindex="4" accesskey="c" title="Credits page">Credits</a></li>
                    <li><a href="admin.php" tabindex="5" accesskey="a" title="Admin page">Admin</a></li>
                    <li><a href="wireframe.html" tabindex="6" accesskey="w" title="Wireframe page">Wireframe</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main content -->
        <main>

            <!-- Find out more -->
            <div class="content-box-1 spacer">
                <h1>Submission</h1>
                <div class="blue-content-box content-box-1 spacer">
                <div class="content-box-2 spacer">
                    <?php
                    
    // Create connection and test
    include 'database_conn.php';
    
    // Form parameters
    $forename = mysqli_escape_string($conn, $_POST['forename']);
    $surname = mysqli_escape_string($conn, $_POST['surname']); 
    $postalAddress = mysqli_escape_string($conn, $_POST['postalAddress']); 
	$postCode = mysqli_escape_string($conn, $_POST['postCode']);
    $landLineTelNo = $_POST['landLineTelNo'];
    $mobileTelNo = $_POST['mobileTelNo'];
    $email = $_POST['emailID'];
    $sendMethod = $_POST['sendMethod'];
    $terms = $_POST['terms'];
    $confirmation = '<p class="spacer">Thank you. You have submitted the following information:</p><br />';
    $missingContact = "<p>Sorry, the request you submitted did
    not include contact details. Please try again.";
    $toString = "<p>" . stripslashes($forename) . 
		 " " . stripslashes($surname) . 
		 "<br />" . stripslashes($postalAddress) . 
		 "<br />" . stripslashes($postCode) . 
		 "<br /> Landline: " . $landLineTelNo . 
		 "<br /> Mobile: " . $mobileTelNo .
		 "<br /> Email: " . $email .
		 "<br /><br /> Receive by: " . $sendMethod ."</p>";
    // Displays an image relevent to the send method;
    $image = "<img class='responsive-image' src='images/$sendMethod.png' alt='$sendMethod' />";
    
    
    // If the preferred method of contact contains no details - it will ask user to add chosen details 
    if (empty($email) and $sendMethod == "email" or 
        empty($postalAddress) and $sendMethod == "post" or empty($mobileTelNo) and $sendMethod == "sms") {
        echo "<p>You selected $sendMethod and did not add $sendMethod details. Please go back and enter the required details.</p>";
        
    }
    elseif (empty($forename) or empty($surname)) {
        echo "<p>You must enter your first name and surname to submit.</p>";
    }
    elseif(!($terms == 'terms')){
        echo "<p>You must accept our terms and conditions.</p>";
    }
                        
    else {
    
    // Chooses input and adds values from findoutmore form
        $input = "INSERT INTO CT_expressedInterest (forename, surname, postalAddress, 
                                                postCode, landLineTelNo, mobileTelNo, email, sendMethod) 
    
        VALUES ('$forename','$surname','$postalAddress', 
                '$postCode','$landLineTelNo','$mobileTelNo',
                '$email','$sendMethod')";
    
    // if connection to database is present then the entry will be added and confirmed to user. If no connection an error will be shown
    if ($conn->query($input) === TRUE) {
        echo $confirmation;
	    echo $toString;
    
    }
    else {
        echo "Error: " . $input . "<br />" . $conn->error; 
    
    }    
        
    }
                        ?>

                </div>

                <div class="content-box-2">
                    <?php 
                         // Checks the customer's preferred method of contact and displays a relevent image
                         switch ($sendMethod) {
                             case "post":
                                echo $image;
                                break;
                             case "sms":
                                echo $image;
                                break; 
                             case "email":
                                echo $image;
                                break;
                             default:
                                echo "No contact method selected";
                         }
                        
                        $conn->close();

                         ?>
                </div>
                </div>
            </div>
            <!-- First column -->

        </main>

        <!-- Terms and conditions -->
        <aside>
            <div class="content-box-1">
                <hr>
                <div class="content-padding">
                    <h4>Terms and conditions</h4>
                    <p>All offers are correct as of 20/11/2015. Offers must be confirmed with a member of staff before they are available to the customer. Chollerton Tearooms reserves the right to refuse an offer. </p>
                </div>
            </div>
        </aside>
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