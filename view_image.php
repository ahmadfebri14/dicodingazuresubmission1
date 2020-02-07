<?php include 'head.php' ?>
<br><br>
<?php
require_once 'vendor/autoload.php';
require_once "./random_string.php";

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=febriwebapp;AccountKey=fyDYKm7G7lA14EsLvCh6NNGT5tXK4qZMdXEsMVlr5Apm8GA5CxoZa1b3ITnTH79CI3i5k1qVPiZh8u9p+teSqA==;EndpointSuffix=core.windows.net";

// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);

// do{
//     $result = $blobClient->listBlobs("blockblobsigbyui");
//     foreach ($result->getBlobs() as $blob)
//     {
//         echo $blob->getName().": ".$blob->getUrl()."<br />";
//     }

//     // $listBlobsOptions->setContinuationToken($result->getContinuationToken());
// } while($result->getContinuationToken());
echo "<br />";
try {
    // List blobs.
    $blob_list = $blobClient->listBlobs("imagefile");
    $blobs = $blob_list->getBlobs();

    foreach($blobs as $blob)
    {
        // echo $blob->getName().": ".$blob->getUrl()."<br />";

        // https://febriwebapp.blob.core.windows.net/blockblobsigbyui/andro.png

        // echo "".$blob->getUrl()."";
        ?>

        <img class="img-profile rounded-circle" src="<?php echo "".$blob->getUrl().""; ?>">
        <br>
        <?php
        // echo "<br>";
        // echo "<img src=";
        // echo "".$blob->getUrl()."";
        // echo "/>\"";

        // echo "<img src=";
        // echo "https://febriwebapp.blob.core.windows.net/";
        // echo $containerName;
        // echo "/";
        // echo $fileToUpload;
    }
} catch(ServiceException $e){
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}