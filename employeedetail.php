<?php
include 'db.php';
include 'C:\xamppp\htdocs\salary\SideNavbar\SideNavbar.php';
include 'C:\xamppp\htdocs\salary\TopNavbar\TopNavbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Data</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax.js"></script>
</head>

<body>
    <div class="container">
        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add Employee details</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>

                        </th>
                        <th>Employee ID</th>
                        <th>Employee Code</th>
                        <th>Basic Salary</th>
                        <th>Provident Fund</th>
                        <th>Security Deposit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $result = mysqli_query($conn, "SELECT employeedetails.*, employee.employeecode 
                                              FROM employeedetails AS employeedetails
                                              JOIN employee AS employee ON employeedetails.employee_id = employee.id");
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {


                    ?>
                        <tr id="<?php echo $row["id"]; ?>">
                            <td>

                            </td>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["employeecode"]; ?></td>
                            <td><?php echo $row["emp_basic_salary"]; ?></td>
                            <td><?php echo $row["provident_fund"]; ?></td>
                            <td><?php echo $row["security_deposit"]; ?></td>
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                    <i class="material-icons update" data-toggle="tooltip" data-id="<?php echo $row["id"]; ?>" data-emp_basic_salary="<?php echo $row["emp_basic_salary"]; ?>" data-provident_fund="<?php echo $row["provident_fund"]; ?>" data-security_deposit="<?php echo $row["security_deposit"]; ?>" title="Edit"></i>
                                </a>
                                <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <?php 
    
    $query = "SELECT id, employeecode, firstname FROM employee";
    $result = mysqli_query($conn, $query);
    $employeedetails = mysqli_fetch_all($result,MYSQLI_ASSOC);
   
// var_dump($employeedetails); die();
    // $result = $mysqli -> query($sql);
    // 
    

    ?>
    

    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">


        <div class="modal-dialog">
            <div class="modal-content">
                <form id="user_form" >
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Employee code</label>
                            <select name="employeeSelect" class="form-control" required>
                                <?php foreach ($employeedetails as $employee) : ?>
                                    <option class="form-control" value="<?php echo $employee['id']; ?>"><?= $employee['firstname'].'-'.$employee['employeecode']; ?>
                                 </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Employee Basic Salary</label>
                            <input type="city" id="emp_basic_salary" name="emp_basic_salary" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Provident fund</label>
                            <input type="city" id="provident_fund" name ="provident_fund" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Security deposit</label>
                            <input type="city" id="security_deposit" name="security_deposit" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success" id="btn-add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_u" name="id" class="form-control" required>
                        <div class="form-group">
                            <label>Employee Basic Salary</label>
                            <input type="city" id="emp_basic_salary1" name="emp_basic_salary" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Provident fund</label>
                            <input type="city" id="provident_fund1" name="provident_fund" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Security deposit</label>
                            <input type="city" id="security_deposit1" name="security_deposit" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="2" name="type">
                        <input type="button"