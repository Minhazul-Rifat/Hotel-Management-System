<?php 
include 'config.php';
include 'function.php';
$conn=databaseConnect();
$message="";
$employee=array();
if(isset($_POST['action'])){
   $actionName=$_POST['action'];
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   if($actionName =="createEmployee"){
       $employeeinfo=employeeinsertion($conn, $name, $email,$phone);
   }else{
       $id=$_POST['id'];
       $employeeinfo=employeeUpdate($conn, $name, $email,$phone,$id);
   }
   
   if($employeeinfo){
      $message="Employee hase been created successfully";
      unset($_POST['action']);
      header("Location:".BASE_URL."Employee_list.php");
   }else{
      $message="Employyee creation has been failed";
   }
}

if(isset($_GET['action'])){
   
   $employeeId=$_GET['id'];
   $employee=getEmployee($conn,$employeeId);
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Anastasia&Rosalee</title>
<style >
body {
    background-image: url("images/wallpaper.jpg");
    background-size: cover;
}
#wrapper{
  width:1340px;
  height: 900px;
  /*background-color:#85C1E9;*/

}
#banner{
  width:1340px;
  height: 350px;
  /*background-color: #F0B27A;*/
  background-image: url("images/Anastasia.jpg");
  opacity: 0.9;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 3px 2px #DEB887;
  word-spacing: 10px;
}
#menutop{
  width:1340px;
  height: 31px;
  /*background-color: #27AE60;*/
}
   ul {
    list-style-type: none;
    margin: 0;
    padding: 10;
    overflow: hidden;
    background-color:#ffe6e6;
}

li {
    float: left;
}

li a {
    display: block;
    color: black;
    text-align: center;
    padding: 7px 12px;
    text-decoration: none;
}

li a:hover {
    background-color:#ccff90;
}
#columleft{
  width:250px;
  height: 450px;
  /*background-color: #E74C3C;*/
  float: left; 
}
#columright{
  width:250px;
  height: 450px;
  /*background-color: #E74C3C;*/
  float: right; 
}
#content{
  width:900px;
  height: 450px;
  /*background-color: #F1C40F;*/
  margin-left: 220px;
  text-align: center;
}
#footer{
  width:1340px;
  height: 65px;
  /*background-color: #5D6D7E;*/
}
h3 {
    color: white;
}
h2 {
    color: #80ff00;
}
h4{
   color: #80ff00;
   padding-top: 50px;
}

</style>
</heaad>
<body>
<div id="wrapper">
  <div id="banner"><h1>Welcome To Anastasia Five Star Hotel</h1>></div>
  <div id="menutop">
   <ul>
  <li><a class="active" href="http://localhost:8084/myphp/hotel_management2.php">HOME</a></li>
  <li><a href="http://localhost:8084/myphp/Seat_info.php">SEAT INFO</a></li>
  <li><a href="http://localhost:8084/myphp/Employee_list.php"> EMPLOYEE INFO </a></li>
   <li><a href="http://localhost:8084/myphp/custo_info_table.php"> CUSTOMER INFO </a></li>
   
   </ul>
  </div>
  <div id="columleft"> 
   <h2>Employee Registration</h2>
<form action="Admi_work.php" method="post">
  <h1><?php echo $message;?></h1>
  <?php 
   if(!empty($employee)){
     echo '<input type="hidden" name="id" value="'.$employee[0]['id'].'">';
   }
  ?>
  <input type="hidden" name="action" 
  value="<?php echo !empty($employee)?"updateEmployee":"createEmployee";  ?>">
  <h3>Employee Name:</h3>
  <input type="text" name="name" placeholder="Employee Name" required="" 
   value="<?php echo !empty($employee)?$employee[0]['name']:"";  ?>">
  <h3>Email</h3>
  <input type="email" name="email" placeholder="email" required="" 
  value="<?php echo !empty($employee)?$employee[0]['email']:"";  ?>">
  <h3>Phone Number</h3>
  <input type="text" name="phone" placeholder="Phone Number" required="" 
  value="<?php echo !empty($employee)?$employee[0]['phone']:"";  ?>">
  <br><br>
  <input type="submit" value="submit">
</form>
  </div>
  <div id="columright">
  </div>
  <div id="content">

  </div>
  <div id="footer"></div>
</div>

</body>
</html>
<?php 
databaseClose($conn);
?>