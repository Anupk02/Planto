<?php
session_start();

if (isset($_POST['reset'])) {
  $conn = mysqli_connect("localhost", "root", "", "customers");
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  
  // Verify that the new passwords match
  if ($password === $cpassword) {
    // Hash the new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Update the user's password in the database
    $sql = "UPDATE customerdata SET password = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $email);
    mysqli_stmt_execute($stmt);
    
    if (mysqli_stmt_affected_rows($stmt) > 0) {
      echo "<div class='alert alert-success'>Password reset successful. You can now log in with your new password.</div>";
    } else {
      echo "<div class='alert alert-danger'>Password reset failed. Please check your email and try again.</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Passwords do not match.</div>";
  }
}
?>
