<!DOCTYPE html>
<html>
	<head>	
		<title>Passing Data To Bootstrap Modal</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap 4 and Icon for BS4-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/900dc095e5.js"></script>
		
		<!-- Main CSS and Javascript-->
		<script type="text/javascript" src="GetData.js"></script>
	</head>
	
	<body>
	<nav class="navbar navbar-expand-md navbar-light bg-faded">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="mx-auto">
			<div class="collapse navbar-collapse " id="navbarNavDropdown">
				<ul class="navbar-nav font-weight-bold">
					<li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<!-- Student Modal -->
	<div class="modal fade" id="StudentModal">
		<div class="modal-dialog modal-dialog-centered modal-login" role="document">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
				  <h4 class="modal-title">Student's Information</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<form id="formLogin" autocomplete="on">
						<div class="form-group">
							<p>Your student id is: <span class="studentid"></span></p>
						</div>
						<div class="form-group">
							<label>First Name:</label>
							<input type="text" class="form-control" id="FirstName" required="required" placeholder="First Name">
						</div>
						<div class="form-group">
							<label>Last Name:</label>
							<input type="text" class="form-control" id="LastName" required="required" placeholder="Last Name">
						</div>
					</form>
				</div>
				<!-- Modal Footer -->
				<div class="modal-footer">
					<div class="d-flex flex-column">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid">    
		<div class="jumbotron">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center"> 
					<div class="table-responsive-md">
						<table id='mydatatable' class='table table-hover table-striped w-100 display'>
							<thead class='thead-dark'>
								<tr>
									<th scope='col' colspan='3'>My Class</th>
								</tr>
								<tr>
									<th scope='col'>ID</th>
									<th scope='col'>Full Name</th>
									<th scope='col'>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
									include 'dbconnection.php';
									
									$conn = new mysqli($servername, $username, $password, $dbname);
									
									$sqlQuery = "SELECT * FROM students";
									
									if ($result = mysqli_query($conn, $sqlQuery)) {
										while ($row = mysqli_fetch_assoc($result)){
											echo "<tr>";
											echo "<td>".$row["ID"]."</td>";
											echo "<td>".$row["FirstName"]." ".$row["LastName"]."</td>";
											echo "<td>"."<button><a data-toggle='modal' data-target='#StudentModal' data-id='".$row["ID"]."'>Edit</a>"."</button></td>";
											echo "</tr>";
										}
									}
									else {
										echo "Error: ".$sqlQuery."<br>".$mysqli_error($conn);
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
    
	<!-- Foot Here -->
	<footer>
        <div class="row mx-auto text-center">
            <div class="col-md-12">
                <p>Copyright&copy; 2019 Huy Dam - 
                <a href="https://www.facebook.com/profile.php?id=100009337097614"><i class="fab fa-facebook-square"></i></a>
				<a href="https://www.youtube.com/channel/UCVVE2UNyLHxwWhmbeDBbwbg"><i class="fab fa-youtube-square"></i></a>
				</p>
            </div>
        </div>
    </footer>
	</body>
</html> 