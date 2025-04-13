<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Entry</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<div class="form-wrapper">
    <h2>Add New Entry</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <label>MRP:</label>
        <input type="number" name="mrp" required>

        <label>Location URL:</label>
        <input type="text" name="location" required>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="girl">Girl</option>
            <option value="boy">Boy</option>
        </select>

        <label>Upload Image:</label>
        <input type="file" name="image" required>

        <div class="btn-group">
            <input type="submit" name="submit" value="Add" class="btn btn-submit">
            <a href="admin.php" class="btn btn-cancel">Return Back</a>
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $desc = $_POST['description'];
        $mrp = $_POST['mrp'];
        $location = $_POST['location'];
        $gender = $_POST['gender'];  // Get the gender from the form

        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp, "uploads/$img");

        // Insert data including gender into the database
        $q = "INSERT INTO items (name, description, mrp, image, location_url, gender) 
              VALUES ('$name', '$desc', '$mrp', '$img', '$location', '$gender')";
        mysqli_query($conn, $q);
        echo "<p style='margin-top:20px; color:green;'>Entry added! <a href='admin.php'>Return Back</a></p>";
    }
    ?>
</div>

</body>
</html>
