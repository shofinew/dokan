<?php
$con = mysqli_connect("localhost", "root", "", "dokan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>add category</title>
</head>
<body>
      <?php
      if(isset($_GET['cname'])){
           $cname= $_GET['cname'];
           $cdate= $_GET['cdate'];

           $sql= "INSERT INTO category(CategoryNAME, CategoryDATE) VALUES('$cname','$cdate')";

           $exsql= mysqli_query($con, $sql);
           if($exsql){
            echo "data inserted";
           }else{
            echo mysqli_error($con);
           }
      } 
      
      ?>
<form action="addcategory.php" method="GET">
      <input type="text" name="cname">
      <input type="date" name="cdate">
      <input type="submit" value="submit">
</form>
      
</body>
</html>