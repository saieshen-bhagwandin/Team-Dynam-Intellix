<?php 

include "newnavbar.php";


$servername = "localhost";
$username = "Saieshen";
$password2 = "saisu0511";
$dbname = "intellixdb";



// Create connection
$conn = new mysqli($servername,$username,$password2,$dbname);

if (!$conn){
echo "Database didn't connect". mysql_connect_error();
}



?>



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" name="viewport">
	  
    <link rel="stylesheet" href="stylefordashboard.css">
 
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
     <script src="dashboard.js"></script>
    
   </head>
  
<br><br><br><br><br><br>
<body style="background-color:#f1f1f1 ; " >
    <div class="home-content">
      <br>
      <div class="project-boxes">
        <div class="recent-project box">

          <div class="project-details">
			            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
              <label for="Project Mangager" style="color: #18114a;"><b>Project Manager</b></label>
              <br><br>
              <select name="ProjectManager" id="name"  style="height: 30px; width: 200px; border-radius: 8px;">
			  
			   <option value="" selected="selected" disabled="disabled"></option>
			  
   	  <?php   $sql = "SELECT DISTINCT PM FROM project WHERE ISDELETED='NO'";
    $result = $conn->query($sql);

$counter = 0;
 
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {  ?>
  
  <option value="<?php echo $row['PM'].':'.$counter;
  $counter++;?>" > <?php echo ucwords(strtolower($row['PM']))?></option>

  <?php }
  
  
  
}?>
              </select>
			 
			    <input type="submit" name ="pmfilter" class="btnstatus"  value="Search">
			
            </form>
			
          
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
              <label for="Project Status" style="color: #18114a;"><b>Project Status</b></label>
              <br><br>
              <select name="ProjectStatus" id="name2"  style="height: 30px; width: 200px; border-radius: 8px;">
			  
			  <option value="" disabled="disabled"></option>
			  
			  <option value="All"  selected="true" >All</option>
			  
			  
   	  <?php   $sql = "SELECT DISTINCT STATUS FROM project WHERE ISDELETED='NO' ";
    $result = $conn->query($sql);

$counter = 0;

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {  ?>
  
  <option value="<?php echo $row['STATUS'].':'.$counter;
  $counter++;?>" > <?php echo ucwords(strtolower($row['STATUS']))?></option>

  <?php }
  
  
  
}?>
              </select>
			 
			    <input type="submit" name ="statusfilter" class="btnstatus"  value="Search">
			
            </form>
			
			
			
   		            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
              <label for="Project Team" style="color: #18114a;"><b>Team</b></label>
              <br><br>
              <select name="ProjectTeam" id="name3"  style="height: 30px; width: 200px; border-radius: 8px;">
			  
			   <option value="All" selected="selected" >All</option>
			  
   	  <?php   $sql = "SELECT DISTINCT TEAM FROM task WHERE ISDELETED='NO' ";
    $result = $conn->query($sql);

 $counter=0;
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {  ?>
  
  
  <option value="<?php echo $row['TEAM'].':'.$counter;
  $counter++;?>" > <?php echo ucwords(strtolower($row['TEAM']))?></option>

  <?php }
  
  
  
}?>
              </select>
			 
			    <input type="submit" name ="teamfilter" class="btnstatus"  value="Search">
			
            </form>
			
          </div>
          
          <br>
	
        </div>
    </div>
	
    <br>
   
  
  



<style>

table, tr, th, td {
  border: 1px solid #DCDCDC;
  border-collapse: collapse;
}

select{

	border:1px solid #DCDCDC;

}


.btnstatus{
	
	padding:4px;
	border-radius:15px;
	border: 1px solid white;
	width:4vw;
	background:white;
	color:black;
	margin-right:10px
	
}

.btnstatus:hover {
	

	color:#2bb3e2
	
}

</style>

<script>

function bargraphforteam(x,y,name){

				  NumbermyArray2 = name.split(",");
		
		document.getElementById("secondblock").innerHTML = "Total projects - Teams"; 
		
				  	StatusmyArray = x.split(",");
	
	NumbermyArray = y.split(",");
	
var xValues = [];
var yValues = [];

var barColors = ["#11799b", "#5ca393","#588BAE","#ebab39","#cf3c1c","#a4bb6c","#0c3c54","#f36b23","#343b48","#47a49f"];




	for (let i = 1; i < StatusmyArray.length; i++) {
        xValues.push(StatusmyArray[i] + " - " + NumbermyArray[i] );
}




	for (let i = 1; i < NumbermyArray.length; i++) {
        yValues.push(NumbermyArray[i]);
}

yValues.push(0);



new Chart("TeamChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total projects - Teams"
    }
  }
});



}




