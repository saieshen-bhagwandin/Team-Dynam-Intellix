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

<br><br><br><br><br><br>

<div id="blur" style="background:#E6E9EE;display:none;height:500vw"></div>

  <head>
    <meta charset="UTF-8">
	
	    <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" name="viewport">

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> 


<link rel="stylesheet" href="styleforbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="styleforemployee.css">
   
   
<div class="bar">
<div class="add"  onclick="showpopup()" style="width:190px;height:60px;border: 1px solid #E6E9EE;padding:10px;border-radius:15px;margin-left:10px;">

<div class="font" id="buttontext" style="float:left;margin-top:10px;margin-right:10px;cursor:pointer;color:#18114a">Add Task </div> 



</div> <br><br>



</div>


<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>



 <div class="home-content">
      <div class="employee-boxes">
        <div class="recent-employee box">
          <div class="employee-details">
		  
 
 
		<div class="col-md-12" id="importFrm" style="display:block;margin-top:1vw">
        <form action="tasks.php" method="post" enctype="multipart/form-data">
			
            <input type="file" name="file" class="custom-file-input" />
        
            <input type="submit" class="btnstatus btn-primary" name="importSubmit" value="IMPORT" style="margin-right:5vw;font-weight:bold;margin-top:1.8vw;">
        </form>
    </div>
	
	
  
   
   <div class="addEmp"  >


   	            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
              <label for="Project team" style="font-size:16px;color: #18114a;"><b>Team</b></label>
              <br><br>
              <select name="Projectteam"  style="height: 30px; width: 200px; border-radius: 8px;border:1px solid #DCDCDC" type="search" class="select-table-filter" data-table="order-table">
			  
			  <option value="" selected="true" disabled="disabled" ></option>
			  
   	  <?php   $sql = "SELECT DISTINCT TEAM FROM task WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

 
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {  ?>
  
 <option value = "<?php echo $row['TEAM'];?>"> <?php echo ucwords(strtolower($row['TEAM']));?> </option>

  <?php }
  
  
  
}?>
              </select>
			 
			    
				
                <input type="submit" name ="reset" class="btnstatus"  value="Reset" >
            </form>
</div>



			
<div class="addEmp">
         <div class="search" style="margin-top:3vw;margin-right:0vw;">       
        
				
				<input type="search" name="search" class="light-table-filter" data-table="order-table" placeholder=" Search" style="height: 30px; width: 200px; border-radius: 8px;border:1px solid #DCDCDC" autocomplete="off"/>


              </button>
            </div>  
			</div>
   
			
			
			</div>
			</div>
			</div>
			</div> <br>
			
	
</head>


<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>



<body>





<div id="popup" style="display:none;position:absolute;top:15%;left:30%;border:1px solid black;width:720px;height:900px;background:#E6E9EE;border-radius:15px">

<?php 
if(isset($_POST['importSubmit'])){


    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
             
                $id  = $line[1];
                $title  = validation($line[2]);
                $assignedto = "UNASSIGNED";
				$state = validation($line[4]);
				$area = validation($line[5]);

	            $week = explode(' ', $line[6]);
				
		
				
				$tag = validation($week[1]);
				$test = "UNASSIGNED";
	
				  
                 $date = date('Y/m/d');
 
 
                 // If user already exists in the database with the same email
                $query = "SELECT * FROM task WHERE TASKID = '" . $id . "'";
 
                $check = mysqli_query($conn, $query);
 
                if ($check->num_rows > 0)
                {
                    mysqli_query($conn, "UPDATE task SET TASKNAME = '" . $title . "', WEEK = '" . $tag . "', STATUS = '" . $state . "', AREAPATH = '" . $area. "', LASTADDED = '" . $date . "' WHERE TASKID = '" . $id . "'");
					
										echo  "<script> alert('Updated tasks successfully')</script>";
					

				echo "<script> 	window.location.replace('http://localhost/dashboard/Intellix/tasks.php');</script>";
				
                }
                else
                {
                     mysqli_query($conn, "INSERT INTO task (TASKID,TASKNAME,FULLNAME,PROJECTNAME,WEEK,DEPARTMENT,TEAM,STATUS,AREAPATH,LASTADDED,ISDELETED) VALUES ('$id', '$title', '$assignedto', '$test', '$tag', '$test', '$test', '$state', '$area', '$date','NO' )");
					
					echo  "<script> alert('Imported tasks successfully')</script>";
					
				echo "<script> 	window.location.replace('http://localhost/dashboard/Intellix/tasks.php');</script>";
                }
           
		
			
			

					
					
                
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
	}




