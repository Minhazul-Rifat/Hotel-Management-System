<?php 
function databaseConnect(){
	$host = "localhost";
	$username = "root";
	$password = "";
	$database="hotel_management";

// Create connection
	$conn = new mysqli($host, $username, $password,$database);

// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	return $conn;
}

function databaseClose($conn){
	mysqli_close($conn);
}

function getCategory($conn){
	$sql="SELECT * FROM seat_category";
	$result = $conn->query($sql);
	$data=array();
	if($result->num_rows > 0){
		while ($row=$result->fetch_assoc()) {
			$data[]=$row;
		}
	}

	return $data;

}

function getEmployee($conn,$id=""){
	$sql="SELECT * FROM employee";
	if($id !==""){
		$sql.=" WHERE id='$id' ";
	}
	$result = $conn->query($sql);
	$data=array();
	if($result->num_rows > 0){
		while ($row=$result->fetch_assoc()) {
			$data[]=$row;
		}
	}

	return $data;

}

function validateAdminLogin($conn, $userName, $password){
	$data=array();
	$sql="SELECT * FROM admin";
	$sql.=" WHERE username='$userName' AND password='$password' ";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while ($row=$result->fetch_assoc()) {
			$data[]=$row;
		}
	}

	return $data;

}

function getRoom($conn, $categoryId){
	$data=array();
	$sql="  SELECT s.*, sc.category_name,sc.price ";
	$sql.=" FROM seats AS s, seat_category AS sc ";
	$sql.=" WHERE s.cat_id=sc.id ";
	$sql.=" AND sc.id='$categoryId' ";
	$sql.=" AND s.id NOT IN( ";
	$sql.=" SELECT customer.seat_id FROM customer ";
	$sql.=" ) " ;

	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while ($row=$result->fetch_assoc()) {
			$data[]=$row;
		}
	}

	return $data;

}
function employeeinsertion($conn, $name, $email,$phone){
	$sql="INSERT INTO `employee` (`name`, `email`, `phone`) ";
	$sql.=" VALUES ('$name', '$email', '$phone')";
	$result = $conn->query($sql);
	return $result;

}
function employeedelete($conn, $id){
	$sql = "DELETE FROM employee WHERE id='$id'";
	$result = $conn->query($sql);
	return $result;
}
function employeeUpdate($conn, $name, $email,$phone,$id){
	$sql="UPDATE employee SET name = '$name', email = '$email', phone = '$phone' ";
	$sql.=" WHERE id = '$id'";

	$result = $conn->query($sql);
	return $result;

}
function customerinsertion($conn,$seat_id,$cusmer_name,$customer_email,$customer_phone,
	$booking_date,$release_date){
	$sql=" INSERT INTO customer (seat_id, cusmer_name, customer_email, ";
	$sql.=" customer_phone, booking_date, release_date) ";
	$sql.=" VALUES ('$seat_id', '$cusmer_name', '$customer_email', '$customer_phone', ";
	$sql.=" '$booking_date', '$release_date') ";
	
	$result = $conn->query($sql);
	return $result;

}
function customerUpdate($conn,$seat_id,$cusmer_name,$customer_email,$customer_phone,
	$booking_date,$release_date,$id){
	$sql="UPDATE customer SET seat_id='$seat_id',cusmer_name = '$cusmer_name',
	customer_email = 'customer_$email', customer_phone = '$customer_phone',
	booking_date='$booking_date',release_date='$release_date'";
	$sql.=" WHERE id = '$id'";

	$result = $conn->query($sql);
	return $result;

}
function getcustomer($conn,$id=""){
	$sql="SELECT * FROM customer";
	if($id !==""){
		$sql.=" WHERE id='$id' ";
	}
	$result = $conn->query($sql);
	$data=array();
	if($result->num_rows > 0){
		while ($row=$result->fetch_assoc()) {
			$data[]=$row;
		}
	}

	return $data;

}
function customerdelete($conn, $id){
	$sql = "DELETE FROM customer WHERE id='$id'";
	$result = $conn->query($sql);
	return $result;
}



?>