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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


<div class="bar">
<div class="add"  onclick="showpopup()" style="width:190px;height:60px;border: 1px solid #E6E9EE;padding:10px;border-radius:15px;margin-left:10px;">

<div class="font" id="buttontext" style="float:left;margin-top:10px;margin-right:10px;;cursor:pointer">Add Team Member </div> 



</div>


<br><br>
	

</div>


    <link rel="stylesheet" href="styleforemployee.css">
   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <script src="./filter.js"></script>
	
	

</head>



<body>



<div id="popup" style="display:none;position:absolute;top:15%;left:30%;border:1px solid black;width:720px;height:1300px;background:#E6E9EE;border-radius:15px">

<?php 


$errors = array('empcode' => '','jt' => '', 'dep' => '', 'fn' => '', 'ln' => '');

$empcode = $fn = $ln = $jt = $tn = $skills1 = $skills2 = $skills3 = $leave = $interview = $dep = ""; 


 if (isset($_POST["createemp"])) {

 $sql = "SELECT * FROM teammember ";
    $result = $conn->query($sql);



if ($result->num_rows > 0) {
 

		  
  while($row = $result->fetch_assoc()) {
	  
	  if($_POST["empcode"] == $row['EMPCODE']){
		  
		  $errors['empcode'] = "Employee is already registered in the system";
	  }

  }

}  



  if(empty($_POST["empcode"])){
	  
	  $errors['empcode'] = "Please enter a team member code";
	  
  }
  

 if(empty($_POST["fn"])){
	  
	  $errors['fn'] = "Please enter a team member first name";
	  
  }
  
   if(empty($_POST["ln"])){
	  
	  $errors['ln'] = "Please enter a team member first name";
	  
  }
  
     if(empty($_POST["jt"])){
		 
		   $errors['jt'] = "Please enter a team member job title";
		 
	 }
	 
	     
	   if(empty($_POST["dep"])){
	  
	  $errors['dep'] = "Please enter a department";
	  
  }
  
	 
	 
$empcode =ucwords(strtolower($_POST["empcode"]));

$empcode = validation($empcode);
	 
$fn =ucwords(strtolower($_POST["fn"]));
$fn = validation($fn);

$ln =ucwords(strtolower($_POST["ln"]));
$ln = validation($ln);

$tn =ucwords(strtolower($_POST["tn"]));
$tn = validation($tn);

$dep =ucwords(strtolower($_POST["dep"]));
$dep = validation($dep);

$jt =ucwords(strtolower($_POST["jt"]));
$jt = validation($jt);
	  
$skills1 =ucwords(strtolower($_POST["skills1"]));
$skills1 = validation($skills1);

$skills2 =ucwords(strtolower($_POST["skills2"]));
$skills2 = validation($skills2);

$skills3 =ucwords(strtolower($_POST["skills3"]));
$skills3 = validation($skills3);

$leave = ucwords(strtolower($_POST["leaves"]));

$interview = ucwords(strtolower($_POST["interviews"]));

$outsource = ucwords(strtolower($_POST["outsources"]));

$combinedskills = $skills1.",".$skills2.",".$skills3;



   if(array_filter($errors)){
	   

	  
	  echo "<script>document.getElementById('errormessage').style.display = 'block'</script>";
	  
	 echo "<script>document.getElementById('popup').style.display = 'block';</script>";
	  
 
  }else{

	   echo "<script>document.getElementById('popup').style.display = 'block';</script>";
	   

 $date = date('Y/m/d');
 
		 $sql = "INSERT INTO teammember (EMPCODE,FIRSTNAME,LASTNAME,DEPARTMENT,TITLE,TEAMNAME,SKILLS,BREAK,INTERVIEW,OUTSOURCE,LASTUPDATED,ISDELETED)VALUES('$empcode',' $fn','$ln','$dep','$jt','$tn','$combinedskills','$leave','$interview','$outsource','$date','NO')";

if ($conn->query($sql) === TRUE) {
	
   echo "<script>toastr.success('Team member was Successfully created')</script>";
  
    echo "<script>document.getElementById('popup').style.display = 'none'</script>";
  
   $empcode = $fn = $ln = $tn = $jt = $skills1 = $skills2 = $skills3 = $leave = $interview = ""; 
   

  
}else{
	
	 echo "<script>alert('failed')</script>";
	
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
 
 <h1> Enter Team Member Details  <button onclick="closeadd()" style="float:right;margin-right:10px;border:1px solid #E6E9EE;background:#E6E9EE"><i class="fa fa-close"  style="float:right;margin-right:10px;font-size:30px;color:red" onclic="closeedit()"> </i> </button> </h1>
 
 <form method="post" action="employee.php" style="margin-top:30px;" >


<input type="text" placeholder = "Employee Code (Required)" name="empcode" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $empcode?>" autocomplete="off"> <br><br>
  
  <label  style="color:red"><?php echo $errors['empcode']?></label><br><br>
  
   <input type="text" placeholder = "First name (Required)" name="fn" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $fn?>" autocomplete="off" > <br><br>

   <label  style="color:red"><?php echo $errors['fn']?></label><br><br>

<input type="text" placeholder = "Last Name (Required)" name="ln" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $ln?>"  autocomplete="off"> <br><br>

<label  style="color:red"><?php echo $errors['ln']?></label><br><br>

<select  name="dep" id="dept" style="border-radius: 8px;border: 1px solid grey;width:650px;padding: 5px 5px;font-family:Arial"  value="<?php echo $dep?>" autocomplete="off">

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

<input type="text" placeholder = "Job Title (Required)" name="jt" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $jt?>" autocomplete="off" > <br><br>

   <label  style="color:red"><?php echo $errors['jt']?></label><br><br>


<input type="text" placeholder = "Team Name" name="tn" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $tn?>" autocomplete="off"> <br><br><br>

<div style="float:left;margin-left:2.2vw">Leave :</div>  <select name="leaves" id="leave" value="<?php echo $break?>" style="width:535px;padding: 5px 5px;border-radius: 5px;font-family:Arial;margin-right:-1.8vw" autocomplete="off"  >
    <option value="On Leave">Yes</option>
    <option value="No">No</option>
	</select> <br><br><br>


<div style="float:left;margin-left:2.2vw">Admin :</div>  <select name="interviews" id="interview" value="<?php echo $interview?>" style="width:535px;padding: 5px 5px;border-radius: 5px;font-family:Arial;margin-right:-1.3vw"  autocomplete="off">
    <option value="No">No</option>
   <option value="Conducting Interviews">Conducting Interviews</option>
	 <option value="Meetings">Meetings</option>
	  <option value="Emails">Emails</option>
	   <option value="Stand-up">Stand-up</option>
	   <option value="training">training</option>
	   <option value="knowledge sharing">knowledge sharing</option>
   
	</select><br><br><br>
	
	
<div style="float:left;margin-left:2.2vw">Outsource :</div> <select name="outsources" id="outsource" value="<?php echo $outsource?>" style="width:535px;padding: 5px 5px;border-radius: 5px;font-family:Arial;margin-right:0.8vw"  >
    <option value="Yes">Yes</option>
    <option value="No">No</option>
	</select><br><br><br>
	
	
	  <select id="select" name="skills1" style="border-radius: 8px;border: 1px solid grey;width:660px;padding: 5px 5px;font-family:Arial" value="<?php echo $skills1?>" autocomplete="off">

<option value="" selected="true" disabled="disabled">Skill 1</option>


<?php   $sql = "SELECT DISTINCT SKILLS FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

  $skillarray = array();
  
if ($result->num_rows > 0) {

 
  while($row = $result->fetch_assoc()) {  
  
   
  $str_arr = explode (",", $row["SKILLS"]);
  
 
  
  array_push($skillarray,$str_arr[0],$str_arr[1],$str_arr[2]);
  }
}


$skillarray = array_filter($skillarray);

$skillarray = array_unique($skillarray);


foreach ($skillarray as $value) {
  ?>
  
  <option value="<?php echo $value ?>" > <?php echo ucwords(strtolower($value)) ?></option>


<?php } ?>
              

        </select><br><br>
		
		
		        <select id="select2" name="skills2"  style="border-radius: 8px;border: 1px solid grey;width:660px;padding: 5px 5px;font-family:Arial" value="<?php echo $skills3?>"  autocomplete="off">

<option value="" selected="true" disabled="disabled">Skill 2</option>


<?php   $sql = "SELECT DISTINCT SKILLS FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

  $skillarray = array();
  
if ($result->num_rows > 0) {

 
  while($row = $result->fetch_assoc()) {  
  
   
  $str_arr = explode (",", $row["SKILLS"]);
  
 
  
  array_push($skillarray,$str_arr[0],$str_arr[1],$str_arr[2]);
  }
}


$skillarray = array_filter($skillarray);

$skillarray = array_unique($skillarray);


foreach ($skillarray as $value) {
  ?>
  
  <option value="<?php echo $value ?>" > <?php echo ucwords(strtolower($value)) ?></option>


<?php } ?>
              

        </select> <br><br>
		
		
		        <select id="select3" name="skills3" style="border-radius: 8px;border: 1px solid grey;width:660px;padding: 5px 5px;font-family:Arial" value="<?php echo $skills2?>" autocomplete="off">


<option value="" selected="true" disabled="disabled">Skill 3</option>


<?php   $sql = "SELECT DISTINCT SKILLS FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

  $skillarray = array();
  
if ($result->num_rows > 0) {

 
  while($row = $result->fetch_assoc()) {  
  
   
  $str_arr = explode (",", $row["SKILLS"]);
  
 
  
  array_push($skillarray,$str_arr[0],$str_arr[1],$str_arr[2]);
  }
}


$skillarray = array_filter($skillarray);

$skillarray = array_unique($skillarray);


foreach ($skillarray as $value) {
  ?>
  
  <option value="<?php echo $value ?>" > <?php echo ucwords(strtolower($value)) ?></option>


<?php } ?>
              

        </select><br><br>
		
		

<input type="submit" id= "create" class="createempbtn" name="createemp" value="Create Team Member" size="50" style="border-radius: 8px;border: 1px solid grey;padding: 10px 9px; width:330px;background:#02376E;color:#FFFFFF;cursor:pointer"> <br><br><br> 


</form>

 <input type="text" id="val" size="70" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" autocomplete="off"> <button onclick="insertValue();" style="padding:7px;border-radius: 8px;;border: 1px solid grey;background:#E6E9EE;margin-bottom:5vw;cursor:pointer">Add Skill</button>


        <Script>



            function insertValue()

            {

                var select = document.getElementById("select"),

                txtVal = document.getElementById("val").value;

                txtVal = txtVal.toLowerCase();

                console.log(displayResult(txtVal))

				if(displayResult(txtVal) == "Found"){
					
					console.log("Can't add")
					
				}else if (displayResult(txtVal) == "Not Found"){
					
                newOption = document.createElement("OPTION"),

                txtVal = Capitalize(txtVal);

                newOptionVal = document.createTextNode(txtVal);
				
                newOption.appendChild(newOptionVal);

                select.insertBefore(newOption,select.lastChild);
					
				var select = document.getElementById("select2"),

                txtVal = document.getElementById("val").value;

                txtVal = txtVal.toLowerCase();	
					
				newOption = document.createElement("OPTION"),
				
				txtVal = Capitalize(txtVal);

                newOptionVal = document.createTextNode(txtVal);
				
                newOption.appendChild(newOptionVal);

                select.insertBefore(newOption,select.lastChild);


				var select = document.getElementById("select3"),

                txtVal = document.getElementById("val").value;

                txtVal = txtVal.toLowerCase();	
					
				newOption = document.createElement("OPTION"),
				
				txtVal = Capitalize(txtVal);

                newOptionVal = document.createTextNode(txtVal);
				
                newOption.appendChild(newOptionVal);

                select.insertBefore(newOption,select.lastChild);

				
				}
				
            }
			
			
			function displayResult(y) {
    var x = document.getElementById("select");
	
		y = Capitalize(y);
		
		
    var i;
	var txt = "";
	
    for (i = 0; i < x.length; i++) {
        txt = txt + "\n" + x.options[i].text;
		
	   if(y == x.options[i].text){
		   
		  return "Found"
		   
	   }else if (y != x.options[i].text && i==x.length-1) {

            return "Not Found"
		   
		
	   }
	   
	   
	   
    }
	

}


function Capitalize(x){
	
	const str = x;

    const capitalized = str.charAt(0).toUpperCase() + str.slice(1);

    return capitalized;

}


        </Script>
		
		
</center>

</div>





 <div class="home-content">
      <div class="employee-boxes">
        <div class="recent-employee box">
          <div class="employee-details">
        
            <div class="addEmp">
		            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
              <label for="Project Department" style="color: #18114a;"><b>Department</b></label>
              <br><br>
              <select name="ProjectDepartment" id="pd"  style="height: 30px; width: 200px; border-radius: 8px;border:1px solid #DCDCDC" type="search" class="select-table-filter" data-table="order-table">
			  
			<option value="" selected="true" disabled="disabled" ></option>	
			  
   	  <?php   $sql = "SELECT DISTINCT DEPARTMENT FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

 
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {  ?>
  
  <option value="<?php echo $row['DEPARTMENT']?>" > <?php echo ucwords(strtolower($row['DEPARTMENT']))?></option>

  <?php }
  
  
  
}?>
              </select>

			
            </form>
      
            </div>
    
            <div class="addEmp">
		            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
              <label for="Project Team" style="color: #18114a;"><b>Team</b></label>
              <br><br>
              <select name="ProjectTeam" id="pt" style="height: 30px; width: 200px; border-radius: 8px;border:1px solid #DCDCDC" type="search" class="select-table-filter" data-table="order-table">
			  
			 <option value="" selected="true" disabled="disabled" ></option>		
			  
   	  <?php   $sql = "SELECT DISTINCT TEAMNAME FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

 
if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {  ?>
  
  <option value="<?php echo $row['TEAMNAME']?>" style="text-transform: capitalize;"> <?php echo ucwords(strtolower($row['TEAMNAME']))?></option>

  <?php }
  
  
  
}?>
              </select>
		
			
            </form>
      
            </div>
    
            <div class="addEmp" styke="width:100%">
		            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
              <label for="Project Skill" style="color: #18114a;"><b>Skills</b></label>
              <br><br>
              <select name="ProjectSkill"  ps="ps" style="height: 30px; width: 200px; border-radius: 8px;border:1px solid #DCDCDC" type="search" class="select-table-filter" data-table="order-table">
			  
			    <option value="" selected="true" disabled="disabled" ></option>	
			  
   	  <?php   $sql = "SELECT DISTINCT SKILLS FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

  $skillarray = array();
  
if ($result->num_rows > 0) {

 
  while($row = $result->fetch_assoc()) {  
  
   
  $str_arr = explode (",", $row["SKILLS"]);
  
 
  
  array_push($skillarray,$str_arr[0],$str_arr[1],$str_arr[2]);
  }
}


$skillarray = array_filter($skillarray);

$skillarray = array_unique($skillarray);


foreach ($skillarray as $value) {
  ?>
  
  <option value="<?php echo $value ?>" > <?php echo ucwords(strtolower($value)) ?></option>


<?php } ?>
              </select>
			 
			
            </form>
			
            </div>
			
			
			            <div class="addEmp" styke="width:100%">
		            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
              <label for="Int" style="color: #18114a;"><b>Leave/Admin</b></label>
              <br><br>
              <select name="Int" id="pl"  style="height: 30px; width: 200px; border-radius: 8px;border:1px solid #DCDCDC" type="search" class="select-table-filter" data-table="order-table">
<option value="" selected="true" disabled="disabled" ></option>			  
<option value="On Leave"> Leave </option>
   <option value="Conducting Interviews">Conducting Interviews</option>
	 <option value="Meetings">Meetings</option>
	  <option value="Emails">Emails</option>
	   <option value="Stand-up">Stand-up</option>
	   <option value="training">training</option>
	   <option value="knowledge sharing">knowledge sharing</option>
              </select>
			 
			
            </form>
			
            </div>
			
			
			 <div class="addEmp" styke="width:100%">
			 
			 
		 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="margin-top:2.5vw;margin-right:-2vw">
          
			    <input type="submit" name ="reset" class="btnstatus"  value="Reset" >
			
            </form>
			</div>
			
				
               <div class="search" style="margin-top:3.4vw;margin-right:-0.5vw">       

				 <input type="search" name="search" id="mySearch" class="light-table-filter" data-table="order-table" placeholder=" Search"  style="height: 30px; width: 200px; border-radius: 8px;border:1px solid #DCDCDC" autocomplete="off"/>


            </div>         
          </div>
        </div>
      </div>
	  
    <br>   


 
 <?Php 



?>


  

      <div class="employee-boxes">
        <div class="recent-employee box">
      
		   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="width:100%">
		   
       <table class="order-table" style="width:100%;">
            <thead>
                <tr>
                    <th style="text-align:left;color: #18114a;font-size:15px">Full Name</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Department</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Team</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Job Title</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Skills</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Leave</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Admin</th>
                    <th style="text-align:left;color: #18114a;font-size:15px">Modify</th>
                </tr>
            </thead>
            <tbody>
		  
		 <?php  
		 


	 $sql = "SELECT * FROM teammember WHERE ISDELETED='NO' ORDER BY LASTUPDATED DESC  ";
	 
       $result = $conn->query($sql);


if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { ?> 
		     <tr>
			     <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;" align="left" ><?PHP echo $row['FIRSTNAME']." ".$row['LASTNAME']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['DEPARTMENT']?></td>
			   <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TEAMNAME']?></td>    
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TITLE']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['SKILLS']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['BREAK']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['INTERVIEW']?></td>
               <td ><button class="edit" id="<?PHP echo $row['EMPCODE']?>" ><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['EMPCODE']?>" style="margin-left: 50px"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
			  
  <?php }
   
 };

		 		  if(isset($_POST['departmentfilter'])){
    if(!empty($_POST['ProjectDepartment'])) {
		
			echo "<script>$('#content tr').remove(); </script>";
			
        $selected = $_POST['ProjectDepartment'];

	 $sql = "SELECT * FROM teammember WHERE DEPARTMENT = '$selected' AND ISDELETED='NO' ";
	 
       $result = $conn->query($sql);


if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;" align="left" ><?PHP echo $row['FIRSTNAME']." ".$row['LASTNAME']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['DEPARTMENT']?></td>
			   <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TEAMNAME']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TITLE']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['SKILLS']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['BREAK']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['INTERVIEW']?></td>
               <td ><button class="edit" id="<?PHP echo $row['EMPCODE']?>" ><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['EMPCODE']?>" style="margin-left: 50px"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
			  
  <?php }
   
 }
	  
	 
    } else {
        echo 'Please select the value.';
    }
    }else if(isset($_POST['teamfilter'])){
    if(!empty($_POST['ProjectTeam'])) {
		
		echo "<script>$('#content tr').remove(); </script>";
		
        $selected = $_POST['ProjectTeam'];

	 $sql = "SELECT * FROM teammember WHERE TEAMNAME = '$selected' AND ISDELETED='NO' ";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { ?> 
		  
          <tr>
		                 <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;" align="left" ><?PHP echo $row['FIRSTNAME']." ".$row['LASTNAME']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['DEPARTMENT']?></td>
			   <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TEAMNAME']?></td>

                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TITLE']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['SKILLS']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['BREAK']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['INTERVIEW']?></td>
               <td ><button class="edit" id="<?PHP echo $row['EMPCODE']?>" ><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['EMPCODE']?>" style="margin-left: 50px"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
			  
  <?php }
   
 }

  
    } else {
        echo 'Please select the value.';
    }
    }else if(isset($_POST['skillfilter'])){
    if(!empty($_POST['ProjectSkill'])) {
		
		echo "<script>$('#content tr').remove(); </script>";
		
        $selected = $_POST['ProjectSkill'];

	 $sql = "SELECT * FROM teammember WHERE SKILLS LIKE '%$selected%' AND ISDELETED='NO' ";
    $result = $conn->query($sql);
	  
if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { ?> 
		  
          <tr>
		                 <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;" align="left" ><?PHP echo $row['FIRSTNAME']." ".$row['LASTNAME']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['DEPARTMENT']?></td>
			   <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TEAMNAME']?></td>

                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TITLE']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['SKILLS']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['BREAK']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['INTERVIEW']?></td>
               <td ><button class="edit" id="<?PHP echo $row['EMPCODE']?>" ><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['EMPCODE']?>" style="margin-left: 50px"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
			  
  <?php }
   
 }



	  
    } else {
        echo 'Please select the value.';
    }
    }else if(isset($_POST['reset'])){
		
		
				echo "<script>window.location.replace('http://localhost/dashboard/Intellix/employee.php'</script>";
	

		
		
	}else if(isset($_POST['li'])){
	
	 if(isset($_POST['interviews']) && isset($_POST['leaves'])){
		 
		 echo "<script>$('#content tr').remove(); </script>";
		
				echo "<script>document.getElementById('lev').checked = true </script>";
				
				echo "<script>document.getElementById('int').checked = true </script>";
		
		 $sql = "SELECT * FROM teammember WHERE BREAK = 'Yes' AND INTERVIEW = 'Yes' AND ISDELETED='NO' ";
	 
       $result = $conn->query($sql);


if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;" align="left" ><?PHP echo $row['FIRSTNAME']." ".$row['LASTNAME']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['DEPARTMENT']?></td>
			   <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TEAMNAME']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TITLE']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['SKILLS']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['BREAK']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['INTERVIEW']?></td>
               <td ><button class="edit" id="<?PHP echo $row['EMPCODE']?>" ><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['EMPCODE']?>" style="margin-left: 50px"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
			  
  <?php }
   
 }
 
		
	}else if(isset($_POST['leaves'])){
		
		echo "<script>$('#content tr').remove(); </script>";
		
		echo "<script>document.getElementById('lev').checked = true </script>";
		
		 $sql = "SELECT * FROM teammember WHERE BREAK = 'Yes' AND ISDELETED='NO' ";
	 
       $result = $conn->query($sql);


if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;" align="left" ><?PHP echo $row['FIRSTNAME']." ".$row['LASTNAME']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['DEPARTMENT']?></td>
			   <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TEAMNAME']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TITLE']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['SKILLS']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['BREAK']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['INTERVIEW']?></td>
               <td ><button class="edit" id="<?PHP echo $row['EMPCODE']?>" ><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['EMPCODE']?>" style="margin-left: 50px"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
			  
  <?php }
   
 }
		
	}else if(isset($_POST['interviews'])){
		
		echo "<script>$('#content tr').remove(); </script>";
		
		echo "<script>document.getElementById('int').checked = true </script>";
		
				 $sql = "SELECT * FROM teammember WHERE INTERVIEW = 'Yes' AND ISDELETED='NO' ";
	 
       $result = $conn->query($sql);


if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;" align="left" ><?PHP echo $row['FIRSTNAME']." ".$row['LASTNAME']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['DEPARTMENT']?></td>
			   <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TEAMNAME']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['TITLE']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['SKILLS']?></td>
                <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['BREAK']?></td>
               <td align="left" onclick="test('<?PHP echo $row['EMPCODE']?>')" style="cursor: pointer;"><?PHP echo $row['INTERVIEW']?></td>
               <td ><button class="edit" id="<?PHP echo $row['EMPCODE']?>" ><i class='fa fa-edit'style="font-size:20px;color:green" ></i></button> <button class="del" id="<?PHP echo $row['EMPCODE']?>" style="margin-left: 50px"><i class='fa fa-trash'style="font-size:20px;color:red" ></i></button></td>
              </tr>
			  
			  
			  
  <?php }
   
 }
		
	}
	
	
}

	
	
		

