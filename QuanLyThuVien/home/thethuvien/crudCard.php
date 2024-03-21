<?php
// Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối theo cấu hình của bạn)
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

// Xử lý yêu cầu tạo mới thẻ thư viện
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $mathe = $_POST['mathe'];
    $thoigiancap = $_POST['thoigiancap'];
    $hsd = $_POST['hsd'];
    $masv = $_POST['masv'];

    $check_sql = "SELECT * FROM thethuvien WHERE mathe = '$mathe'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        // Nếu mã thẻ đã tồn tại, trả về thông báo lỗi
        $response = array("success" => false, "message" => "Mã thẻ đã tồn tại trong hệ thống.");
        echo json_encode($response);
        exit; // Dừng việc thực thi tiếp theo
    }

    // Insert dữ liệu vào bảng thethuvien
    $sql = "INSERT INTO thethuvien (mathe, thoigiancap, hsd, masv) VALUES ('$mathe', '$thoigiancap', '$hsd', '$masv')";

    if ($conn->query($sql) === TRUE) {
        // Trả về kết quả thành công
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        // Trả về thông báo lỗi nếu có lỗi trong quá trình thêm dữ liệu
        $response = array("success" => false, "message" => "Lỗi: " . $conn->error);
        echo json_encode($response);
    }
}

// Xử lý yêu cầu đọc dữ liệu mã sinh viên (masv)
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Truy vấn để lấy dữ liệu từ bảng thethuvien
    $sql = "SELECT masv FROM sinhvien";
    $result = $conn->query($sql);

    // Tạo một mảng chứa dữ liệu để trả về dưới dạng JSON
    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Đóng kết nối
$conn->close();
?>
