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

echo "<br />";
try {
    // List blobs.
    $blob_list = $blobClient->listBlobs("imagefile");
    $blobs = $blob_list->getBlobs();

    foreach($blobs as $blob)
    {
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="<?php echo "".$blob->getUrl().""; ?>" alt="<?php echo "".$blob->getUrl().""; ?>" class="img-thumbnail" width="193px" height="130px">
                </div>    
            </div>
        </div>
        <br>
        <?php
    }
} catch(ServiceException $e){
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}