$errors = array('tn' => '','week' => '',  'sd' => '' ,  'emp' => '');

$tn = $des = $empcode = $empname = $projectid = $projectname = $week = $department = $status = $sd = $ed = $wnum = $dep = $team =""; 


 if (isset($_POST["createtask"])) {


  if(empty($_POST["tn"])){
	  
	  $errors['tn'] = "Please enter a task name";
	  
  }

  if(empty($_POST["weeknum"])){
	  
	  $errors['week'] = "Please enter a week number";
	  
  }
  
    if($_POST["startdate"]>$_POST["enddate"]){
		 
		 $errors['sd'] = "Timeline of project is incorrect";
		 
	 }
	 

	     if(array_filter($errors)){
	   

	  
	  echo "<script>document.getElementById('errormessage').style.display = 'block'</script>";
	  
	 echo "<script>document.getElementById('popup').style.display = 'block';</script>";
	  
 
  }else{

		 $tn = validation(trim(($_POST["tn"])));
		 
		 
	 $des = validation(trim($_POST["desc"]));
	 
	 $arr = explode(':', $_POST["empcode"]);
	 
	 $empcode = trim($arr[0]);
	 
	   $sql = "SELECT * FROM teammember where EMPCODE = '$empcode'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  
	   $team =  trim(ucwords(strtolower($row["TEAMNAME"])));
	  
	  
  }
  
}
	 
	 $empname = trim(ucwords(strtolower($arr[1])));
   	
	 $arr2 = explode(':', $_POST["projectid"]);
	 
	 $projectid = trim($arr2[0]);
	 $projectname = trim(ucwords(strtolower($arr2[1])));
	 
	 $week = trim($_POST["weeknum"]);
	  
	 $department = validation(trim(ucwords(strtolower($_POST["dep"]))));
	 
	 $sd =  $_POST["startdate"];
	 
	  $ed =  $_POST["enddate"];
	  
	  $status =  ucwords(strtolower($_POST["status"]));
	  
	  
	  
	   $date = date('Y/m/d');
	   
	   

		 $sql = "INSERT INTO task (TASKNAME,EMPCODE,FULLNAME,PROJECTID,PROJECTNAME,WEEK,DEPARTMENT,TEAM,STARTDATE,ENDDATE,STATUS,LASTADDED,ISDELETED)VALUES('$tn','$empcode',' $empname','$projectid','$projectname','$week','$department', '$team','$sd','$ed','$status','$date','NO')";

if ($conn->query($sql) === TRUE) {
	

  
  echo "<script>toastr.success('Task was Successfully created')</script>";
  
    echo "<script>document.getElementById('popup').style.display = 'none'</script>";
  
 $tn = $des = $empcode = $empname = $projectid = $projectname = $week = $department = $status = $sd = $ed = $wnum = $dep = ""; 
   

  
}


	 
 }
 
 }
 
 
  function validation($x){
	 
	 	 		   if(strpos($x, "'") !== false){
   $x = str_replace("'","\'",$x);
}

	 	 		   if(strpos($x, ",") !== false){
   $x = str_replace(",","\,",$x);
}

return $x;	
	 
	 
 }
 
 
 
?>

<center>
 
 <br>
 
 
 <h1> Enter Task Details  <button onclick="closeadd()" style="float:right;margin-right:10px;border:1px solid #E6E9EE;background:#E6E9EE"><i class="fa fa-close"  style="float:right;margin-right:10px;font-size:30px;color:red" onclic="closeedit()"> </i> </button> </h1>

 <form method="post" action="tasks.php" style="margin-top:30px;" >



   
   <input type="text" placeholder = "Task Name (Required)" name="tn" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $tn?>" autocomplete="off" > <br><br>

 <label style="color:red"><?php echo $errors['tn']?></label><br><br>
 
   <input type="text" placeholder = "Description" name="desc" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $des?>" autocomplete="off" > <br><br>


<select name="empcode" id="empcode" value="<?php echo $empcode ?>" style="width:655px;border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;" autocomplete="off">


 
<option value="" selected="true" disabled="disabled">Employee Code</option>

