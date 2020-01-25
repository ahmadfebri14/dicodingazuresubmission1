<?php 
include 'head.php';
?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Country</th>
      <th scope="col">City</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "SELECT * FROM empTable ORDER BY name"; 
        $stmt = sqlsrv_query($conn, $sql); 
        if($stmt === false){ 
        die(print_r(sqlsrv_errors(), true)); 
        } 
        
        if(sqlsrv_has_rows($stmt)){
            $number = 1;
            while($row = sqlsrv_fetch_array($stmt)){ 
            echo("<tr><th>".$number."</th>"); 
            echo("<td>".$row['name']."</td>"); 
            echo("<td>".$row['country']."</td>"); 
            echo("<td>".$row['city']."</td></tr>"); 
            $number++;
            }
        }
    ?> 
  </tbody>
</table>