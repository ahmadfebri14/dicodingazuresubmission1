<?php
	include 'connection.php';

	if($_GET['act'] == "add"){
		/*Insert data.*/  
        $name = $_POST['name'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$email = $_POST['email'];

		echo $name, $country, $city, $email;
	}
?>