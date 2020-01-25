<?php
	include 'connection.php';

	if($_GET['act'] == "add"){
	
        $name = $_POST['name'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$email = $_POST['email'];

		$insertSql = "INSERT INTO empTable (name,country,city,email)   
VALUES (?,?,?,?)";  
        $params = array(&$name, &$country, &$city, &$email  
        );  
        $stmt = sqlsrv_query($conn, $insertSql, $params);  
        if ($stmt === false)  
            {  
            /*Handle the case of a duplicte e-mail address.*/  
            $errors = sqlsrv_errors();  
            if ($errors[0]['code'] == 2601)  
                {  
                echo "The e-mail address you entered has already been used.</br>";  
                }  
  
            /*Die if other errors occurred.*/  
              else  
                {  
                die(print_r($errors, true));  
                }  
            }  
          else  
            {  
            echo "Registration complete.</br>";  
            }  
        }  
?>