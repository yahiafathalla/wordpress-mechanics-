<?php

include('db.php');

// register user

function register(){
	global $mysqli;
	global $msg, $msg_success;
	$msg = array();
	$msg_success = array();
	if (isset($_POST['reg_user'])) {

	  	// form validation: ensure that the form is correctly filled ...
	  	if($_POST['firstname'] == '' && $_POST['email'] == '' && $_POST['password_1'] == '' && $_POST['password_2'] == ''){
	  		$msg['fields_required'] = "Please fill required fields";
	  	}
	  	if (isset($_POST['firstname']) && trim($_POST['firstname']) != '') { 
			$Firstname = mysqli_real_escape_string($mysqli, $_POST['Firstname']);
		} else { 
		  	$msg['first_name'] = "First name field is required";
		}
		if (isset($_POST['lastname']) && trim($_POST['lastname']) != '') { 
			$Lastname = mysqli_real_escape_string($mysqli, $_POST['Lastname']);
		} else { 
		  	$msg['last_name'] = "Last name field is required";
		}
	  	if (isset($_POST['email']) && trim($_POST['email']) != '') { 
	  		$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	  	} else { 
	  		$msg['email'] = "Email field is required";
	  	}
	  	if (isset($_POST['password_1']) && trim($_POST['password_1']) != '') { 
	  		$password_1 = mysqli_real_escape_string($mysqli, $_POST['password_1']);
	  	} else { 
	  		$msg['password'] = "Password field is required";
	  	}
	  	if(isset($_POST['password_2']) && trim($_POST['password_2']) != ''){
	  		$password_2 = mysqli_real_escape_string($mysqli, $_POST['password_2']);
	  	} else { 
	  		$msg['password_2'] = "Confirm Password field is required";
	  	}
	  	if (isset($_POST['city']) && trim($_POST['city']) != '') { 
	  		$city = mysqli_real_escape_string($mysqli, $_POST['city']);
	  	} else { 
	  		$msg['city'] = "User required";
	  	}
	 

	  	
	  	if ($_POST['password_1'] != $_POST['password_2']) { 
	  		$msg['confirm_password'] = "The two passwords does not match"; 
	  	}

	  	// first check the database to make sure 
	  	// a user does not already exist with the same username and/or email
	  	if(empty($msg)){
			$query = "SELECT * FROM user WHERE email='$email' LIMIT 1";	  		
		  	$result = mysqli_query($mysqli, $query);
			$user = mysqli_fetch_assoc($result);
			$password = crypt($password_1, '$6$rounds=5000$usesomesillystringforsalt$');
		  
			if ($user) { // if user exists
				if ($user['email'] === $email) {
			      $msg['email_exist'] = "email already exists";
			    } elseif($user['city'] === $_POST['city']){
			    	$msg['city_exist'] = "city already exists";
			    }
			} else {
				mysqli_set_charset($mysqli, 'utf8');
				$query = "INSERT INTO user (firstname, lastname, email, password, city) 
				VALUES('$Firstname', '$Lastname', '$email', '$password', '$city')";
				if (mysqli_query($mysqli, $query)) {
					$msg_success['insert_success'] = "Account created successfully :)";
					if(isset($_POST['reg_user']) ){
						header('Refresh:3;url=login.php');
					}
					
				} else{
					$msg["insert_error"] = "Error"."<br>".mysqli_error($mysqli);
				}	
			}
		}	
	}
	// $mysqli->close();
}

//LOGIN
function login(){
	global $mysqli;
	global $msg;

	
	if(isset($_POST['login-submit'])){
		$email = $_POST['email'];

		$password = crypt($_POST['password'], '$6$rounds=5000$usesomesillystringforsalt$');
		$query = "SELECT * FROM user WHERE email = '$email' AND  password = '$password' ";

		$result = mysqli_query($mysqli,$query);
		$row = $result->fetch_assoc();

				
		
		if(mysqli_num_rows($result) == 1) {
			
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];

			header("location: home.php");
		} 

		 else{
			if((!isset($email) || trim($email) == '') || (!isset($password) || trim($password) == '')){
				$msg = '<div class="alert alert-danger alert-dismissible" role="alert">
	  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
					<ul>
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">
						</span> Email/Password can\'t be empty
					</ul>
				</div>';
			} else{
				$msg = '<div class="alert alert-danger alert-dismissible" role="alert">
	  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
					<ul>
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">
						</span> Invalid Email or Password  
					</ul>
				</div>';
			}
		}	
	}
	// $mysqli->close();
}

// Update user profile
function update_user_profile($user_id) {
	global $mysqli;
	global $msg;
	global $msg_file_type;
	if(isset($_POST['submit'])){
		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$password = $_POST['password'];
		$city = $_POST['city'];
						
		//----------------------------------------------//
		mysqli_set_charset($mysqli, 'utf8');
		$sql = "
			UPDATE user 
			SET firstname = '$first_name', lastname = '$last_name', city = '$city' 
			WHERE id = $user_id
		";
		$result = $mysqli->query($sql);
		if($result === TRUE){
			$msg = "<div class='alert alert-success alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
				<span class='glyphicon glyphicon-ok' aria-hidden='true'>
				</span> Your profile has been updated
			</div>";
		} else{
			$msg = "<div class='alert alert-success alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
				<span class='glyphicon glyphicon-ok' aria-hidden='true'>
				</span> Opps.. something went wrong: $mysqli->error;
			</div>";
		}
	}
	// $mysqli->close();
}

// Logout 
function logout(){
	if(isset($_POST['logout'])){
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy();

		header('location: login.php');
	}
}
  

?>