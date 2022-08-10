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

<br><br><br><br><br><br><br><br><br>



  

<style>


*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

/*Navigation Bar */
body {margin:0;

background-color:red;
}




.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}

.home-section nav{
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}

.home-section nav .sidebar-button{
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}
nav .sidebar-button i{
  font-size: 35px;
  margin-right: 10px;
}
.home-section nav .search-box{
  position: relative;
  height: 50px;
  max-width: 550px;
  width: 100%;
  margin: 0 20px;
}
nav .search-box input{
  height: 100%;
  width: 100%;
  outline: none;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}
nav .search-box .bx-search{
  position: absolute;
  height: 40px;
  width: 40px;
  background: #2697FF;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 4px;
  line-height: 40px;
  text-align: center;
  color: #fff;
  font-size: 22px;
  transition: all 0.4 ease;
}
.home-section nav .profile-details{
  display: flex;
  align-items: center;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  height: 50px;
  min-width: 190px;
  padding: 0 15px 0 2px;
}
nav .profile-details img{
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}

nav .profile-details .admin_name{
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
}

nav .profile-details i{
  font-size: 25px;
  color: #333;
}

.home-section .home-content{
  position: relative;
  padding-top: 104px;
}
.home-content .overview-boxes{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 20px;
  margin-bottom: 26px;
  color: #18114a;
}
.overview-boxes .box{
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% / 4 - 15px);
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.overview-boxes .box-topic{
  font-size: 20px;
  font-weight: 500;
}
.home-content .box .number{
  display: inline-block;
  font-size: 35px;
  margin-top: -6px;
  font-weight: 500;
  color: #18114a;
}
.home-content .box .indicator{
  display: flex;
  align-items: center;
}
.home-content .box .indicator i{
  height: 20px;
  width: 20px;
  background: white;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  color: #18114a;
  font-size: 20px;
  margin-right: 5px;
}
.box .indicator i.down{
  background: #e87d88;
}
.home-content .box .indicator .text{
  font-size: 12px;

}
.home-content .box .cart{
  display: inline-block;
  font-size: 32px;
  height: 50px;
  width: 50px;
  background:white;
  line-height: 50px;
  text-align: center;
  color: #66b0ff;
  border-radius: 12px;
  margin: -15px 0 0 6px;
}
.home-content .box .cart.two{
   color: #2BD47D;
   background: white;
 }
.home-content .box .cart.three{
   color: #ffc233;
   background: #ffe8b3;
 }
.home-content .box .cart.four{
   color: #e05260;
   background: #f7d4d7;
 }
.home-content .total-order{
  font-size: 20px;
  font-weight: 500;
}
.home-content .project-boxes{
  display: flex;
  justify-content: space-between;
  /* padding: 0 20px; */
}

