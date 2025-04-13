<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="content">
    <h2>Admin Panel</h2>
    <a href="add.php" class="add-link">+ Add New Entry</a>
    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>MRP</th>
            <th>Image</th>
            <th>Location</th>
            <th>Gender</th> <!-- New Column for Gender -->
            <th>Actions</th>
        </tr>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM items ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td>₹<?php echo $row['mrp']; ?></td>
                <td><img src="uploads/<?php echo $row['image']; ?>" width="100"></td>
                <td><a href="<?php echo $row['location_url']; ?>" target="_blank">Link</a></td>
                <td><?php echo ucfirst($row['gender']); ?></td> <!-- Display Gender -->
                <td>
                    <div class="action-buttons">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
