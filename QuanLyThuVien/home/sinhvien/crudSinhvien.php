<?php

// Hàm để lấy danh sách mã NV
function getManvData()
{
    // Thay đổi thông tin kết nối CSDL tùy thuộc vào môi trường của bạn
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "thuchanh";

    // Tạo kết nối đến CSDL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn SQL để lấy danh sách mã NV
    $sql = "SELECT DISTINCT manv FROM nhanvien";
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả
    $manvList = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $manvList[] = $row["manv"];
        }
    }

    // Đóng kết nối
    $conn->close();

    // Trả về danh sách mã NV dưới dạng JSON
    return json_encode($manvList);
}

// Hàm để lấy danh sách sinh viên
function getSinhvienData()
{
    // Thay đổi thông tin kết nối CSDL tùy thuộc vào môi trường của bạn
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "thuchanh";

    // Tạo kết nối đến CSDL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn SQL để lấy danh sách sinh viên
    $sql = "SELECT * FROM sinhvien";
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả
    $sinhvienHTML = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sinhvienHTML .= "<tr>";
            $sinhvienHTML .= "<td>" . $row["masv"] . "</td>";
            $sinhvienHTML .= "<td>" . $row["hoten"] . "</td>";
            $sinhvienHTML .= "<td>" . $row["gioitinh"] . "</td>";
            $sinhvienHTML .= "<td>" . $row["lop"] . "</td>";
            $sinhvienHTML .= "<td>" . $row["ngaysinh"] . "</td>";
            $sinhvienHTML .= "<td>" . $row["diachi"] . "</td>";
            $sinhvienHTML .= "<td>" . $row["khoa"] . "</td>";
            $sinhvienHTML .= "<td>" . $row["manv"] . "</td>";
            $sinhvienHTML .= "<td><img src='{$row['image']}' alt='Ảnh sinh viên' style='width:50px;height:50px;'></td>";
            $sinhvienHTML .= "<td><button class='edit-btn'><i class='fa-solid fa-pen-to-square'></i></button>";
            // $sinhvienHTML .= "<button type='button' class='delete-btn'>Xóa</button></td>";
            $sinhvienHTML .= "</tr>";
        }
    }

    // Đóng kết nối
    $conn->close();

    // Trả về dữ liệu sinh viên dưới dạng HTML
    return $sinhvienHTML;
}

// Hàm để kiểm tra xem mã NV đã tồn tại chưa
function manvExists($manv)
{
    // Thay đổi thông tin kết nối CSDL tùy thuộc vào môi trường của bạn
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "thuchanh";

    // Tạo kết nối đến CSDL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn SQL để kiểm tra xem mã NV đã tồn tại trong CSDL hay không
    $sql = "SELECT * FROM sinhvien WHERE manv = '$manv'";
    $result = $conn->query($sql);

    // Đóng kết nối
    $conn->close();

    return $result->num_rows > 0;
}

// Hàm để thêm mã NV vào CSDL
function addManv($manv)
{
    // Thay đổi thông tin kết nối CSDL tùy thuộc vào môi trường của bạn
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "thuchanh";

    // Tạo kết nối đến CSDL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn SQL để thêm mã NV vào CSDL
    $sql = "INSERT INTO manv_table (manv) VALUES ('$manv')";

    // Kiểm tra và xử lý kết quả
    if ($conn->query($sql) !== TRUE) {
        echo "Lỗi: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}

// Xử lý request
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if ($_GET["action"] === "getManvData") {
        echo getManvData();
    } else {
        echo getSinhvienData();
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "add") {
    // Thêm sinh viên
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "thuchanh";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $masv = $_POST["masv"];
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    $lop = $_POST["lop"];
    $ngaysinh = $_POST["ngaysinh"];
    $diachi = $_POST["diachi"];
    $khoa = $_POST["khoa"];
    $manv = $_POST["manv"];
    $image = "default.jpg"; // Ảnh mặc định nếu không có ảnh
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $imageDir = "uploads/";
        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetPath = $imageDir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath);
        $image = $targetPath;
    }

    $sql = "INSERT INTO sinhvien (masv, hoten, gioitinh, lop, ngaysinh, diachi, khoa, manv, image)
            VALUES ('$masv', '$hoten', '$gioitinh', '$lop', '$ngaysinh', '$diachi', '$khoa', '$manv', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm sinh viên thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] === "sua") {
    // Sửa sinh viên
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "thuchanh";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $masv = $_POST["masv"];
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    $lop = $_POST["lop"];
    $ngaysinh = $_POST["ngaysinh"];
    $diachi = $_POST["diachi"];
    $khoa = $_POST["khoa"];
    $manv = $_POST["manv"];

    // Xử lý upload ảnh (nếu cần)
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $updateImage = ", image='$target_file'";
    } else {
        $updateImage = "";
    }

    $sql = "UPDATE sinhvien SET hoten='$hoten', gioitinh='$gioitinh', lop='$lop', ngaysinh='$ngaysinh', diachi='$diachi', khoa='$khoa', manv='$manv' $updateImage WHERE masv='$masv'";

    if ($conn->query($sql) === TRUE) {
        echo "Sửa sinh viên thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    // Xóa sinh viên
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "thuchanh";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    parse_str(file_get_contents("php://input"), $deleteData);
    $masv = $_GET["masv"];

    $sql = "DELETE FROM sinhvien WHERE masv='$masv'";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa sinh viên thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}
