<?php 
session_start();

//include the connection from the database
// echo $_SESSION['image'];
include '../register/assets/databaseconnection.php';
include 'assets/editprofile.php';


if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}else{
  if ($_SESSION['occupation']!=="Police") {
    $_SESSION['errormessage']="Kindly login With A Police Account to Proceed To Proceed!";
    header("location:http://localhost/courtcasesystem/login/");
  }
}





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

    <title>Police</title>
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <!-- <link rel="stylesheet" href="css/stylesheet.css"> -->
   <link rel="stylesheet" href="css/styles.css">


  </head>

  <body>
    <div id="navbar">
        <a  id="heading" class="pull-left">Court Case System</a>
    <h1 id="headlink" style="font-size: 20px;margin-top: 22px;">Police </h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
        <a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
    </div><br>
  <a href="index.php" id="goback" style="top: 16%;">Go Back</a>


  <div class="content">
<?php if(!empty($_SESSION['profile-edit-success'])): ?>
  <div style="color: green; text-align: center;">
    <?php echo $_SESSION['profile-edit-success']; ?>
    <!-- User Successfully Registered! Proceed to login -->
  </div><br>
  <?php unset($_SESSION['profile-edit-success']); ?>
<?php endif; ?>
    
    <div id="holder">
      <div id="siderone">
        <p style="text-align: center;">User Account Information</p>
        <table id="profiledetails" style="width: 100%;">
          <tr>
            <td colspan="2" style="text-align: center;">Avatar</td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;">
              <img src="<?php 
               echo !empty($_SESSION['image'])?$_SESSION['image']: 'images/policelogo.png'; 
               ?>" alt="Profile Pic" style="width: 45%; height: 200px;"><br>
            </td>
          </tr>
          <tr>
            <td style="text-align: right;">User Name &nbsp&nbsp&nbsp</td>
            <td style="text-align: center;"><?php echo $_SESSION['username']; ?></td>
          </tr>
          <tr>
            <td style="text-align: right;">Occupation &nbsp&nbsp&nbsp</td>
            <td style="text-align: center;"><?php echo $_SESSION['occupation']; ?></td>
          </tr>
          <tr>
            <td style="text-align: right;">Email &nbsp&nbsp&nbsp</td>
            <td style="text-align: center;"><?php echo $_SESSION['email']; ?></td>
          </tr>
        </table>

        
      </div>
      <div id="sidertwo">
        <p style="text-align: center;">Edit Profile</p>
          <form id="editprofile" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
           method="POST" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Username" id="username" ><br><br>
<!--             <select id="occupation" class="form-control" name="occupation">
              <option value="">Choose One</option>
              <option value="1">Prosecutor</option>
              <option value="3">Clerk</option>
              <option value="4">Judge/Magistrate</option>
              <option value="2">Police</option>
            </select><br><br> -->
            <input type="text" name="email" placeholder="Email" id="email" ><br><br>
            <input type="file" name="image" style="text-indent: 0px;"><br><br>
            <button type="button" onclick="Check()" style="color: #270e04;">Submit</button><hr>
            <button type="button" style="width: 20%;font-size: 10px;background-color: #5ae25a;color: #000;" onclick="changePassword()">Change Password</button>


            
          </form>
        
      </div>
      
    </div>

  </div><br><br><br>



  <div class="footer">
    <small>&copy 2018 Court Management System. Police DepartMent</small>
  </div>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
  function Check(){
    var username =$('#username').val();
    if (username=="") {
      alert('Enter Username');
      $('#username').css({'borderColor':'red'});
      return;
    }
    var email =$('#email').val();
    if (email=="") {
      alert('Enter Email');
      $('#email').css({'borderColor':'red'});
      return;  
    }
    if (username!==""&&email!=="") {
      document.getElementById('editprofile').submit();
    }else{
      setTimeout(() => {
        alert('Try Again Later');
      }, 2000);
    }
  }
  function changePassword(){
    var oldpassword=prompt("Enter Old Password");
    if (oldpassword==""||oldpassword==null) {
      alert("Old Password is required to complete the process!");
      return;
    }
    var newpassword=prompt("Enter New Password");
    if (newpassword==""||newpassword==null) {
      alert("New Password is required to complete the process!");
      return;
    }
    var confirmnewPassword=prompt("Confirm New Password");
    if (confirmnewPassword==""||confirmnewPassword==null) {
      alert("Confirm Password!");
      return;
    }
    if (oldpassword!==""&&newpassword!==""&&confirmnewPassword!=="") {
      if (newpassword!==confirmnewPassword) {
        alert("Action Failed! The Newly Added Password doesnot match the Confirmation Password!Try Again");
        return
      }else{
        // console.log(oldpassword + "\n" +newpassword+ "\n" +confirmnewPassword);
        alert('Processing...');
        $.ajax({
          type:'post',
          url:'assets/changepassword.php',
          data:{old:oldpassword,new:newpassword,userid:"<?php echo $_SESSION['userid']; ?>"},
          success:function(response){
            alert(response);
            // console.log(response);
          },
          error:function(response){
            alert(response);
            // console.log(response);
          }


        });
        
      }   

    }else{
      alert("Action was Unsuccessful! You did not Add any Values on the Prompt!");
    }

  }
</script>


   

  </body>
</html>
