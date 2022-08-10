<?php



$postid =  $_GET['projectid'];



$servername = "localhost";
$username = "Saieshen";
$password2 = "saisu0511";
$dbname = "intellixdb";



// Create connection
$conn = new mysqli($servername,$username,$password2,$dbname);

if (!$conn){
echo "Database didn't connect". mysql_connect_error();
}


	  $sql = "SELECT * FROM project where PROJECTID = '$postid'";
    $result = $conn->query($sql);






  // output data of each row
 $row = $result->fetch_assoc();
	  
	  $pid = $row["PROJECTID"];
	  $pname = $row["PROJECTNAME"];
	 $pdes = $row["DESCRIPTION"];
	$pm = $row['PM'];
	$sdm = $row['SDM'];
	$ba = $row['BA'];
	$sd = $row['STARTDATE'];
	$ed = $row['ENDDATE'];
	$dep = $row['DEPARTMENT'];
	$status = $row['STATUS'];
	$comm = $row['COMMENT'];
	$tl = $row['TEAMLEAD'];
	$last = $row['LASTUPDATED'];
	
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="stylefordetails.css">
 
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
   </head>
   
   
   <style>
   
   a {

  float:left;

}


   
.box{
	
	
	style="background-color:white"
}   
   
.table th{
	   
	   background-color:#add8e6;
	   
	   
   }
   
   .font:hover{
	
	color:#E6E9EE;
	
}
   </style>
  
<a href="http://localhost/dashboard/Intellix/projects.php"><img src="./images/finallogo.png"  style="margin-left:-1vw;width:210px;height:140px;margin-top:-1vw;margin-left:0.4vw"></a> <br><br><br>
  
   
<body style="background-color:#E6E9EE">
<br><br>


<h2><div class="title" style="margin-left:0.6vw"><?php echo $pname ?></div> </h2> <br><br>

    <div class="home-content">
      <div class="overview-boxes" >
        <div class="box" style="background-color:white" >
          <div class="right-side" >
            <div class="box-topic">Total Tasks</div>
            <div class="number"><?php

$sql = "SELECT * FROM task WHERE PROJECTID = '$pid' AND ISDELETED='NO'";
    $result = $conn->query($sql);


$num_rows = mysqli_num_rows($result);



echo $num_rows;

			?></div>
            <div class="indicator">
            </div>
          </div>
        </div>

        <div class="box" style="background-color:white">
          <div class="right-side">
            <div class="box-topic">Tasks Completed</div>
            <div class="number"><?php

$sql = "SELECT * FROM task WHERE PROJECTID = '$pid' AND STATUS = 'Ready to Deploy' AND ISDELETED='NO'" ;
    $result = $conn->query($sql);


$num_rows = mysqli_num_rows($result);



echo $num_rows;

			?></div>
            <div class="indicator">
            </div>
          </div>
        </div>
        
        <div class="box" style="background-color:white">
          <div class="right-side">
            <div class="box-topic">Tasks In Progress</div>
            <div class="number"><?php

$sql = "SELECT * FROM task WHERE PROJECTID = '$pid' AND STATUS != 'Ready to Deploy' AND STATUS != 'Ice Box' AND ISDELETED='NO'" ;
    $result = $conn->query($sql);


$num_rows = mysqli_num_rows($result);



echo $num_rows;

			?></div>
            <div class="indicator">
            </div>
          </div>

        </div>
        <div class="box" style="background-color:white">
          <div class="right-side">
            <div class="box-topic">Overdue Tasks</div>
            <div class="number"><?php

$sql = "SELECT * FROM task WHERE PROJECTID = '$pid' AND STATUS = 'Ice Box' AND ISDELETED='NO'" ;
    $result = $conn->query($sql);


$num_rows = mysqli_num_rows($result);



