

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


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


<link rel="stylesheet" href="styleforbar.css">
 
   
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="styleforemployee.css">

<div class="bar">
<div class="add"  onclick="showpopup()" style="width:180px;height:60px;border: 1px solid #E6E9EE;;padding:10px;border-radius:15px;margin-left:10px;">

<div class="font" id="buttontext" style="float:left;margin-top:10px;margin-right:10px;cursor:pointer;z-index:100">Add Project </div> 



</div>
</div>
<br><br>

 <div class="home-content">
      <div class="employee-boxes">
        <div class="recent-employee box">
          <div class="employee-details">
		  
  

   	            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="margin-left:5vw">
              <label for="Project Department" style="color: #18114a;"><b>Department</b></label>
              <br><br>
              <select name="ProjectDepartment" id="name" style="height: 30px;width:200px; border-radius: 8px;">
			  
			  <option value="" selected="true" disabled="disabled" ></option>
			  
   	  <?php   
	  
	  
	  
	  
	  $sql = "SELECT DISTINCT DEPARTMENT FROM project WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);


$counter = 0;

  while($row = $result->fetch_assoc()) {  ?>
  
 
  
  <option value="<?php echo $row['DEPARTMENT'].':'.$counter;
  $counter++;?>" > <?php echo ucwords(strtolower($row['DEPARTMENT']))?></option>:



  

  <?php }
  

   


?>
              </select>
			 
			    <input type="submit" name ="departmentfilter" class="btnstatus"  value="Search" >
				
				   <input type="submit" name ="reset" class="btnstatus"  value="Reset" >
			
            </form>
			
	
			

         <div class="search" style="margin-top:-0.5vw;margin-right:12vw">       
                <input type="text" name="search" id="myFilter" onkeyup="myFunction()" placeholder=" Search Project"  style="border:1px solid #DCDCDC;height: 30px;width:200px;border-radius: 8px;font-size:14px" autocomplete="off"/>

             
                
              </button>
            </div>  
   
  
	
	  
		</div><br>
			</div>
			</div>
			</div> <br>




</head>
 
   
<body id="body">







<style>

.font:hover{
	
	color:#2bb3e2;
	
}

.cards {

 

 display: grid;

 

 grid-template-columns: repeat(auto-fill, 240px);

 

 grid-auto-rows: auto;

 

 grid-gap: 0rem;

 

 }

 

 &amp;amp;nbsp;

 

 .card {

 

 border: 2px solid #e7e7e7;

 

 border-radius: 4px;

 

 padding: .5rem;

 

 }


textarea {
  width: 650px;
  height: 10vh;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 1px solid #848A91;
  border-radius: 8px;
  margin-top:-2vw;
  margin-left:0.5vw;
  background-color: #f8f8f8;
  font-size: 14px;
  font-family:Arial;
  resize: none;
}

[type="date"] {
  background:#fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png)  97% 50% no-repeat ;
}
[type="date"]::-webkit-inner-spin-button {
  display: none;
}
[type="date"]::-webkit-calendar-picker-indicator {
  opacity: 0;
}

.sd {
  width: 520px;
  margin-left:1vw;
}

.ed {

  width: 520px;
  margin-left:1vw;
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


.button6 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
  border-radius:10px;
  padding:7px;
  text-align: justify;
}

