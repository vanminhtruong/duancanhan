<?php

// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thuchanh";

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Hàm truy vấn dữ liệu
function getData()
{
    // Thực hiện truy vấn CSDL và trả về kết quả
    // Ví dụ: Giả sử bạn sử dụng MySQL, câu lệnh SQL có thể như sau:
    global $conn;
    $sql = "SELECT phieumuon.masv, phieumuon.masach, tensach, trangthai, hoten, gioitinh, ngaymuon, ngaytra
            FROM phieumuon
            JOIN sinhvien ON phieumuon.masv = sinhvien.masv
            JOIN sach ON phieumuon.masach = sach.masach";
    $result = $conn->query($sql);

    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

function getMaSV()
{
    global $conn;

    $sql = "SELECT masv FROM sinhvien";
    $result = $conn->query($sql);

    $options = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options[] = $row['masv'];
        }
    }

    echo json_encode($options);
}
function searchMuonTraByMaPhieuMuon($masv)
{
    global $conn;

    $sql = "SELECT phieumuon.masv, phieumuon.masach, tensach, trangthai, hoten, gioitinh, ngaymuon, ngaytra
            FROM phieumuon
            JOIN sinhvien ON phieumuon.masv = sinhvien.masv
            JOIN sach ON phieumuon.masach = sach.masach where phieumuon.masv='$masv'";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Xử lý yêu cầu từ jQuery AJAX
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    switch($action) {
        case 'get_ma_phieu_muon_options':
            getMaSV();
            break;
        case 'search_by_maphieumuon':
            if (isset($_GET['masv'])) {
                $maPhieuMuon = $_GET['masv'];
                $data = searchMuonTraByMaPhieuMuon($maPhieuMuon);
                echo json_encode($data);
            } else {
                echo json_encode(['error' => 'Missing maphieumuon parameter']);
            }
            break;
        default:
            display();
            break;
    }
    
}

function display(){
    $result = getData();
    echo ($result);
}

mysqli_close($conn);
