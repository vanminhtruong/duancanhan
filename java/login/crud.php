<?php
session_start();
// Kết nối với cơ sở dữ liệu và khai báo thông tin đăng nhập
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thuchanh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Nhận dữ liệu từ giao diện đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM taikhoan WHERE user='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        // So sánh mật khẩu nhập vào với mật khẩu hash từ cơ sở dữ liệu
        if (password_verify($password, $hashedPassword)) {
            // Đăng nhập thành công
            echo "success";
            $_SESSION["username"] = $username;
            $cookie_name = "username";
            $cookie_value = $username;
            $cookie_expire = time() + 3600; // Thời hạn là 1 giờ kể từ thời điểm hiện tại
            setcookie($cookie_name, $cookie_value, $cookie_expire, "http://localhost:8081/jquery/java/login/index.php");
        } else {
            // Đăng nhập thất bại
            echo "failure";
        }
    } else {
        // Đăng nhập thất bại
        echo "failure";
    }
}

$conn->close();
