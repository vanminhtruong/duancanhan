<?php
// Kết nối đến cơ sở dữ liệu (Hãy thay đổi thông tin kết nối theo cấu hình thực tế của bạn)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thuchanh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Hàm lấy danh sách vi phạm và hiển thị ra bảng HTML
function getViPhamList($conn)
{
    $html = "";
    $sql = "SELECT * FROM bienban";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $html .= "<tr>";
            $html .= "<td>{$row['mabienban']}</td>";
            $html .= "<td>{$row['masv']}</td>";
            $html .= "<td>{$row['masach']}</td>";
            $html .= "<td>{$row['loivipham']}</td>";
            $html .= "<td>{$row['bienphapxuly']}</td>";
            $html .= "<td>{$row['ngay']}</td>";
            $html .= "<td><button class='edit-button' onclick='editViPham(\"{$row['mabienban']}\")'><i class='fa-solid fa-pen-to-square'></i></button></td>";
            $html .= "<td><button class='delete-button' onclick='deleteViPham(\"{$row['mabienban']}\")' data-mabienban='{$row['mabienban']}'><i class='fa-solid fa-trash'></i></button></td>";
            $html .= "</tr>";
        }
    } else {
        $html = "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
    }

    echo $html;
}

// Hàm lấy thông tin của một vi phạm dựa trên mabienban
function getViPhamInfo($conn, $mabienban)
{
    $sql = "SELECT * FROM bienban WHERE mabienban='$mabienban'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $viPhamInfo = $result->fetch_assoc();
        echo json_encode($viPhamInfo);
    } else {
        echo "Không tìm thấy thông tin vi phạm";
    }
}

// Hàm thêm mới vi phạm
function insertViPham($conn, $data)
{
    $mabienban = $data['mabienban'];
    $masv = $data['masv'];
    $masach = $data['masach'];
    $loivipham = $data['loivipham'];
    $bienphapxuly = $data['bienphapxuly'];
    $ngay = $data['ngay'];

    $sql = "INSERT INTO bienban (mabienban ,masv, masach, loivipham, bienphapxuly, ngay) VALUES ('$mabienban','$masv', '$masach', '$loivipham', '$bienphapxuly', '$ngay')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm mới thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Hàm cập nhật vi phạm
function updateViPham($conn, $data)
{
    $mabienban = $data['mabienban'];
    $masv = $data['masv'];
    $masach = $data['masach'];
    $loivipham = $data['loivipham'];
    $bienphapxuly = $data['bienphapxuly'];
    $ngay = $data['ngay'];

    $sql = "UPDATE bienban SET loivipham='$loivipham', bienphapxuly='$bienphapxuly', ngay='$ngay' WHERE mabienban='$mabienban'";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thành công<br>";
        echo $sql;
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Hàm xóa vi phạm
function deleteViPham($conn, $mabienban)
{
    $sql = "DELETE FROM bienban WHERE mabienban='$mabienban'";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

function getDanhSachSinhVien($conn)
{
    $html = "";
    $sql = "SELECT * FROM sinhvien";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $html .= "<option value='{$row['masv']}'>{$row['masv']}</option>";
        }
    } else {
        $html = "<option value=''>Không có dữ liệu</option>";
    }

    return $html;
}

function getDanhSachSach($conn)
{
    $html = "";
    $sql = "SELECT * FROM sach";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $html .= "<option value='{$row['masach']}'>{$row['masach']}</option>";
        }
    } else {
        $html = "<option value=''>Không có dữ liệu</option>";
    }

    return $html;
}

// Xử lý các yêu cầu từ client
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lấy danh sách vi phạm
    if (isset($_GET['action']) && $_GET['action'] === 'getList') {
        getViPhamList($conn);
    }

    // Lấy thông tin vi phạm dựa trên mabienban
    if (isset($_GET['mabienban'])) {
        getViPhamInfo($conn, $_GET['mabienban']);
    }

    if (isset($_GET['action']) && $_GET['action'] === 'getDanhSachSinhVien') {
        echo getDanhSachSinhVien($conn);
    }

    // Lấy danh sách sách
    if (isset($_GET['action']) && $_GET['action'] === 'getDanhSachSach') {
        echo getDanhSachSach($conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Thêm mới vi phạm
    if (isset($_POST['action']) && $_POST['action'] === 'insert') {
        insertViPham($conn, $_POST);
    }

    // Cập nhật vi phạm
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        updateViPham($conn, $_POST);
    }

    // Xóa vi phạm
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        deleteViPham($conn, $_POST['mabienban']);
    }
}

// Đóng kết nối
$conn->close();
