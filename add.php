<?php
	include 'cennection.php';

	if($_GET['act'] == "add"){
		/*Insert data.*/  
        $insertSql = "INSERT INTO empTable (id, name, country, city, email)   
					VALUES (?,?,?,?)";  
        $params = array("06", &$_POST['name'], &$_POST['country'], &$_POST['city'], &$_POST['email']  
        );  
        $stmt = sqlsrv_query($conn, $insertSql, $params);  
        if ($stmt === false) {  
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
            }else{  
				echo '<script> alert("Data tersimpan"); window.location.href="./index.php"; </scr';
            }    
	}
?>