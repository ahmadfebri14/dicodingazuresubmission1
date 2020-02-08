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
session_start();
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
        var sourceImageUrl = <?php echo $_SESSION['name']; ?>
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
                <input type="text" name="inputImage" id="inputImage" class="form-control"
                value="<?php echo $_SESSION['name']; ?>"/>
			</div>
		  </div>
		  
		  <div class="form-group row">
			<div class="col-sm-10">
            <button class="btn btn-primary">Analyze image</button>
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

<script>
		window.onload = function() {
            processImage()
};
</script>
</body>
</html>