?>

</tbody>
            </table>
			
			<br>

            </form>
            <!-- <script>getUniqueValuesFromColumn()
    </script> -->
    <script>
        window.onload = () => {
            console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
        };

        getUniqueValuesFromColumn()
        
    </script>  
          </div>
        </div>
      </div>
      </div>
    </div>
    <br>
    <br>

    </div>
  </section>
  <br>
  <br>

<script>

  function myFunction() {






  var input, filter, table, tr, td, i, txtValue;

  input = document.getElementById("mySearch");

  filter = input.value.toUpperCase();

  table = document.getElementById("myTable");

  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {

    td = tr[i].getElementsByTagName("td")[0];

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

.edit{
	margin-top:0.5vw;
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;
}

.del{
	
	border: 1px solid #fbfbfb;
	background : #fbfbfb;
	border-radius:15px;

	
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color: coral;}


.select{


	border:1px solid #848A91

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



table {
 
 margin: -10px;
 width: 90%;
 border-collapse: separate;
 border-spacing: 0 01px;
 font-size:12px;
}


.header_fixed thead th {
 top: 0;
 background-color: #ffffff;
 color: black;
}

th,
td {
 border-bottom: 1px solid #dddddd;
 padding: 10px 20px;
 text-align: justify;
 
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


</body>


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






<?php 

	if(isset($_COOKIE["deleteemp"])){
		
		$empcode = $_COOKIE["deleteemp"];
		
 	 mysqli_query($conn, "INSERT INTO deletedteammember SELECT * FROM teammember WHERE EMPCODE = '$empcode'");
	 
	 	   mysqli_query($conn,"UPDATE teammember SET ISDELETED = 'YES' WHERE  EMPCODE = '$empcode' ");
		   
		   
	    $sql = "SELECT EMPCODE FROM task where EMPCODE LIKE '$empcode'";
    $result = $conn->query($sql);
	
	
	  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  			 		 mysqli_query($conn,"UPDATE task SET EMPCODE = '0',
						 FULLNAME = 'UNASSIGNED'
						 WHERE EMPCODE = '$empcode' AND STATUS != 'Ready to Deploy' ");
		 
		 
	  
  }
	  }
	  
	  
	  
	echo "<script>toastr.success('Successfully deleted the Team member')</script>";

echo "<script>setTimeout(function(){
   window.location.reload();
}, 2000);</script>";
	 
		
	}if(isset($_COOKIE["editemp"])){ 


echo"<script>document.getElementById('blur').style.display = 'block';</script>";

		$empcode = $_COOKIE["editemp"];
		
	  $sql = "SELECT * FROM teammember where EMPCODE = '$empcode'";
	  
    $result = $conn->query($sql);


  // output data of each row
 $row = $result->fetch_assoc();
	  
	  $id = $row["EMPCODE"];
	  $dep = $row["DEPARTMENT"];
	 $title = $row["TITLE"];
	$tn = $row['TEAMNAME'];
	$skills = $row['SKILLS'];
	$break = $row['BREAK'];
	$interview = $row['INTERVIEW'];
$outsource = $row['OUTSOURCE'];
	
	 $str_arr2 = explode (",", $skills);
	 
	 
	$errors = array( 'dep' => '', 'title' => '');


	?>
		
		
		<div id="editemployeepopup" style="display:block;position:absolute;top:15%;left:30%;border:1px solid black;width:720px;height:940px;background:#E6E9EE;border-radius:15px">
		
		<center>
 
 <br>
 
 <h1 style="margin-left:2vw"> Edit Team Member Details  <button onclick="closeedit()" style="float:right;margin-right:10px;border:1px solid #E6E9EE;background:#E6E9EE"><i class="fa fa-close"  style="float:right;margin-right:10px;font-size:30px;color:red" onclic="closeedit()"> </i> </button></h1><br>
 
 
  <h4 style="float:left;margin-left:2.2vw">Team Member Name : <?php echo $row['FIRSTNAME']. ' '.$row['LASTNAME']?></h4><br>
  
  
 <form method="post" action="employee.php" style="margin-top:30px;" >

<select  name="dep" id="dep" style="border-radius: 8px;border: 1px solid grey;width:650px;padding: 5px 5px;font-family:Arial"  value="<?php echo $dep?>" autocomplete="off">

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
  </select><br><br><br>
  

<input type="text" placeholder = "Job Title" id="jt" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $title?>" autocomplete="off" > <br><br>



<input type="text" placeholder = "Team Name" id="tn" size="90" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" value="<?php echo $tn?>" autocomplete="off"> <br><br><br>

<div style="float:left;margin-left:2.2vw">Leave :</div>   <select name="leave" id="leaves" value="<?php echo $break?>" style="width:535px;padding: 5px 5px;border-radius: 5px;font-family:Arial;margin-right:-1.8vw" autocomplete="off"  >
  <option value="<?php echo $break?>"><?php echo $break?></option>
  <?php if($break == "On Leave"){?>
	  
	   <option value="No">No</option>
	  
 <?php }else{?>
 
    <option value="On Leave">Yes</option>
   
   
 <?php }?>
 
	</select> <br><br><br>



<div style="float:left;margin-left:2.2vw">Admin :</div>  <select name="interview" id="interviews" value="<?php echo $interview?>" style="width:535px;padding: 5px 5px;border-radius: 5px;font-family:Arial;margin-right:-1.3vw"  autocomplete="off">
  <option value="<?php echo $interview?>"><?php echo $interview?></option>
    <option value="No">No</option>
   <option value="Conducting Interviews">Conducting Interviews</option>
	 <option value="Meetings">Meetings</option>
	  <option value="Emails">Emails</option>
	   <option value="Stand-up">Stand-up</option>
	   <option value="training">training</option>
	   <option value="knowledge sharing">knowledge sharing</option>
	</select><br><br><br>
	
	
<div style="float:left;margin-left:2.2vw">Outsource :</div>  <select name="outsource" id="outsources" value="<?php echo $outsource?>" style="width:535px;padding: 5px 5px;border-radius: 5px;font-family:Arial;margin-right:0.8vw"  >
  <option value="<?php echo $outsource?>"><?php echo $outsource?></option>
  <?php if($outsource == "Yes"){?>
	  
	   <option value="No">No</option>
	  
 <?php }else{?>
 
    <option value="Yes">Yes</option>
   
   
 <?php }?>
 
	</select><br><br><br>
	
<select id="skills1" name="skills1" style="border-radius: 8px;border: 1px solid grey;width:660px;padding: 5px 5px;font-family:Arial" value="<?php echo $skills1?>" autocomplete="off">

 <option value="<?php echo $str_arr2[0]?>"><?php echo $str_arr2[0]?></option>


<?php   $sql = "SELECT DISTINCT SKILLS FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

  $skillarray = array();
  
if ($result->num_rows > 0) {

 
  while($row = $result->fetch_assoc()) {  
  
   
  $str_arr = explode (",", $row["SKILLS"]);
  
 
  
  array_push($skillarray,$str_arr[0],$str_arr[1],$str_arr[2]);
  }
}


$skillarray = array_filter($skillarray);

$skillarray = array_unique($skillarray);


foreach ($skillarray as $value) {
  ?>
  
  <option value="<?php echo $value ?>" > <?php echo ucwords(strtolower($value)) ?></option>


<?php } ?>
              

        </select><br><br>
		
		
		        <select id="skills2" name="skills2"  style="border-radius: 8px;border: 1px solid grey;width:660px;padding: 5px 5px;font-family:Arial" value="<?php echo $skills3?>"  autocomplete="off">

 <option value="<?php echo $str_arr2[1]?>"><?php echo $str_arr2[1]?></option>


<?php   $sql = "SELECT DISTINCT SKILLS FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

  $skillarray = array();
  
if ($result->num_rows > 0) {

 
  while($row = $result->fetch_assoc()) {  
  
   
  $str_arr = explode (",", $row["SKILLS"]);
  
 
  
  array_push($skillarray,$str_arr[0],$str_arr[1],$str_arr[2]);
  }
}


$skillarray = array_filter($skillarray);

$skillarray = array_unique($skillarray);


foreach ($skillarray as $value) {
  ?>
  
  <option value="<?php echo $value ?>" > <?php echo ucwords(strtolower($value)) ?></option>


<?php } ?>
              

        </select> <br><br>
		
		
		        <select id="skills3" name="skills3" style="border-radius: 8px;border: 1px solid grey;width:660px;padding: 5px 5px;font-family:Arial" value="<?php echo $skills2?>" autocomplete="off">


 <option value="<?php echo $str_arr2[2]?>"><?php echo $str_arr2[2]?></option>


<?php   $sql = "SELECT DISTINCT SKILLS FROM teammember WHERE ISDELETED = 'NO'";
    $result = $conn->query($sql);

  $skillarray = array();
  
if ($result->num_rows > 0) {

 
  while($row = $result->fetch_assoc()) {  
  
   
  $str_arr = explode (",", $row["SKILLS"]);
  
 
  
  array_push($skillarray,$str_arr[0],$str_arr[1],$str_arr[2]);
  }
}


$skillarray = array_filter($skillarray);

$skillarray = array_unique($skillarray);


foreach ($skillarray as $value) {
  ?>
  
  <option value="<?php echo $value ?>" > <?php echo ucwords(strtolower($value)) ?></option>


<?php } ?>
              

        </select><br><br>
	
	

<input type="submit" class="editingemp"  id="<?php echo $id?>" name="editemp" value="Save Changes" size="50" style="border-radius: 8px;border: 1px solid grey;padding: 10px 9px; width:330px;background:#02376E;color:#FFFFFF;cursor:pointer"> <br><br><br> 


</form>

<input type="text" id="val2" size="70" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;font-family:Arial" autocomplete="off"> <button onclick="insertValue2();" style="padding:7px;border-radius: 8px;;border: 1px solid grey;background:#E6E9EE;margin-bottom:5vw;cursor:pointer">Add Skill</button>


        <Script>



            function insertValue2()

            {

                var select = document.getElementById("skills1"),

                txtVal = document.getElementById("val2").value;

                txtVal = txtVal.toLowerCase();

                console.log(displayResult(txtVal))

				if(displayResult2(txtVal) == "Found"){
					
					console.log("Can't add")
					
				}else if (displayResult(txtVal) == "Not Found"){
					
                newOption = document.createElement("OPTION"),

                txtVal = Capitalize2(txtVal);
				
                newOptionVal = document.createTextNode(txtVal);
				
                newOption.appendChild(newOptionVal);

                select.insertBefore(newOption,select.lastChild);
					
				var select = document.getElementById("skills2"),

                txtVal = document.getElementById("val2").value;

                txtVal = txtVal.toLowerCase();	
					
				newOption = document.createElement("OPTION"),

txtVal = Capitalize2(txtVal);

                newOptionVal = document.createTextNode(txtVal);
				
                newOption.appendChild(newOptionVal);

                select.insertBefore(newOption,select.lastChild);


				var select = document.getElementById("skills3"),

                txtVal = document.getElementById("val2").value;

                txtVal = txtVal.toLowerCase();	
					
				newOption = document.createElement("OPTION"),

txtVal = Capitalize2(txtVal);

                newOptionVal = document.createTextNode(txtVal);
				
                newOption.appendChild(newOptionVal);

                select.insertBefore(newOption,select.lastChild);

				
				}
				
            }
			
			
			function displayResult2(y) {
    var x = document.getElementById("skills1");
	
	y = Capitalize2(y);
	
    var i;
	var txt = "";
	
    for (i = 0; i < x.length; i++) {
        txt = txt + "\n" + x.options[i].text;
		
	   if(y == x.options[i].text){
		   
		  return "Found"
		   
	   }else if (y != x.options[i].text && i==x.length-1) {

            return "Not Found"
		   
		
	   }
	   
	   
	   
    }
	


}



function Capitalize2(x){
	
	const str = x;

    const capitalized = str.charAt(0).toUpperCase() + str.slice(1);

    return capitalized;

}



        </Script>
		
		
</center>

</div>
		  
		
	<?php }else if(isset($_COOKIE["editedemp"])){
		
		
		
		
		 		$details = $_COOKIE["editedemp"];
		
		 $date = date('Y/m/d');

		 $str_arr = explode ("@#", $details); 
		 
		 
        $newstring  = str_replace(':', ',', $str_arr[4]);
		 
		$str_arr[1] = validation2(trim($str_arr[1]));
		$str_arr[2] = validation2(trim($str_arr[2]));
		$str_arr[3] = validation2(trim($str_arr[3]));
		

			 mysqli_query($conn, "UPDATE teammember SET DEPARTMENT = '$str_arr[1]' ,
		 TITLE = '$str_arr[2]' ,
		 TEAMNAME = '$str_arr[3]',
		 SKILLS = '$newstring',
		 BREAK = '$str_arr[5]' ,
		 INTERVIEW = '$str_arr[6]' ,
		 OUTSOURCE = '$str_arr[7]' ,
		 LASTUPDATED = '$date' 
		 WHERE EMPCODE = '$str_arr[0]'");
		 
		 
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



<button onclick="topFunction()" id="myBtn" style="background-color:#E6E9EE;border:1px solid #E6E9EE;float:right;margin-right:2vw;cursor:pointer"> <img src="./images/right-arrow.png" style="margin-top:0.9vw;margin-left:-1vw;height:3vw;width:3vw;cursor:pointer"></button>


<br><br>

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
         document.getElementById("editemployeepopup").style.display = "none";
document.getElementById("blur").style.display = "none";
}




function showerrormessage()
{
	document.getElementById("errormessage").style.display = "none";
 
}

function showsuccess()
{
	document.getElementById("created").style.display = "none";
 
}


function test(NUMBER)
{

	window.location.replace('http://localhost/dashboard/Intellix/EmployeeProfile.php?empcode='+NUMBER);
 
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
 
 var postid = $(this).attr('id');


	 if (confirm('Are you sure you wish to delete this Team member?')) {
  // Save it!
     createCookie("deleteemp", postid, "10");
	 
	
	 
	 
} else {
  // Do nothing!
  console.log('Cancel');
}

		
		
 });



$("button.edit").click(function(){
 
 var postid = $(this).attr('id');


	 createCookie("editemp", postid, "10");
	 
	
		
		
 });
 
 
  $("input.editingemp").click(function(){
 
 var postid = $(this).attr('id');


dep = document.getElementById('dep').value;
title = document.getElementById('jt').value;
team = document.getElementById('tn').value;
skills1 = document.getElementById('skills1').value;
skills2 = document.getElementById('skills2').value;
skills3 = document.getElementById('skills3').value;
leave = document.getElementById('leaves').value;
interview = document.getElementById('interviews').value;
outsource = document.getElementById('outsources').value;

combinedskills = skills1 + ":" + skills2 + ":" + skills3


all = postid + '@#' +  dep + '@#' + title + '@#' +  team + '@#' +  combinedskills +  '@#' +  leave + '@#' +  interview + '@#' +  outsource;



createCookie("editedemp", all , "10");
		
		
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


