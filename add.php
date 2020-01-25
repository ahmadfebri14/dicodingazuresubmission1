<?php
	if($_GET['act'] == "add"){	
		/*Insert data.*/  
        $insertSql = "INSERT INTO empTable (name, country, city, email)   
					VALUES (?,?,?,?)";  
        $params = array(&$_POST['name'], &$_POST['country'], &$_POST['city'], &$_POST['email']  
        );  
        $stmt = sqlsrv_query($conn, $insertSql, $params);  
        if ($stmt === false) {  
            /*Die if other errors occurred.*/  
             
                die(print_r($errors, true));  
                
            }else{  
				echo '<script> alert("Data tersimpan"); window.location.href="./index.php"; </scr';
            }    
	}
?>