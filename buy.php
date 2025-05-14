<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>    <h2></h2>
    <form method="POST" action="">
        <label for="product_id">Product ID:</label>
      <?php echo "<input  name='product_id' value='" . $_POST['product_id'] . "'>"; ?><br>
        <label for="customer_name">Full Name:</label><br>
        <input type="text" name="customer_name" id="customer_name" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="phone">Phone Number:</label><br>
        <input type="tel" name="phone" id="phone" required><br><br>

        <label for="address">Shipping Address:</label><br>
        <textarea name="address" id="address" rows="4" cols="40" required></textarea><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" id="quantity" min="1" value="1" required><br><br>

        <label for="payment_method">Payment Method:</label><br>
        <select name="payment_method" id="payment_method" required>
            <option disabled value="">-- Select --</option>
            <option value="online">pay online</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
        </select><br><br>

        <label for="instructions">Special Instructions (optional):</label><br>
        <textarea name="instructions" id="instructions" rows="3" cols="40"></textarea><br><br>

        <input type="submit" value="Buy Now">
    </form>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check for required fields
    $required_fields = ['product_id', 'customer_name', 'email', 'phone', 'address', 'quantity', 'payment_method'];
    $missing = false;

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing = true;
            break;
        }
    }

    if (!$missing) {
        // Sanitize and assign inputs
        $product_id = htmlspecialchars($_POST['product_id']);
        $customer_name = htmlspecialchars($_POST['customer_name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $address = htmlspecialchars($_POST['address']);
        $quantity = (int)$_POST['quantity'];
        $payment_method = htmlspecialchars($_POST['payment_method']);
        $instructions = htmlspecialchars($_POST['instructions']);

        // Display simulated order confirmation
        echo "<h2>Order Confirmation</h2>";
        echo "Product ID: $product_id <br>";
        echo "Name: $customer_name <br>";
        echo "Email: $email <br>";
        echo "Phone: $phone <br>";
        echo "Shipping Address: $address <br>";
        echo "Quantity: $quantity <br>";
        echo "Payment Method: $payment_method <br>";
        if ($instructions) {
            echo "Special Instructions: $instructions <br>";
        }
        echo "<p><strong>Thank you for your  purchase!</strong></p>";
    } else {
        echo "<p style='color:red;'>Please fill in all required fields.</p>";
    }
} else {
?>
<?php
}
?>
