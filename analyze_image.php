<!DOCTYPE html>
<html>
<head>
    <title>Analyze Sample</title>
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
	    <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
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


//cek apakah data kosong
if($_GET['act'] == "add"){
    if (empty($_FILES['file']['name'])) {
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
        
            echo '<script> alert("Image has been upload"); </script>';
            $url_gambar = $blob->getUrl();
        }
}
?>

<script type="text/javascript">
    function processImage() {
        var subscriptionKey = "2991b6fccca14af79420e8265a724562";
 
        var uriBase =
            "https://southeastasia.api.cognitive.microsoft.com/vision/v2.0/analyze";
 
        // Request parameters.
        var params = {
            "visualFeatures": "Categories,Description,Color",
            "details": "",
            "language": "en",
        };
 
        // Display the image.
        var sourceImageUrl = document.getElementById("inputImage").value;
        document.querySelector("#sourceImage").src = sourceImageUrl;
 
        // Make the REST API call.
        $.ajax({
            url: uriBase + "?" + $.param(params),
 
            // Request headers.
            beforeSend: function(xhrObj){
                xhrObj.setRequestHeader("Content-Type","application/json");
                xhrObj.setRequestHeader(
                    "Ocp-Apim-Subscription-Key", subscriptionKey);
            },
 
            type: "POST",
 
            // Request body.
            data: '{"url": ' + '"' + sourceImageUrl + '"}',
        })
 
        .done(function(data) {
            // Show formatted JSON on webpage.
            $("#responseTextArea").val(JSON.stringify(data, null, 2));
        })
 
        .fail(function(jqXHR, textStatus, errorThrown) {
            // Display error message.
            var errorString = (errorThrown === "") ? "Error. " :
                errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" :
                jQuery.parseJSON(jqXHR.responseText).message;
            alert(errorString);
        });
    };
</script>
 


<div class="container">
    <h1>Analyze image:</h1>
    Enter the URL to an image, then click the <strong>Analyze image</strong> button.
    <br><br>
    
    <div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">URL</label>
			<div class="col-sm-10">
                <input type="text" name="inputImage" id="inputImage" class="form-control"/>
			</div>
		  </div>
		  
		  <div class="form-group row">
			<div class="col-sm-10">
            <button onclick="processImage()" class="btn btn-primary">Analyze image</button>
			</div>
		  </div>
    
    <br><br>
    <div id="wrapper" style="width:1020px; display:table;">
        <div id="jsonOutput" style="width:600px; display:table-cell;">
            Response:
            <br><br>
            <textarea id="responseTextArea" class="UIInput"
                    style="width:580px; height:400px;"></textarea>
        </div>
        <div id="imageDiv" style="width:420px; display:table-cell;">
            Source image:
            <br><br>
            <img id="sourceImage" width="400" />
        </div>
</div>
</div> 

</body>
</html>