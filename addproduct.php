<?php
$con = mysqli_connect("localhost", "root", "", "dokan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>add product</title>
</head>
<body>
      <?php
      if(isset($_GET['ProductNAME '])){
           $ProductNAME= $_GET['ProductNAME'];
           $ProductCATE= $_GET['ProductCATE'];
           $ProductCODE= $_GET['ProductCODE'];
           $ProductEnDATE= $_GET['ProductEnDATE'];

           $sql= "INSERT INTO category(CategoryNAME, CategoryCATE,ProductCODE,ProductEnDATE) VALUES('$ProductNAME','$ProductCATE','$ProductCODE','$ProductEnDATE')";

           $exsql= mysqli_query($con, $sql);
           if($exsql){
            echo "data inserted";
           }else{
            echo mysqli_error($con);
           }
      } 
      
      ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
      <input type="text" name="ProductID" hidden>
      <input type="text" name="ProductNAME"><br><br>
      <select name="ProductCATE" >
            <?php
           while ($data = mysqli_fetch_assoc($exsql)){
            $CategoryID = $data['CategoryID'];
            $CategoryNAME = $data['CategoryNAME'];
            echo "<option value='$CategoryID'>$CategoryNAME</option>";
           }
            ?>
       </select>

      

      <input type="text" name="ProductCODE"><br><br>
      <input type="date" name="ProductEnDATE"><br><br>
      <input type="submit" value="submit">
</form>
      
</body>
</html>