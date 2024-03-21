<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay username bằng username của bạn
$password = "root"; // Thay password bằng password của bạn
$dbname = "thuchanh"; // Thay ten_database bằng tên database của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng bienban
if (isset($_GET['action']) && $_GET['action'] == 'count') {
    // Truy vấn để đếm số lượng từng mã biên bản
    $sql = "SELECT COUNT(*) as count FROM bienban";
    $result = $conn->query($sql);

    // Lấy dữ liệu từ kết quả trả về
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[$row['mabienban']] = $row['count'];
        }
    }

    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($data);
} else {
    // Truy vấn dữ liệu từ bảng bienban
    $sql = "SELECT * FROM bienban";
    $result = $conn->query($sql);

    // Lấy dữ liệu từ kết quả trả về
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($data);
}

// Trả về dữ liệu dưới dạng JSON

// Đóng kết nối
$conn->close();
