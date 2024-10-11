<?php
$con = mysqli_connect("localhost", "root", "", "dokan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>list of category</title>
</head>
<body>
      <?php
      $sql = "SELECT * FROM category";
      $exsql = mysqli_query($con, $sql);
      echo "<table border='1'>
            <tr>
            <th>Category</th>
            <th>Date</th>
            <th>Action</th>
            <tr>";
      while( $data = mysqli_fetch_assoc($exsql)){
            $catid = $data['CategoryID'];
           $cname = $data['CategoryNAME'];
           $cdate = $data['CategoryDATE'];

           echo "<tr>
            <td>$cname</td>
            <td>$cdate</td>
            <td><a href='editcategory.php?id=$catid'>Edit</td>
            </tr>";
      }
      echo "</table>";
      
      ?>

      
</body>
</html>