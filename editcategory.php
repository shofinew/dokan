<?php
$con = mysqli_connect("localhost", "root", "", "dokan");

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>edit category</title>
</head>
<body>
      <?php
      if(isset($_GET['id']))
          $getid =  $_GET['id'];

          $sql = "SELECT * FROM category WHERE CategoryID = $getid";

          $exsql = mysqli_query($con, $sql);
          while(  $data = mysqli_fetch_assoc($exsql)){
            $catid = $data['CategoryID'];
            $catname = $data['CategoryNAME'];
            $catdate = $data['CategoryDATE'];
          }
          if(isset($_GET['CategoryNAME'])){
            $new_categoryname = $_GET['CategoryNAME'];
            $new_categorydate = $_GET['CategoryDATE'];
            $new_categoryid = $_GET['CategoryID'];
            $sql1= "UPDATE category SET 
            CategoryNAME = ' $new_categoryname',
            CategoryDATE = ' $new_categorydate' WHERE 
            CategoryID = ' $new_categoryid'";

            $exsql1= mysqli_query($con, $sql1);
            if($sql1){
                  echo "Data updated";
            }
            echo mysqli_error($con);
      }
          
      
      
      
      ?>
<form action="addcategory.php" method="GET">
      <input type="text" name="cname" value="<?php echo $catname  ?>"><br><br>
     
      <input type="date" name="cdate" value="<?php echo $catdate  ?>"><br><br>

      <input type="text" name="cid" value="<?php echo $catid  ?>" hidden>

    

      <input type="submit" value="submit">
</form>
      
</body>
</html>