<?php  
/*Connect using SQL Server authentication.*/  
$serverName = "tcp:febirappserver.database.windows.net,1433";  
$connectionOptions = array(  
    "Database" => "dicodingdb",  
    "UID" => "febri",  
    "PWD" => "Bendulmerisi14"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
  
	if ($conn === false){  
		die(print_r(sqlsrv_errors() , true));  
    }