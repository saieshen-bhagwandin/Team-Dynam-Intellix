<?php 
$servername = "localhost";
$username = "Saieshen";
$password2 = "saisu0511";
$dbname = "intellixdb";

// Create connection
$conn = new mysqli($servername,$username,$password2,$dbname);

if (!$conn){
echo "Database didn't connect". mysql_connect_error();
}

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
		
		if($name == "loggedinuser"){
		}else{
			
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
		}
    }
}

?>



  <?php
  
  
  $sql = "SELECT * FROM deletedproject";
    $result = $conn->query($sql);


$num_rowsproj = mysqli_num_rows($result);



$sql = "SELECT * FROM deletedtask";
    $result = $conn->query($sql);


$num_rowstask = mysqli_num_rows($result);


$sql = "SELECT * FROM deletedteammember";
    $result = $conn->query($sql);


$num_rowsteam = mysqli_num_rows($result);

$total = $num_rowsproj + $num_rowstask + $num_rowsteam;
  
  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
 


    <link rel="stylesheet" href="sytle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<link rel="stylesheet" href="styleforbar.css">
    <link rel="stylesheet" href="styleforemployee.css">
   <link rel="stylesheet" href="stylefordashboard.css">
   <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



   </head>
  


  
<a href="http://localhost/dashboard/Intellix/homepage.php"><img src="./images/finallogo.png"  style="margin-left:-1vw;width:210px;height:140px;margin-top:-2.5vw;margin-left:-0.5vw"></a> <br><br><br><br><br>


  <br>
  <center><h1 style="font-size:20px">Recycling Bin : <?php 
  
  if($total>1 || $total == 0){
  echo $total. " items";

  }else{
	  
	  echo $total. " item";  
	  
  }  ?> </h1></center>
  
  <body style="background-color:#E6E9EE;">
  

    <br>
	<center>
    <div class="row" style="width:700px">
      <div class="column">
        <div class="card" >
     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <select name="field2" id="name" style="margin-left:5vw;border:1px solid #E6E9EE;border-radius:5px" >
		<option value="test" selected="true" disabled>Choose item</option>
          <option value="Project" ><?Php echo "Projects - ". $num_rowsproj ?></option>
          <option value="Task"><?Php echo "Tasks - ". $num_rowstask ?></option>
          <option value="Employee"><?Php echo "Team Members - ". $num_rowsteam ?></option>

        </select>
		
			    <input type="submit" name ="filter" class="btnstatus"  value="Filter">
			 <input type="submit" name ="all" class="btnstatus"  onclick="clearall()" value="Empty">
            </form>
			
			
      </div>
    </div>
    </div>
	</center>
<br>


<script>

function deleteproj(x){
 
 var taskid = x;


	 if (confirm('Are you sure you wish to permanently delete this project?')) {
  
    createCookie("deleteproject", taskid, "10");

	 	 
} else {
 
   // Do nothing!
  console.log('Cancel');
  
}

}
		
		


function restoreproj(x) {

 var taskid = x;
 

	
if (confirm('Are you sure you wish to restore this project?')) {

     createCookie("restoreproject", taskid, "10");
	 	 
} else {
  // Do nothing!
  console.log('Cancel');
  

}


	
}



function deleteemp(x){
 
 var taskid = x;


	 if (confirm('Are you sure you wish to permanently delete this team member?')) {
  // Save it!
      createCookie("deleteemp", taskid, "10");
	 	 
} else {
	
	  document.getElementbyId('field21').value = "Employee";
	 
  document.getElementById("empform").submit();
  
  // Do nothing!
  console.log('Cancel');
  

  
}

}
		
		


function restoreemp(x) {

 var taskid = x;
 
	if (confirm('Are you sure you wish to restore this team member?')) {

     createCookie("restoreemp", taskid, "10");
	 	 
} else {
  // Do nothing!
  console.log('Cancel');
  

}


	
}

function deletetask(x){
 
 var taskid = x;


	 if (confirm('Are you sure you wish to permanently delete this task?')) {
  
      createCookie("deletetask", taskid, "10");
	 	 
} else {
  // Do nothing!
  console.log('Cancel');
  
}
}
		
		


