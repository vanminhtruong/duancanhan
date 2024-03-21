<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thuchanh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hàm để lấy dữ liệu masv và masach
function getMasvMasach()
{
    global $conn;

    $masvQuery = "SELECT masv FROM sinhvien";
    $masachQuery = "SELECT masach FROM sach";

    $masvResult = $conn->query($masvQuery);
    $masachResult = $conn->query($masachQuery);

    $data = array(
        'masv' => array(),
        'masach' => array()
    );

    while ($row = $masvResult->fetch_assoc()) {
        $data['masv'][] = $row['masv'];
    }

    while ($row = $masachResult->fetch_assoc()) {
        $data['masach'][] = $row['masach'];
    }

    echo json_encode($data);
}

function getMaPhieuMuonOptions()
{
    global $conn;

    $sql = "SELECT maphieumuon FROM phieumuon";
    $result = $conn->query($sql);

    $options = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options[] = $row['maphieumuon'];
        }
    }

    echo json_encode($options);
}

// Hàm để lấy tất cả dữ liệu từ bảng phieumuon
function getAll()
{
    global $conn;

    $query = "SELECT * FROM phieumuon";
    $result = $conn->query($query);

    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
}

// Hàm để thêm phiếu mượn mới
function addPhieuMuon()
{
    global $conn;

    $maphieumuon = $_POST['maphieumuon'];
    $ngaymuon = $_POST['ngaymuon'];
    $ngaytra = $_POST['ngaytra'];
    $soluong = $_POST['soluong'];
    $tinhtrangsach = $_POST['tinhtrangsach'];
    $masach = $_POST['masach'];
    $masv = $_POST['masv'];
    $trangthai = $_POST['trangthai'];

    $sql_check_exist = "SELECT * FROM phieumuon WHERE (masv = '$masv' AND masach = '$masach') OR maphieumuon = '$maphieumuon'";
    $result_check_exist = $conn->query($sql_check_exist);
    if ($result_check_exist->num_rows > 0) {
        echo "exit";
    }else{
        $query = "INSERT INTO phieumuon (maphieumuon,ngaymuon, ngaytra, soluong, tinhtrangsach, masach, masv, trangthai) VALUES ('$maphieumuon','$ngaymuon', '$ngaytra', '$soluong', '$tinhtrangsach', '$masach', '$masv', '$trangthai')";

        if ($conn->query($query) === TRUE) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $conn->error]);
        }
    }
}

// Hàm để sửa thông tin phiếu mượn
function updatePhieuMuon()
{
    global $conn;

    $maphieumuon = $_POST['maphieumuon'];
    $ngaymuon = $_POST['ngaymuon'];
    $ngaytra = $_POST['ngaytra'];
    $soluong = $_POST['soluong'];
    $tinhtrangsach = $_POST['tinhtrangsach'];
    $masach = $_POST['masach'];
    $masv = $_POST['masv'];
    $trangthai = $_POST['trangthai'];
    

    $query = "UPDATE phieumuon SET ngaymuon='$ngaymuon', ngaytra='$ngaytra', soluong='$soluong', tinhtrangsach='$tinhtrangsach', masach='$masach', masv='$masv', trangthai='$trangthai' WHERE maphieumuon='$maphieumuon'";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['status' => 'success']);
        echo $query;
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
}

// Hàm để xóa phiếu mượn
function deletePhieuMuon()
{
    global $conn;

    $maphieumuon = $_GET['ma'];

    $query = "DELETE FROM phieumuon WHERE maphieumuon='$maphieumuon'";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['status' => 'success']);
        echo $query;
        echo $maphieumuon;
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
}

function searchMuonTraByMaPhieuMuon($maPhieuMuon)
{
    global $conn;

    $sql = "SELECT * FROM phieumuon WHERE maphieumuon = '$maPhieuMuon'";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }else{
        $data = "Chưa có dữ liệu";
    }

    return $data;
}



// Xử lý request từ muontra.php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'get_masv_masach':
            getMasvMasach();
            break;
        case 'get_all':
            getAll();
            break;
        case 'get_ma_phieu_muon_options':
            getMaPhieuMuonOptions();
            break;
        case 'search_by_maphieumuon':
            if (isset($_GET['maphieumuon'])) {
                $maPhieuMuon = $_GET['maphieumuon'];
                $data = searchMuonTraByMaPhieuMuon($maPhieuMuon);
                echo json_encode($data);
            } else {
                echo json_encode(['error' => 'Missing maphieumuon parameter']);
            }
            break;
        default:
            // Xử lý các trường hợp khác nếu cần
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // deletePhieuMuon();
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    switch ($action) {
        case 'add':
            addPhieuMuon();
            break;
        case 'update':
            updatePhieuMuon();
            break;
        case 'delete':
            deletePhieuMuon();
            break;
        default:
            // Xử lý các trường hợp khác nếu cần
            break;
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'get_all') {
    $data = getMaPhieuMuonOptions();
    echo json_encode($data);
} 
elseif (isset($_GET['action']) && $_GET['action'] === 'get_ma_phieu_muon_options') {
    $options = getMaPhieuMuonOptions();
    echo json_encode($options);
}

$conn->close();
