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