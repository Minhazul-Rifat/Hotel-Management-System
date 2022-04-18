<?php 
include 'function.php';
$conn=databaseConnect();
$categoryData=getCategory($conn);

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
      color: white;
      padding-top: 90px;
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
    </ul>
  </div>
  <div id="columleft"> 

  </div>
  <div id="columright">

  </div>
  <div id="content">
    <h2>SELECT ROOM TYPE</h2>
    <form action="hotel_management4.php"method="get">
      <select class="room" name="category-id" required="">
        <?php foreach ($categoryData as $key => $value):?>
          <option value="<?php echo $value['id']?>"><?php echo $value['category_name']?></option>
        <?php endforeach;?>
      </select>
      <br><br>
      <input type="submit" value="search">
    </form>

  </div>
  <div id="footer"></div>
</div>

</body>
</html>

<?php 
databaseClose($conn);
?>
