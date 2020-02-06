<?php
	include 'connection.php';

	if($_GET['act'] == "add"){
	
        $name = $_POST['file'];
        
            # Mengatur instance dari Azure::Storage::Client
    $connectionString = "DefaultEndpointsProtocol=https;AccountName=".getenv('febriwebapp').";AccountKey=".getenv('fyDYKm7G7lA14EsLvCh6NNGT5tXK4qZMdXEsMVlr5Apm8GA5CxoZa1b3ITnTH79CI3i5k1qVPiZh8u9p+teSqA==');
 
    // Membuat blob client.
    $blobClient = BlobRestProxy::createBlobService($connectionString);
 
    # Membuat BlobService yang merepresentasikan Blob service untuk storage account
    $createContainerOptions = new CreateContainerOptions();
 
    $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
 
    // Menetapkan metadata dari container.
    $createContainerOptions->addMetaData("key1", "fyDYKm7G7lA14EsLvCh6NNGT5tXK4qZMdXEsMVlr5Apm8GA5CxoZa1b3ITnTH79CI3i5k1qVPiZh8u9p+teSqA==");
    $createContainerOptions->addMetaData("key2", "FXv8NrMzTaZ23FyVJ0EgmNCDvUM+gRykvdot/vqvoK1tVRs20m/mvZPIFg0VX3MAmO8kmktyd6isU64CgdxArA==");
 
    $containerName = "blockblobs"."febri14";
 
        // Membuat container.
        $blobClient->createContainer($containerName, $createContainerOptions);

    ///////////////////////////////////////////////
    $myfile = fopen($name, "w") or die("Unable to open file!");
    fclose($myfile);
    
    # Mengunggah file sebagai block blob
    echo "Uploading BlockBlob: ".PHP_EOL;
    echo $fileToUpload;
    echo "<br />";
    
    $content = fopen($fileToUpload, "r");
    
    //Mengunggah blob
    $blobClient->createBlockBlob($containerName, $fileToUpload, $content);
    }
?>