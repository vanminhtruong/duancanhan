<?php
// Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối theo cấu hình của bạn)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thuchanh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Nhận dữ liệu từ request
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Hash mật khẩu (bạn nên sử dụng phương pháp bảo mật phù hợp)
$checkExistQuery = "SELECT * FROM taikhoan WHERE user = '$username' OR email = '$email'";
$result = $conn->query($checkExistQuery);

if ($result->num_rows > 0) {
    // Tên người dùng đã tồn tại, trả về thông báo lỗi
    echo "duplicate";
} else {
    // Hash mật khẩu
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Thực hiện chức năng đăng ký
    $insertQuery = "INSERT INTO taikhoan (user, password, email) VALUES ('$username', '$hashedPassword','$email')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "success";
    } else {
        echo "Lỗi: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
