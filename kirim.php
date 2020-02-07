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
				<div class="col-sm-10">
					<input type="file" id="file" name="file" class="form-control" style="padding:20px;" >
				</div>
			</div>
		  
		  <div class="form-group row">
			<div class="col-sm-10">
			  <button type="submit" class="btn btn-primary">Upload</button>
			</div>
		  </div>
		</div>	
		</form>
</div>
    </body>
</html>