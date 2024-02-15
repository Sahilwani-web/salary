<?php
include 'db.php';
include '../salary/TopNavbar/TopNavbar.php';
include '../salary/SideNavbar/SideNavbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add view Employee</title>
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
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Employee</span></a>
											
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							
						</th>
						<th>Employee id</th>
                        <th>Employee no</th>
                        <th>First name</th>
						<th>Last name</th>
						
                        <th>Employee PAN</th>
                        <th>Contact Number</th>
                        <th>Employee Address</th>
                        <th>Position</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM employee");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>

				
							
						</td>
					<td><?php echo $i; ?></td>
					<td>YI-<?= $row["employeecode"]; ?></td>
					<td><?php echo $row["firstname"]; ?></td>
					<td><?php echo $row["lastname"]; ?></td>
					<td><?php echo $row["emp_pan"]; ?></td>
					<td><?php echo $row["emp_contact"]; ?></td>
                    <td><?php echo $row["emp_address"]; ?></td>
					<td><?php echo $row["position"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-employeecode="<?php echo $row["employeecode"]; ?>"
							data-firstname="<?php echo $row["firstname"]; ?>"
							data-lastname="<?php echo $row["lastname"]; ?>"
                            data-emp_pan="<?php echo $row["emp_pan"]; ?>"
							data-emp_contact="<?php echo $row["emp_contact"]; ?>"
                            data-emp_address="<?php echo $row["emp_address"]; ?>"
							data-position="<?php echo $row["position"]; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
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
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
				<?php
					$query = "select max(employeecode)+1 as employeecode from employee order by id desc limit 1";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);

					$newEmployeeCode = "";
					if (null === $row['employeecode']) {
						$newEmployeeCode = "YI-" . "10001";
					} else {
						$newEmpCode = $row['employeecode'];
						$newEmployeeCode = "YI-" . $newEmpCode;
					}
					?>
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Employee code</label>
							<input type="text" id="employeecode" name="employeecode" value="<?= $newEmployeeCode;?>" readonly class="form-control" required>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="firstname" name="firstname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="phone" id="lastname" name="lastname" class="form-control" required>
						</div>

                        <div class="form-group">
							<label>Employee PAN</label>
							<input type="city" id="emp_pan" name="emp_pan" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Employee contact</label>
							<input type="city" id="emp_contact" name="emp_contact" class="form-control" required>
						</div>	
                        <div class="form-group">
							<label>Employee Address</label>
							<input type="city" id="emp_address" name="emp_address" class="form-control" required>
						</div>
						<div class="form-group">
   							 <label for="position">Position</label>
   							 <select id="position" name="position" class="form-control" required>
       						<option value="">Select Position</option>
       						<option value="QA">QA</option>
        					<option value="Software Engineer">Software Engineer</option>
        					<option value="Intern">Intern</option>
    </select>
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
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>First Name</label>
							<input type="email" id="email_u" name="firstname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="phone" id="phone_u" name="lastname" class="form-control" required>
						</div>
						<div class="form-group">
       							<label for="emp_role">Employee role</label>
  							 <select id="emprole1" name="emp_role" class="form-control" required>
							   <option value="">Select Role</option>
       						 <option value="half_time">Half Time</option>
       						 <option value="full_time">Full Time</option>
						</select>
						</div>	
                        <div class="form-group">
							<label>Employee PAN</label>
							<input type="city" id="emppan1" name="emp_pan" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Employee contact</label>
							<input type="city" id="empcontact1" name="emp_contact" class="form-control" required>
						</div>	
                        <div class="form-group">
							<label>Employee Address</label>
							<input type="city" id="empaddress1" name="emp_address" class="form-control" required>
						</div>
						<div class="form-group">
   							 <label for="position">Position</label>
   							 <select id="city_u" name="position" class="form-control" required>
       						<option value="">Select Position</option>
       						<option value="QA">QA</option>
        					<option value="Software Engineer">Software Engineer</option>
        					<option value="Intern">Intern</option>
    </select>
</div>
						
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee  </h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>   