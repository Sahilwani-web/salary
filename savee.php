<?php
include 'db.php';
if(count($_POST)>0){
    if($_POST['type']==10){
        $emp_basic_salary=$_POST['emp_basic_salary'];
        $provident_fund=$_POST['provident_fund'];
        $securityDeposit=$_POST['security_deposit'];
        $employeeCode=$_POST['employeeSelect'];

        // $employee_query = "SELECT id FROM employee WHERE employeecode = '$employeecode'";
        // $employee_result = mysqli_query($conn, $employee_query);


		$sql = "INSERT INTO `employeedetails` (`emp_basic_salary`, `provident_fund`, `security_deposit`,`employee_code`) 
		VALUES ($emp_basic_salary, $provident_fund, $securityDeposit, $employeeCode)";
	    
		if (mysqli_query($conn, $sql)) {
			// echo json_encode(array("statusCode"=>200));
			// header("location:C:\xamppp\htdocs\salary\employeelist.php");
			header("location: /salary/employeedetail");
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
		$emp_basic_salary=$_POST['emp_basic_salary'];
		$provident_fund=$_POST['provident_fund'];
		$security_deposit=$_POST['security_deposit'];
		$sql = "UPDATE `employeedetails` SET  `emp_basic_salary` = '$emp_basic_salary', `provident_fund` = '$provident_fund', `security_deposit` = '$security_deposit' WHERE `employeedetails`.`id` = $id";
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
		$sql = "DELETE FROM `employeedetails` WHERE id=$id";
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
		$sql = "DELETE FROM `employeedetails` WHERE id = $id";
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