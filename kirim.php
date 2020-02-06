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
<form action="./add.php?act=add" method="POST" id="BlobUploadForm">
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Browse… <input type="file" style="display: none;" name="file" id="FileInput">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly="" id="BrowseInput">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <button type="submit" value="Upload Small File" class="btn btn-default" id="UploadSmallFile">Upload Small File</button>
                        <button type="button" value="Upload Streaming File" class="btn btn-default" id="UploadStreamingFile" onclick="uploadStreamingFile()">Upload Streaming File</button>
                        <button type="button" value="Upload to Blob" class="btn btn-default" id="UploadBlob" onclick="uploadBlob()">Upload to Blob</button>
                    </div>
                </div>
                <div class="form-group hidden" id="uploadProgressBarContainer">
                    Uploading...
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" id="uploadProgressBar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                            0%
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
  
    </body>
</html>