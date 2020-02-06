<body> 
<?php include 'head.php' ?>
<br><br>
<div class="container">
    <form action="./simpan_gambar.php?act=add" method="POST">
		  <div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
            <input type="file" name="file" id="file">
			</div>

            <div class="form-group row">
			<div class="col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>
    </body>
</html>