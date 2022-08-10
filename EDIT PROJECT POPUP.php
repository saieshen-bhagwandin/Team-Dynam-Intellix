<html>



 <head>
 
   <title>EDITING PROJECT</title>
 </head>
 
 <?php ?>
 
 
<body>

<div class="add"  onclick="showpopup()" style="width:160px;height:40px;border:1px solid black;padding:10px;border-radius:15px;margin-left:10px;">

<div class="font" style="float:left;margin-top:10px;margin-right:10px">EDIT PROJECT </div> 

<img src=".\Images\plus.png" height="35" width="35" style="float:right;margin-right:10px;position:absolute">

</div>



<div id="popup" style="display:none;position:absolute;top:15%;left:35%;border:1px solid black;width:700px;height:780px;background:#E6E9EE;border-radius:15px">

<?php 

$errors = array( 'ed' => '');

 $pdes = $pm = $sdm = $ba = $sd = $ed = $dep = $status = $comm = $tl = ""; 


 if (isset($_POST["editproject"])) {


  
  
    if($_POST["startdate"]>$_POST["enddate"]){
		 
		 $errors['sd'] = "Timeline of project is incorrect";
		 
	 }
	 
	 $pdes = $_POST['pdes'];
	$pm = $_POST['pm'];
	$sdm = $_POST['sdm'];
	$ba = $_POST['ba'];
	$sd = $_POST['startdate'];
	$ed = $_POST['enddate'];
	$dep = $_POST['dept'];
	$status = $_POST['status'];
	$comm = $_POST['comment'];
	$tl = $_POST['tl']; 
		   

   if(array_filter($errors)){
	   
	 
	  
	  echo "<script>alert('Failure to edit project')</script>";
	  
	   echo "<script>document.getElementById('popup').style.display = 'block';</script>";
	  
	  

;
	
	 
	  
  }else{
	  
	   echo "<script>alert('Successfully edited project')</script>";
	   
	 $pdes = $pm = $pm = $sdm = $ba = $sd = $ed = $dep = $status = $comm = ""; 
  }
	 
 }


?>



<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
textarea {
  width: 540px;
  height: 70px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 1px solid #848A91;
  border-radius: 8px;
  background-color: #f8f8f8;
  font-size: 16px;
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
  border: 1px solid #c4c4c4;
  border-radius: 5px;
    border: 1px solid #848A91;
  background-color: #fff;
  padding: 5px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 460px;
}

.ed {
  border: 1px solid #c4c4c4;
  border-radius: 5px;
    border: 1px solid #848A91;
  background-color: #fff;
  padding: 5px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 460px;
}

</style>








 <center>
 
 <h1> Edit Project Details </h1>
 
 <form method="post" action="EDIT%20PROJECT%20POPUP.php" style="margin-top:30px;" >

   <textarea name = "pdes" placeholder="Project Description" id="pdes" value="<?php echo $pdes?>" style="font-family:Calibri;"></textarea><br><br>
   
<input type="text" placeholder = "Project Manager" name="pm" size="70" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;" value="<?php echo $pm?>" > <br><br>

<input type="text" placeholder = "Service Delivery Manager" name="sdm" size="70" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;" value="<?php echo $sdm?>" > <br><br>

<input type="text" placeholder = "Bussiness Analyst" name="ba" size="70" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;" value="<?php echo $ba?>" > <br><br>


  Start Date :  <input type="date" class="sd" name="startdate" id="startdate" value="<?php echo $sd?>" style="font-family:Calibri;"><br><br>


 End Date :  <input type="date" class="ed" name="enddate" id="enddate" value="<?php echo $ed?>" style="font-family:Calibri;"><br><br>

 
 <input type="text" placeholder = "Department" name="dept" size="70" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;" value="<?php echo $dep?>" > <br><br>


<input type="text" placeholder = "Team Lead" name="tl" size="70" style="border-radius: 8px;border: 1px solid grey;padding: 10px 11px;" value="<?php echo $tl?>" > <br><br>


Update Status :  <select name="status" id="status" style="width:430px;padding: 5px 5px;border-radius: 5px;" value="<?php echo $status?>">
<option value="new">New</option>
    <option value="">Neglected Work</option>
    <option value="">Unplanned Work</option>
    <option value="">Uknown Dependencies</option>
    <option value="">Bussiness Testing</option>
	<option value="">Conflicting Priorites</option>
	<option value="">Outsource</option>
	<option value="">Code Review</option>
	<option value="">Blocked</option>
	<option value="">QA Failed</option>
	<option value="">Ready for Deploy to Live</option>
	<option value="">QA</option>
	<option value="">Rose(10)</option>
	<option value="">PMO</option>
	<option value="">Selina(19)</option>
	<option value="">Sive(8)</option>
	<option value="">Devops(5)</option>
	<option value="">Nivash(6)</option>
	<option value="">DBA(6)</option>
	<option value="">Vithasha(4)</option>
	<option value="">Imbedded Outsource Devs</option>
  </select><br><br>
  
  <textarea name="comment" placeholder="Add Comment" value="<?php echo $comm?>" style="font-family:Calibri;"></textarea><br><br>
  
<input type="submit" id= "create"name="editproject" value="Edit project" size="50" style="border-radius: 8px;border: 1px solid grey;padding: 10px 9px; width:330px;background:#02376E;color:#FFFFFF;"> <br><br><br> 


</form>
</center>

</div>
 

<script >

function showpopup()
{
     if( document.getElementById("popup").style.display == "none"){
    document.getElementById("popup").style.display = "block";
	 }else{
		 
		 document.getElementById("popup").style.display = "none"
	 }
}


</script>


</body>