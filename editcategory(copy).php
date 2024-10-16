<?php
$con = mysqli_connect("localhost", "root", "", "dokan");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    $sql = "SELECT * FROM category WHERE CategoryID = $categoryId";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $catName = $row['CategoryNAME'];
        $catDate = $row['CategoryDATE'];
    } else {
        echo "Category not found.";
    }
}

if (isset($_GET['CategoryNAME'])) {
    $newCategoryName = $_GET['CategoryNAME'];
    $newCategoryDate = $_GET['CategoryDATE'];
    $newCategoryId = $_GET['CategoryID'];

    $sql = "UPDATE category SET
             CategoryNAME = '$newCategoryName',
             CategoryDATE = '$newCategoryDate'
             WHERE CategoryID = '$newCategoryId'";

    if (mysqli_query($con, $sql)) {
        echo "Data updated successfully.";
    } else {
        echo "Error updating data: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <form action="editcategory.php" method="GET">
        <label for="CategoryName">Category Name:</label>
        <input type="text" name="CategoryNAME" id="CategoryName" value="<?php echo $catName; ?>"><br><br>

        <label for="CategoryDate">Category Date:</label>
        <input type="date" name="CategoryDATE" id="CategoryDate" value="<?php echo $catDate; ?>"><br><br>

        <input type="hidden" name="CategoryID" value="<?php echo $categoryId; ?>">

        <input type="submit" value="Submit">
    </form>
</body>
</html>