/* left box */
.home-content .project-boxes .recent-project{
  width: 65%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.home-content .project-boxes .project-details{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.project-boxes .box .title{
  font-size: 24px;
  font-weight: 500;
  color: #18114a;
  /* margin-bottom: 10px; */
}
.project-boxes .project-details li.topic{
  font-size: 20px;
  font-weight: 500;
  
}
.project-boxes .project-details li{
  list-style: none;
  margin: 8px 0;
}
.project-boxes .project-details li a{
  font-size: 18px;
  color: #333;
  font-size: 400;
  text-decoration: none;
}
.project-boxes .box .button{
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.project-boxes .box .button a{
  color: #fff;
  background: white;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}
.project-boxes .box .button a:hover{
  background:  white;
}

/* Right box */
.home-content .project-boxes .top-project{
  width: 35%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.project-boxes .project-sales li{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 10px 0;
}
.project-boxes .project-sales li a img{
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
}
.project-boxes .project-sales li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.project-boxes .top-project li .product,
.price{
  font-size: 17px;
  font-weight: 400;
  color: #333;
}

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



 background-color: #ffffff;

}


/* Responsive Media Query */
@media (max-width: 1240px) {

  .home-section{
    width: calc(100% - 60px);
    left: 60px;
  }

  
  .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
  }
 
}
@media (max-width: 1150px) {
  .home-content .sales-boxes{
    flex-direction: column;
  }
  .home-content .sales-boxes .box{
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
	
  }
  .home-content .sales-boxes .top-sales{
    margin: 0;
  }
}
@media (max-width: 1000px) {
  .overview-boxes .box{
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i{
    display: none;
  }
  .home-section nav .profile-details{
    height: 50px;
    min-width: 40px;
  }
  .home-content .sales-boxes .sales-details{
    width: 560px;
  }
}
@media (max-width: 550px) {
  .overview-boxes .box{
    width: 100%;
    margin-bottom: 15px;
  }
  .sidebar.active ~ .home-section nav .profile-details{
    display: none;
  }
}
  @media (max-width: 400px) {
  .sidebar{
    width: 0;
  }
  .sidebar.active{
    width: 60px;
  }
  .home-section{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section{
    left: 60px;
    width: calc(100% - 60px);
  }
  .home-section nav{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section nav{
    left: 60px;
    width: calc(100% - 60px);
  }
}


#circle{
    width:100px;
    height:100px;
	border:3px black solid;
	text-align: center;
	margin-left: 30px;
	border-radius: 50%;
	background: #0C83FA;
    position: relative;
	border-collapse: collapse;
	}
  
.lines {
    width: 100%;
    border: 1px black solid;
    position: absolute;
	border-collapse: collapse;
}

  .home-content .project-boxes .recent-project{
    /*width: 65%;*/
    background: #fff;
    padding: 20px 30px;
    margin: 0 20px;
    border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    width: 180rem;

  /* From https://css.glass */
 background: rgba(255, 255, 255, 0.25);
  border-radius: 16px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(4.5px);
  -webkit-backdrop-filter: blur(4.5px);
  border: 1px solid rgba(255, 255, 255, 0.3);
  }
  
  
  .project-boxes .box .title{
  font-size: 24px;
  font-weight: 500;
  /* margin-bottom: 10px; */
}
.project-boxes .project-details li.topic{
  font-size: 20px;
  font-weight: 500;
}
.project-boxes .project-details li{
  list-style: none;
  margin: 8px 0;
}
.project-boxes .project-details li a{
  font-size: 18px;
  color: #333;
  font-size: 400;
  text-decoration: none;
}
.project-boxes .box .button{
  width: 100%;
  display: flex;
  justify-content: flex-end;
}
.project-boxes .box .button a{
  color: #fff;
  background: #0A2558;
  padding: 4px 12px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.3s ease;
}


@font-face {
  font-family: 'icomoon';
  src: url("data:application/x-font-ttf;charset=utf-8;base64,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") format('truetype');
  font-weight: normal;
  font-style: normal;
  font-display: block;
}

[class^="icon-"], [class*=" icon-"] {
	font-family: 'icomoon';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;

	/* Better Font Rendering =========== */
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.icon-spinner:before {
	content: "\e000";
}


@keyframes anim-rotate {
	0% {
		transform: rotate(0);
	}
	100% {
		transform: rotate(360deg);
	}
}
.spinner {
	display: inline-block;
	font-size:3em;
	height: 0.85em;
	line-height: 1;
	margin: .5em;
	animation: anim-rotate 2s infinite linear;
	color: #0d4a78;
	text-shadow: 0 0 .25em rgba(255,255,255, .3);
}
.spinner--steps {
	animation: anim-rotate 1s infinite steps(8);
}
.spinner--steps2 {
	animation: anim-rotate 1s infinite steps(12);
}


a{
  color:#09f;
}

 
.fa-beat:hover {
  animation:fa-beat 5s ease infinite;
  cursor:pointer;
}
@keyframes fa-beat {
  0% {
    transform:scale(1);
  }
  5% {
    transform:scale(1.25);
  }
  20% {
    transform:scale(1);
  }
  30% {
    transform:scale(1);
  }
  35% {
    transform:scale(1.25);
  }
  50% {
    transform:scale(1);
  }
  55% {
    transform:scale(1.25);
  }
  70% {
    transform:scale(1);
  }
}

.heart {
  color:#f95d53;
}

.rotate:hover {
  animation: rotation 20s infinite linear;
   cursor:pointer;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}


</style>

<body style="background-color: #E6E9EE;">

 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="home-content" style="background-color: #E6E9EE;">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total</div><br>
            <div class="number"><?php

$sql = "SELECT * FROM project WHERE ISDELETED='NO'";
    $result = $conn->query($sql);


$num_rows = mysqli_num_rows($result);



echo $num_rows;

			?></div>
            <div class="indicator">
            </div>
          </div>
          <img  class ="rotate" src=".\Images\total_project.png" height="90" width="90" style="margin-left:2vw">
          
		  

		  
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Completed</div><br>
            <div class="number"><?php

$sql = "SELECT * FROM project where STATUS = 'Ready for Deploy to Live' AND ISDELETED='NO'";
    $result = $conn->query($sql);


$num_rows = mysqli_num_rows($result);



echo $num_rows;

			?></div>
            <div class="indicator">
            </div>
          </div>
          <img class ="rotate" src=".\Images\Project_Completed.png" height="90" width="90" style="margin-left:2vw">
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">In Progress</div><br>
            <div class="number"><?php

$sql = "SELECT * FROM project where STATUS != 'Ready for Deploy to Live' AND STATUS != 'Neglected Work' AND ISDELETED='NO'";
    $result = $conn->query($sql);


$num_rows = mysqli_num_rows($result);



echo $num_rows;

			?></div>
            <div class="indicator">
            </div>
          </div>
  <img  class ="rotate" src=".\Images\inprogressicon.png" height="90" width="100" style="margin-left:2vw">
        </div>
        <div class="box" >
          <div class="right-side">
            <div class="box-topic">Overdue</div><br>
            <div class="number"><?php

$sql = "SELECT * FROM project where STATUS = 'Neglected Work' AND ISDELETED='NO'";
    $result = $conn->query($sql);


$num_rows = mysqli_num_rows($result);



echo $num_rows;

			?></div>
            <div class="indicator">  
            </div>
          </div>
         <p class="heart" style="margin-top:0.5vw;margin-left:2vw">
  <i class="fa fa-warning fa-5x fa-beat"></i>
</p>
        </div>
      </div>





      <div class="project-boxes">
        <div class="recent-project box" style="width:100%;background:white">
          <div class="title" style="margin-left:0.6vw">Recent Projects   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="float:right"> <select id="mySelect2" onchange="myFunction2()" style="border-radius:5px">


<option value="" disabled="disabled" selected="selected">More</option>

<?php




for($i=5;$i<=100;$i+=5){?>
	
	<option value="<?php echo $i ?>"> <?php echo $i ?></option>
	
	
<?php }


?>




		  </select></form></div>
          <div class="project-details">
            <table style="margin-top:10.5px; margin-left:10.5px; width: 100%;font-size:13px">
              <tr> 
                <th style="text-align:left; color: #18114a;font-size:15px">Project</th>
                <th style="text-align:left; color: #18114a;font-size:15px">Start Date</th>
                <th style="text-align:left; color: #18114a;font-size:15px">End Date</th>
                <th style="text-align:left;color: #18114a;font-size:15px">Department</th>
                <th style="text-align:left;color: #18114a;font-size:15px">Team Lead</th>
                <th style="text-align:left;color: #18114a;font-size:15px">Status</th>
              </tr>
			  
			            
     
		   
		   		 <?php  
				 
				 
				  if(isset($_COOKIE["projects"])){


					 $amount = $_COOKIE["projects"];
					 
					 $index = $amount/5;
					 
					 echo "<script> document.getElementById('mySelect2').selectedIndex = $index;</script>";
					 
					 
 $sql = "SELECT * FROM project WHERE ISDELETED='NO' ORDER BY LASTUPDATED DESC LIMIT $amount";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td style="text-align:left;"><?PHP echo $row['PROJECTNAME']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STARTDATE']?></td>
               <td style="text-align:left;"><?PHP echo $row['ENDDATE']?></td>
			   	<td style="text-align:left;"><?PHP echo $row['DEPARTMENT']?></td>
				<td style="text-align:left;"><?PHP echo $row['TEAMLEAD']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STATUS']?></td>

        
              </tr>
			  
			  
  <?php }
  
}				 
					 
				 }else{
					 
				 
				 
				 $sql = "SELECT * FROM project WHERE ISDELETED='NO' ORDER BY LASTUPDATED DESC LIMIT 5";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td style="text-align:left;"><?PHP echo $row['PROJECTNAME']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STARTDATE']?></td>
               <td style="text-align:left;"><?PHP echo $row['ENDDATE']?></td>
			   	<td style="text-align:left;"><?PHP echo $row['DEPARTMENT']?></td>
				<td style="text-align:left;"><?PHP echo $row['TEAMLEAD']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STATUS']?></td>

        
              </tr>
			  
			  
  <?php }
  
}
				 }
?>

         
            </table>
            
            
          </div>
        </div>
  
      </div><br>
	  
	  
	       <div class="project-boxes">
        <div class="recent-project box" style="width:100%;background:white">
          <div class="title" style="margin-left:0.6vw"> Recent Tasks  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="float:right"> <select id="mySelect" onchange="myFunction()" style="border-radius:5px">


	<option value="" disabled="disabled" selected="selected"> More </option>
	
<?php

	

for($i=5;$i<=100;$i+=5){?>
	
	<option value="<?php echo $i ?>"> <?php echo $i ?></option>
	
	
<?php }


?>




		  </select></form></div>
          <div class="project-details">
            <table style="margin-top:10.5px; margin-left:10.5px; width: 100%;font-size:13px">
              <tr>
                <th style="text-align:left;color: #18114a;font-size:15px">Task Name</th>
				<th style="text-align:left;color: #18114a;font-size:15px">Project Name</th>
                <th style="text-align:left;color: #18114a;font-size:15px">Start Date</th>
                <th style="text-align:left;color: #18114a;font-size:15px">End Date</th>
                <th style="text-align:left;color: #18114a;font-size:15px">Department</th>
                <th style="text-align:left;color: #18114a;font-size:15px">Assigned To</th>
                <th style="text-align:left;color: #18114a;font-size:15px">Status</th>
              </tr>
			  
			            
     
		   
		   		 <?php  
				 
				 
				 if(isset($_COOKIE["tasks"])){


					 $amount = $_COOKIE["tasks"];
					 
					 $index = $amount/5;
					 
					 echo "<script> document.getElementById('mySelect').selectedIndex = $index;</script>";
					 
					 
					 $sql = "SELECT * FROM task WHERE ISDELETED='NO' ORDER BY LASTADDED DESC,TASKID LIMIT $amount";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td style="text-align:left;"><?PHP echo $row['TASKNAME']?></td>
			     <td style="text-align:left;"><?PHP echo $row['PROJECTNAME']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STARTDATE']?></td>
               <td style="text-align:left;"><?PHP echo $row['ENDDATE']?></td>
			   	<td style="text-align:left;"><?PHP echo $row['DEPARTMENT']?></td>
				<td style="text-align:left;"><?PHP echo $row['FULLNAME']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STATUS']?></td>

        
              </tr>
			  
			  
  <?php }
  
}
					 
					 
				 }else{
				 
				 
				 
				 
				 
				 $sql = "SELECT * FROM task WHERE ISDELETED='NO' ORDER BY LASTADDED DESC,TASKID LIMIT 5";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) { ?> 
		  
              <tr>
			   <td style="text-align:left;"><?PHP echo $row['TASKNAME']?></td>
			     <td style="text-align:left;"><?PHP echo $row['PROJECTNAME']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STARTDATE']?></td>
               <td style="text-align:left;"><?PHP echo $row['ENDDATE']?></td>
			   	<td style="text-align:left;"><?PHP echo $row['DEPARTMENT']?></td>
				<td style="text-align:left;"><?PHP echo $row['FULLNAME']?></td>
			    <td style="text-align:left;"><?PHP echo $row['STATUS']?></td>

        
              </tr>
			  
			  
  <?php }
  
}

				 }
?>

         
            </table>
            
            
          </div>
        </div>
  
      </div>
	  
	  
    </div>
  </section>


<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
 createCookie("tasks", x , "10");
 
 window.location.replace('http://localhost/dashboard/Intellix/homepage.php');
 
}


function myFunction2() {
  var x = document.getElementById("mySelect2").value;
createCookie("projects", x , "10");

window.location.replace('http://localhost/dashboard/Intellix/homepage.php');

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



</script>


  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}




 </script>
 
 
<script>
		  
				  
$(document).ready(function(){
    var numLines = parseInt($('#circle').data('lines'));
    var theta = 180/(numLines/2);
    var center = $('#circle').innerWidth()/2;
    var currAngle = 0;
    
    for(var i = 0; i < numLines/2; i++){
        $('<div class="lines" style="' + setAngle(currAngle) +' top: ' + center + 'px; border-collapse: collapse"></div>').appendTo('#circle');
        currAngle += theta;
    }
});

function setAngle(theta) {
    return '-ms-transform: rotate('+ theta +'deg); -webkit-transform: rotate('+ theta +'deg); transform: rotate('+ theta +'deg);';
}


		  
</script>
		  

</body>

<br><br><br><br><br>


<?php include 'footer.php'?>

</html>
