<?php
	include 'connection.php';

	if($_GET['act'] == "add"){
	
        $name = $_POST['file'];
        
        echo $name;


    }  
?>