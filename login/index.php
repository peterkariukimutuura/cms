<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';

include 'assets/login.php';



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

    <title>Login Page</title>
	
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
   <link rel="stylesheet" href="../register/css/stylesheet.css">


  </head>

  <body>
	<div id="navbar">
		<a id="heading" style="text-decoration: none;" class="pull-left" href="../">Court Case System</a>
		<a id="heading" style="left: 1080px;text-decoration: none;" class="pull-right" href="../register">Register</a>
	</div>


	<div id="middlesection" class="row">
		<h2 id="createaccount">Login Page</h2>
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
		<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return login();">

			<div>
				<div>
					<label for="email">Email</label>
				</div><br>
				
				<input class="form-control" type="email" placeholder="add email here" id="email" name="email">
				<small class="email" id="errormessage"></small>
			</div><br>
			<div>
				<div>
					<label for="password">Password</label>
				</div><br>
				
				<input id="password" class="form-control" type="password" placeholder="add password here" name="password">
				<small class="password" id="errormessage"></small>
			</div><br>
			<button id="submit" type="submit">Login</button>

		</form><br><br><br><br><br><br><br><br><br><hr>
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

	function login(){


		var email =document.getElementById("email").value;
		var password =document.getElementById("password").value;
		
		console.log(email);
		
		console.log(password);

		if (email!==""&&password!=="") {
			return true;
		}


		return false;
	}

	
</script>

   

  </body>
</html>