<?php   $sql = "SELECT * FROM teammember WHERE ISDELETED='NO'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {  ?>
  
  <option value=" <?php echo $row['EMPCODE'] . ' : ' . $row['FIRSTNAME'] . " ". $row['LASTNAME']?>" > <?php echo $row['EMPCODE'] . ' - ' . $row['FIRSTNAME'] . " ". $row['LASTNAME']?></option>

  <?php }
  
  
  
}?>

	</select><br><br>
	

	
	
<select name="projectid" id="projectids" value="<?php echo $projectid?>" style="width:655px;border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;">

<option value="" selected="true" disabled="disabled">Project Id</option>

<?php   $sql = "SELECT * FROM project WHERE ISDELETED='NO'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {  ?>
  
  <option value=" <?php echo $row['PROJECTID'] . ' : ' . $row['PROJECTNAME']?>" > <?php echo $row['PROJECTID'] . ' - ' . $row['PROJECTNAME'] ?></option>

  <?php }
  
  
  
}?>

	</select><br><br>
	
	 <input type="text" placeholder = "Week number (Required)" name="weeknum" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $wnum?>" autocomplete="off" > <br><br>
	  <label style="color:red"><?php echo $errors['week']?></label><br><br>

<select  name="dep" id="dep" style="border-radius: 8px;border: 1px solid grey;width:650px;padding: 5px 5px;font-family:Arial"  value="<?php echo $dep?>" autocomplete="off">

<option value=""   selected="selected"  disabled="disabled">Department</option>
    <option value="Marketing">Marketing</option>
    <option value="Quality Assurance">Quality Assurance</option>
    <option value="Software Development">Software Development</option>
    <option value="Project Management (Software)">Project Management (Software)</option>
    <option value="Project Management (IT Infrastructure)">Project Management (IT Infrastructure)</option>
    <option value="Product">Product</option>
    <option value="Business Analysis">Business Analysis</option>
    <option value="Business Intelligence">Business Intelligence</option>
    <option value="Dev Ops">Dev Ops</option>
    <option value="DBA">DBA</option>
    <option value="UI/UX">UI/UX</option>
    <option value="IT Support">IT Support</option>
  </select><br><br><br>

  
 <div style="float:left;margin-left:2.2vw">Start Date :</div> <input type="date" class="sd" name="startdate" id="startdate" value="<?php echo $sd?>" style="border-radius: 8px;border: 1px solid grey;padding: 6px;font-family:Arial;margin-right:0.5vw" autocomplete="off"><br>
   <label style="color:red"><?php echo $errors['sd']?></label><br><br>

 <div style="float:left;margin-left:2.2vw">End Date :</div> <input type="date" class="ed" name="enddate" id="enddate" value="<?php echo $ed?>" style="border-radius: 8px;border: 1px solid grey;padding: 6px;font-family:Arial;" autocomplete="off"><br><br>
 
 
	  
	  
<select name="status" id="statuses" value="<?php echo $status ?>" style="width:655px;border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;" autocomplete="off">

<option value="" selected="true" disabled="disabled">Status</option>
<option value="New">New</option>
<option value="Active">Active</option>
<option value="Resolved">Resolved</option>
<option value="Dev in-progress">Dev in-progress</option>
<option value="Awaiting Feedback/ Review">Awaiting Feedback/ Review</option>
<option value="Deployed to UAT">Deployed to UAT</option>
<option value="Ready to Deploy">Ready to Deploy</option>
<option value="No Dev required">No Dev required</option>
 <option value="On - Hold">On - Hold</option>
<option value="Deployed / Resolved">Deployed / Resolved</option>
<option value="Closed">Closed</option> 
<option value="Ice Box">Ice Box</option>

	</select><br><br><br>
	
	
	

<input type="submit" id= "createtasks" name="createtask" value="Create Task" size="50" style="border-radius: 8px;border: 1px solid grey;padding: 10px 9px; width:330px;background:#02376E;color:#FFFFFF;cursor:pointer"> <br><br><br> 


</form>

</center>

</div>



