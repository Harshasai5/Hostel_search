<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostels </title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <h3>Main Page</h3>
        <ul>
            <li><a href="index.php">Hostels</a></li>
            <li><a href="contact.html">Contact/Help</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Hostel list</h2>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM items ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($result)) {
            // Determine gender-based class
            $genderClass = $row['gender'] == 'boy' ? 'boy-container' : 'girl-container';
            echo "<div class='card $genderClass'>";
            echo "<img src='uploads/" . $row['image'] . "' alt=''>";
            echo "<div class='details'>";
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p><strong>MRP:</strong> ₹" . $row['mrp'] . "</p>";
            echo "<p><strong>Gender:</strong> " . ucfirst($row['gender']) . "</p>"; // Display gender
            echo "<p><a href='" . $row['location_url'] . "' target='_blank'>View Location</a></p>";
            echo "<button onclick=\"showPopup('{$row['name']}', '{$row['description']}', '{$row['mrp']}', '{$row['location_url']}', '{$row['views']}')\">More Details</button>";
            echo "</div></div>";
        }
        ?>
    </div>
</div>

<div id="popupBox" class="popup">
    <div id="popupContent"></div>
</div>

</body>
</html>
