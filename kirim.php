 <?php include 'head.php' ?>
<body>
<br><b>
<div class="container">
    <!-- Content here -->
		<form action="./simpan_gambar.php" method="POST" enctype="multipart/form-data">
		<div class="container">
			<h3> Input Image </h3>
			<br>
		  	<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
			  			<input type="file" id="file" name="file">
					</div>
			</div>
		  
		  <div class="form-group row">
			<div class="col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>
		</div>	
		</form>
</div>
    </body>
</html>