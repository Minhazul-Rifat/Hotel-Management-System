<?php 
include 'config.php';
include 'function.php';
$conn=databaseConnect();
$customerList=getcustomer($conn);
if(isset($_GET['action'])){
    $action=$_GET['action'];
    $id=$_GET['id'];
    if($action=="delete"){
       $deleted=customerdelete($conn, $id);
       if($deleted){
           unset($_GET['action']);
           header("Location:".BASE_URL."custo_info_table.php");
       }else{
           unset($_GET['action']);
           header("Location:".BASE_URL."custo_info_table.php");
       
       }
    }else if($action=="edit"){

    }
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
    color: #ff0040;
}
h2 {
    color: #FF5733;
}
table {
    border-collapse: collapse;
    width: 30%;
    margin-left: auto;
    margin-right: auto;
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
  <li><a href="http://localhost:8084/myphp/hotel_management2.php">HOME</a></li>
  <li><a href="http://localhost:8084/myphp/hotel_management3.php"> ADMIN</a></li>
  <li><a href="http://localhost:8084/myphp/Employee_list.php"> EMPLOYEE</a></li>
  <li><a href="http://localhost/myphp/order.php"></a></li>
  
   </ul>
  </div>
  <div id="columleft">

  </div>
  <div id="columright"></div>
  <div id="content">
    <h2>CUSTOMER INFORMATION</h2>
<table>
  <tr>
    <th>customer_Id</th>
    <th>seat_id</th>
    <th>cusmer_name</th>
    <th>customer_email</th>
    <th>customer_phone</th>
    <th>booking_date</th>
    <th>release_date</th>
    <th>action</th>
  </tr>
  <?php 
  $i=0;
  foreach ($customerList as $key => $value):
    $i++;
    ?>
    <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $value['seat_id'];?></td>
    <td><?php echo $value['cusmer_name'];?></td>
    <td><?php echo $value['customer_email'];?></td>
    <td><?php echo $value['customer_phone'];?></td>
    <td><?php echo $value['booking_date'];?></td>
    <td><?php echo $value['release_date'];?></td>
    <td><a href="<?php echo BASE_URL?>hotel_management4.php?id=<?php echo $value['id']?>&action=edit"></a>|<a href="<?php echo BASE_URL?>custo_info_table.php?id=<?php echo $value['id']?>&action=delete">delete</a></td>
  </tr>
  <?php endforeach;?>
</table>
  </div>
  <div id="footer"></div>
</div>

</body>
</html>
<?php databaseClose($conn);?>