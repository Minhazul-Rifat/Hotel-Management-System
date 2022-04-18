<?php
include 'config.php';
include 'function.php';
$conn=databaseConnect();
$roomList=array();
if (isset($_GET['category-id'])) {
  $id=$_GET['category-id'];
  $roomList=getRoom($conn, $id);
}
$message="";
$customer=array();
if(isset($_POST['action'])){
   $actionName=$_POST['action'];
   $seat_id=$_POST['seat_id'];
   $cusmer_name=$_POST['cusmer_name'];
   $customer_email=$_POST['customer_email'];
   $customer_phone=$_POST['customer_phone'];
   $booking_date=$_POST['booking_date'];
   $release_date=$_POST['release_date'];
   if($actionName =="createCustomer"){
        $customerinfo=customerinsertion($conn,$seat_id,$cusmer_name,$customer_email,
        $customer_phone,$booking_date,$release_date);
   }else{
       $id=$_POST['id'];
       $customerinfo=customerUpdate($conn,$seat_id,$cusmer_name,$customer_email,$customer_phone,
       $booking_date,$release_date,$id);
   }
   
   if($customerinfo){
      $message="Customer hase been created successfully";
      unset($_POST['action']);
      header("Location:".BASE_URL."custo_info_table.php");
   }else{
      $message="Customer creation has been failed";
   }
}

if(isset($_GET['action'])){
   
   $customerId=$_GET['id'];
   $customer=getcustomer($conn,$customerId);
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
  height: 800px;
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
    color: #FF5733;
}
p{
  padding-top: 50px;
}
input[type=text],.room{
    width: 25%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    padding: 12px 20px 12px 40px;
}
input[type=email] {
    width: 25%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    padding: 12px 20px 12px 40px;
}
input[type=date] {
    width: 25%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    padding: 12px 20px 12px 40px;
}
table {
    border-collapse: collapse;
    width: 30%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #FCF3CF}

th {
    background-color: #4CAF50;
    color: white;
}

</style>
</heaad>
<body>
<div id="wrapper">
  <div id="banner"><h1>Welcome To Anastasia Five Star Hotel</h1>></div>
  <div id="menutop">
   <ul>
  <li><a class="active" href="http://localhost:8084/myphp/hotel_management2.php">HOME</a></li>
  <li><a href="http://localhost:8084/myphp/hotel_management3.php"> ADMIN</a></li>
  <li><a href="http://localhost:8084/myphp/custo_info_table.php">CUSTOMER LIST</a></li>
   </ul>
  </div>
  <div id="columleft"> 
  </div>
  <div id="columright">

  </div>
  <div id="content">
  <h2>Customer Registration</h2>
<form action="hotel_management4.php" method="post">
<h1><?php echo $message;?></h1>
  <?php 
   if(!empty($customer)){
     echo '<input type="hidden" name="id" value="'.$customer[0]['id'].'">';
   }
  ?>
<input type="hidden" name="action" 
  value="<?php echo !empty($customer)?"updatecustomer":"createCustomer";  ?>">

<h3>Available Room List:</h3>
  <select class="room" name="seat_id">
  <?php foreach ($roomList as $key => $value):?>
    <option value="<?php echo $value['id'];?>"><?php echo $value['room'];?></option>
  <?php endforeach;?>
  </select>
  <h3>Customer Name:</h3>
  <input type="text" name="cusmer_name" placeholder="customer Name" required="" 
   value="<?php echo !empty($customer)?$customer[0]['cusmer_name']:"";  ?>">
  <h3>Customer Email</h3>
  <input type="email" name="customer_email" placeholder="email" required="" 
  value="<?php echo !empty($customer)?$customer[0]['customer_email']:"";  ?>">
  <h3>Phone Number</h3>
  <input type="text" name="customer_phone" placeholder="Phone Number" required="" 
  value="<?php echo !empty($customer)?$customer[0]['customer_phone']:"";  ?>">
  <br><br>

    <h3>Booking Date</h3>
  <input type="date" name="booking_date" placeholder="booking_date" required="">

  <h3>Release Date</h3>
  <input type="date" name="release_date" placeholder="release_date" required="">

  <br><br>
  <input type="submit" value="submit">
</form>
  </div>
  <div id="footer"></div>
</div>

</body>
</html>

<?php 
databaseClose($conn);
?>