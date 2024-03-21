<?php
// Lấy thông tin sinh viên dựa trên mã sinh viên từ tham số truyền vào
if (isset($_GET["masv"])) {
    $masv = $_GET["masv"];

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

    $sql = "SELECT * FROM sinhvien WHERE masv='$masv'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sinhvien = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy sinh viên.";
        $conn->close();
        exit();
    }

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sinh viên</title>
    <link rel="stylesheet" href="./css/suaSinhVien.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="group-form">
                <form id="editForm" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <h2>Thông Tin Sửa Sinh Viên</h2>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="masv">Mã SV:</label>
                            </td>

                            <td>
                                <input type="text" id="masv" name="masv" value="<?php echo $sinhvien['masv']; ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="hoten">Họ tên:</label>
                            </td>

                            <td>
                                <input type="text" id="hoten" name="hoten" value="<?php echo $sinhvien['hoten']; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="gioitinh">Giới tính:</label>
                            </td>

                            <td>
                                <select name="gioitinh" id="gioitinh">
                                    <?php if ($_GET['gioitinh'] == 'Nam') : ?>
                                        <option value="Nam" selected>Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    <?php else : ?>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ" selected>Nữ</option>
                                    <?php endif; ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="lop">Lớp:</label>
                            </td>

                            <td>
                                <input type="text" id="lop" name="lop" value="<?php echo $sinhvien['lop']; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="ngaysinh">Ngày sinh:</label>
                            </td>

                            <td>
                                <input type="date" id="ngaysinh" name="ngaysinh" value="<?php echo $sinhvien['ngaysinh']; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="diachi">Địa chỉ:</label>
                            </td>

                            <td>
                                <input type="text" id="diachi" name="diachi" value="<?php echo $sinhvien['diachi']; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="khoa">Khoa:</label>
                            </td>

                            <td>
                                <input type="text" id="khoa" name="khoa" value="<?php echo $sinhvien['khoa']; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="manv">Mã NV:</label>
                            </td>

                            <td>
                                <input type="text" id="manv" name="manv" value="<?php echo $sinhvien['manv']; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="image">Ảnh:</label>
                            </td>

                            <td>
                                <input type="file" id="image" name="imageSua" accept="image/*">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <div class="button">
                                    <input type="submit" value="Lưu" id="submit">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <!-- Kịch bản jQuery -->
    <script>
        $(document).ready(function() {
            // Xử lý sự kiện submit của form sửa sinh viên
            $("#editForm").submit(function(event) {
                event.preventDefault();

                var masv = $("#masv").val();
                var hoten = $("#hoten").val();
                var gioitinh = $("#gioitinh").val();
                var lop = $("#lop").val();
                var ngaysinh = $("#ngaysinh").val();
                var diachi = $("#diachi").val();
                var khoa = $("#khoa").val();
                var manv = $("#manv").val();

                var imageInput = $("#image")[0];
                var image = (imageInput.files && imageInput.files[0]) ? imageInput.files[0] : null;

                // Sử dụng FormData để gửi ảnh
                var formData = new FormData();
                formData.append("action", "sua");
                formData.append("masv", masv);
                formData.append("hoten", hoten);
                formData.append("gioitinh", gioitinh);
                formData.append("lop", lop);
                formData.append("ngaysinh", ngaysinh);
                formData.append("diachi", diachi);
                formData.append("khoa", khoa);
                formData.append("manv", manv);

                if (image) {
                    formData.append("image", image);
                }
                // Gọi API để sửa sinh viên
                $.ajax({
                    type: "POST",
                    url: "crudSinhvien.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log("response: " + JSON.stringify(response));
                        window.location.href = "sinhvien.php";
                    }
                });
            });
        });
    </script>

</body>


</html>