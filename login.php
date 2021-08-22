<?php  include_once "App/autoload.php"; ?>
<?php  
  
  $user = new User;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundbox | Login | Signup</title>
    <link rel="stylesheet" href="assets/css/styleLogin.css">
</head>
<body>

	<?php
		 if( isset($_POST['user_submit']) ){

			// Get value 
			$name = $_POST['name'];
			$email = $_POST['email'];
  
			// Password Hash
			$pass = $_POST['pass'];
			$rpass = $_POST['rpass'];
			$phone = $_POST['phone'];
			//$pass_hash = password_hash($pass , PASSWORD_DEFAULT);
  
			// Email check 
			$user_check = $user -> emailCheck($email);
			echo $user_check;
  
			// Password check 
			if( $pass !== $rpass){
			  $pass_check = false;
			}else {
			  $pass_check = true;
			}

			if( empty($name) || empty($email) || empty($pass) )
		 	{
				$mess1 = "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'>All fields are required !</p>";
			}elseif($pass_check == false){
				$mess1 = "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'>Password not match !</p>";
			}elseif( filter_var($email, FILTER_VALIDATE_EMAIL ) == false ){
				$mess1 = "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'>Invalid Email !</p>";
			}elseif( $user_check == false ){
				$mess1 = "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'>Email already exixts1 !</p>";
			}else {
				$data = $user -> userRegistraion($name, $email, $pass, $phone);
				if(  $data  == true ){
				  $mess1 = "<p style='color:green;text-align:center; font-size:14px; font-weight:normal;'> Registration successfull </p>";
				}
		   }
  
  
  
		 }

		 if( isset($_POST['user_login']) ){

			// Get value 
			$email = $_POST['email'];
			$pass = $_POST['password'];
			
  
			// Email check 
			$email_check = $user -> emailCheck($email);
		  
  
			if( filter_var($email, FILTER_VALIDATE_EMAIL ) == false ){
				$mess = "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'>Invalid Email !</p>";
			}else {
  
			   $mess = $user -> userLoginSystem($email, $pass);
  
			}
  
		  }
	?>

	<div class="container" id="container">
		<div class="form-container sign-up-container">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<h1>Create Account</h1>
				<?php  
					if( isset($mess1) ){
						echo $mess1;
					}
				?>
				<!-- <div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div> -->
				<!-- <span>or use your email for registration</span> -->
				<input name="name" class="textfield" type="text" placeholder="Name">
				<input name="email" class="textfield" type="text" placeholder="Email">
				<input name="phone" class="textfield" type="text" placeholder="Username">
				<input name="pass" class="textfield" type="password" placeholder="Password">
				<input name="rpass" class="textfield" type="password" placeholder="Re-Password">
				<input name="user_submit" class="signup-btn" type="submit" value="Sign Up">
			</form>
		</div>
		<div class="form-container sign-in-container">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<h1>Sign in</h1>
				<?php  
					if( isset($mess) ){
						echo $mess;
					}
				?>
				<!-- <div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div> -->
				<input id="uname" name="email" type="text"  placeholder="Enter Username">
				<input id="password" name="password" type="password"  placeholder="Enter Password"><br>
				<!-- <button>Sign In</button> -->
				<input id="log" name="user_login" type="submit"  value="Login">
				<a href="#">Forgot your password?</a>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
		});
	</script>
</body>
</html>