<div class="home-content">
      <div class="employee-boxes">
        <div class="recent-employee box">
         
          
          <div class="employee-details">
		  
		    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="width:100%">
			
        <table class="order-table" style="width:100%;">
            <thead>
                <tr>
                    <th style="text-align:left;color: #18114a;font-size:15px">Project Name</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Department</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Team</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Estimated Start Date</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Estimated End Date</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Status</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Task Name</th>
                    <th style="text-align:left;color: #18114a;width:190px;font-size:15px">Assigned To</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Week</th>
                    <th style="text-align:left;color: #18114a;width:120px;font-size:15px">Last Added</th>
                    <th style="text-align:right;color: #18114a;font-size:15px">Modify</th>
                </tr>
            </thead>
            <tbody>
		  
		  <?php  $sql = "SELECT * FROM task WHERE ISDELETED = 'NO' ORDER BY LASTADDED DESC,TASKID";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			    <td style="text-align:left;"><?PHP echo $row['PROJECTNAME']?></td>
				<td style="text-align:left;"><?PHP echo $row['DEPARTMENT']?></td>
               <td style="text-align:left;"><?PHP echo $row['TEAM']?></td>
			   <td style="text-align:left;"><?PHP echo $row['STARTDATE']?></td>
			   <td style="text-align:left;"><?PHP echo $row['ENDDATE']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STATUS']?></td>
			   <td style="text-align:left;"><?PHP echo $row['TASKNAME']?></td>
               <td style="text-align:left;"><?PHP echo $row['FULLNAME']?></td>
               <td style="text-align:center;"><?PHP echo $row['WEEK']?></td>
			   <td style="text-align:left;"><?PHP echo $row['LASTADDED']?></td>
               <td style="width:100px"><button class="edittask" id="<?PHP echo $row['TASKID']?>" style="margin-left:-1vw"><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['TASKID']?>" style="margin-right:-2vw"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
  <?php }
  
}


if(isset($_POST['teamfilter'])){
	
	  if(!empty($_POST['teamfilter'])) {
		  
		  			echo "<script>$('#content tr').remove(); </script>";
			
        $selected = $_POST['Projectteam'];

	 $sql = "SELECT * FROM task WHERE TEAM = '$selected'";
	 
       $result = $conn->query($sql);


if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			    <td align="left"><?PHP echo $row['PROJECTNAME']?></td>
				<td align="left"><?PHP echo $row['DEPARTMENT']?></td>
               <td align="left"><?PHP echo $row['TEAM']?></td>
			   <td align="left"><?PHP echo $row['STARTDATE']?></td>
			   <td align="left"><?PHP echo $row['ENDDATE']?></td>
			    <td align="left"><?PHP echo $row['STATUS']?></td>
			   <td align="left"><?PHP echo $row['TASKNAME']?></td>
               <td align="left" ><?PHP echo $row['FULLNAME']?></td>
               <td align="left"><?PHP echo $row['WEEK']?></td>
			   <td align="left"><?PHP echo $row['LASTADDED']?></td>
               <td style="width:100px"><button class="edittask" id="<?PHP echo $row['TASKID']?>" style="margin-left:-1vw"><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['TASKID']?>" style="margin-right:-2vw"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
  <?php }
   
 }

}else {
	echo 'Please select the value.';
}
}

if(isset($_POST['departmentfilter'])){
if(!empty($_POST['ProjectDepartment'])) {
	
		echo "<script>$('#content tr').remove(); </script>";
		
	$selected = $_POST['ProjectDepartment'];

 $sql = "SELECT * FROM task WHERE PROJECTNAME = '$selected'";
 
   $result = $conn->query($sql);


if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) { ?> 
	  
		  <tr>
			<td align="left"><?PHP echo $row['PROJECTNAME']?></td>
			<td align="left"><?PHP echo $row['DEPARTMENT']?></td>
		   <td align="left"><?PHP echo $row['TEAM']?></td>
		   <td align="left"><?PHP echo $row['STARTDATE']?></td>
		   <td align="left"><?PHP echo $row['ENDDATE']?></td>
			<td align="left"><?PHP echo $row['STATUS']?></td>
		   <td align="left"><?PHP echo $row['TASKNAME']?></td>
		   <td align="left"><?PHP echo $row['FULLNAME']?></td>
		   <td align="left"><?PHP echo $row['WEEK']?></td>
		   <td align="left"><?PHP echo $row['LASTADDED']?></td>
		   <td style="width:100px"><button class="edittask" id="<?PHP echo $row['TASKID']?>" style="margin-left:-1vw"><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['TASKID']?>" style="margin-right:-2vw"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
		  </tr>
		  
		  
<?php }

}


 
} else {
	echo 'Please select the value.';
}
}


