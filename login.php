<?php
session_start();
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = md5($_POST['password']); // pastikan di database juga pakai MD5

  $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $username;
    header("Location: dashboardadmin.html");
    exit;
  } else {
    echo "<script>alert('Username atau password salah!'); window.location='login.php';</script>";
  }
}
?>
