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
    ?>

        <div class="container">
            <div class="col-md-12">
                <div class="heading">
                    <h1> Gallery </h1>
                    <br>
                </div>
                <div class="row">

    <?php
    
    foreach($blobs as $blob)
    {
        ?>
                    <div class="col-md-3">
                        <div class="well">
                            <img src="<?php echo "".$blob->getUrl().""; ?>" alt="Content Image" 
                                class="img-thumbnail" width="195px" height="130px" vspace="10">
                        </div>
                    </div>
        <?php
    }
    ?>
                </div>    
            </div>
        </div>
    <?php
} catch(ServiceException $e){
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}