echo $num_rows;

			?></div>
            <div class="indicator">  
            </div>
          </div>

        </div>
      </div>
	  
	        <div class="project-boxes">
        <div class="recent-project box">
          <div class="title" style="margin-left:0.6vw"></i>Project Details</div> <br>
		  
		  
		<div class="description" style="margin-left:0.6vw;font-size:19px" onlick=task()>  <?php echo $pdes ?> </div>  <br><br>
		  
          <div class="project-details">
            <table style="margin-top:10.5px; margin-left:10.5px; width: 100%;font-size:19px" >
              <tr>
                <th align="left">Project Manager</th>
                <th align="left">SDM</th>
                <th align="left">Business Analyst </th>
                <th align="left">Team Lead</th>
                <th align="left">Department</th>
                <th align="left">Status</th>
                <th align="left">Comment</th>
                <th align="left">Last Updated</th>
              </tr>

              <tr>
               <td align="left"><?php echo $pm ?></td>
               <td align="left"><?php echo $sdm ?></td>
               <td align="left"><?php echo $ba ?></td>
               <td align="left"><?php echo $tl ?></td>
               <td align="left"><?php echo $dep ?></td>
               <td align="left"><?php echo $status ?></td>
               <td align="left"><?php echo $comm ?> </td>
               <td align="left"><?php echo $last?></td>
              </tr>
            </table>
          </div>
        </div>
    </div>
	 <br>
	  
      <div class="project-boxes">
        <div class="recent-project box">
          <div class="title" style="margin-left:0.6vw"></i>Tasks</div><br>

	<button onclick="myFunction()" style="background-color:white;border:1px solid white">	  <div class="font" id="buttontext" style="float:left;margin-top:10px;margin-right:10px;cursor:pointer;margin-left:0.6vw">Add Task </div></button> <br><br>
		  
		  
          <div class="project-details">
            <table style="margin-top:10.5px; margin-left:10.5px; width: 100%;font-size:19px">
              <tr>
                <th align="left">Task Name</th>
                <th align="left">Employee</th>
                <th align="left">Department</th>
                <th align="left">Start Date</th>
                <th align="left">End Date</th>
                <th align="left">Task Status</th>
              </tr>
			  
			  
			  		   		 <?php  $sql = "SELECT * FROM task WHERE PROJECTID = '$pid' AND ISDELETED='NO'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td align="left"><?PHP echo $row['TASKNAME']?></td>
			    <td align="left"><?PHP echo $row['FULLNAME']?></td>
               <td align="left"><?PHP echo $row['DEPARTMENT']?></td>
			   	<td align="left"><?PHP echo $row['STARTDATE']?></td>
				<td align="left"><?PHP echo $row['ENDDATE']?></td>
			    <td align="left"><?PHP echo $row['STATUS']?></td>

        
              </tr>
			  
			  
  <?php }
  
}

?>



         
            </table>  
          </div>
        </div>
    </div>
    <br>
    <br>
    <div class="project-boxes">
        <div class="recent-project box">
                <div class="title">Overall Tasks</div>
                <canvas id="myChart" style="margin-left:12vw;width:100%;max-width:1200px"></canvas>
				
			<script>


function piechartforteam(x,y){
	
	StatusmyArray = x.split(",");
	
	NumbermyArray = y.split(",");
	
	var xValues = [] ;
	
	for (let i = 1; i < StatusmyArray.length; i++) {
        xValues.push(StatusmyArray[i] + " - " + NumbermyArray[i]);
}

	
var yValues = [];

	for (let i = 1; i < NumbermyArray.length; i++) {
        yValues.push(NumbermyArray[i]);
}



var barColors = ["#11799b", "#5ca393","#588BAE","#ebab39","#cf3c1c","#a4bb6c","#0c3c54","#f36b23","#343b48","#47a49f"];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
  }
});
	
	
	
}



</script>	
				
		


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

function myFunction(){
	
	
	
		window.location.replace('http://localhost/dashboard/Intellix/tasks.php');
	
	
	
	
}


</script>	
				
				<?php 
				
				$projectstatus = array();
	  $numberofproject = array();
	  $projectstatusstring = "";
	    $numberprojectsstring = "";
	  
	  
	 $sql = "SELECT DISTINCT STATUS FROM task WHERE PROJECTID = '$pid' AND ISDELETED = 'NO'";
    $result = $conn->query($sql);
	  
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { 
	
	$status = $row['STATUS'];
	
	array_push($projectstatus,$row['STATUS']);
	
	 $sql2 = "SELECT * FROM task WHERE PROJECTID = '$pid' AND STATUS = '$status' AND ISDELETED = 'NO' ";
	 
$result2 = $conn->query($sql2);
	  
	  
$num_rows = mysqli_num_rows($result2);

array_push($numberofproject,$num_rows);
	
	}
}


foreach ($projectstatus as $value) {
 $projectstatusstring = $projectstatusstring . ",". $value;
}

foreach ($numberofproject as $value) {
$numberprojectsstring =  $numberprojectsstring . ",". $value;
}


echo "<script> piechartforteam('$projectstatusstring','$numberprojectsstring')</script>";
				
				
				
				
				
				
				
				?>


        </div>
    </div>
  </section>
<br>
<br>
</body>
</html>

