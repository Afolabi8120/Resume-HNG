<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

?>
<?php
	include_once('./includes/session.php');

	if(isset($_POST['send'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		// Form Validation
		if(empty($name) || empty($email) || empty($subject) || empty($message)){
			$_SESSION['ErrorMessage'] = "All fields are required!";
		}else{
			require './PHPMailer/src/Exception.php';
			require './PHPMailer/src/PHPMailer.php';
			require './PHPMailer/src/SMTP.php';

			//require 'vendor/autoload.php';

			//Import PHPMailer classes into the global namespace
			//These must be at the top of your script, not inside a function
			//use PHPMailer\PHPMailer;
			//use PHPMailer\SMTP;
			//use PHPMailer\Exception;

			//Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);

			try {
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			    $mail->isSMTP();                                            //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			    $mail->Username   = 'Afolabi8120@gmail.com';                     //SMTP username
			    $mail->Password   = '07069559103';                               //SMTP password
			    $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above 587

			    //Recipients
			    $mail->setFrom($email, $name);
			    $mail->addAddress('afolabi8120@gmail.com', 'Afolabi Temidayo Timothy');     //Add a recipient
			    $mail->addAddress('afolabi8120@gmail.com');               //Name is optional
			    $mail->addReplyTo($email, $name);
			    $mail->addCC('cc@example.com');
			    $mail->addBCC('bcc@example.com');


			    //Content
			    $mail->isHTML(true);                                  //Set email format to HTML
			    $mail->Subject = 'From: ' .$subject;
			    $mail->Body    = 'Name: '.$name.'</b> Email:'.$email.'</br> Subject'.$subject.'</br> Message:'.$message;
			    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    $mail->send();
			    $_SESSION['SuccessMessage'] = 'Message sent! Thanks for contacting me.';
			} catch (Exception $e) {
			    $_SESSION['ErrorMessage'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Resume Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<style>
	body {
		background: #040B14;
		color: white;
	}
	a {
		text-decoration: none;
		color: white;
	}
</style>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center mb-1 fw-bold mt-3">Afolabi Temidayo Timothy</h3>
				<h6 class="text-center mb-1"><i class="fas fa-map-pin"></i> Apete, Ibadan, Oyo State, Nigeria</h6>
				<h6 class="text-center"><i class="fas fa-phone">&nbsp;</i>+2348090949669 | <i class="fas fa-envelope">&nbsp;</i><a href="mailto: afolabi8120@gmail.com">afolabi8120@gmail.com</a></h6>
				<h6 class="text-center"><i class="fab fa-github-alt">&nbsp;</i><a href="github.com/Afolabi8120" target="_blank">Afolabi Temidayo</a> | <i class="fab fa-twitter">&nbsp;</i><a href="twitter.com/afolabitemidee" target="_blank">Afolabi Temidayo</a></h6>

				<!--About-->
				<h6 class="mt-5"><strong>About</strong></h6>
				<hr class="hr-divider">
				<p>
					Hello! I am Afolabi Temidayo Timothy. A Backend Develper focused on C#, PHP and MySQL.
				</p>

				<!--Education and Qualification-->
				<h6 class="mt-2"><strong>Educational Qualification With Year</strong></h6>
				<hr class="hr-divider">
				<ul>
					<li>National Diploma Certificate in Computer Science (The Polytechnic, Ibadan, Oyo State) 2019</li>
					<li>Senior Secondary Certificate Examination (WAEC) (Bammy College, Agbado, Ogun State) 2015</li>
					<li>Junior Secondary Certificate Examination (Lagos State Model College, Meiran, Lagos State) 2012</li>
					<li>Primary School Certificate (Immaculate Grace Secondary School, Clem Road, Lagos State) 2008</li>
				</ul>

				<!--Certificates and Awards-->
				<h6 class="mt-2"><strong>Certification and Awards With Year</strong></h6>
				<hr class="hr-divider">
				<ul>
					<li>Side Hustle Internship Certificate 2021</li>
					<li>Jobberman Soft Skills Training 2021</li>
					<li>JavaScript Fundamentals Course Certificate (SoloLearn) 2020</li>
					<li>PHP Fundamentals Course Certificate (SoloLearn) 2019</li>
					<li>SQL Fundamentals Course Certificate (SoloLearn) 2019</li>
				</ul>

				<!--Work Experience-->
				<h6 class="mt-2"><strong>Work Experience</strong></h6>
				<hr class="hr-divider">
				<ul>
					<li>Web Design and Development Backend Intern at HNG Internship. Lagos <em><small>(08-2021 - Present)</small></em></li>
					<li>Web Design and Development Backend Intern at Side Hustle Internship. Lagos <em><small>(07-2021 - 08-2021)</small></em></li>
					<li>IT Instructor at Nova Technologies, Ore, Ondo State. <em><small>(04-2020 - 09-2020)</small></em></li>
					<li>Computer Operator/Instructor in Desktop Publishing at Goodings Private School, Alagbado, Lagos State. <em><small>(09-2017 - 12-2017)</small></em></li>
				</ul>

				<!--Skills-->
				<h6 class="mt-2"><strong>Computer/Programming Skills</strong></h6>
				<hr class="hr-divider">
				<ul>
					<li>C#  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;70%</li><progress value="70" max="100">70%</progress>
					<li>PHP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50%</li><progress value="50" max="100">50%</progress>
					<li>HTML &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;80%</li><progress value="80" max="100">80%</progress>
					<li>SQL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60%</li><progress value="60" max="100">60%</progress>
					<li>Desktop Publishing 59%</li><progress value="59" max="100">59%</progress>
				</ul>

				<!--Strength-->
				<h6 class="mt-2"><strong>Strength</strong></h6>
				<hr class="hr-divider">
				<ul>
					<li>Team Player &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60%</li><progress value="60" max="100">60%</progress>
					<li>Problem Solving &nbsp;&nbsp;60%</li><progress value="60" max="100">60%</progress>
					<li>Creative Thinking &nbsp;80%</li><progress value="80" max="100">80%</progress>
				</ul>

				<!--Languages-->
				<h6 class="mt-2"><strong>Languages</strong></h6>
				<hr class="hr-divider">
				<ul>
					<li>Yoruba</li>
					<li>English</li>
					<li>Pidgin</li>
				</ul>

				<!--Hobbies-->
				<h6 class="mt-2"><strong>Hobbies</strong></h6>
				<hr class="hr-divider">
				<ul>
					<li>Gaming</li>
					<li>Track & Field</li>
					<li>Swimming</li>
				</ul>

				<!--Projects-->
				<h6 class="mt-2"><strong>Projects</strong></h6>
				<hr class="hr-divider">
				<ul>
					<li><a href="https://www.github.com/Afolabi8120/School-Management-System" target="_blank">School Management System</a> (C#)</li>
					<li><a href="https://www.github.com/Afolabi8120/Inventory_Management_System" target="_blank">Inventory Management System</a> (C#)</li>
					<li><a href="https://www.github.com/Afolabi8120/E-Voting-System" target="_blank">Electronic Voting System</a> (PHP)</li>
					<li><a href="https://www.github.com/Afolabi8120/Pharmarcy-Management-System" target="_blank">Pharmarcy Management System</a> (C#)</li>
					<li><a href="https://www.github.com/Afolabi8120/Diary-App" target="_blank">Diary App</a> (PHP)</a></li>
				</ul>

				<!--Socials-->
				<div class="col-md-12">
					<h3 class="text-center mt-2 mb-3">Let's get in touch</h3>
					<div class="row" data-aos="fade-in">
				          <div class="col-lg-5 d-flex align-items-stretch">
				            <div class="info">
				              <div class="address">
				                <h4>Location:</h4>
				                <p><i class="fas fa-map-pin fa-2x"></i>&nbsp;&nbsp; Apete, Ibadan, Oyo State, Nigeria.</p>
				              </div>

				              <div class="email">
				                <h4>Email:</h4>
				                <p><i class="fas fa-envelope fa-2x"></i>&nbsp;&nbsp;afolabi8120@gmail.com</p>
				              </div>

				              <div class="phone">
				                <h4>Call:</h4>
				                <p><i class="fas fa-phone fa-2x"></i>&nbsp;&nbsp;+2348090949669</p>
				              </div>

				              <div>
				              	<h6>Connect with me</h6>
				              	<a href="https://www.facebook.com/profile.php?id=100056265665208" target="_blank"> <i class="fab m-1 fa-facebook fa-2x"></i></a>
				              	<a href="https://www.linkedin.com/in/afolabi-temidayo-timothy-6ab2261a5" target="_blank"><i class="fab m-1 fa-linkedin fa-2x"></i></a>
				              	<a href="https://www.github.com/Afolabi8120" target="_blank"><i class="fab m-1 fa-github-alt fa-2x"></i></a>
				              	<a href="https://wa.me/+2348090949669" target="_blank"><i class="fab m-1 fa-whatsapp fa-2x"></i></a>
				              	<a href="https://www.t.me/afolabi8120" target="_blank"><i class="fab m-1 fa-telegram fa-2x"></i></a>
				              </div>

				            </div>

				          </div>
						<div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-center">
			            <form action="" method="POST">
			              <div class="row">
			              	<?php 
								echo ErrorMessage();
								echo SuccessMessage();
								echo WarningMessage();
							?>
			                <div class="form-group col-md-6">
			                  <label for="name">Your Name</label>
			                  <input type="text" name="name" class="form-control">
			                </div>
			                <div class="form-group col-md-6">
			                  <label for="name">Your Email</label>
			                  <input type="email" class="form-control" name="email">
			                </div>
			              </div>
			              <div class="form-group">
			                <label for="name">Subject</label>
			                <input type="text" class="form-control" name="subject">
			              </div>
			              <div class="form-group">
			                <label for="name">Message</label>
			                <textarea class="form-control" name="message" rows="5"></textarea>
			              </div>
			              <div class="text-center"><button type="submit" name="send" class="btn btn-success mt-2 mb-5">Send Message</button></div>
			            </form>
			          </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="center">
		<center><a  href="https://internship.zuri.team" target="_blank"><img src="./img/logo.png" height="60px" class="mt-2 mb-3"></a></center>
	</div>

	<footer class="text-center">
		<div class="bg-info py-5">
			<p>All Right Reserve <a href="https://internship.zuri.team" target="_blank">Zuri Team</a></p>
		</div>
	</footer>

</body>
</html>
