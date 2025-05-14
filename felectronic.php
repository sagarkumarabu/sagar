
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
</body>
</html>
<?php
include 'config.php';

$sql = "SELECT * FROM products WHERE category = 'electronics'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "' style='width:100px;height:100px;'>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>₹" . $row['price'] . "</p>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<form action='buy.php' method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
        echo "<button type='submit'>Buy Now</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

$conn->close();
?>