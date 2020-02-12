<?php include 'header.php'; ?>

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>91 Western Road Brighton</h5>
									<p>East Sussex, England, BN1 2NW</p>
								</div>
								<div class="contact-details">
									<h5>British Embassy Winston Churchill Avenue
</h5>
									<p>Yaoundé, Republic of Cameroon</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>+1 (805) 398-8263</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>contact@global-ielts-immigration.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8 booking-right">
							    <?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
     //$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "cornellekacy4@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "cornellekacy456";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('cornellekacy4@gmail.com', $_POST['name']);
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('cornellekacy4@gmail.com', 'Contact');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Petfly Relocation';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Phone Number: {$_POST['phone']}
Contact TYpe: {$_POST['select1']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<div class='alert alert-success'>
  <strong>Success!</strong> Message Successfully Sent we will get back to you shortly
</div>";

        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}

?>
				
								<h4 class="mb-20">Contact Us Now</h4>
								<form action="#" method="post">
									<label><b>Full Name</b></label>
									<input class="form-control" type="text" name="name" placeholder="Your name" required>
									<label><b>Email</b></label>
									<input class="form-control" type="email" name="email" placeholder="Email Address" required>
									<label><b>Phone Number</b></label>
									<input class="form-control" type="text" name="phone" placeholder="Phone Number">
									<label><b>Select</b></label>
							       	<div class="default-select" id="default-select">
										<select name="select1">
											<option value="" disabled selected hidden>Select Type</option>
											<option value="Ielts">Ielts</option>
										
										</select>
									</div>
									<label><b>Messege</b></label>
									<textarea class="common-textarea form-control mt-10" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"></textarea>
									<button  class="btn btn-default btn-lg btn-block text-center">Send Message</button>
								</form>
						
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->

			<!-- start footer Area -->		
			<?php include 'footer.php'; ?>