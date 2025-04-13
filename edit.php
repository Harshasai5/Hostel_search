<?php include('includes/db.php'); ?>
<?php
$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM items WHERE id = $id");
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Entry</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<h2>Edit Entry</h2>
<form action="" method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br><br>
    Description: <textarea name="description"><?= $row['description'] ?></textarea><br><br>
    MRP: <input type="number" name="mrp" value="<?= $row['mrp'] ?>"><br><br>
    Location URL: <input type="text" name="location" value="<?= $row['location_url'] ?>"><br><br>
    
    <!-- Gender Dropdown -->
    Gender: 
    <select name="gender" required>
        <option value="girl" <?= $row['gender'] == 'girl' ? 'selected' : ''; ?>>Girl</option>
        <option value="boy" <?= $row['gender'] == 'boy' ? 'selected' : ''; ?>>Boy</option>
    </select><br><br>
    
    Current Image: <img src="uploads/<?= $row['image'] ?>" width="100"><br>
    New Image (optional): <input type="file" name="image"><br><br>
    
    <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $mrp = $_POST['mrp'];
    $location = $_POST['location'];
    $gender = $_POST['gender'];  // Get gender value from the form

    // Handle image update
    if (!empty($_FILES['image']['name'])) {
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "uploads/$img");
    } else {
        $img = $row['image'];  // Keep the existing image if no new one is uploaded
    }

    // Update the database including the gender field
    mysqli_query($conn, "UPDATE items SET name='$name', description='$desc', mrp='$mrp', image='$img', location_url='$location', gender='$gender' WHERE id=$id");
    
    echo "Updated! <a href='admin.php'>Back</a>";
}
?>
</body>
</html>
