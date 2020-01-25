<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jornal Submission</title>

	<!-- link bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- link bootstrap js -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
</head>
<body> 
	<?php include 'head.php' ?>
 
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Hello</h1>
    <p class="lead">If you accidentally found this website, feel free to fill  in the form below 🍻</p>
  </div>
  
  
<div class="container">
  <!-- Content here -->
		<form action="./add.php?act=add" method="POST">
		  <div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="name" name="name" placeholder="Name">
			</div>
		  </div><div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Country</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="country" name="country" placeholder="Country">
			</div>
		  </div>
		  <div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">City</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="city" name="city" placeholder="City">
			</div>
		  </div>
		  <div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
			</div>
		  </div>
		  
		  <div class="form-group row">
			<div class="col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>
		</form>
	</div>

</div>
</body>
</html>