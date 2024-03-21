<?php
// Lấy thông tin sinh viên dựa trên mã sinh viên từ tham số truyền vào
if (isset($_GET["maphieumuon"])) {
    $maphieumuon = $_GET["maphieumuon"];

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

    $sql = "SELECT * FROM phieumuon WHERE maphieumuon='$maphieumuon'";
    $result = $conn->query($sql);

    $sqlSach = "select masach from sach";
    $resultMasach = $conn->query($sqlSach);

    $sqlSinhVien = "select masv from sinhvien";
    $resultSinhVien = $conn->query($sqlSinhVien);

    $sqlTrangThai = "SELECT DISTINCT trangthai from phieumuon";
    $resultTrangThai = $conn->query($sqlTrangThai);

    if ($result->num_rows > 0) {
        $sinhvien = $result->fetch_assoc();
        $selectedMaSach = $sinhvien['masach'];
        $selectedMaSv = $sinhvien['masv'];
        $selectedTrangThai = $sinhvien['trangthai'];
        echo "<script>console.log(`$selectedTrangThai`)</script>";
    } else {
        echo "Không tìm thấy sinh viên.";
        $conn->close();
        exit();
    }

    // if($resultTrangThai->num_rows > 0){
    //     $trangthai = $resultTrangThai->fetch_assoc();
    //     $selectedTrangThai = $trangthai['trangthai'];
    // }



    // if($resultMasach->num_rows>0){
    //     $dataSach = $resultMasach->fetch_assoc();
    // }else{
    //     echo "Không tìm thấy sách";
    //     exit();
    // }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Mã sinh viên không được cung cấp.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="sua.css">
</head>

<body>
    <div class="container">
        <div class="box">
            <h2>Thông Tin Sửa Phiếu Mượn</h2>
            <form id="suaForm">
                <table>
                    <tr>
                        <td>
                            <label for="maphieumuon" hidden>Mã phiếu mượn</label>
                        </td>

                        <td>
                            <input hidden type="text" id="maphieumuon" name="maphieumuon" value="<?php echo $sinhvien['maphieumuon']; ?>" required><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="ngaymuon">Ngày Mượn:</label>
                        </td>
                        <td>
                            <input type="date" id="ngaymuon" name="ngaymuon" value="<?php echo $sinhvien['ngaymuon']; ?>" required><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="ngaytra">Ngày Trả:</label>
                        </td>
                        <td>
                            <input type="date" id="ngaytra" name="ngaytra" value="<?php echo $sinhvien['ngaytra']; ?>" required><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="soluong">Số Lượng:</label>
                        </td>
                        <td>
                            <input type="text" id="soluong" name="soluong" value="<?php echo $sinhvien['soluong']; ?>" required><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tinhtrangsach">Tình Trạng Sách:</label>
                        </td>
                        <td>
                            <input type="text" id="tinhtrangsach" name="tinhtrangsach" value="<?php echo $sinhvien['tinhtrangsach']; ?>" required><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="masach">Mã Sách:</label>
                        </td>

                        <td>
                            <select id="masach" name="masach" required>
                                <?php
                                if ($resultMasach->num_rows > 0) {
                                    while ($dataSach = $resultMasach->fetch_assoc()) {
                                        $optionValue = $dataSach["masach"];

                                        // Nếu id của option trùng với id được chọn trước đó, đặt thuộc tính selected
                                        $isSelected = ($optionValue == $selectedMaSach) ? "selected" : "";

                                ?>
                                        <option value="<?php echo $optionValue ?>" <?php echo $isSelected ?>><?php echo $optionValue ?></option>
                                <?php
                                        // echo "<script>console.log(JSON.stringify($dataSach[masach]))</script>";
                                    }
                                }

                                ?>
                            </select><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="masv">Mã Sinh Viên:</label>
                        </td>
                        <td>
                            <select id="masv" name="masv" required>
                                <?php
                                if ($resultSinhVien->num_rows > 0) {
                                    while ($dataSach = $resultSinhVien->fetch_assoc()) {
                                        $optionValue = $dataSach["masv"];
                                        // Nếu id của option trùng với id được chọn trước đó, đặt thuộc tính selected
                                        $isSelected = ($optionValue == $selectedMaSv) ? "selected" : "";

                                ?>
                                        <option value="<?php echo $optionValue ?>" <?php echo $isSelected ?>><?php echo $optionValue ?></option>
                                <?php
                                        // echo "<script>console.log(JSON.stringify($dataSach[masach]))</script>";
                                    }
                                }
                                ?>
                            </select><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="trangthai">Trạng Thái:</label>
                        </td>
                        <td>
                            <select id="trangthai" name="trangthai" required>
                                <option value="Đang Mượn">Đang Mượn</option>
                                <option value="Chưa Mượn">Chưa Mượn</option>
                                <option value="Đã Trả">Đã Trả</option>
                                <?php
                                if ($resultTrangThai->num_rows > 0) {
                                    while ($dataSach = $resultTrangThai->fetch_assoc()) {
                                        $optionValue = $dataSach["trangthai"];
                                        // Nếu id của option trùng với id được chọn trước đó, đặt thuộc tính selected
                                        $isSelected = ($optionValue == $selectedTrangThai) ? "selected" : "";

                                ?>
                                        <option value="<?php echo $optionValue ?>" <?php echo $isSelected ?>><?php echo $optionValue ?></option>
                                <?php
                                        // echo "<script>console.log(JSON.stringify($dataSach[masach]))</script>";

                                    }
                                }

                                ?>
                            </select><br>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="button">
                                <button type="button" onclick="luuSua()" id="save">Save</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
<script>
    function luuSua() {
        var formData = $('#suaForm').serialize();
        formData += '&action=update';
        $.ajax({
            url: 'crudMuonTra.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Sau khi cập nhật, quay lại trang sach.php và cập nhật danh sách
                window.location.href = "muontra.php";
            }
        });
    }
</script>

</html>