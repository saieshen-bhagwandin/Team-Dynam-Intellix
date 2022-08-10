<?php



$empcode =  $_GET['empcode'];



$servername = "localhost";
$username = "Saieshen";
$password2 = "saisu0511";
$dbname = "intellixdb";



// Create connection
$conn = new mysqli($servername,$username,$password2,$dbname);

if (!$conn){
echo "Database didn't connect". mysql_connect_error();
}



 $sql = "SELECT * FROM teammember where EMPCODE = '$empcode'";
    $result = $conn->query($sql);






  // output data of each row
 $row = $result->fetch_assoc();

 $dep = $row['DEPARTMENT'];
 $team = $row['TEAMNAME'];
$title = $row['TITLE'];	
$skills = $row['SKILLS'];
$break = $row['BREAK'];
$interview = $row['INTERVIEW'];  
$fullname = $row['FIRSTNAME'] . " " . $row['LASTNAME'] ;
$outsource = $row['OUTSOURCE'] ;	  

	
?>
<style>
  
table {

 

margin: 20px;

width: 90%;

border-collapse: separate;

border-spacing: 0 15px;
font-size:14px;

}




.header_fixed thead th {

top: 0;

background-color: #ffffff;

color: #18114a;

font-size:14px;

}



th,

td {

border-bottom: 1px solid #dddddd;

padding: 10px 20px;

font-size:12px;

text-align: center;



}



tr:nth-child(even) {

background-color: #ffffff;

}



tr:nth-child(odd) {

background-color: #ffffff;

}



tr:hover td {

cursor: pointer;

background-color: #ffffff;

}
</style>


<!DOCTYPE html>

<html lang="en" dir="ltr">


  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="styleforemployeedetails.css">
 
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   </head>

   <a href="http://localhost/dashboard/Intellix/employee.php"><img src="./images/finallogo.png"  style="margin-left:-1vw;width:210px;height:140px;margin-top:-2.5vw;margin-left:-0.5vw"></a> <br><br><br>

   
  <body style="background-color:#E6E9EE;">
  <br><br> 
  
   
    <div class="home-content" >

      <div class="project-boxes">
        <div class="recent-project box" style="background-color:white">

        <div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center" style="margin-top:2vh;height:19.1vw">
                    <img src="./images/finaluser.png" alt="Admin"  width="150">
                    <div class="mt-3">
                      <h4><?php echo ucwords(strtolower($fullname)) ?></h4>
                      <p class="text-secondary mb-1"><?php echo ucwords(strtolower($title)) ?></p>
                      <p class="text-muted font-size-sm"><br><br></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
              </div>
            </div>
            <div class="col-md-8"style="width: 600px;">
              <div class="card mb-3">
                <div class="card-body" >
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="width: 200px;">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo ucwords(strtolower($fullname)) ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="width: 200px;" >Department</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo ucwords(strtolower($dep)) ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="width: 200px;">Team Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo ucwords(strtolower($team)) ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="width: 200px;">Skills</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    </b><?php echo ucwords(strtolower($skills)) ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="width: 200px;">Job Title</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo ucwords(strtolower($title)) ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="width: 200px;">Outsource</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo ucwords(strtolower($outsource)) ?>
                    </div>
                  </div>
                </div>
              </div>

              </div>



            </div>
          </div>

        </div>
    </div>
        <div class="top-project box" style="background-color:white">
      



			  		  		 <?php  $sql = "SELECT DISTINCT PROJECTNAME FROM task where EMPCODE LIKE '%$empcode%' AND ISDELETED = 'NO' ";
    $result = $conn->query($sql);

$num_rows = mysqli_num_rows($result);

if($num_rows>1 || $num_rows == 0 ){?>
          <div class="title"><h2 style="font-size:24px;">Projects </h2> <hr></div><br><br>
<?php }else if($num_rows==1){?>
		  
		   <div class="title"><h2 style="font-size:24px;">Project </h2><hr></div><br><br>
<?php }?>  

          <ul style="font-size:21px; margin: 30; list-style: none; margin-top:-5vh; margin-left:0vh" >
		  
		  		  		 <?php  $sql = "SELECT DISTINCT PROJECTNAME FROM task where EMPCODE LIKE '%$empcode%' AND ISDELETED = 'NO'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
  
            <li><?PHP echo ucwords(strtolower($row['PROJECTNAME']))?></li>
  <?php }
  
}

?>

          </ul>
        </div>
      </div>
    </div>
<br>
    <div class="home-content">
      <div class="project-boxes" >
        <div class="recent-project box" style="width: 3000px;background-color:white">
          <div class="title" style="margin-left:0.6vw"></i><h2 style="font-size:24px;"> Recent Tasks</h2></div>
          <div class="project-details">
            <table style="margin-top:10.5px; margin-left:10.5px; width: 100%; font-size:19px">
              <tr>
                <th style="text-align:left;">Task Name</th>
                <th style="text-align:left;"lign="left">Project</th>
                <th style="text-align:left;">Start Date</th>
                <th style="text-align:left;">End Date</th>
                <th style="text-align:left;">Status</th>
              </tr>

           
			  
			  
			  		 <?php  $sql = "SELECT * FROM task where EMPCODE = '$empcode' AND ISDELETED = 'NO' LIMIT 5 ";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
		  
           <tr>
               <td style="text-align:left;"><?PHP echo $row['TASKNAME']?></td>
               <td style="text-align:left;"><?PHP echo $row['PROJECTNAME']?></td>
               <td style="text-align:left;"><?PHP echo $row['STARTDATE']?></td>
               <td style="text-align:left;"><?PHP echo $row['ENDDATE']?></td>
               <td style="text-align:left;"><?PHP echo $row['STATUS']?></td>
              </tr>
			  
			  
  <?php }
  
}

?>

            </table>

          </div>
        </div>
    </div>

  </section>


   <style>
   
   a {

  float:left;
  margin-left:1vw;

}




   
   </style>

   
<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
   
    padding: 1rem;
    width: auto;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>


<br>
<br>
</body>
</html>