function bargraph(x,y,name){


				  
				  NumbermyArray2 = name.split(",");
		
		document.getElementById("firstblockstatus").innerHTML = "Total Projects - Status"; 
		
				  	StatusmyArray = x.split(",");
	
	NumbermyArray = y.split(",");
	
var xValues = [];
var yValues = [];

var barColors = ["#11799b", "#5ca393","#588BAE","#ebab39","#cf3c1c","#a4bb6c","#0c3c54","#f36b23","#343b48","#47a49f"];

	for (let i = 1; i < StatusmyArray.length; i++) {
        xValues.push(StatusmyArray[i] + " - " + NumbermyArray[i] );
}

	for (let i = 1; i < NumbermyArray.length; i++) {
        yValues.push(NumbermyArray[i]);
}

yValues.push(0);


new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Projects - Status"
    }
  }
});



}


function piechart(x,y,name){
	
	document.getElementById("firstblockstatus").innerHTML = "Total Projects By " + name; 
	
	StatusmyArray = x.split(",");
	
	NumbermyArray = y.split(",");
	
	var xValues = [] ;
	
	for (let i = 1; i < StatusmyArray.length; i++) {
        xValues.push(StatusmyArray[i] + " - " + NumbermyArray[i] );
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
function piechartforteam(x,y,name){
	
	
	document.getElementById("secondblock").innerHTML = "Total Projects By " + name; 
	
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

new Chart("TeamChart", {
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


    <div class="project-boxes">
        <div class="recent-project box">
                <div class="title" id="firstblockstatus" style="color:#18114a;margin-left:10.5px;">Total Project By Project Manager and Status</div>
				<br>
                <canvas id="myChart" style="width:100%;max-width:45vw"></canvas>
				
				
				
				<?php 
				
			
$projectstatus = array();
	  $numberofproject = array();
	  $projectstatusstring = "";
	    $numberprojectsstring = "";
	  
	  
	 $sql = "SELECT DISTINCT STATUS FROM project WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);
	  
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { 
	
	$status = $row['STATUS'];
	
	array_push($projectstatus,$row['STATUS']);
	
	 $sql2 = "SELECT * FROM project WHERE STATUS = '$status' AND ISDELETED = 'NO' ";
	 
$result2 = $conn->query($sql2);
	  
	  
$num_rows = mysqli_num_rows($result2);

array_push($numberofproject,$num_rows);
	
	}
}

foreach ($projectstatus as $value) {
 $projectstatusstring = $projectstatusstring . ",". $value;
}

foreach ($numberofproject as $value) {
$numberprojectsstring = $numberprojectsstring . ",". $value;
}



echo "<script> bargraph('$projectstatusstring','$numberprojectsstring',',All')</script>";
			
				
				
				
				
	


				
	if(isset($_POST['pmfilter'])){
    if(!empty($_POST['ProjectManager'])) {
        $selected = $_POST['ProjectManager'];
      
	  		  $str_arr = explode (":", $selected);
	
	$str_arr[1] = $str_arr[1]+1;
	

	
	 
	     echo "<script> document.getElementById('name').selectedIndex = $str_arr[1];</script>";
		 echo "<script> document.getElementById('name2').selectedIndex = 0;</script>";		
				
		$selected = $str_arr[0];
		
		
	  $projectstatus = array();
	  $numberofproject = array();
	  $projectstatusstring = "";
	    $numberprojectsstring = "";
	  
	  
	 $sql = "SELECT DISTINCT STATUS FROM project WHERE PM = '$selected' AND ISDELETED = 'NO'";
    $result = $conn->query($sql);
	  
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { 
	
	$status = $row['STATUS'];
	
	array_push($projectstatus,$row['STATUS']);
	
	 $sql2 = "SELECT * FROM project WHERE PM = '$selected' AND STATUS = '$status' AND ISDELETED = 'NO' ";
	 
$result2 = $conn->query($sql2);
	  
	  
$num_rows = mysqli_num_rows($result2);

array_push($numberofproject,$num_rows);
	
	}
}

foreach ($projectstatus as $value) {
 $projectstatusstring = $projectstatusstring . ",". $value;
}

foreach ($numberofproject as $value) {
$numberprojectsstring = $numberprojectsstring . ",". $value;
}



echo "<script> piechart('$projectstatusstring','$numberprojectsstring','$selected')</script>";
	  
    } else {
        echo 'Please select the value.';
    }
    }
	
	
	
		  if(isset($_POST['statusfilter'])){
    if(!empty($_POST['ProjectStatus'])) {
		
		if($_POST['ProjectStatus'] == "All"){
			
			
			
				  $projectstatus = array();
	  $numberofproject = array();
	  $projectstatusstring = "";
	    $numberprojectsstring = "";
	  
	  
	 $sql = "SELECT DISTINCT STATUS FROM project WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);
	  
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { 
	
	$status = $row['STATUS'];
	
	array_push($projectstatus,$row['STATUS']);
	
	 $sql2 = "SELECT * FROM project WHERE STATUS = '$status' AND ISDELETED = 'NO' ";
	 
$result2 = $conn->query($sql2);
	  
	  
$num_rows = mysqli_num_rows($result2);

array_push($numberofproject,$num_rows);
	
	}
}

foreach ($projectstatus as $value) {
 $projectstatusstring = $projectstatusstring . ",". $value;
}

foreach ($numberofproject as $value) {
$numberprojectsstring = $numberprojectsstring . ",". $value;
}



echo "<script> bargraph('$projectstatusstring','$numberprojectsstring',',All')</script>";
			
			
			
			
			
		}else{
		
		  if(!empty($_POST['ProjectStatus'])) {
			  
        $selected = $_POST['ProjectStatus'];
      
			  $str_arr = explode (":", $selected);
			  
			  $variable = $str_arr[1]+2;
	
	     echo "<script> document.getElementById('name2').selectedIndex = $variable;</script>";
				
				
		$selected = $str_arr[0];
	  
	 $sql = "SELECT * FROM project WHERE STATUS = '$selected' AND ISDELETED = 'NO'";
    $result = $conn->query($sql);
	  
	  
$num_rows = mysqli_num_rows($result);

$selected = ",".$selected;
$num_rows = ",".$num_rows;

echo "<script> bargraph('$selected','$num_rows','$selected')</script>";
	  
    } else {
        echo 'Please select the value.';
    }
	
	}
    }
	
		  }	
				
				?>


</div>

        <div class="recent-project box">
                <div class="title" id="secondblock" style="color:#18114a;margin-left:10.5px;">Projects by Teams</div>
                <br>
                <canvas id="TeamChart" style="width:100%;max-width:45vw" ></canvas>

<?php 

 $projectstatus = array();
	  $numberofproject = array();
	  $projectstatusstring = "";
	    $numberprojectsstring = "";

	 $sql = "SELECT DISTINCT TEAM FROM task WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);
	  
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { 
	
	$status = ucwords(strtolower($row['TEAM']));
	
	array_push($projectstatus,ucwords(strtolower($row['TEAM'])));
	
	 $sql2 = "SELECT DISTINCT PROJECTNAME FROM task WHERE TEAM = '$status' AND ISDELETED = 'NO' ";
	 
$result2 = $conn->query($sql2);
	  
	  
$num_rows = mysqli_num_rows($result2);

array_push($numberofproject,$num_rows);
	
	}
}

foreach ($projectstatus as $value) {
 $projectstatusstring = $projectstatusstring . ",". $value;
}

foreach ($numberofproject as $value) {
$numberprojectsstring = $numberprojectsstring . ",". $value;
}



echo "<script> bargraphforteam('$projectstatusstring','$numberprojectsstring',',All')</script>";
			


if(isset($_POST['teamfilter'])){
    if(!empty($_POST['ProjectTeam'])) {
		
				if($_POST['ProjectTeam'] == "All"){
	
				  $projectstatus = array();
	  $numberofproject = array();
	  $projectstatusstring = "";
	    $numberprojectsstring = "";

	 $sql = "SELECT DISTINCT TEAM FROM task WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);
	  
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { 
	
	$status = ucwords(strtolower($row['TEAM']));
	
	array_push($projectstatus,ucwords(strtolower($row['TEAM'])));
	
	 $sql2 = "SELECT DISTINCT PROJECTNAME FROM task WHERE TEAM = '$status' AND ISDELETED = 'NO' ";
	 
$result2 = $conn->query($sql2);
	  
	  
$num_rows = mysqli_num_rows($result2);

array_push($numberofproject,$num_rows);
	
	}
}

foreach ($projectstatus as $value) {
 $projectstatusstring = $projectstatusstring . ",". $value;
}

foreach ($numberofproject as $value) {
$numberprojectsstring = $numberprojectsstring . ",". $value;
}



echo "<script> bargraphforteam('$projectstatusstring','$numberprojectsstring',',All')</script>";
			
			
			
			
			
		}else{
			
			 if(!empty($_POST['ProjectTeam'])) {
				 
        $selected = ucwords(strtolower($_POST['ProjectTeam']));
      
	  			  $str_arr = explode (":", $selected);
			  
			  $variable = $str_arr[1] + 1;
	
	     echo "<script> document.getElementById('name3').selectedIndex = $variable;</script>";
		 
		 $selected = $str_arr[0];
		 
	  $projectstatus = array();
	  $numberofproject = array();
	  $projectstatusstring = "";
	    $numberprojectsstring = "";
	  
	  
	 $sql = "SELECT DISTINCT PROJECTNAME FROM task WHERE TEAM = '$selected' AND ISDELETED = 'NO'";
    $result = $conn->query($sql);
	  
	  $num_rows = mysqli_num_rows($result);
	  

	  
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { 
	
	$status = $row['PROJECTNAME'];
	
	array_push($projectstatus,$row['PROJECTNAME']);
	
	 $sql2 = "SELECT TASKNAME FROM task WHERE TEAM = '$selected' AND PROJECTNAME = '$status' AND ISDELETED = 'NO' ";
	 
$result2 = $conn->query($sql2);
	  
	  
$num_rows = mysqli_num_rows($result2);

array_push($numberofproject,$num_rows);
	
	}
}

foreach ($projectstatus as $value) {
 $projectstatusstring = $projectstatusstring . ",". $value;
}

foreach ($numberofproject as $value) {
$numberprojectsstring = $numberprojectsstring . ",". $value;
}



echo "<script> piechartforteam('$projectstatusstring','$numberprojectsstring','$selected')</script>";
	  
    } else {
        echo 'Please select the value.';
    }
	
	}
    }
}	







