<?php ob_start();
session_start();
include("core/head.php"); 

?>

	
	
    <div class="container">
	<h1>
        Login
    	</h1>
	<div class="span12"> 
	<?php 
	$form = "
	<form action=\"index.php\" method=\"post\">
		<p>Email</p>
		<div class=\"input-control text\">
			<input type=\"text\" value=\"\" placeholder=\"email address\" name=\"email\"/>
			<button class=\"btn-clear\"></button>
		</div>
		
		</p>Password</p>
		<div class=\"input-control password\">
			<input type=\"password\" value=\"\" placeholder=\"password\" name=\"password\"/>
			<button class=\"btn-reveal\"></button>
		</div>
		
		<input type=\"submit\" name=\"loginbutton\" value=\"Login\" class='large bg-cyan fg-white'>
	</form>"; 

	
	if (isset($_SESSION['name'])){
				echo "Hi $name , you're already logged in!";
				}
				else{
					
					if(isSet($_POST['loginbutton'])){
						$email = $_POST['email'];
						$password = $_POST['password'];
						$password = md5($password); //encrypt with md5
						
						if($email){
							if($password){
								include 'functions/connect.php';
								
								$query = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
								$numrows = mysqli_num_rows($query);
								
								if ($numrows == 1){
								
									$row = mysqli_fetch_assoc($query);
									$dbpass   = $row['password'];
									$dbid     = $row['id'];
									$dbuser   = $row['name'];
									$dbrankid = $row['rankid'];
									$dbclan   = $row['code'];
									$dbactive = $row['active'];
									
									if ($password == $dbpass){ // if password is correct
									
										$_SESSION['id'] = $dbid;
										$_SESSION['name'] = $dbuser;
										$_SESSION['email'] = $dbemail;
										$_SESSION['rankid'] = $dbrankid;
										$_SESSION['code'] = $dbclan;
										$_SESSION['active'] = $dbactive;
										
										Header("Location: login-success.php");
									
									}
									else
										echo "Incorrect password. $form";
									
								}
								else
									echo "Email not found. $form";
																
								
							}
							else
								echo "You must enter your password. $form";
						
						}
						else
							echo "Please enter your email. $form";
					
					}
					else
						echo $form;
				}
					?>
	
	
	</div>
	
    </div> <!-- End of container -->

<?php include("core/foot.php"); ?>
