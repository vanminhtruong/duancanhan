<?php
// Connect to your database
// Replace 'localhost', 'username', 'password', and 'database' with your actual database details
$conn = new mysqli('localhost', 'root', 'root', 'thuchanh');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Truy vấn để lấy dữ liệu từ bảng thethuvien
    $sql = "SELECT DISTINCT masv FROM thethuvien";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        // Lặp qua từng hàng và lưu vào mảng
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data); // Trả về dữ liệu dưới dạng JSON
    } else {
        echo "0 results";
    }
}
// Nếu gửi yêu cầu POST, kiểm tra dữ liệu trùng khớp
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $mathe = $_POST['mathe'];
    $thoigiancap = $_POST['thoigiancap'];
    $hsd = $_POST['hsd'];
    $masv = $_POST['masv'];

    // Truy vấn để kiểm tra dữ liệu có tồn tại trong cơ sở dữ liệu hay không
    $sql = "SELECT * FROM thethuvien WHERE mathe = '$mathe' AND thoigiancap = '$thoigiancap' AND hsd = '$hsd' AND masv = '$masv'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo 'success';
    } else {
        echo 'error';
    }
}

$conn->close();
?>
