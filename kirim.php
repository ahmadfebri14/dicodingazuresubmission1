<body> 
	<?php include 'head.php' ?>

<?php
    //Mengatur instance dari Azure::Storage::Client -->
    $connectionString = "DefaultEndpointsProtocol=https;AccountName=".getenv('febriwebapp').";AccountKey=".getenv('fyDYKm7G7lA14EsLvCh6NNGT5tXK4qZMdXEsMVlr5Apm8GA5CxoZa1b3ITnTH79CI3i5k1qVPiZh8u9p+teSqA==');
 
    //Membuat blob client.-->
    $blobClient = BlobRestProxy::createBlobService($connectionString);
 
    # Membuat BlobService yang merepresentasikan Blob service untuk storage account
    $createContainerOptions = new CreateContainerOptions();
 
    $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
 
    //Menetapkan metadata dari container. -->
    $createContainerOptions->addMetaData("key1", "fyDYKm7G7lA14EsLvCh6NNGT5tXK4qZMdXEsMVlr5Apm8GA5CxoZa1b3ITnTH79CI3i5k1qVPiZh8u9p+teSqA==");
    $createContainerOptions->addMetaData("key2", "FXv8NrMzTaZ23FyVJ0EgmNCDvUM+gRykvdot/vqvoK1tVRs20m/mvZPIFg0VX3MAmO8kmktyd6isU64CgdxArA==");
 
    $containerName = "blockblobs"."generateRandomString()";
 
        // Membuat container.
        $blobClient->createContainer("container_febri", $createContainerOptions);

    
    //Sampai kode di atas kita telah membuat instancce Azure storage client, menginstansiasi objek blob service, membuat container baru, dan mengatur perijinan ke container agar blob bisa diakses oleh semua.
    ?>

<div class="container">

<div class="container">
    <form action="./add.php?act=add" method="POST">
		  <div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="name" name="name" placeholder="Name">
			</div>
    </body>
</html>