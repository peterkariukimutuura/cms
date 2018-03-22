<?php 
session_start();

//include the connection from the database

include 'assets/databaseconnection.php';

include 'assets/register.php';



 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Register Page</title>
	
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
   <link rel="stylesheet" href="css/stylesheet.css">


  </head>

  <body>
	<div id="navbar">
		<a id="heading" style="text-decoration: none;" class="pull-left" href="../">Court Case System</a>
		<a id="heading" style="left: 1080px;text-decoration: none;" class="pull-right" href="../login">Login</a>
	</div>


	<div id="middlesection" class="row">
		<h2 id="createaccount">Create An Account</h2>
	</div>
<!-- this is just simple php for checking  verification messages -->

<?php if(!empty($_SESSION['successmessage'])): ?>
	<div id="successmessage">
		<?php echo $_SESSION['successmessage']; ?>
		<!-- User Successfully Registered! Proceed to login -->
	</div><br>
	<?php unset($_SESSION['successmessage']); ?>
<?php endif; ?>



<?php if(!empty($_SESSION['errormessage'])): ?>
	<div id="errormessage">
		<?php echo $_SESSION['errormessage']; ?>
	</div><br>	
	<?php unset($_SESSION['errormessage']); ?>
<?php endif; ?>
<!-- this is just simple php for checking  verification messages -->


	<div class="row">
		<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return sendform();">
			<div>
				<div>
					<label for="UserName">Username</label>
				</div>
				
				<input class="form-control" type="text" placeholder="username" id="username" name="username">
				<small class="username" id="errormessage"></small>
			</div><br>
			<div>
				<div>
					<label for="email">Email</label>
				</div><br>
				
				<input class="form-control" type="email" placeholder="add email here" id="email" name="email">
				<small class="email" id="errormessage"></small>
			</div><br>
			<div>
				<div>
					<label for="Occupation">Occupation</label><br>
				</div>
				
				<!-- <input type="text" placeholder="add occupation here" name="occupation"> -->
				<select id="occupation" class="form-control" name="occupation">
					<option value="">Choose One</option>
					<option value="1">Prosecutor</option>
					<option value="3">Clerk</option>
					<option value="4">Judge/Magistrate</option>
					<option value="2">Police</option>
				</select>
				<small class="occupation" id="errormessage"></small>
			</div><br>
			<div>
				<div>
					<label for="password">Password</label>
				</div><br>
				
				<input id="password" class="form-control" type="password" placeholder="add password here" name="password">
				<small class="password" id="errormessage"></small>
			</div><br>
			<div>
				<div>
					<label for="password">Confirm Password</label>
				</div><br>
				
				<input class="form-control" type="password" id="confirmpassword" name="confirmpassword" placeholder="confirm Password">
				<small class="confirmpassword" id="errormessage"></small>
			</div><br>
			<button id="submit" type="submit">Register</button>

		</form><br><br><br><hr>
		<footer>
			<small>&copy 2018 Court Management System</small>
		</footer>
	</div>


<script type="text/javascript" src="../js/jquery.js"></script>
<!-- form validation using javascript -->
<script>

$(document).ready(function(){


	$('input').click(function(){
		$(this).val("");

		//hide the small tag error logs

		var small_class=$(this).attr('name');
		$('.'+small_class).html('');

		//then set default styles to the input

		$(this).css({
			'border':'1px solid #58cec8',
			'outline':'none'
		});

	});

        $('#occupation').change(function(){
        	//hide the error message if exists
        	$('.occupation').html("");
			$(this).css({
				'border':'1px solid #58cec8',
				'outline':'none'
			});
        });

	 	$('#submit').click(function(){		
			$('form').find('.form-control').each(function(){
				if ($(this).val()=="") {
					var small_class=$(this).attr('name');
					$('.'+small_class).text('This Field is Required');
					$(this).css({
						'border':'1px solid red',
					});
				}
			});
		});

	
});

	function sendform(){

		var username =document.getElementById("username").value;
		var email =document.getElementById("email").value;
		var password =document.getElementById("password").value;
		var occupation =document.getElementById("occupation").value;
		var confirmpassword =document.getElementById("confirmpassword").value;
		// console.log(username);
		// console.log(email);
		// console.log(occupation);
		// console.log(password);
		// console.log(confirmpassword);
		if (password!==confirmpassword) {
			$('.confirmpassword').css({
				'margin-left': '-270px',
			});
			$('.confirmpassword').html("Passwords You Have Entered Don't match");
			$('#password').css({
				'border':'1px solid red'
			});
			$('#confirmpassword').css({
				'border':'1px solid red'
			});
			
			return false;
		}
		if (username!==""&&email!==""&&password!==""&&occupation!=="") {
			return true;
		}


		return false;
	}

	
</script>

   

  </body>
</html>
