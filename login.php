<?php
use Phppot\Member;

if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<HTML>
<HEAD>
<TITLE>Login</TITLE>

<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
      body {
            font-family: 'Poppins', sans-serif;
            background: black;
        }

        .phppot-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .sign-up-container {
            background: rgba(255, 255, 255, 0.1); /* Glass background color with transparency */
            backdrop-filter: blur(10px); /* Blur effect */
            border-radius: 10px;
            padding: 20px;
            width: 400px;
            max-width: 100%; /* Added max-width for responsiveness */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9); /* Box shadow for depth */
        }

        .login-signup a {
            text-decoration: none;
            color: #333;
        }

        .signup-align {
            text-align: center;
            margin-top: 20px;
        }

        .signup-heading {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .row {
            margin-bottom: 15px;
        }

        .inline-block {
            display: inline-block;
            vertical-align: top;
            width: 100%;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: white; /* Text color for form labels */
        }

        .input-box-330 {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .error-msg {
            color: #ee0000;
            margin-bottom: 10px;
        }

        .error-field {
            border: 1px solid #ee0000 !important;
        }

        .required {
            color: #ee0000;
        }

        /* Media queries for responsiveness */
        @media screen and (max-width: 600px) {
            .sign-up-container {
                width: 90%; /* Adjust width for smaller screens */
            }
        }

        @media screen and (max-width: 400px) {
            .form-label {
                font-size: 14px; /* Adjust font size for smaller screens */
            }

            .btn {
                padding: 8px 16px; /* Adjust button padding for smaller screens */
            }
        }

		.circle {
    width: 175px;
    height: 175px;
    border-radius: 50%;
    margin: 20px;
    position: absolute;
}

.blue {
	background: linear-gradient(to bottom, #0056b3, #FFFFFF);
    top: 100px;
    left: 400px;
	filter: blur(10px);
}

.orange {
	background: linear-gradient(to bottom,  #FFFFFF,#Ff4500);
    bottom: 75px;
    right: 400px;
	filter: blur(10px);
}


</style>

</HEAD>
<BODY >


<div class="phppot-container">
        <div class="circle blue"></div>
        <div class="circle orange"></div>
        <div class="sign-up-container">
			<div class="login-signup">
				<a href="user-registration.php">Sign up</a>
			</div>
			<div class="signup-align">
				<form name="login" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading" style="color: white;">Login</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label" style="margin-left:-325px;color:white">
								Username<span  class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username"
								id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label"  style="margin-left:-325px;color:white">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="login-password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input style="background-color:green;" class="btn" type="submit" name="login-btn"
							id="login-btn" value="Login" >
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#username").val();
	var Password = $('#login-password').val();

	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("*").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("*").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
