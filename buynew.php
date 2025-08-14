<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Order Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 40px;
    }

    h2 {
      color: #333;
    }

    form {
      background-color: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      margin: auto;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="number"],
    select,
    textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #28a745;
      color: white;
      padding: 12px 20px;
      margin-top: 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #218838;
    }
.quantity-wrapper {
  display: flex;
  align-items: center;
  gap: 5px;
  max-width: 120px;
}

.quantity-wrapper input {
  text-align: center;
  width: 60px;
}

.qty-btn {
  width: 30px;
  height: 30px;
  font-size: 18px;
  font-weight: bold;
  background-color: #ddd;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  line-height: 1;
  transition: background-color 0.2s;
}

.qty-btn:hover {
  background-color: #bbb;
}

    .confirmation {
      max-width: 500px;
      margin: 40px auto;
      background-color: #e9ffe9;
      padding: 20px;
      border-left: 5px solid #28a745;
      border-radius: 5px;
    }

    .error {
      color: red;
      font-weight: bold;
      text-align: center;
    }
  </style>
  <link rel="stylesheet" href="style2.css">
</head>
<body>
     <header>
        <div class="logo">
            <img src="logo.jpg" alt="Website Logo">
        </div>
        <nav>
            <div class="nav-controls">
                <div class="home"><a href="index.php">Home</a></div>                
                <div class="city-select">
                    <select>
                        <option value="">Select City</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="delhi">Delhi</option>
                        <option value="bangalore">Bangalore</option>
                    </select>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                </div>
            </div>
        </nav>
        <div class="auth-buttons">
            <a href="login.php" class="login">Login</a>
            <a href="signup.php" class="signup">Sign Up</a>
        </div>
        <button id="darkModeToggle">Dark Mode</button>
    </header>

<?php
// Initialize values
$product_id = $_POST['product_id'] ?? '';
$customer_name = $_POST['customer_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';
$quantity = $_POST['quantity'] ?? 1;
$payment_method = $_POST['payment_method'] ?? '';
$instructions = $_POST['instructions'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate required fields
    $required_fields = ['product_id', 'customer_name', 'email', 'phone', 'address', 'quantity', 'payment_method'];
    $missing = false;

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing = true;
            break;
        }
    }

    if (!$missing) {
        // Sanitize inputs
        $product_id = htmlspecialchars($product_id);
        $customer_name = htmlspecialchars($customer_name);
        $email = htmlspecialchars($email);
        $phone = htmlspecialchars($phone);
        $address = htmlspecialchars($address);
        $quantity = (int)$quantity;
        $payment_method = htmlspecialchars($payment_method);
        $instructions = htmlspecialchars($instructions);

        // Show confirmation
        echo "<div class='confirmation'>";
        echo "<h2>Order Confirmation</h2>";
        echo "<p><strong>Product ID:</strong> $product_id</p>";
        echo "<p><strong>Name:</strong> $customer_name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Shipping Address:</strong> $address</p>";
        echo "<p><strong>Quantity:</strong> $quantity</p>";
        echo "<p><strong>Payment Method:</strong> $payment_method</p>";
        if (!empty($instructions)) {
            echo "<p><strong>Special Instructions:</strong> $instructions</p>";
        }
        echo "<p><strong>Thank you for your purchase!</strong></p>";
        echo "</div>";
    } else {
        echo "<p class='error'>Please fill in all required fields.</p>";
    }
}
?>

<form method="POST" action="">
  <h2>Product Order Form</h2>

  <label for="product_id">Product ID:</label>
  <input type="text" name="product_id" id="product_id" value="<?= htmlspecialchars($product_id) ?>" required>

  <label for="customer_name">Full Name:</label>
  <input type="text" name="customer_name" id="customer_name" value="<?= htmlspecialchars($customer_name) ?>" required>

  <label for="email">Email Address:</label>
  <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>

  <label for="phone">Phone Number:</label>
  <input type="tel" name="phone" id="phone" value="<?= htmlspecialchars($phone) ?>" required>

  <label for="address">Shipping Address:</label>
  <textarea name="address" id="address" rows="4" required><?= htmlspecialchars($address) ?></textarea>

  <label for="quantity">Quantity:</label>
<div class="quantity-wrapper">
  <button type="button" class="qty-btn" onclick="changeQuantity(-1)">−</button>
  <input type="number" name="quantity" id="quantity" min="1" value="<?= htmlspecialchars($quantity) ?>" required>
  <button type="button" class="qty-btn" onclick="changeQuantity(1)">+</button>
</div>


  <label for="payment_method">Payment Method:</label>
  <select name="payment_method" id="payment_method" required>
    <option disabled value="">-- Select --</option>
    <option value="online" <?= $payment_method === 'online' ? 'selected' : '' ?>>Pay Online</option>
    <option value="Cash on Delivery" <?= $payment_method === 'Cash on Delivery' ? 'selected' : '' ?>>Cash on Delivery</option>
  </select>

  <label for="instructions">Special Instructions (optional):</label>
  <textarea name="instructions" id="instructions" rows="3"><?= htmlspecialchars($instructions) ?></textarea>

  <input type="submit" value="Buy Now">
</form>
<script src="script.js"></script>
</body>
</html>