function restoretask(x) {


 var taskid = x;

		 if (confirm('Are you sure you wish to restore this task?')) {
  
      createCookie("restoretask", taskid, "10");
	 	 
} else {
  // Do nothing!
  console.log('Cancel');
  
 
}

	
}


function clearall(){
	
			 if (confirm('Are you sure you wish to clear all items from the bin?')) {
  
      createCookie("deleteall", "deleteall", "10");
	 	 
} else {
  // Do nothing!
  console.log('Cancel');
  
 
}
	
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



function redirect(x,y){
	
	if(y=="restoreproj"){
		
		restoreproj(x);	
		
	}if(y=="deleteproj"){
		
		deleteproj(x);
		
	}else if(y=="restoreemp"){
		
		restoreemp(x);
		
	}else if(y=="deleteemp"){
		
		deleteemp(x);
		
	}else if(y=="restoretask"){
		
		restoretask(x);
		
	}else if(y=="deletetask"){
		
		deletetask(x);
		
	}
	
	
	
	
	
}

</script>




    <div class="row" >
      <div class="column">
        <div class="card" style="height:700px">

	   		 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="width:100%">    
			
            <table style="margin-top:10.5px; margin-left:10.5px; width: 99%;font-size:13px;" id="thetable">
			<thead>
              <tr>
			    <th  style="background:#ededed;border:1px solid white;text-align:center" >Item</th>
			    <th  style="background:#ededed;border:1px solid white;text-align:center">Type</th>
                <th  style="background:#ededed;border:1px solid white;text-align:center">Date</th>
                <th style="background:#ededed;border:1px solid white;text-align:center">Modify</th>
              </tr>
          	  </thead>
            <tbody>

	 
	<?php 
	
	$queries = array();
	
	array_push($queries,"SELECT * FROM deletedproject ORDER BY LASTUPDATED DESC ");
	array_push($queries,"SELECT * FROM deletedteammember ORDER BY LASTUPDATED DESC ");
	array_push($queries,"SELECT * FROM deletedtask ORDER BY LASTADDED DESC ");
	
	
	$fields = array();
	
	array_push($fields,"PROJECTNAME,PROJECT,LASTUPDATED,PROJECTID");
	array_push($fields,"FIRSTNAME,EMPLOYEE,LASTUPDATED,EMPCODE");
	array_push($fields,"TASKNAME,TASK,LASTADDED,TASKID");
	
	$function = array();
	
		array_push($function,"restoreproj,deleteproj");
		array_push($function,"restoreemp,deleteemp");
		array_push($function,"restoretask,deletetask");

  for($i=0;$i<3;$i++){

	$sql = $queries[$i];
            $result = $conn->query($sql);
 
	   if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { 
  
   $str_arr = explode (",", $fields[$i]);
   
   $str_arr2 = explode (",", $function[$i]);
   
   

  ?> 
  
           <tr>
			    <td  style="border:1px solid white;text-align:center"><?PHP echo $row[$str_arr[0]]?></td>
				<td  style="border:1px solid white;text-align:center"><?PHP echo $str_arr[1]?></td>
			    <td  style="border:1px solid white;text-align:center"><?PHP echo $row[$str_arr[2]]?></td>
				 <td style="width:100px;border:1px solid white;text-align:center"><button class="restoreproj"  onclick="redirect('<?PHP echo $row[$str_arr[3]]?>','<?PHP echo $str_arr2[0]?>')"  id="<?PHP echo $row[$str_arr[3]]?>" style="margin-left:-1vw"><i class='fas fa-trash-restore-alt'style="font-size:20px;color:green"  ></i></button> <button class="delproj" onclick="redirect('<?PHP echo $row[$str_arr[3]]?>','<?PHP echo $str_arr2[1]?>')" id="<?PHP echo $row[$str_arr[3]]?>" style="margin-right:-2vw"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
   

	 
	 
     <?php 
	 

	 
	 
	 }
  
}

  }?>


            </tbody>
            </table>
			
			 </form>
		




		
			 
  <?php 
  
  

  
  
   if (isset($_POST['filter'])) {
  
    if($_POST['field2'] == null){

echo "<script>window.location.replace('http://localhost/dashboard/Intellix/recycle.php');</script>";
		echo "<script> alert('Please select an option') </script>";
		
		
		
	}else if($_POST['field2'] == "Project" ){
		
		 echo "<script> document.getElementById('name').selectedIndex = 1;</script>";
		 
		 
			echo "<script> document.getElementById('thetable').remove(); </script>";
	  
?>
 <br>  <center> <h1 style="font-size:20px"> Projects </h1> </center> <br>
	   
	   
	   		 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="width:100%">    
			
            <table style="margin-top:10.5px; margin-left:10.5px; width: 99%;font-size:13px;">
			<thead>
              <tr>
			    <th  style="background:#ededed;border:1px solid white;text-align:center" >Project Name</th>
			    <th  style="background:#ededed;border:1px solid white;text-align:center">Description</th>
                <th  style="background:#ededed;border:1px solid white;text-align:center">Department</th>
				<th  style="background:#ededed;border:1px solid white;text-align:center">Team Lead</th>
                <th  style="background:#ededed;border:1px solid white;text-align:center">Status</th>
		        <th  style="background:#ededed;border:1px solid white;text-align:center">Comment</th>
				<th  style="background:#ededed;border:1px solid white;text-align:center">Last Updated</th>
                <th  style="background:#ededed;border:1px solid white;text-align:center">Modify</th>
              </tr>
          	  </thead>
            <tbody id="content">

	 
	<?php  $sql = "SELECT * FROM deletedproject ORDER BY LASTUPDATED DESC ";
            $result = $conn->query($sql);
 
	   if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
  
	   
           <tr>
			    <td  style="border:1px solid white;text-align:center"><?PHP echo $row['PROJECTNAME']?></td>
				<td  style="border:1px solid white;text-align:center"><?PHP echo $row['DESCRIPTION']?></td>
			    <td  style="border:1px solid white;text-align:center"><?PHP echo $row['DEPARTMENT']?></td>
			   <td  style="border:1px solid white;text-align:center"><?PHP echo $row['TEAMLEAD']?></td>
               <td style="border:1px solid white;text-align:center"><?PHP echo $row['STATUS']?></td>
               <td  style="border:1px solid white;text-align:center"><?PHP echo $row['COMMENT']?></td>
			   <td  style="border:1px solid white;text-align:center"><?PHP echo $row['LASTUPDATED']?></td>
               <td style="width:100px;border:1px solid white;text-align:center"><button class="restoreproj" onclick="restoreproj('<?PHP echo $row['PROJECTID']?>')"  id="<?PHP echo $row['PROJECTID']?>" style="margin-left:-1vw"><i class='fas fa-trash-restore-alt'style="font-size:20px;color:green"  ></i></button> <button class="delproj" onclick="deleteproj('<?PHP echo $row['PROJECTID']?>')" id="<?PHP echo $row['PROJECTID']?>" style="margin-right:-2vw"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
   
   
     <?php }
  
}?>


            </tbody>
            </table>
			
			 </form>
   
   
   <?php
 
   }else if($_POST['field2'] == "Employee" ){
	   
	    echo "<script> document.getElementById('name').selectedIndex = 3;</script>";
		
	   		echo "<script> document.getElementById('thetable').remove(); </script>";
	   
	?>
	    <br>  <center> <h1 style="font-size:20px"> Team Members </h1> </center> <br>
	   
	   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="width:100%" id="empform" onsubmit="false">
		   
            <table name="empdetails" style="margin-top:10.5px; margin-left:10.5px; width: 99%;font-size:13px" id="myTable">
			<thead >
              <tr >
			 <th style="background:#ededed;border:1px solid white;text-align:center">Department</th>
			 <th  style="background:#ededed;border:1px solid white;text-align:center">Team</th>
              <th  style="background:#ededed;border:1px solid white;text-align:center">Full Name</th>
               <th  style="background:#ededed;border:1px solid white;text-align:center">Job Title</th>
               <th  style="background:#ededed;border:1px solid white;text-align:center">Skills</th>

                <th align="left" style="background:#ededed">Modify</th>
              </tr>
			  </thead>
            <tbody id="content">

	 
	<?php  $sql = "SELECT * FROM deletedteammember ORDER BY LASTUPDATED DESC ";
            $result = $conn->query($sql);
 
	   if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
  
        <tr>
               <td  onclick="test('<?PHP echo $row['EMPCODE']?>')" style="border:1px solid white;text-align:center"><?PHP echo $row['DEPARTMENT']?></td>
			   <td  onclick="test('<?PHP echo $row['EMPCODE']?>')" style="border:1px solid white;text-align:center"><?PHP echo $row['TEAMNAME']?></td>
               <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="border:1px solid white;text-align:center" align="left" ><?PHP echo $row['FIRSTNAME']." ".$row['LASTNAME']?></td>
                <td  onclick="test('<?PHP echo $row['EMPCODE']?>')" style="border:1px solid white;text-align:center"><?PHP echo $row['TITLE']?></td>
               <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="border:1px solid white;text-align:center"><?PHP echo $row['SKILLS']?></td>
               <td style="width:100px"><button class="restoreemp" onclick="restoreemp('<?PHP echo $row['EMPCODE']?>')" id="<?PHP echo $row['EMPCODE']?>" style="margin-left:-1vw"><i class='fas fa-trash-restore-alt'style="font-size:20px;color:green" ></i></button> <button class="delemp" id="<?PHP echo $row['EMPCODE']?>" onclick="deleteemp('<?PHP echo $row['EMPCODE']?>')" style="margin-right:-2vw"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
                </tr>
			  
			  
   
     <?php }
  
}?>


            </tbody>
            </table>
			
			</form>  
   
   
   <?php 
	   
	   
   }else if($_POST['field2'] == "Task"){
	   
	    echo "<script> document.getElementById('name').selectedIndex = 2;</script>";
	   
	   		echo "<script> document.getElementById('thetable').remove(); </script>";
		
		?>
	   
	 <br>  <center> <h1 style="font-size:20px"> Tasks </h1> </center> <br>
	   
	   		    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="width:100%">
			
            <table style="margin-top:10.5px; margin-left:10.5px; width: 99%;font-size:13px" id="myTable">
			<thead >
              <tr >
			  
			    <th style="background:#ededed;border:1px solid white;text-align:center" >Project Name</th>
			    <th  style="background:#ededed;border:1px solid white;text-align:center">Department</th>
				<th  style="background:#ededed;border:1px solid white;text-align:center">Team</th>
				<th  style="background:#ededed;border:1px solid white;text-align:center">Estimated Start Date</th>
				<th  style="background:#ededed;border:1px solid white;text-align:center">Estimated End Date</th>
				<th  style="background:#ededed;border:1px solid white;text-align:center">Status</th>
			    <th style="background:#ededed;border:1px solid white;text-align:center">Task Name</th>
                <th  style="background:#ededed;border:1px solid white;text-align:center">Modify</th>
              </tr>
          	  </thead>
            <tbody id="content">

	 
	<?php  $sql = "SELECT * FROM deletedtask ORDER BY LASTADDED DESC ";
            $result = $conn->query($sql);
 
	   if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
  
	   
           <tr>
			    <td  style="border:1px solid white;text-align:center"><?PHP echo $row['PROJECTNAME']?></td>
				<td  style="border:1px solid white;text-align:center"><?PHP echo $row['DEPARTMENT']?></td>
               <td  style="border:1px solid white;text-align:center"><?PHP echo $row['TEAM']?></td>
			   <td  style="border:1px solid white;text-align:center"><?PHP echo $row['STARTDATE']?></td>
			   <td  style="border:1px solid white;text-align:center"><?PHP echo $row['ENDDATE']?></td>
			    <td style="border:1px solid white;text-align:center"><?PHP echo $row['STATUS']?></td>
			   <td  style="border:1px solid white;text-align:center"><?PHP echo $row['TASKNAME']?></td>
               <td ><button class="restoretask" id="<?PHP echo $row['TASKID']?>"  onclick="restoretask('<?PHP echo $row['TASKID']?>')" style="margin-left:-1vw"><i class='fas fa-trash-restore-alt'style="font-size:20px;color:green" ></i></button> <button class="deltask" onclick="deletetask('<?PHP echo $row['TASKID']?>')" id="<?PHP echo $row['TASKID']?>" style="margin-right:-2vw"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
   
   
     <?php }
  
}?>


            </tbody>
            </table>
			
			</form>  
   
   
   <?php }
   
   
   }else if(isset($_COOKIE["deleteall"])) {
	   
	   
	    mysqli_query($conn, "DELETE from deletedproject");
		
		mysqli_query($conn, "DELETE from project WHERE ISDELETED='YES'");
		
		 mysqli_query($conn, "DELETE FROM deletedteammember");
		 
		 mysqli_query($conn, "DELETE FROM teammember  WHERE ISDELETED='YES'");
		 
		  mysqli_query($conn, "DELETE FROM deletedtask");
		  
		  mysqli_query($conn, "DELETE FROM task  WHERE ISDELETED='YES'" );
		  
		  		echo "<script>toastr.success('All items have been successfully deleted')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
	   
	   
   }
   
  
  
  
  ?>
  
  
          
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  
  </body>
  
  	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


  <?php 


	if(isset($_COOKIE["deleteproject"])){
		
	$taskid = $_COOKIE["deleteproject"];

	  mysqli_query($conn, "DELETE FROM deletedproject WHERE  PROJECTID = '$taskid'");
	 
	 mysqli_query($conn, "DELETE FROM project WHERE  PROJECTID = '$taskid'");

		echo "<script>toastr.success('Project has been successfully deleted')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";


		
	}else if(isset($_COOKIE["deleteemp"])){
		
		$taskid = $_COOKIE["deleteemp"];
		
	   mysqli_query($conn, "DELETE FROM deletedteammember WHERE EMPCODE = '$taskid'");
	 
	   mysqli_query($conn, "DELETE FROM teammember WHERE EMPCODE = '$taskid'");
	
	echo "<script>toastr.success('Team member has been successfully deleted')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
		
	}else if(isset($_COOKIE["deletetask"])){
		
		$taskid = $_COOKIE["deletetask"];
		
			   mysqli_query($conn, "DELETE FROM deletedtask WHERE TASKID = '$taskid'");
	 
	   mysqli_query($conn, "DELETE FROM task WHERE TASKID = '$taskid'");
		
	echo "<script>toastr.success('Task has been successfully deleted')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
		
	}else if(isset($_COOKIE["restoreproject"])){
		
		$taskid = $_COOKIE["restoreproject"];
		
		 mysqli_query($conn, "DELETE FROM deletedproject WHERE  PROJECTID = '$taskid'");
		
		mysqli_query($conn, "UPDATE project SET ISDELETED = 'NO' WHERE PROJECTID = '$taskid'");
		
		echo "<script>toastr.success('Project has been successfully restored')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
		
	}else if(isset($_COOKIE["restoreemp"])){
		
		$taskid = $_COOKIE["restoreemp"];
		
		 mysqli_query($conn, "DELETE FROM deletedteammember WHERE EMPCODE = '$taskid'");
		
		mysqli_query($conn, "UPDATE teammember SET ISDELETED = 'NO' WHERE EMPCODE = '$taskid'");
		
		echo "<script>toastr.success('Team member has been successfully restored')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
		
	}else if(isset($_COOKIE["restoretask"])){
		
		$taskid = $_COOKIE["restoretask"];
		
		 mysqli_query($conn, "DELETE FROM deletedtask WHERE TASKID = '$taskid'");
		
		mysqli_query($conn, "UPDATE task SET ISDELETED = 'NO' WHERE TASKID = '$taskid'");

		
		echo "<script>toastr.success('Task has been successfully restored')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
	}











?>



  <style>
  
     a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  float:left;
  margin-left:1vw;
  border-radius:15px;
  margin-top:1vw;
}

a:hover {
  background-color: #E6E9EE;

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

  
  
.restoreproj{
	
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;
}

.delproj{
	
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;

	
}

.restoretask{
	
	border: 1px solid #eaebec;
	background : #eaebec;
	border-radius:15px;
}

.deltask{
	
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;

	
}

.restoreemp{
	
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;
}

.delemp{
	
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;

	
}


  div.card {

                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
            }
			
			
  </style>
</html>