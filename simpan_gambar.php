<?php
require_once 'vendor/autoload.php';
require_once "./random_string.php";

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;


//cek apakah data kosong
if (empty($_POST["file"])) {
    echo '<script> alert("You haven\'t selected any pictures yet"); window.location.href="./kirim.php"; </script>';
} else {

$connectionString = "DefaultEndpointsProtocol=https;AccountName=febriwebapp;AccountKey=fyDYKm7G7lA14EsLvCh6NNGT5tXK4qZMdXEsMVlr5Apm8GA5CxoZa1b3ITnTH79CI3i5k1qVPiZh8u9p+teSqA==;EndpointSuffix=core.windows.net";

// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);


$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['file']['size'];
$tmp_file = $_FILES['file']['tmp_name'];
$fileToUpload = $nama;


    // Create container options object.
    $createContainerOptions = new CreateContainerOptions();
    $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);

    // Set container metadata.
    $createContainerOptions->addMetaData("key1", "fyDYKm7G7lA14EsLvCh6NNGT5tXK4qZMdXEsMVlr5Apm8GA5CxoZa1b3ITnTH79CI3i5k1qVPiZh8u9p+teSqA==");
    $createContainerOptions->addMetaData("key2", "DefaultEndpointsProtocol=https;AccountName=febriwebapp;AccountKey=fyDYKm7G7lA14EsLvCh6NNGT5tXK4qZMdXEsMVlr5Apm8GA5CxoZa1b3ITnTH79CI3i5k1qVPiZh8u9p+teSqA==;EndpointSuffix=core.windows.net");

    $containerName = "imagefile";

    try {
        
        # Upload file as a block blob
        // echo "Uploading BlockBlob: ".PHP_EOL;
        // echo $fileToUpload;
        // echo "<br />";
        
        $content = fopen($tmp_file, "r");

        //Upload blob
        $blobClient->createBlockBlob($containerName, $fileToUpload, $content);
    }
    catch(ServiceException $e){
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message."<br />";
    }
    catch(InvalidArgumentTypeException $e){
        // Handle exception based on error codes and messages.
        // Error codes and messages are here:
        // http://msdn.microsoft.com/library/azure/dd179439.aspx
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message."<br />";
    }

    echo '<script> alert("Image has been upload"); window.location.href="./view_image.php"; </script>';
}
?>
