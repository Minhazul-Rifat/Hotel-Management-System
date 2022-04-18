<?php 
  include 'config.php';
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
  height: 400px;
  /*background-color: #F1C40F;*/
  margin-left: 220px;
  text-align: center;
  padding-top: 80px;
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
    color: #E59866;
}
input[type=text] {
    width: 25%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    padding: 12px 20px 12px 40px;
}
input[type=password] {
    width: 25%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    padding: 12px 20px 12px 40px;
}

</style>
</heaad>
<body>
<div id="wrapper">
  <div id="banner"><h1>Welcome To Anastasia Five Star Hotel</h1>></div>
  <div id="menutop">
   <ul>
  <li><a class="active" href="<?php echo BASE_URL;?>hotel_management2.php">HOME</a></li>
  <li><a href="<?php echo BASE_URL;?>hotel_management3.php"> ADMIN</a></li>
  
   </ul>
  </div>
  <div id="columleft"> 
  </div>
  <div id="columright"></div>
  <div id="content">
  <h2>ADMIN LOGIN</h2>
<form action="validate_admin_login.php" method="post">
  <h3>User name:</h3>
  <input type="text" id="user" name="username" placeholder="Name" required>
  <h3>Admin password:</h3>
  <input type="password" id="pass" name="password" placeholder="Password" required>
  <br><br>
  <input type="submit" id="btn" value="log in">
</form>
  </div>
  <div id="footer"></div>
</div>

</body>
</html>