<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thuchanh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Xử lý các hành động
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra action được gửi từ client
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'add':
                themSach();
                break;
            case 'sua':
                suaSach();
                break;
            default:
                // Xử lý mặc định khi không có action phù hợp
                break;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Kiểm tra action được gửi từ client
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case 'layDanhSach':
                layDanhSachSach();
                break;
            case 'xoa':
                xoaSach();
                break;
            default:
                // Xử lý mặc định khi không có action phù hợp
                break;
        }
    }
}

function themSach() {
    global $conn;

    // Lấy dữ liệu từ form
    $maSach = $_POST['masach'];
    $tensach = $_POST['tensach'];
    $sotrang = $_POST['sotrang'];
    $gia = $_POST['gia'];
    $namxb = $_POST['namxb'];
    $tinhtrangsach = $_POST['tinhtrangsach'];
    $tentg = $_POST['tentg'];
    $tennxb = $_POST['tennxb'];
    $soluong = $_POST['soluong'];

    $check_query = "SELECT * FROM sach WHERE masach = '$maSach' AND tensach = '$tensach' AND tentg = '$tentg' AND tennxb = '$tennxb' AND soluong = '$soluong'";

    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // Sách đã tồn tại
        echo "has exit";
    }else{
        $sql = "INSERT INTO sach (masach, tensach, sotrang, gia, namxb, tinhtrangsach, tentg, tennxb, soluong) VALUES ('$maSach','$tensach', $sotrang, $gia, $namxb, '$tinhtrangsach', '$tentg', '$tennxb', $soluong)";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm sách thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
    // SQL để thêm sách vào CSDL
    
}

function layDanhSachSach() {
    global $conn;

    // SQL để lấy danh sách sách từ CSDL
    $sql = "SELECT * FROM sach";
    $result = $conn->query($sql);

    $sachArray = array(); // Tạo một mảng để lưu trữ dữ liệu sách

    if ($result->num_rows > 0) {
        // Lưu thông tin sách vào mảng
        while ($row = $result->fetch_assoc()) {
            $sachArray[] = $row;
        }
    }

    // Trả về mảng sách dưới dạng JSON
    echo json_encode($sachArray);
}

function xoaSach() {
    global $conn;

    // Lấy mã sách cần xóa từ tham số truyền vào
    $masach = $_GET['masach'];

    // SQL để xóa sách từ CSDL
    // $sqlPhieuMuon = "DELETE from phieumuon WHERE masach = $masach";

    // $sqlBienban = "DELETE FROM bienban WHERE masach = $masach";

    // $sql = "DELETE FROM sach WHERE masach = $masach";

    // if($conn->query($sqlPhieuMuon)===true){
    //     echo "delete";
    // }else{
    //     echo "Lỗi không xóa được";
    // }

    // if($conn->query($sqlBienban) === true){
    //     echo "deleteBienban";
    // }else{
    //     echo "Lỗi không xóa được";
    // }

    // if ($conn->query($sql) === TRUE) {
    //     echo "delete";
    // } else {
    //     echo "Lỗi: " . $sql . "<br>" . $conn->error;
    // }

    $conn->begin_transaction();

    // Xóa từ bảng muontra
    $foreign_key_tables = array("phieumuon", "bienban");

    // Xóa từ các bảng có khóa ngoại masv
    foreach ($foreign_key_tables as $table) {
        $sql_delete = "DELETE FROM $table WHERE masach = '$masach'";
        $conn->query($sql_delete);
    }

    // Xóa từ bảng sinhvien
    $sql_delete_sach = "DELETE FROM sach WHERE masach = '$masach'";
    if ($conn->query($sql_delete_sach) === TRUE) {
        // Kết thúc giao dịch
        $conn->commit();
        echo "Xóa masv thành công!";
    } else {
        // Rollback giao dịch nếu có lỗi
        $conn->rollback();
        echo "Lỗi khi xóa masv: " . $conn->error;
    }
}

function suaSach() {
    global $conn;

    // Lấy thông tin sách từ form
    $masach = $_POST['masach'];
    $tensach = $_POST['tensach'];
    $sotrang = $_POST['sotrang'];
    $gia = $_POST['gia'];
    $namxb = $_POST['namxb'];
    $tinhtrangsach = $_POST['tinhtrangsach'];
    $tentg = $_POST['tentg'];
    $tennxb = $_POST['tennxb'];
    $soluong = $_POST['soluong'];

    // SQL để cập nhật thông tin sách trong CSDL
    $sql = "UPDATE sach SET tensach='$tensach', sotrang='$sotrang', gia='$gia', namxb='$namxb', tinhtrangsach='$tinhtrangsach', tentg='$tentg', tennxb='$tennxb', soluong='$soluong' WHERE masach='$masach'";

    if ($conn->query($sql) === TRUE) {
        echo "Sửa sách thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
// Đóng kết nối CSDL
$conn->close();
?>