if(isset($_POST['reset'])){
	

echo "<script> 	window.location.replace('http://localhost/dashboard/Intellix/tasks.php);</script>";
	
}




?>

</tbody>
		</table>
		
		</form>
              
          </div>
        </div>
    </div>
	</div>
	
	
	<script>

  function myFunction() {

  var input, filter, table, tr, td, i, txtValue;

  input = document.getElementById("mySearch");

  filter = input.value.toUpperCase();

  table = document.getElementById("myTable");

  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {

    td = tr[i].getElementsByTagName("td")[6];

    if (td) {

      txtValue = td.textContent || td.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {

        tr[i].style.display = "";

      } else {

        tr[i].style.display = "none";

      }

    }      

  }

}

</script>



	


<?php

	if(isset($_COOKIE["deletetask"])){
		
		$taskid = $_COOKIE["deletetask"];

	  	 mysqli_query($conn, "INSERT INTO deletedtask SELECT * FROM task WHERE  TASKID = '$taskid'");
	 
	 	   mysqli_query($conn,"UPDATE task SET ISDELETED = 'YES' WHERE   TASKID = '$taskid' ");
		   
	 
	echo "<script>toastr.success('Successfully deleted the task')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
	 
		
	}if(isset($_COOKIE["edittask"])){ 
	
	echo"<script>document.getElementById('blur').style.display = 'block';</script>";
	
			$taskid = $_COOKIE["edittask"];
		
	  $sql = "SELECT * FROM task where TASKID = '$taskid'";
	  
    $result = $conn->query($sql);
	
	  // output data of each row
 $row = $result->fetch_assoc();

?>


<div id="edittaskpopup" style="display:block;position:absolute;top:15%;left:35%;border:1px solid black;width:720px;height:660px;background:#E6E9EE;border-radius:15px">



<center>
 
 <br>
 
 <h1> Edit Task Details  <button onclick="closeedit()" style="float:right;margin-right:10px;border:1px solid #E6E9EE;background:#E6E9EE"><i class="fa fa-close"  style="float:right;margin-right:10px;font-size:30px;color:red" onclick="closeedit()"> </i> </button></h1><br>
 
 <h4 style="float:left;margin-left:2.2vw">Task Name : <?php echo $row['TASKNAME']?></h4><br>
 
 
 <form method="post" action="tasks.php" style="margin-top:30px;" >


<select name="empcode" id="empcodeed" value="<?php echo $row['EMPCODE'] ?>" style="width:655px;border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;" autocomplete="off">


 <option value=" <?php echo $row['EMPCODE'] . ' : ' . $row['FULLNAME']?>" > <?php echo $row['EMPCODE'] . ' - ' . $row['FULLNAME']?></option>


<?php   $sql = "SELECT * FROM teammember WHERE ISDELETED='NO'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row1 = $result->fetch_assoc()) {  ?>
  
  <option value=" <?php echo $row1['EMPCODE'] . ' : ' . $row1['FIRSTNAME'] . " ". $row1['LASTNAME']?>" > <?php echo $row1['EMPCODE'] . ' - ' . $row1['FIRSTNAME'] . " ". $row1['LASTNAME']?></option>

  <?php }
  
  
  
}?>

	</select><br><br>
	
<select name="projectid" id="projectided" value="<?php echo $row['PROJECTID'] ?>" style="width:655px;border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;" autocomplete="off">


 <option value=" <?php echo $row['PROJECTID'] . ' : ' . $row['PROJECTNAME']?>" > <?php echo $row['PROJECTID'] . ' - ' . $row['PROJECTNAME']?></option>


<?php   $sql = "SELECT * FROM project WHERE ISDELETED='NO'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row1 = $result->fetch_assoc()) {  ?>
  
  <option value=" <?php echo $row1['PROJECTID'] . ' : ' . $row1['PROJECTNAME']?>" > <?php echo $row1['PROJECTID'] . ' - ' . $row1['PROJECTNAME']?></option>

  <?php }
  
  
  
}?>

	</select><br><br>
	
	
	

