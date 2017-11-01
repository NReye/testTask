<?php
ob_start();
include_once('includes/header.php');
include_once('functions.php');
?>

<?php 
$reg_errors = array();
$sign_errors = array();

if(isset($_POST) && !empty($_POST))
{	
	if(!empty ($_POST['register']))
	{
		$reg_errors = array();
		$name = $_POST['first_name'];
		$login = $_POST['login'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$country = $_POST['country'];
		$birth_date = $_POST['birth_date'];
		$agree = $_POST['iagree'];

		if(checkIfEmailExits($email))
		{
			$reg_errors[] = "Email already taken";
		}

		if(checkIfLoginExists($login))
		{
			$reg_errors[] = "Login already taken";
		}

		if(!$agree)
		{
			$reg_errors[] = "You have to agree Terms of use";
		}

		if(count($reg_errors) == 0)
		{
				$data = array();
		$data['login'] = $login;
		$data['email'] = $email;
		$data['name'] = $name;

		$data['password'] = $password;
		$data['birthday'] = $birth_date;
		$data['country_ID'] = $country;

		if(!registerNewUser($data))
		{
			$reg_errors[] = "Reg error please try again later";
		}
		
		}
	}

	if(!empty ($_POST['signin']))
	{

		$sign_errors = array();
		$signin_login = $_POST['signin_login'];
		$signin_password = $_POST['signin_password'];

		if(filter_var($signin_login, FILTER_VALIDATE_EMAIL))
		{
			if(checkIfEmailExits($signin_login))
			{
				if(!loginViaEmail($signin_login, $signin_password))
				{
$sign_errors[] = "This is  no these email/password";
				}
				
			}
			
		}
		else if (checkIfStringValid($signin_login))
		{
			if(checkIfLoginExists($signin_login))
			{
				if(!loginViaLogin($signin_login, $signin_password))
				{
$sign_errors[] = "This is  no these login/password";
				}

				}
				
			else
			{
				$sign_errors[] = "This Login not exists";
			}
		}
		else
		{
			$sign_errors[] = "This Login/Email not exists";
		}
	}
}
?>




<div class="container pad-top">

	<!-- register form -->
	<div class="col-lg-5">

		<form class="input-form" method="post" action="index.php">
			<h3>Sign Up</h3>
			<div class="container-fluid">

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
						<div class="form-group">
							<input type="text" name="first_name"
							pattern="^[a-zA-Z]+$"
							title="Only english chars and numbers 0-9"
							class="form-control"
							placeholder="Name"
							value="<?php echoPostData('first_name') ?>" required>
						</div>
					</div>


					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="login"
							pattern="^[aA-zZ0-9]+$"
							title="Only english chars and numbers 0-9"
							class="form-control"
							placeholder="Login"
							value="<?php echoPostData('login') ?>" 
							required>
						</div>
					</div>
				</div> 


				<div class="form-group">
					<input type="email" name="email"  class="form-control" placeholder="E-mail"  value="<?php echoPostData('email') ?>" required>
				</div>

				<div class="form-group">
					<input type="password" 
					name="password"
					pattern="^[aA-zZ0-9]+$"
					title="Only english chars and numbers 0-9"
					class="form-control"
					minlength="6"
					placeholder="Password"
					required>
				</div>


				<div class="form-group">
					<input type="date" name="birth_date"  class="birthdate form-control"  placeholder="Birth Date" value="<?php echoPostData('birth_date') ?>" required>

				</div>

				<div class="form-group">
					<select name="country" class="form-control country_select" required>
						<?php makeCountryItems(); ?>
					</select>
				</div>


				<div class="form-group">
					<input type="checkbox" id="agrement" name="iagree" />
					<label for="agrement" class="check_label">I have read and agree to abide by the <a href="terms.php">Terms of Use</a></label>
				</div>


				<div class="row">
					<div class="col-lg-6 col-lg-offset-4 col-xs-offset-3">
						<input type="submit" class="btn btn-default" name="register"  value="Sign Up">
						<br><br>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-offset-1">
						<p class="register_error">
							
							<?php 

							foreach ($reg_errors as $item) {
								echo  $item."<br>";
							}


							?>

						</p>

					</div>
				</div>

			</div>
		</form>
	</div>
	<!-- end register form -->

	<!-- login form -->
	<div class="col-lg-5 col-lg-offset-1">
		<form class="input-form" method="post" action="index.php">
			<h3>Sign In</h3>
			<div class="form-group">
				<input type="text" 
				name="signin_login"
				value="<?php echoPostData('signin_login') ?>"
				class="form-control"
				placeholder="E-mail or Login">
			</div>

			<div class="form-group">
				<input type="password"
				name="signin_password"
				pattern="^[aA-zZ0-9]+$"
				title="Only english chars and numbers 0-9"
				class="form-control"
				placeholder="Password">
			</div>


			<div class="form-group submit-section">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-4 col-sm-offset-9 col-xs-offset-9 ">

						<input type="submit" class="btn btn-default" name="signin"  value="Sign In" />

					</div>
					<div class="col-lg-6 col-lg-offset-3">
						<br>
					</div>
				</div>  

				<div class="row">
					<div class="col-lg-offset-1">
						<p class="enter_error">
							
							<?php 

							foreach ($sign_errors as $item) {
								echo  $item."<br>";
							}


							?>

						</p>

					</div>
				</div>          </div>
			</form>
		</div>
		<!--end login form -->

		<!-- end of container -->
	</div>



	<?php
	include_once('includes/footer.php')

	?>