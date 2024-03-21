<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thuchanh";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy dữ liệu từ bảng muonsach
$sql = "SELECT maphieumuon, ngaymuon, ngaytra, soluong, tinhtrangsach, trangthai FROM phieumuon where trangthai='Đang Mượn'";
$result = $conn->query($sql);

// Nếu có ít nhất một hàng dữ liệu
if ($result->num_rows > 0) {
    // Tạo một mảng để lưu trữ dữ liệu
    $data = array();
    
    // Duyệt qua mỗi hàng kết quả và thêm vào mảng dữ liệu
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    // Chuyển đổi mảng dữ liệu thành định dạng JSON và xuất ra
    echo json_encode($data);
} else {
    echo "Không có dữ liệu";
}
$conn->close();
?>