<input type="text" placeholder = "Week number" id="weeked" name="weeknum" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $row['WEEK']?>"  autocomplete="off"> <br><br>
	
  
	  <select  name="dept" id="depted" style="border-radius: 8px;border: 1px solid grey;width:650px;padding: 5px 5px;font-family:Arial"  value="<?php echo $dep?>" autocomplete="off">

<option value=""   disabled="disabled">Department</option>
 <option  selected="selected" value="<?php echo $row['DEPARTMENT']?>"><?php echo $row['DEPARTMENT']?></option>
    <option value="Marketing">Marketing</option>
    <option value="Quality Assurance">Quality Assurance</option>
    <option value="Software Development">Software Development</option>
    <option value="Project Management (Software)">Project Management (Software)</option>
    <option value="Project Management (IT Infrastructure)">Project Management (IT Infrastructure)</option>
    <option value="Product">Product</option>
    <option value="Business Analysis">Business Analysis</option>
    <option value="Business Intelligence">Business Intelligence</option>
    <option value="Dev Ops">Dev Ops</option>
    <option value="DBA">DBA</option>
    <option value="UI/UX">UI/UX</option>
    <option value="IT Support">IT Support</option>
  </select><br><br>
  
  
  <div style="float:left;margin-left:2.2vw">Start Date :</div> <input type="date" class="ed" name="startdate" id="startdateed" value="<?php echo $row['STARTDATE']?>" style="border-radius: 8px;border: 1px solid grey;padding: 6px;font-family:Arial;margin-right:0.5vw" autocomplete="off"><br><br>
  

 <div style="float:left;margin-left:2.2vw">End Date :</div> <input type="date" class="ed" name="enddate" id="enddateed" value="<?php echo $row['ENDDATE']?>"style="border-radius: 8px;border: 1px solid grey;padding: 6px;font-family:Arial;" autocomplete="off"><br><br>
 
 
 
 
 
<select name="status" id="statusesed" value="<?php echo $row['STATUS'] ?>" style="width:655px;border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;">

<option value="<?php echo $row['STATUS']?>"><?php echo $row['STATUS']?></option>
<option value="New">New</option>
<option value="Active">Active</option>
<option value="Resolved">Resolved</option>
<option value="Dev in-progress">Dev in-progress</option>
<option value="Awaiting Feedback/ Review">Awaiting Feedback/ Review</option>
<option value="Deployed to UAT">Deployed to UAT</option>
<option value="Ready to Deploy">Ready to Deploy</option>
<option value="No Dev required">No Dev required</option>
 <option value="On - Hold">On - Hold</option>
<option value="Deployed / Resolved">Deployed / Resolved</option>
<option value="Closed">Closed</option> 
<option value="Ice Box">Ice Box</option>

	</select><br><br>
	
	
	

<input type="submit" id= "<?php echo $taskid?>" class="editingtask"  value="Save Changes" size="50" style="border-radius: 8px;border: 1px solid grey;padding: 10px 9px; width:330px;background:#02376E;color:#FFFFFF;cursor:pointer"> <br><br><br> 


</form>

</center>

</div>



	
<?php }if(isset($_COOKIE["editedtask"])){ 
	
	
	$test = $_COOKIE["editedtask"];
	
			 $date = date('Y/m/d');

		 $str_arr = explode ("@#", $test); 
		 
		 $newstring = explode (":", $str_arr[1]);
		 
		 	 $newstring2 = explode (":", $str_arr[6]);


$newstring[1] = trim($newstring[1]);
$newstring2[0] = trim($newstring2[0]);


	   $sql = "SELECT * FROM teammember where EMPCODE = '$newstring[0]'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  
	   $team =  trim(ucwords(strtolower($row["TEAMNAME"])));
	  
	  
	  
  }
  
}



