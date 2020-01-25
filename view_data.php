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
    while($row = sqlsrv_fetch_array($stmt)){ 
    print("<tr><th>".$row['id']."</th>"); 
    print("<td>".$row['name']."</td>"); 
    print("<td>".$row['country']."</td>"); 
    print("<td>".$row['city']."</td></tr>"); 
    }
    ?> 
  </tbody>
</table>