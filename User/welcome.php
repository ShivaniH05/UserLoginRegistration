<?php
session_start();
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
require_once('dbconnection.php');
$ret= mysqli_query($con,"SELECT * FROM users WHERE id=".$_SESSION['id']);
$num=mysqli_fetch_array($ret);
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Welcome !</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><?php echo ucfirst($_SESSION['name']);?></a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <header class="jumbotron hero-spacer">
		<h1>A Warm Welcome! <?php  echo ucfirst($num['fname']);?></h1>
		<div class="row-lg-4">
		<table  class="table table-striped">
			<tr>
				<td class="col-md-3"><b> Name <b></td>
				<td class="col-md-9"><?php echo ucfirst($num['fname']).' '.ucfirst($num['lname']); ?></td>
			</tr>
			
			
			<tr>
				<td><b>Email Id<b></td>
				<td><?php echo $num['email']; ?></td>
			</tr>
			
			<tr>
				<td><b>Contact Number<b></td>
				<td><?php echo $num['contactno']; ?></td>
			</tr>
			
			<tr>
				<td><b>Account Created Date<b></td>
				<td><?php echo date('d/m/Y', strtotime($num['posting_date'])); ?></td>
			</tr>
			
			<tr>
				<td><b>Last Login Date<b></td>
				<td><?php echo date("d-m-Y h:i A",strtotime($num['posting_date'])); ?></td>
			</tr>
		</table>
		</div>
		 </header>
		
	</div>
	<hr>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>