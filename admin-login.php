<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=your_db_name", "db_user", "db_pass");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['admin_logged_in'] = true;
    header('Location: admin-panel.php');
    exit;
  } else {
    $error = 'Invalid username or password.';
  }
}
?>