?>
              
        </div>


    </div>
	
	
	
	<script>
	
	 
 function testing(x){
	 
	 
	createCookie("status",x,"10");
	
	location.reload();
	
	
	
	 
 }
 
 
  function test(x){
	 
	 
	createCookie("team",x,"10");
	
	location.reload();
	
	
	
	 
 }
 
 
	
	
	function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
}


function closeedit()
{
         document.getElementById("statuspopup").style.display = "none";

}


	
	</script>
<br>




  <div class="project-boxes">
    <div class="recent-project box">
      <div class="title" style="color:#18114a;margin-left:10.5px;"></i>Project Details</div><br>
      <div class="project-details">
        <table style="margin-top:10.5px; margin-left:10.5px; width: 99%;">
          <tr >
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Project Name</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Start Date</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Estimated End Date</th>
			 <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Estimated Duration (Days)</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Status</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Length of Delay (Days)</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Number of Team Members</th>
          </tr>
      
          <tr>
     
		   
		   		 <?php  $sql = "SELECT * FROM project where ISDELETED='NO'";
    $result = $conn->query($sql);



if ($result->num_rows > 0) {
 

		  
  while($row = $result->fetch_assoc()) { 
  
   	  $datetime1 = date_create($row['STARTDATE']);
  $datetime2 = date_create($row['ENDDATE']);
 
  // Calculates the difference between DateTime objects
  $interval = date_diff($datetime1, $datetime2);
		
  $pid = $row['PROJECTID'];
  
  ?> 
		  
	
		  
              <tr>
			   <td align="left"><?PHP echo $row['PROJECTNAME']?></td>
			    <td align="left"><?PHP echo $row['STARTDATE']?></td>
               <td align="left"><?PHP echo $row['ENDDATE']?></td>
			   <td align="left"><?PHP echo $interval->format("%R%a days")?></td>
			    <td align="left"><?PHP echo $row['STATUS']?></td>
               <td align="left"><?PHP 
			   
			    $sql3 = "SELECT * FROM delay WHERE PROJECTID = $pid";
    $result3 = $conn->query($sql3);

$sum = 0;

if ($result3->num_rows > 0) {
 

		  
  while($row3 = $result3->fetch_assoc()) {
	  
	  $number = intval(substr($row3['PERIOD'],1,2));
	  $sum = $sum + $number;
	  

  }

}


echo "+".$sum;  
			   
			   
			   
			   
			   ?>
			   
			   
			   
			   
			   
			   </td>
               <td align="left"><?php
			   
			   $pid = $row['PROJECTID'];

$sql2 = "SELECT DISTINCT EMPCODE FROM task WHERE PROJECTID = '$pid' AND ISDELETED='NO'";
    $result2 = $conn->query($sql2);


$num_rows = mysqli_num_rows($result2);



echo $num_rows;

			?></td>
        
              </tr>
			  
			  
  <?php }
  
}

