<body> 
<?php include 'head.php' ?>
<br><br>
<div class="container">
    <!-- Content here -->
		<form action="./simpan_gambar.php" method="POST" enctype="multipart/form-data">
		  <!-- <div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
			  <input type="file" id="file" name="file">
			</div>
		  
		  <div class="form-group row">
			<div class="col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div> -->

		  	<div class="container">
			  <h3> Input Image </h3>
				<br>
		  		<div class="input-group mb-3">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="file" name="file">
						<label class="custom-file-label"></label>
					</div>
					<div class="input-group-append">
						<button type="submit" class="input-group-text">Upload</button>
						<!-- <span class="input-group-text" id="inputGroupFileAddon02">Upload</span> -->
					</div>
				</div>	
			</div>
		</form>
</div>
    </body>
</html>