.button6:hover {
  background-color: #555555;
  color: white;
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



.checkproj{
	
	width:24vw;
	height:2vw;
	background-color:#646566;
	color:white;border:1px solid #646566;
	cursor: pointer
	
}


.checkproj:hover{
	
	background-color:black;
	color:white;border:1px solid black;
	color:white;
	cursor: pointer
	
	
}

.create{
	
	cursor:pointer;
}

.create:hover{
	
	color:red;
	
}

</style>



<div id="popup" style="display:none;position:absolute;top:15%;left:30%;border:1px solid black;width:720px;height:1050px;background:#E6E9EE;border-radius:15px;">

<?php 

$errors = array('pname' => '',  'sd' => '');

$pname = $pdes = $pm = $sdm = $ba = $sd = $ed = $dep = $status = $comm = $tl = ""; 


 if (isset($_POST["createproject"])) {

	  if(empty($_POST["pn"])){
	  
	  $errors['pname'] = "Please enter a project name";
	  
  }
	 
     if($_POST["startdate"]>$_POST["enddate"]){
		 
		 $errors['sd'] = "Timeline of project is incorrect";
		 
	 }
  
  
 

   if(array_filter($errors)){
	   
	 
	  
	  echo "<script>document.getElementById('errormessage').style.display = 'block'</script>";
	  
	 echo "<script>document.getElementById('popup').style.display = 'block';</script>";
	  
 
  }else{
	  
	       $pname = trim(($_POST['pn']));
		   
		   if(strpos($pname, "'") !== false){
   $pname = str_replace("'","\'",$pname);
}

		   if(strpos($pname, ",") !== false){
   $pname = str_replace(",","\,",$pname);
}


	 $pdes = trim($_POST['pdes']);
	 
	 		   if(strpos($pdes, "'") !== false){
   $pdes = str_replace("'","\'",$pdes);
}

		   if(strpos($pdes, ",") !== false){
   $pdes = str_replace(",","\,",$pdes);
}



	$pm = trim(ucwords(strtolower($_POST['pm'])));
	
	
	$pm = validation($pm);
	
	
	$sdm =trim(ucwords(strtolower( $_POST['sdm'])));
	
	$sdm = validation($sdm);
	
	
	$ba =trim(ucwords(strtolower( $_POST['ba'])));
	
	$ba = validation($ba);
	
	
	$sd = $_POST['startdate'];
	$ed = $_POST['enddate'];
	$dep =trim(ucwords(strtolower( $_POST['dept'])));
	$status = trim(ucwords(strtolower($_POST['status'])));
	$comm = trim(ucwords(strtolower($_POST['comment'])));
	
	$comm = validation($comm);
	
	$tl = trim(ucwords(strtolower($_POST['tl']))); 
	
	$tl = validation($tl);
	  
	   echo "<script>document.getElementById('popup').style.display = 'block';</script>";
	   
	   $date = date('Y/m/d');
		   
		$sql = "INSERT INTO project(PROJECTNAME,DESCRIPTION,PM,SDM,BA,STARTDATE,ENDDATE,DEPARTMENT,TEAMLEAD,STATUS,COMMENT,LASTUPDATED,ISDELETED)VALUES('$pname',' $pdes','$pm','$sdm','$ba','$sd','$ed','$dep','$tl','$status','$comm','$date','NO')";

if ($conn->query($sql) === TRUE) {
	
  
  
  echo "<script>toastr.success('Project Successfully created')</script>";
  
  
    echo "<script>document.getElementById('popup').style.display = 'none'</script>";
  
   $pname = $pdes = $pm = $sdm = $ba = $sd = $ed = $dep = $tl = $status = $comm = ""; 
  
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
 
 <h1> Enter Project Details <button onclick="closeadd()" style="float:right;margin-right:10px;border:1px solid #E6E9EE;background:#E6E9EE"><i class="fa fa-close"  style="float:right;margin-right:10px;font-size:30px;color:red" onclic="closeedit()"> </i> </button> </h1>


 <form method="post" action="projects.php" style="margin-top:30px;" >

<input type="text" placeholder = "Project Name (Required)" name="pn" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $pname?>"  autocomplete="off"> <br><br>

   <label  style="color:red"><?php echo $errors['pname']?></label><br><br><br>

<textarea placeholder="Project Description" name = "pdes"  id="pdes" value="<?php echo $pdes?>" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" autocomplete="off"></textarea><br><br>
    
<input type="text" placeholder = "Project Manager" name="pm" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $pm?>" autocomplete="off" > <br><br>

<input type="text" placeholder = "Software Development Manager" name="sdm" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $sdm?>"  autocomplete="off"> <br><br>

<input type="text" placeholder = "Business Analyst" name="ba" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $ba?>" autocomplete="off" > <br><br>


 <div style="float:left;margin-left:2.2vw">Start Date :</div> <input type="date" class="sd" name="startdate" id="startdate" value="<?php echo $sd?>" style="border-radius: 8px;border: 1px solid grey;padding: 6px;font-family:Arial;margin-right:0.4vw" autocomplete="off"><br><br>
   <label style="color:red"><?php echo $errors['sd']?></label><br><br>

 <div style="float:left;margin-left:2.2vw">End Date :</div> <input type="date" placeholder="Start date" class="ed" name="enddate" id="enddate" value="<?php echo $ed?>" style="border-radius: 8px;border: 1px solid grey;padding: 6px;font-family:Arial" autocomplete="off"><br><br>

<select  name="dept" style="border-radius: 8px;border: 1px solid grey;width:650px;padding: 5px 5px;font-family:Arial"  value="<?php echo $dep?>" autocomplete="off">
<option value="" selected="selected"  disabled="disabled">Department</option>
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
  
  

<input type="text" placeholder = "Team Lead" name="tl" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $tl?>" autocomplete="off"> <br><br>


<select name="status" id="status"  style="border-radius: 8px;border: 1px solid grey;width:650px;padding: 5px 5px;font-family:Arial"  value="<?php echo $status?>" autocomplete="off">
<option value=""  disabled="disabled">Status</option>
<option selected="true" value="New">New</option>
    <option value="Neglected Work">Neglected Work</option>
    <option value="Unplanned Work">Unplanned Work</option>
    <option value="Unknown Dependencies">Unknown Dependencies</option>
    <option value="Business Testing">Business Testing</option>
	<option value="Conflicting Priorites">Conflicting Priorites</option>
	<option value="Outsource">Outsource</option>
	<option value="Code Review">Code Review</option>
	<option value="Blocked">Blocked</option>
	<option value="QA Failed">QA Failed</option>
	<option value="Ready for Deploy to Live">Ready for Deploy to Live</option>
	<option value="QA">QA</option>
	<option value="Imbedded Outsource Devs">Imbedded Outsource Devs</option>
  </select><br><br><br><br>
  
 <textarea name="comment" placeholder= "Add Comment"  value="<?php echo $comm?>" style="font-family:Arial;background-color:white" autocomplete="off"></textarea><br><br>
  
<input type="submit" id= "create" class="create" name="createproject" value="Create project" size="50" style="border-radius: 8px;border: 1px solid grey;padding: 10px 9px; width:330px;background:#02376E;color:#FFFFFF;cursor:pointer"> <br><br><br> 


</form>

</center>

</div>

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <br>


		 

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">





 
<div class="cards" id="myProducts" style="margin-top:2vw;margin-left:5vw">
 	
	

  <?php $sql = "SELECT * FROM project Where ISDELETED = 'NO' ORDER BY LASTUPDATED DESC";
    $result = $conn->query($sql);

$counter = 0;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $counter++;
	




 
	?>  
	

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >


 
  <div class="card" id="<?php echo 'P'.$counter?>" >
 
<div class="w3-container" style="margin-left:3vw;width:96vw">

  <div class="w3-card-4" style="width:25%" style="border-radius:18px">

    <div  class=" card-title" style="height:6vw;background:white;border-radius:10px 10px 0px 0px">



      <h3  style="margin-top:-50px"> <div class="title" style="margin-left:0.6vw"> <?php echo $row['PROJECTNAME'] ?> </div><button  value ="DELETE" id="<?Php echo $row['PROJECTID']?>"  class="del"  style="float:right;width:50px;border-radius:15px;font-size:10;border: 1px solid white;background:white;color:white"> <i class="fa fa-trash" style="float:right;margin-right:1vw;margin-top:-1.6vw;font-size:30px;color:red"></i></button>
<button class="edit" value="EDIT" id="<?Php echo $row['PROJECTID'];?>" style="float:right;color:green;width:50px;margin-right:5px;border-radius:15px;font-size:10;border: 1px solid white;background:white;color:white"> <i class="fa fa-edit" style="float:right;margin-right:1vw;margin-top:-1.5vw;font-size:30px;color:green"></i></button></h3>
<br style="display: block; margin-bottom: 0em;">

<hr style="height:3px;border:none;color:#333;background-color:#D3D3D3;">
    </div> 



    <div class="w3-container" style="background:white;border-radius: 0px 0px 10px 10px">

      <div class="title" style="margin-left:0.6vw;height:6vh"><?php echo $row['DESCRIPTION']; ?></div><br><br><br>

    <button class="w3-button w3-block w3-dark-grey checkproj"  id="<?Php echo $row['PROJECTID']. 'status';?>" style="border-radius: 0px 0px 10px 10px"><?php echo $row['STATUS']; ?></button>
</div>

  </div>

</form>

</div>  <br><br><br><br>

  </div> <br><br>
  
  <script>
function changecolor(x,y){
	
	
	if(y == "New"){
		
		
		document.getElementById(x + 'status').style.background = "#D3D3D3";
		document.getElementById(x + 'status').style.color = "black";
		document.getElementById(x + 'status').style.border = "1px solid #D3D3D3";
		
}else if(y == "Unknown Dependencies"){
	
	document.getElementById(x + 'status').style.background = "#ae61d5";
	document.getElementById(x + 'status').style.border = "1px solid #ae61d5";
	
}else if(y == "Blocked"){
	
	document.getElementById(x + 'status').style.background = "#f95d53";
	document.getElementById(x + 'status').style.border = "1px solid #f95d53";
	
}else if(y == "Ready For Deploy To Live"){
	
	document.getElementById(x + 'status').style.background = "#20c07d";
	document.getElementById(x + 'status').style.border = "1px solid #20c07d";
	
}else if(y == "Business Testing"){
	
	document.getElementById(x + 'status').style.background = "#6a4ccd";
	document.getElementById(x + 'status').style.border = "1px solid #6a4ccd";
	
}else if(y == "Code Review"){
	
	document.getElementById(x + 'status').style.background = "#3abdeb";
	document.getElementById(x + 'status').style.border = "1px solid #3abdeb";
	
}else if(y == "QA Failed"){
	
	document.getElementById(x + 'status').style.background = "#ff4747";
	document.getElementById(x + 'status').style.border = "1px solid #ff4747";
	
}else if(y == "Imbedded Outsource Devs"){
	
	document.getElementById(x + 'status').style.background = "#6385ff";
	document.getElementById(x + 'status').style.border = "1px solid #6385ff";
	
}else if(y == "Outsource"){
	
	document.getElementById(x + 'status').style.background = "#6c8dff";
	document.getElementById(x + 'status').style.border = "1px solid #6c8dff";
	
}
	
	
	



}
</script>
  


	

<?php

  
  $theid = $row['PROJECTID'];
$thestatus = $row['STATUS'];




 echo "<script> changecolor('$theid','$thestatus')</script>" ;
	
  }
  
}?>

	

<script>





    function myFunction() {
  var input, filter, cards, cardContainer, title, i;
  input = document.getElementById("myFilter");
  filter = input.value.toUpperCase();
  cardContainer = document.getElementById("myProducts");
  cards = cardContainer.getElementsByClassName("card");
  for (i = 0; i < cards.length; i++) {
    title = cards[i].querySelector(".card-title");
    if (title.innerText.toUpperCase().indexOf(filter) > -1) {
      cards[i].style.display = "";
    } else {
      cards[i].style.display = "none";
    }
  }
}
</script>



  <script>
  
  function removecards(){
	
	
	for (let i = 1; i <= 8; i++) {
document.getElementById("P" + i).style.display = 'none';
}


	

	
}

  </script>
  
  <?Php


	if(isset($_POST['departmentfilter'])){
    if(!empty($_POST['ProjectDepartment'])) {
		
		echo "<script> removecards()</script>";
	
        $selected = $_POST['ProjectDepartment'];

		  $str_arr = explode (":", $selected);
	
	
	$str_arr[1] = $str_arr[1] + 1;
	     echo "<script> document.getElementById('name').selectedIndex = $str_arr[1];</script>";
				
				
		$selected = $str_arr[0];

 $sql = "SELECT * FROM project WHERE DEPARTMENT = '$selected' AND ISDELETED = 'NO' ORDER BY LASTUPDATED DESC";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  
	?>  
	  

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >

  <div class="card">
 
<div class="w3-container" style="margin-left:3vw;width:96vw">

  <div class="w3-card-4" style="width:25%" style="border-radius:18px">

    <div  class=" card-title" style="height:6vw;background:white;border-radius:10px 10px 0px 0px">



      <h3  style="margin-top:-50px"> <div class="title" style="margin-left:0.6vw"> <?php echo $row['PROJECTNAME'] ?> </div><button  value ="DELETE" id="<?Php echo $row['PROJECTID']?>"  class="del"  style="float:right;width:50px;border-radius:15px;font-size:10;border: 1px solid white;background:white;color:white"> <i class="fa fa-trash" style="float:right;margin-right:1vw;margin-top:-1.6vw;font-size:30px;color:red"></i></button>
<button class="edit" value="EDIT" id="<?Php echo $row['PROJECTID'];?>" style="float:right;color:green;width:50px;margin-right:5px;border-radius:15px;font-size:10;border: 1px solid white;background:white;color:white"> <i class="fa fa-edit" style="float:right;margin-right:1vw;margin-top:-1.5vw;font-size:30px;color:green"></i></button></h3>
<br style="display: block; margin-bottom: 0em;">


<hr style="height:3px;border:none;color:#333;background-color:#D3D3D3;">
    </div> 

    <div class="w3-container" style="background:white;border-radius:0px 0px 10px 10px">

      <div class="title" style="margin-left:0.6vw;height:6vh"><?php echo $row['DESCRIPTION']; ?></div><br><br><br>

    

    <button class="w3-button w3-block w3-dark-grey checkproj" style="border-radius:0px 0px 10px 10px"  id="<?Php echo $row['PROJECTID'].'status2';?>" ><?php echo $row['STATUS']; ?></button>
</div>
  </div>

</form>

</div>  <br><br><br><br>

  </div> <br><br>
	
	
	  <script>
function changecolor2(x,y){
	
	
	if(y == "New"){
		
	document.getElementById(x + 'status2').style.background = "#D3D3D3";
		document.getElementById(x + 'status2').style.color = "black";
		document.getElementById(x + 'status2').style.border = "1px solid #D3D3D3";
		
}else if(y == "Unknown Dependencies"){
	
	document.getElementById(x + 'status2').style.background = "#ae61d5";
	document.getElementById(x + 'status2').style.border = "1px solid #ae61d5";
	
}else if(y == "Blocked"){
	
	document.getElementById(x + 'status2').style.background = "#f95d53";
	document.getElementById(x + 'status2').style.border = "1px solid #f95d53";
	
}else if(y == "Ready For Deploy To Live"){
	
	document.getElementById(x + 'status2').style.background = "#20c07d";
	document.getElementById(x + 'status2').style.border = "1px solid #20c07d";
	
}else if(y == "Business Testing"){
	
	document.getElementById(x + 'status2').style.background = "#6a4ccd";
	document.getElementById(x + 'status2').style.border = "1px solid #6a4ccd";
	
}else if(y == "Code Review"){
	
	document.getElementById(x + 'status2').style.background = "#3abdeb";
	document.getElementById(x + 'status2').style.border = "1px solid #3abdeb";
	
}else if(y == "QA Failed"){
	
	document.getElementById(x + 'status2').style.background = "#ff4747";
	document.getElementById(x + 'status2').style.border = "1px solid #ff4747";
	
}else if(y == "Imbedded Outsource Devs"){
	
	document.getElementById(x + 'status2').style.background = "#6385ff";
	document.getElementById(x + 'status2').style.border = "1px solid #6385ff";
	
}else if(y == "Outsource"){
	
	document.getElementById(x + 'status2').style.background = "#6c8dff";
	document.getElementById(x + 'status2').style.border = "1px solid #6c8dff";
	
}
	
	
	



}
</script>



<?php	
  
   $theid = $row['PROJECTID'];
$thestatus = $row['STATUS'];




 echo "<script> changecolor2('$theid','$thestatus')</script>" ;
  
  
  }
  
}


	 
    } else {
        echo 'Please select the value.';
    }
    }else   if(isset($_POST['reset'])){
		
	
	echo "<script>	window.location.replace('http://localhost/dashboard/Intellix/projects.php');</script>";
		
		
	}
	


	
	if(isset($_COOKIE["delete"])){
		
		$postid = $_COOKIE["delete"];
	
	 mysqli_query($conn, "INSERT INTO deletedproject SELECT * FROM project WHERE PROJECTID = '$postid'");

		 mysqli_query($conn,"UPDATE project SET ISDELETED = 'YES' WHERE PROJECTID = '$postid' ");
	  
	    $sql = "SELECT PROJECTID FROM task where PROJECTID LIKE '$postid'";
    $result = $conn->query($sql);
	
	
	  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  			 		 mysqli_query($conn,"UPDATE task SET PROJECTNAME = 'UNASSIGNED',
						 PROJECTID = 0
						 WHERE PROJECTID = '$postid' ");
		 
		 
	  
  }
	  }
	  
	  
	  
	   mysqli_query($conn,"DELETE FROM delay WHERE PROJECTID IN (SELECT PROJECTID FROM delay where PROJECTID LIKE '$postid')");
	 
	  
	  
	   echo "<script>toastr.success('Successfully deleted the project')</script>";
	   
	   echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
	 
		
	}if(isset($_COOKIE["edit"])){
		
		echo"<script>document.getElementById('blur').style.display = 'block';</script>";
		
		$postid = $_COOKIE["edit"];
		
	  $sql = "SELECT * FROM project where PROJECTID = '$postid'";
    $result = $conn->query($sql);






  // output data of each row
 $row = $result->fetch_assoc();
	  
	  $pid = $row["PROJECTID"];
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
	
	
	$errors = array( 'ed' => '');





	
	
	?>
	
	</div>
	
	<div id="editpopup" style="display:block;position:absolute;top:15%;left:30%;border:1px solid black;width:720px;height:910px;background:#E6E9EE;border-radius:15px">
	<center>
 
 <br>
 
 <h1> Edit Project Details <button onclick="closeedit()" style="float:right;margin-right:10px;border:1px solid #E6E9EE;background:#E6E9EE"><i class="fa fa-close"  style="float:right;margin-right:10px;font-size:30px;color:red" onclic="closeedit()"> </i> </button></h1><br>
 
 
  <h4 style="float:left;margin-left:2.7vw">Project Name : <?php echo $row['PROJECTNAME']?></h4><br>
  
  
 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"  style="margin-top:30px;" ><br>

 <textarea name = "pdes" class = "pdes" placeholder="Project Description" id="pdesc" value="<?php echo $pdes?>" style="border-radius: 8px;background:white;border: 1px solid grey;padding: 10px 11px;font-family:Arial" autocomplete="off"> <?php echo $pdes?></textarea><br><br>
   
  
<input type="text" placeholder = "Project Manager" id="pm"  name="pm" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $pm?>" autocomplete="off" > <br><br>

<input type="text" placeholder = "Software Development Manager" name="sdm" id="sdm" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;" value="<?php echo $sdm?>"  autocomplete="off"> <br><br>

<input type="text" placeholder = "Business Analyst" name="ba" id="ba" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;" value="<?php echo $ba?>" autocomplete="off"> <br><br>


 <div style="float:left;margin-left:2.2vw">Start Date :</div>  <input type="date" id="startdates" class="sd" name="startdate" value="<?php echo $sd?>" style="border-radius: 8px;border: 1px solid grey;padding: 6px;font-family:Arial;margin-right:0.4vw" autocomplete="off"><br><br>


 <div style="float:left;margin-left:2.2vw">End Date :</div>  <input type="date" id="enddates" class="ed" name="enddate"  value="<?php echo $ed?>" style="border-radius: 8px;border: 1px solid grey;padding: 6px;font-family:Arial" autocomplete="off"><br><br>

<select  name="dept" id="dept" style="border-radius: 8px;border: 1px solid grey;width:650px;padding: 5px 5px;font-family:Arial"  value="<?php echo $dep?>" autocomplete="off">

<option value=""   disabled="disabled">Department</option>
 <option  selected="selected" value="<?php echo $dep?>"><?php echo $dep?></option>
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
  

<input type="text" placeholder = "Team Lead" name="tl" id="tl" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;" value="<?php echo $tl?>"  autocomplete="off"> <br><br>


<select name="status" id="statuses" value="<?php echo $status?>" style="width:650px;border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial;" autocomplete="off" >

    <option value="<?php echo $status?>"><?php echo $status?></option>
    <option value="New">New</option>
    <option value="Neglected Work">Neglected Work</option>
    <option value="Unplanned Work">Unplanned Work</option>
    <option value="Unknown Dependencies">Unknown Dependencies</option>
    <option value="Business Testing">Business Testing</option>
	<option value="Conflicting Priorites">Conflicting Priorites</option>
	<option value="Outsource">Outsource</option>
	<option value="Code Review">Code Review</option>
	<option value="Blocked">Blocked</option>
	<option value="QA Failed">QA Failed</option>
	<option value="Ready For Deploy To Live">Ready for Deploy to Live</option>
	<option value="QA">QA</option>
	<option value="Imbedded Outsource Devs">Imbedded Outsource Devs</option>
  </select><br><br><br>
  
 <textarea name="comment" id="comm"  placeholder="Add Comment"  value="<?php echo $comm?>" style="border-radius: 8px;background:white;border: 1px solid grey;padding: 10px 11px;font-family:Arial" autocomplete="off"> <?php echo $comm?></textarea><br><br>
  
<input type="submit" id="<?php echo $pid ?>"  class="editingproj" name="testing" value="Save Changes" size="50" style="border-radius: 8px;border: 1px solid grey;padding: 10px 9px; width:330px;background:#02376E;color:#FFFFFF;cursor:pointer"> <br><br><br> 


</form>
</center>
	
	


	
	
	<?php
		
	

	}else if(isset($_COOKIE["details"])){
		
		
		$postid = $_COOKIE["details"];
		

		 
		 
		  echo "<script>window.location.replace('http://localhost/dashboard/Intellix/projectdetails.php?projectid=$postid')</script>";
 
   

		
	}else if(isset($_COOKIE["editing"])){
		
		
		$postid = $_COOKIE["editing"];
		
		 $date = date('Y/m/d');

		 $str_arr = explode ("@#", $postid); 
		 
		 
		  $sql = "SELECT * FROM project WHERE PROJECTID = '$str_arr[0]'";
    $result = $conn->query($sql);

$row = $result->fetch_assoc();
 
	if($row['STATUS'] == "Blocked" ){
	
			 		 mysqli_query($conn,"UPDATE delay SET ENDDATE = '$date' 
		
		 WHERE PROJECTID = '$str_arr[0]' AND PERIOD = '' ");
		 
		 		 
		  $sql2 = "SELECT * FROM delay WHERE PROJECTID = '$str_arr[0]' AND PERIOD = ''";
    $result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc();
		 
	 $datetime1 = date_create($row2['STARTDATE']);
  $datetime2 = date_create($row2['ENDDATE']);
 

  $interval = date_diff($datetime1, $datetime2);
		 
		 $diff = $interval->format("%R%a days");
		 

		 mysqli_query($conn, "UPDATE delay SET PERIOD = '$diff' 
		
		 WHERE PROJECTID = '$str_arr[0]' AND PERIOD = ''");
		 
		
			 
		 }
		 
		 if($str_arr[9] == "Blocked" ){
			 

			$sql2 = "INSERT INTO delay (PROJECTID,STARTDATE,REASON,DATE) values ('$str_arr[0]','$date','Project entered blocked status','$date')";
			$conn->query($sql2);
			
		}
		
		
		
		$str_arr[2] = validation2(trim($str_arr[2]));
		$str_arr[3] = validation2(trim($str_arr[3]));
		$str_arr[4] = validation2(trim($str_arr[4]));
		$str_arr[6] = trim($str_arr[6]);
		$str_arr[7] = validation2(trim($str_arr[7]));
		$str_arr[8] = validation2(trim($str_arr[8]));
		$str_arr[9] = trim($str_arr[9]);
		$str_arr[10] = validation2(trim($str_arr[10]));
		
		
		
		 mysqli_query($conn, "UPDATE PROJECT SET DESCRIPTION = '$str_arr[1]' ,
		 PM = '$str_arr[2]' ,
		 SDM = '$str_arr[3]' ,
		 BA = '$str_arr[4]',
		 STARTDATE = '$str_arr[5]' ,
		 ENDDATE = '$str_arr[6]' ,
		 DEPARTMENT = '$str_arr[7]' ,
		 TEAMLEAD = '$str_arr[8]' ,
		 STATUS = '$str_arr[9]' ,
		 COMMENT = '$str_arr[10]' ,
		 LASTUPDATED = '$date' 
		 WHERE PROJECTID= '$str_arr[0]'");

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




</div>

<br><br><br>

<script>

function showpopup()
{
	
		

	 
document.getElementById("popup").style.display = "block";

	  document.getElementById("blur").style.display = "block";
	 
	 
	 
	 
}

function closeadd()
{
	
	
	 document.getElementById("popup").style.display = "none";
	 
	 document.getElementById("blur").style.display = "none";
}


function closeedit()
{
         document.getElementById("editpopup").style.display = "none";
		 document.getElementById("blur").style.display = "none";

}



function showerrormessage()
{
	document.getElementById("errormessage").style.display = "none";
 
}

function showsuccess()
{
	alert('test');
 
}


function deletemessage()
{
	document.getElementById("deletemessage").style.display = "none";
 
}




</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
	

$("button.del").click(function(){
 
 var postid = $(this).attr('id');


	 if (confirm('Are you sure you wish to delete this project?')) {
  // Save it!
     createCookie("delete", postid, "10");
} else {
  // Do nothing!
  console.log('Cancel');
}

		
		
 });



$("button.edit").click(function(){
 
 var postid = $(this).attr('id');


	 createCookie("edit", postid, "10");
		
		
 });
 
 
 
 $("input.editingproj").click(function(){
 
 var postid = $(this).attr('id');


pdes= document.getElementById('pdesc').value;
pm= document.getElementById('pm').value;
sdm= document.getElementById('sdm').value;
ba= document.getElementById('ba').value;
sd= document.getElementById('startdates').value;
ed= document.getElementById('enddates').value;
dep = document.getElementById('dept').value;
tl= document.getElementById('tl').value;
status = document.getElementById('statuses').value;
comm = document.getElementById('comm').value;

all = postid + '@#' + pdes + '@#' +  pm + '@#' +  sdm + '@#' +  ba + '@#' +  sd + '@#' +  ed + '@#' +  dep + '@#' +  tl + '@#' +  status + '@#' +  comm;



createCookie("editing", all , "10");
		
		
 })



 $("button.checkproj").click(function(){
 
 var postid = $(this).attr('id');


	createCookie("details", postid, "10");
	
	
	
	
		
		
 })



$("button.error").click(function(){
 
document.getElementById("errormessage").style.display = "none";

		
		
 });
 
 


});




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


function removecards(){
	
	
	document.getElementById('allcards').style.display = 'none';
	
	
}

</script>




</body>



<button onclick="topFunction()" id="myBtn" style="background-color:#E6E9EE;border:1px solid #E6E9EE;float:right;margin-right:2vw;cursor:pointer"> <img src="./images/right-arrow.png" style="margin-top:0.9vw;margin-left:-1vw;height:2vw;width:2vw;cursor:pointer"></button>


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