?>

          </tr>
        </table>
      </div>
    </div>
</div> <br>





		<?php if(isset($_COOKIE["status"])){
			
			$status = $_COOKIE["status"];
			
			$sql = "SELECT * FROM project WHERE STATUS = '$status' AND ISDELETED='NO'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {?>
 
 <div id="statuspopup"  class="statuspopup" style="display:block,position:relative">
 

 <center> <h1 style="margin-left:20vw;">Projects with status of <?php echo $status ?> <button onclick="closestatuspopup()" style="float:right;margin-right:17vw;margin-top:6vw;border:1px solid #E6E9EE;background:#E6E9EE"><i class="fa fa-close"  style="float:right;margin-right:10px;font-size:30px;color:red" > </i> </button></h1> </center> <br><br>



     <div class="home-content" autofocus style="margin-left:30vw;display:block;z-index:5;width:60vw;height:10vw;border-radius:10px">
        <table style="margin-top:10.5px; margin-left:10.5px;width: auto;border-radius:10px">
          <tr >
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Project Name</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Start Date</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">End Date</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Project Manager</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Department</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Status</th>
          </tr>
		  
  <?php while($row = $result->fetch_assoc()) { 
			
			?>
	
	

      
          <tr>
            <td align="left" id="myText"><?php echo $row['PROJECTNAME']?></td>
           <td align="left"><?php echo $row['STARTDATE']?></td>
           <td align="left"> <?php echo $row['ENDDATE']?></td>
           <td align="left"><?php echo $row['PM']?></td>
           <td align="left"><?php echo $row['DEPARTMENT']?></td>
           <td align="left"><?php echo $row['STATUS']?></td>
          </tr>
  
	
			   	<script>

function closestatuspopup(){
	
	  document.getElementById("statuspopup").style.display = "none";
	
} 
 
 

</script>

	
<?php } ?>

      </table>
     
    </div>
	
	</div><br><br>
	



<?php }





		}else if(isset($_COOKIE["team"])){
			
	
			$status = $_COOKIE["team"];
			
			$sql = "SELECT * FROM task WHERE TEAM = '$status' AND ISDELETED='NO'";
    $result = $conn->query($sql);



if ($result->num_rows > 0) {?>
 
 

 <div id = "statuspopup" class="statuspopup2" style="display:block;position:relative">
 
 
 <center> <h1 style="margin-left:30vw;">Tasks from <?php echo $status ?> <button onclick="closestatuspopup()" style="float:right;margin-right:17vw;margin-top:6vw;border:1px solid #E6E9EE;background:#E6E9EE"><i class="fa fa-close"  style="float:right;margin-right:10px;font-size:30px;color:red" > </i> </button></h1> </center> <br><br>
 
     <div class="home-content" autofocus style="margin-left:30vw;display:block;z-index:5;width:60vw;height:10vw;border-radius:10px">
        <table style="margin-top:10.5px; margin-left:10.5px;width: auto;border-radius:10px">
          <tr >
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Task Name</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Start Date</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">End Date</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Project Name</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Department</th>
            <th align="left" style="color:#18114a;background:#E6E9EE;font-size:15px">Status</th>
          </tr>
		  
		  
		   	<script>

function closestatuspopup(){
	
	  document.getElementById("statuspopup").style.display = "none";
	
} 
 
 

</script>
		  
		  
  <?php while($row = $result->fetch_assoc()) { 
			
			?>
	
	

      
          <tr>
            <td align="left" id="myText"><?php echo $row['TASKNAME']?></td>
           <td align="left"><?php echo $row['STARTDATE']?></td>
           <td align="left"> <?php echo $row['ENDDATE']?></td>
           <td align="left"><?php echo $row['PROJECTNAME']?></td>
           <td align="left"><?php echo $row['DEPARTMENT']?></td>
           <td align="left"><?php echo $row['STATUS']?></td>
          </tr>
  
	
	
	
<?php } ?>

      </table>
     
    </div>
	
	</div> 
	
	



<?php }

		}

		?>
 




    <div class="project-boxes">
        <div class="recent-project box">
               <div class="title" style="margin-left:1vw" style="color:#18114a"> Project By Status</div>
				 <form method="post" action="dashboard.php" style="margin-top:30px;" >
                <table style="width: 95%;">
                    <tr>
                      <th  style="color:#18114a;background:#E6E9EE;font-size:15px;align-content:center">Status</th>
                      <th style="color:#18114a;background:#E6E9EE;font-size:15px;align-content:center">Total</th>
                    </tr>
    
		
		
					<tr> <td align="left" onclick="testing('New')" style="cursor: pointer;">New </td>
					<td style="align-content:center"><?php echo countstatus("New");?> </td>
					</tr>
				

				
					
   <tr> <td align="left" onclick="testing('Neglected Work')" style="cursor: pointer;">Neglected Work </td>
   <td style="align-content:center"><?php echo countstatus("Neglected Work");
   ?> </td>
   
   </tr>
   
   
   <tr><td align="left" onclick="testing('Unplanned Work')" style="cursor: pointer;">Unplanned Work </td>
     <td style="align-content:center"><?php  echo countstatus("Unplanned Work");?> </td>
   </tr>
   
   
   <tr><td align="left" onclick="testing('Unknown Dependencies')" style="cursor: pointer;">Unknown Dependencies </td>
     <td style="align-content:center"><?php echo countstatus("Unknown Dependencies");?> </td>
   </tr>
   
  <tr><td align="left" onclick="testing('Business Testing')"  style="cursor: pointer;"> Bussiness Testing </td>
    <td style="align-content:center"><?php echo countstatus("Business Testing");?> </td>
  </tr>
  
	<tr><td align="left" onclick="testing('Conflicting Priorites')" style="cursor: pointer;">Conflicting Priorites</td>
  <td style="align-content:center"><?php  echo countstatus("Conflicting Priorites");?> </td>
	</tr>
	


	
	<tr><td align="left" onclick="testing('Outsource')" style="cursor: pointer;">Outsource </td>
	  <td style="align-content:center"><?php echo countstatus("Outsource");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Code Review')" style="cursor: pointer;">Code Review </td>
	  <td style="align-content:center"><?php echo countstatus("Code Review");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Blocked')" style="cursor: pointer;">Blocked </td>
	  <td style="align-content:center" onclick="testing('Unkown Dependencies')"><?php echo countstatus("Blocked");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('QA Failed')" style="cursor: pointer;">QA Failed</td>
  <td style="align-content:center"><?php echo countstatus("QA Failed");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Ready for Deploy to Live')" style="cursor: pointer;">Ready for Deploy to Live </td>
	  <td style="align-content:center" onclick="testing('Unkown Dependencies')"><?php echo countstatus("Ready for Deploy to Live");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('QA')" style="cursor: pointer;">QA </td>
	  <td style="align-content:center"><?php echo countstatus("QA");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Rose(10)')" style="cursor: pointer;">Rose(10) </td>
	  <td style="align-content:center"><?php echo countstatus("Rose(10)");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('PMO')" style="cursor: pointer;">PMO </td>
	  <td style="align-content:center"><?php echo countstatus("PMO");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Selina(19)')" style="cursor: pointer;">Selina(19)</td>
  <td style="align-content:center"><?php echo countstatus("Selina(19)");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Sive(8)')" style="cursor: pointer;">Sive(8)</td> 
	  <td style="align-content:center"><?php echo countstatus("Sive(8)");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Devops(5)')" style="cursor: pointer;">Devops(5)</td>
  <td style="align-content:center"><?php echo countstatus("Devops(5)");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Nivash(6)')" style="cursor: pointer;">Nivash(6) </td>
	  <td style="align-content:center"><?php echo countstatus("Nivash(6)");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('DBA(6)')" style="cursor: pointer;">DBA(6)</td>
	  <td style="align-content:center"><?php echo countstatus("DBA(6)");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Vithasha(4)')" style="cursor: pointer;">Vithasha(4)</td> 
	  <td style="align-content:center"><?php echo countstatus("Vithasha(4)");?> </td>
	</tr>
	
	<tr><td align="left" onclick="testing('Imbedded Outsource Devs')" style="cursor: pointer;">Imbedded Outsource Devs</td>
  <td style="align-content:center"><?php echo countstatus("Imbedded Outsource Devs");?> </td>
	</tr>
	
