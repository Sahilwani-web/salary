<?php
include 'db.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$employeecode =  str_replace('YI-', '' , $_POST['employeecode']); 
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$position=$_POST['position'];
		// $emp_role=$_POST['emp_role'];
		$emp_pan=$_POST['emp_pan'];
		$emp_contact=$_POST['emp_contact'];
		$emp_address=$_POST['emp_address'];
		$sql = "INSERT INTO `employee` ( `employeecode`, `firstname`, `lastname`, `position`,`emp_pan`, `emp_contact`, `emp_address`) VALUES ( '$employeecode', '$firstname', '$lastname', '$position',  '$emp_pan', '$emp_contact', '$emp_address')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$employeeno=$_POST['employeeno'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$position=$_POST['position'];
		// $emp_role =$_POST['emp_role'];
		$emp_pan =$_POST['emp_pan'];
		$emp_contact =$_POST['emp_contact'];
		$emp_address =$_POST['emp_address'];
		$sql = "UPDATE `employee` SET `employeeno` = '$employeeno', `firstname` = '$firstname', `lastname` = '$lastname', `position` = '$position',  `emp_pan` = '$emp_pan', `emp_contact` = '$emp_contact', `emp_address` = '$emp_address' WHERE `employee`.`id` = $id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `employee` WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM `employee` WHERE id = $id";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>