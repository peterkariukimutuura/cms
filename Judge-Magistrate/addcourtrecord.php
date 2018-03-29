<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';


if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}else{
    if ($_SESSION['occupation']!=="Judge/Magistrate") {
      $_SESSION['errormessage']="Kindly login With A Judge/Magistrate Account to Proceed!";
      header("location:http://localhost/courtcasesystem/login/");
    }
}

$id=4;
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  if (is_numeric($id)) {
     $sql ="SELECT * FROM chargesheets where id='$id'";
    $results=mysqli_query($conn,$sql);
    if ($results) {
    //var_dump(mysqli_fetch_assoc($results));
      if (mysqli_num_rows($results)>0) {
        $row=mysqli_fetch_assoc($results);
      }else{
        header("location:http://localhost/courtcasesystem/Judge-Magistrate/index.php");
      }
      
    }else{
      //echo mysqli_error($conn);
    }
  }else{
    header("location:http://localhost/courtcasesystem/Judge-Magistrate/index.php");
  }
  
}else{
  header("location:http://localhost/courtcasesystem/Judge-Magistrate/index.php");
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

    <title>Judges / Magistrate</title>
	
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <link rel="stylesheet" href="css/stylesheet.css">


  </head>

  <body>
	<div id="navbar">
		<a  id="heading" href="index.php" class="pull-left" style="text-decoration: none;">Court Case System</a>
    <h1 id="headlink" style="font-size: 20px;margin-top: 22px;">Add Court Record</h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
		<a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
  <a href="index.php" id="goback">Go Back</a>
  <a id="viewmore" href="view.php?id=<?php echo $row['id']; ?>" style="margin-left: 77%;margin-top: 16px;
    position: absolute;">View Charge Sheet Details</a>


  <div class="content" style="height: 770px;">
    <div>
      <h3 style="text-align: center;">Make A Court Record for Charge Sheet Number <?php echo $_GET['id'] ?></h3>
    </div>
    <form action="#" method="post" onsubmit="return false;" style="width: 100%;height: 695px;">
      <div style="    width: 42%;float: left;text-align: center;padding-left: 70px;">
      <div style="display: table-caption;">
        <label for="">Case Number</label>
        <input type="number" id="casenumber" name="casenumber" placeholder="Case Number">
      </div><br>
      <div style="display: table-caption;">
        <label for="">Court Name</label>
        <input type="text" id="courtname" name="courtname" placeholder="Case Name">
      </div><br>
      <div style="display: table-caption;width: 425px;">
        <label for="">Plea</label>
        <select name="plea" id="plea" name="plea" style="width: 100%;">
          <option value="">select</option>
          <option value="Guilty">Guilty</option>
          <option value="Not Guilty">Not Guilty</option>
        </select>
      </div><br>

      <div style="display: table-caption;">
        <label for="">Plea Date</label>
        <input type="date" id="pleadate" name="pleadate" placeholder="Plea Date">
      </div><br>
      <div style="display: table-caption;width: 425px;">
        <label for="">Plea Outcome</label>
        <select name="pleaoutcomes" id="pleaoutcomes" style="width: 100%;">
          <option value="">select</option>
          <option value="Bail">Bail</option>
          <option value="Bond">Bond</option>
        </select>
      </div><br>

      <div style="display: table-caption;">
        <label for="">Hearing Date</label>
        <input type="date" id="hearingdate" name="hearingdate" placeholder="Hearing Date">
      </div><br>


      <div style="display: table-caption;">
        <label for="">Sentence</label>
        <input type="text" id="sentence" name="sentence" placeholder="Case Number">
      </div><br>
      <div style="display: table-caption;width: 425px;">
        <label for="">Case Status</label>
        <select name="case" id="casestatus" style="width: 100%;">
          <option value="">select</option>
          <option value="Closed">Closed</option>
          <option value="Open">Open</option>
        </select>
      </div><br>
      </div>
      <div style="width: 50%;float: left;">
        <div style="    display: table-caption;">
          <label for="">Judges Notes</label>
          <textarea style="width: 500px;margin-top: 11px;padding: 5px;height: 544px;text-indent: 10px;resize: none;" name="judgesnotes" id="judgesnotes" name="judgesnotes" placeholder="Judges Notes"></textarea>
        </div>
        
      </div>
      <div style="width: 395px; padding-left:70px; ">
        <button onclick="AddRecord();" type="button" style="font-weight: lighter;color: white;background: green;
    border: none;"> Submit</button>
      </div>

      
    </form>

  </div><br>



  <div class="footer">
    <small>&copy 2018 Brenda, Court Management System. Police DepartMent</small>
  </div>






<script type="text/javascript" src="../js/jquery.js"></script>

<script>
    function AddRecord(){
    var data ={};
     data.casenumber=$('#casenumber').val();
    if (data.casenumber=="") {
      alert('Enter Case Number');
      return;
    }
     data.courtname=$('#courtname').val();
    if (data.courtname=="") {
      alert('Enter Court Name');
      return;
    }

     data.plea =$('#plea').val();  
    if (data.plea=="") {
      alert('Select One Choice On Plea');
      return;
    }
     data.plea =$('#plea').val();  
    if (data.plea=="") {
      alert('Select One Choice On Plea');
      return;
    }

     data.pleadate =$('#pleadate').val();  
    if (data.pleadate=="") {
      alert('Add Plea Date');
      return;
    }

     data.pleaoutcomes =$('#pleaoutcomes').val();  
    if (data.pleaoutcomes=="") {
      alert(' Select One on Plea Out Comes');
      return;
    }

     data.hearingdate =$('#hearingdate').val();  
    if (data.hearingdate=="") {
      alert('Add Hearing Dates');
      return;
    }

     data.sentence =$('#sentence').val();  
    if (data.sentence=="") {
      alert('Enter Sentence');
      return;
    }

     data.casestatus =$('#casestatus').val();  
    if (data.casestatus=="") {
      alert('Select Case Status');
      return;
    }

     data.judgesnotes =$('#judgesnotes').val();  
    if (data.judgesnotes=="") {
      alert('Add Judge Notes');
      return;
    }

    data.chargesheet="<?php echo $_GET['id']; ?>";
    if (data.chargesheet=="") {
      location.reload();

    }

    // console.log(data);
    // return;

    $.ajax({
      url:'assets/addcourtrecord.php',
      type:'POST',
      data:data,
      success:function(response){
        console.log(response);
        if (response=='success') {
          alert("Court Record was Successfully Added");
          location.reload();
        }else{
          console.log(response);
        }
      },
      error:function(response){
        console.log(response);
      }
    })
}


</script>


  </body>
</html>