<?php $sum = countstatus("New") + countstatus("Neglected Work") + countstatus("Unplanned Work") + countstatus("Unknown Dependencies") + countstatus("Business Testing") + countstatus("Conflicting Priorites") + countstatus("Outsource") + countstatus("Code Review") + countstatus("Blocked ") + countstatus("QA Failed") + countstatus("Ready for Deploy to Live") + countstatus("QA") + countstatus("Rose(10)") + countstatus("PMO") + countstatus("Selina(19)") + countstatus("Sive(8)") + countstatus("Devops(5)") +  countstatus("Nivash(6)") + countstatus("DBA(6)") + countstatus("Vithasha(4)") + countstatus("Imbedded Outsource Devs") ;
	
	
	?>
	
	
	
	
	    <tr>

                        <td align="left"><b>Grand Total</b></td>
                        <td style="align-content:center"><b><?php  echo $sum ;?><b></td>
                    </tr>
                    
                  </table>
				  </form>
        </div>


<?php 


function countstatus ($status) {
	
	$servername = "localhost";
$username = "Saieshen";
$password2 = "saisu0511";
$dbname = "intellixdb";

$conn = new mysqli($servername,$username,$password2,$dbname);

	
	 $result2 = $conn->query("select * from project where STATUS = '$status' AND ISDELETED='NO' ");
		$num_rows = mysqli_num_rows($result2);



return $num_rows;
}







