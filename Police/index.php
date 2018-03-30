<?php 
session_start();

//include the connection from the database


// include 'assets/addchargesheet.php';

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
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <link rel="stylesheet" href="css/styles.css">


  </head>

  <body>
	<div id="navbar">
		<a id="heading" class="pull-left">Court Case System</a>
    <h1 id="headlink">Home</h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
		<a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
  <div class="sectionone">
    <div class="subsectionone">
          <h1>Police Department</h1>
          <img src="images/policelogo.png" alt="Kenya Police">
          <p>Welcome <?php echo $_SESSION['username']; ?>, You are now logged In as <?php echo $_SESSION['occupation']; ?>
            
          </p><br>
          <p>Your Main Duty is to add a report on the Charge Sheet</p><br>
          <a id="viewchargesheet" href="viewchargesheet.php">View Charge Sheets</a>
          <div class="tip">
            <h3 >Quick Tip</h3><br>
            <p>
              To send the Charge to Prosecutor,<br> Click The <i style="color: blue;">View Charge Sheet Button</i> <br>on top of this dialog
            </p>
          </div>
    </div>
    <div class="subsectiontwo">
      <h2 style="text-align: center;">Add Charge Sheet</h2>

    <!-- this is just simple php for checking  verification messages -->
     <div id="successmessage" style="display: none;">
      </div><br>


    <!-- this is just simple php for checking  verification messages -->

     <form id="chargesheet" method="post" onsubmit=" return false;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
       <div>
         <label for="Police Type">Police Type</label>
         <select name="policetype" id="policetype" required>
           <option value="">select</option>
           <option value="policeUnderStation">Police Under Station</option>
           <option value="DCI">DCI</option>
         </select>
       </div><br>
       <div>
         <label for="Occurrence Book Number">Generate OB Number</label><br>
         <button type="button" id="generateob" onclick="GenerateOb();">Click Here</button>
         <input type="text" id="obnumber" name="obnumber"  disabled >
         
       </div><br>
       <div>
         <label for="ID Number">ID Number</label>
         <input type="number" id="idnumber" name="idnumber" placeholder="Identity Card Number" maxlength="20" required>
       </div><br>
       <div>
         <label for="Full Names">Full Names</label>
         <input type="text" id="fullnames" name="fullnames" placeholder="fullnames" maxlength="100" required>
       </div><br>
       <div>
         <label for="Gender">Gender</label>
         <select name="gender" id="gender" required>
           <option value="">choose</option>
           <option value="male">male</option>
           <option value="female">female</option>
           <option value="transgender">transgender</option>
         </select>
       </div><br>
       <div>
         <label for="dateofbirth">Date Of Birth</label><br>
         <input type="date" name="dateofbirth" id="dateofbirth">
       </div><br>
       <div>
         <label for="Charge">Charge</label><br>
         <textarea name="description" id="description" placeholder="charge Description" required></textarea>
       </div><br>
       <div>
        <label for="Date Of Arrest">Date Of Arrest</label><br>
        <input type="date" id="dateofarrest" name="dateofarrest">

         
       </div><br>
       <button onclick="Validate()" type="submit">Add Charge</button>

     </form>
    </div>
  </div><br>
  <div class="footer">
    <small>&copy 2018 Court Management System. Police DepartMent</small>
  </div>







<script type="text/javascript" src="../js/jquery.js"></script>
<script>
  function GenerateOb(){
    var ob = Math.floor(Math.random()*1000000);

    document.getElementById("obnumber").style.backgroundColor ='#0b9002';

    document.getElementById("obnumber").value=ob;
    document.getElementById("generateob").innerHTML='Done! Proceed';
    $('#generateob').removeAttr('onclick');

    // console.log(ob);
  }
 function Validate () {
    // body... 
    var obnumber =document.getElementById("obnumber").value;
    var policetype =document.getElementById("policetype").value;
    var idnumber =document.getElementById("idnumber").value;
    var fullnames =document.getElementById("fullnames").value;
    var gender =document.getElementById("gender").value;
    var dateofbirth =document.getElementById("dateofbirth").value;
    var dateofarrest =document.getElementById("dateofarrest").value;
    var description =document.getElementById("description").value;

    var data={};
    data.obnumber=obnumber;
    data.policetype=policetype;
    data.idnumber=idnumber;
    data.fullnames=fullnames;
    data.gender=gender;
    data.dateofbirth=dateofbirth;
    data.dateofarrest=dateofarrest;
    data.description=description;
    console.log(data);

    if (obnumber!==""&&policetype!==""&&idnumber!==""&&fullnames!==""&&gender!==""&&dateofbirth!==""&&dateofarrest!=="") {
      $.ajax({
        type:'POST',
        url:'assets/addchargesheet.php',
        data:data,
        success:function(response){
          $('html,body').animate({scrollTop:0},"slow");
          $('#successmessage').css('display','');
          $('#successmessage').html(response);
          // document.getElementById("successmessage").innerHTML=response;
          console.log(response);
          setTimeout(() => {
            location.reload();
          }, 3000);

          //location.reload();
        },
        error:function(response){
          console.log(response);
          // setTimeout(() => {
          //   alert('Try Again');
          // }, 1000);
        }
      });
        // document.getElementById("chargesheet").submit();
    }else{
      alert('Make Sure All Fields are Filled !');
      document.getElementById("obnumber").value=null;
    }
    return false;
  } 
</script>

  
   

  </body>
</html>
