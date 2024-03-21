<?php
// Kết nối đến cơ sở dữ liệu. Thay đổi các thông số kết nối cho phù hợp.
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thuchanh";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra hành động được yêu cầu từ AJAX
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    
    // Nếu yêu cầu tính tổng của cột "mathe"
    if($action === 'sumMathe') {
        // Truy vấn SQL để tính tổng của cột "mathe"
        $sql = "SELECT COUNT(mathe) AS totalMathe FROM thethuvien";
        $result = $conn->query($sql);
        
        // Kiểm tra và trả về kết quả dưới dạng JSON
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data['totalMathe'] = $row['totalMathe'];
            echo json_encode($data);
        } else {
            $data['totalMathe'] = 0;
            echo json_encode($data);
        }
    }
    // Nếu yêu cầu lấy dữ liệu từ bảng "thethuvien"
    elseif($action === 'getData') {
        // Truy vấn SQL để lấy dữ liệu từ bảng "thethuvien"
        $sql = "SELECT * FROM thethuvien";
        $result = $conn->query($sql);
        
        // Kiểm tra và trả về kết quả dưới dạng JSON
        if ($result->num_rows > 0) {
            $data = array();
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            $data = array();
            echo json_encode($data);
        }
    }
    // Nếu hành động không hợp lệ
    else {
        echo "Hành động không hợp lệ.";
    }
}

// Đóng kết nối
$conn->close();
?>