?>




        <div class="recent-project box">
                <div class="title" style="margin-left:1vw"> Tasks by Teams</div>
                <table style="width: 95%;">
                    <tr>
                      <th  style="color:#18114a;background:#E6E9EE;font-size:15px;align-content:center">Team</th>
                      <th style="color:#18114a;background:#E6E9EE;font-size:15px;align-content:center">Total</th>
                    </tr>
        
        
					
					<?php
						$conn = new mysqli($servername,$username,$password2,$dbname);
		
		 $sql = "SELECT DISTINCT TEAM FROM task where ISDELETED='NO'";
		 
    $result = $conn->query($sql);

 
  $sum = 0;

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { 
  
     $theteam =  $row['TEAM'];

 $result2 = $conn->query("select * from task where TEAM = '$theteam' AND ISDELETED='NO' ");
		$num_rows = mysqli_num_rows($result2);
  
 
  
  ?> 
  
   
		  
              <tr >
               <td  onclick="test('<?PHP echo $row['TEAM']?>')" style="cursor: pointer;" align="left"><?PHP echo $row['TEAM']?></td>



                   <td style="align-content:center"><?php echo $num_rows;
				   
				   $sum = $sum + $num_rows;
				   
				   ?></td>

              </tr>
			  
			  
  <?php }?>
  
  
                    <tr>
                        <td align="left"><b>Grand Total</b></td>
                        <td style="align-content:center"><b><?php echo $sum;?></b></td>
                    </tr>
  
<?PHP }?>

					
					
					
					
                    
                  </table>

               
              
        </div>
    <!-- 
        <div class="recent-project box">
            <div class="title">Project Progress</div>
            <br>
       
            

      
    </div>
 !-->

    </div>
  </section>
  <br>
  <br>

  
  

<br>
<br>
</body>



<button onclick="topFunction()" id="myBtn" style="background-color:#E6E9EE;border:1px solid #E6E9EE;float:right;margin-right:2vw;cursor:pointer"> <img src="./images/right-arrow.png" style="margin-top:0.9vw;margin-left:-1vw;height:3vw;width:3vw;cursor:pointer"></button>


<br><br><br><br>

<?php include 'footer.php'?>

</html>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
	

$("button.btnstatus").click(function(){
 
 
 status = document.getElementById('thestatus').value;
 
	createCookie("statusfilter", status, "10");

		
		
 });
 
 

function getFocus() {
  document.getElementById("myText").focus();
}

 
function closestatuspopup(){
	
	  document.getElementById("statuspopup").style.display = "none";
	
} 
 
 
})



function createCookie(name, value, days) {
    var expires;
      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
}


</script>