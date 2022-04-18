<!DOCTYPE html>
<html>
<head>
<title>Anastasia&Rosalee</title>
<style >
#wrapper{
  width:1340px;
  height: 900px;
 /* background-color: #AED6F1;*/

  
}
#banner{
  width:1340px;
  height: 350px;
  background-color: #F0B27A;
  /*background-image: url("images/Anastasia.jpg");*/
  opacity: 0.2;
}
#menutop{
  width:1340px;
  height: 35px;
  background-color: #27AE60;
}
#columleft{
  width:220px;
  height: 450px;
  /*background-color: #E74C3C;*/
  float: left; 

}

#content{
  width:900px;
  height: 450px;
  background-color: #F1C40F;
  margin-left: 220px;
}
#footer{
  width:1340px;
  height: 65px;
  background-color: #5D6D7E;
}
 ul {
    list-style-type: none;
    margin: 0;
    padding: 10;
    overflow: hidden;
    background-color:#5DADE2;
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


</style>
</heaad>
<body>
<div id="wrapper">
  <div id="banner"><h5>Welcome To Our Anastasia&Rosalee Five Star Hotel And Restaurent</h5></div>
  <div id="menutop">
    <ul>
  <li><a class="active" href="http://localhost/myphp/my_web.php">Home</a></li>
  <li><a href="http://localhost/myphp/product.php">New Product</a></li>
  <li><a href="http://localhost/myphp/old_and_new.php">Old Product</a></li>
  <li><a href="http://localhost/myphp/order.php">Order Here</a></li>
  <li><a href="http://localhost/myphp/contact.php">Contact us</a></li>
   </ul>
  </div>
  <div id="columleft"></div>
  <div id="columright"></div>
  <div id="content"></div>
  <div id="footer"></div>
</div>


</body>
</html>