$newstring2[1] = trim($newstring2[1]);
$str_arr[2] = trim($str_arr[2]);
$str_arr[3] = validation2(trim($str_arr[3]));
$str_arr[7] = trim($str_arr[7]);
$str_arr[4] = trim($str_arr[4]);
$str_arr[5] = trim($str_arr[5]);


		mysqli_query($conn, "UPDATE task SET EMPCODE = '$newstring[0]' ,
		 FULLNAME = '$newstring[1]' ,
		 PROJECTID = '$newstring2[0]' ,
		 PROJECTNAME = '$newstring2[1]' ,
		WEEK = '$str_arr[2]',
		 DEPARTMENT = '$str_arr[3]',
		TEAM = '$team' ,
		STARTDATE = '$str_arr[7]' ,
		 ENDDATE = '$str_arr[4]' ,
		 STATUS = '$str_arr[5]' ,
		 LASTADDED = '$date'
		 WHERE TASKID = '$str_arr[0]'");
		 
		 
echo "<script>toastr.success('Changes have been successfully made')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
	
	}
	
	 function validation2($x){
	 
	 	 		   if(strpos($x, "'") !== false){
   $x = str_replace("'","\'",$x);
}

	 	 		   if(strpos($x, ",") !== false){
   $x = str_replace(",","\,",$x);
}

return $x;	
	 
	 
 }
 
	

	?>

<script>
        (function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;
    var _select;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}
    
		function _onSelectEvent(e) {
			_select = e.target;
			var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filterSelect);
				});
			});
		}

		function _filter(row) {
      
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';

		}
    
		function _filterSelect(row) {
     
			var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
			row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';

		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				var selects = document.getElementsByClassName('select-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
				Arr.forEach.call(selects, function(select) {
         select.onchange  = _onSelectEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
    </script>





<style>

.font:hover{
	
	color:#2bb3e2;
	
}

.errormessage{
	
	width:300px;
	height:220px;
	background:#E6E9EE;
	border:1px solid black;
	display:none;
	border-radius:25px;
	z-index:4;
	float:right;
	
}

.created{
	
	width:300px;
	height:230px;
	background:#E6E9EE;
	border:1px solid black;
	display:none;
	border-radius:25px;
	float:right;
	
}


.deletemessage{
	
	width:300px;
	height:230px;
	background:#E6E9EE;
	border:1px solid black;
	display:block;
	border-radius:25px;
	float:right;
	
}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
  border-radius:10px;
  padding:7px;
  text-align: justify;
}

.button5:hover {
  background-color: #555555;
  color: white;
}


.sd {
  width: 535px;

}

.ed {

  width: 535px;
 
}

.edittask{
	
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;
	margin-right:1vw;
}

.del{
	
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;

	
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


.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
  width:10px;
}
.custom-file-input::before {
  content: 'Select CSV File';
  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #E6E9EE;
  background: #E6E9EE;
  border-radius: 7px;
  padding: 5px 5px;
  cursor: pointer;
  font-weight: 500;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: #EDF0F5;
  background: #EDF0F5;
}

table {
margin: -5px;
width: 100%;
border-collapse: separate;
border-spacing: 0 15px;
font-size:12px;
}


.header_fixed thead th {
top: 0;
background-color: #ffffff;
color: black;
font-size: 15px;
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

background-color: #ffffff;
}

</style>


</body>


<br><br><br><br><br>

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


<script>

function showpopup()
{

         document.getElementById("popup").style.display = "block";
		   document.getElementById("blur").style.display = "block";
	  
	
}



function closeedit()
{
         document.getElementById("edittaskpopup").style.display = "none";
		  document.getElementById("blur").style.display = "none";

}

function closeadd()
{
	
	
	 document.getElementById("popup").style.display = "none";
	  document.getElementById("blur").style.display = "none";
	 
	 
}



</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
	

$("button.del").click(function(){
 
 var taskid = $(this).attr('id');


	 if (confirm('Are you sure you wish to delete this task?')) {
  // Save it!
     createCookie("deletetask", taskid, "10");
	 
	
	 
	 
} else {
  // Do nothing!
  console.log('Cancel');
}

		
		
 });



$("button.edittask").click(function(){
 
 var taskid = $(this).attr('id');


	 createCookie("edittask", taskid, "10");

		
		
 });
 
 
  $("input.editingtask").click(function(){
 
 var task = $(this).attr('id');


empcode = document.getElementById('empcodeed').value;
projectid = document.getElementById('projectided').value;
week = document.getElementById('weeked').value;
dep = document.getElementById('depted').value;
ed = document.getElementById('enddateed').value;
sd = document.getElementById('startdateed').value;
status = document.getElementById('statusesed').value;

all = task + '@#' + empcode + '@#' + week + '@#' + dep + '@#' +  ed +  '@#' +  status + '@#' + projectid + '@#' + sd ;

createCookie("editedtask", all , "10");
		
		
 })
 
 
 
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