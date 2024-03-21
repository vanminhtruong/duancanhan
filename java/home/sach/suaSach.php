<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sách</title>
    <link rel="stylesheet" href="suaSach.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <style>

    </style>
    

    <?php
    // Kết nối CSDL
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "thuchanh";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lấy mã sách từ tham số truyền vào
    $masach = $_GET['masach'];

    // Lấy dữ liệu sách từ CSDL và hiển thị trên form sửa
    $sql = "SELECT * FROM sach WHERE masach = '$masach'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
        <div class="container">
            <div class="box">
                <form id='suaForm'>
                    <table>
                        <tr>
                            <td colspan="2">
                                <h2 style="text-align: center;">Quản lý Sách</h2>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for='tensach'>Nhập Tên Sách</label>
                            </td>
                            <td>
                                <input type='text' id='tensach' name='tensach' value='<?php echo $row['tensach']; ?>' required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='sotrang'>Nhập Số Trang</label>

                            </td>
                            <td>
                                <input type='number' id='sotrang' name='sotrang' value='<?php echo $row['sotrang']; ?>' required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='gia'>Nhập Giá Tiền Sách</label>
                            </td>
                            <td>
                                <input type='number' id='gia' name='gia' value='<?php echo $row['gia']; ?>' required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='namxb'>Nhập Năm Xuất Bản</label>
                            </td>
                            <td>
                                <input type='number' id='namxb' name='namxb' value='<?php echo $row['namxb']; ?>' required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='tinhtrangsach'>Nhập Tình Trạng Sách</label>
                            </td>
                            <td>
                                <input type='text' id='tinhtrangsach' name='tinhtrangsach' value='<?php echo $row['tinhtrangsach']; ?>' required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='tentg'>Nhập Tên Tác Giả</label>
                            </td>
                            <td>
                                <input type='text' id='tentg' name='tentg' value='<?php echo $row['tentg']; ?>' required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='tennxb'>Nhập Tên Nhà Xuất Bản</label>
                            </td>
                            <td>
                                <input type='text' id='tennxb' name='tennxb' value='<?php echo $row['tennxb']; ?>' required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='soluong'>Nhập Số Lượng</label>
                            </td>
                            <td>
                                <input type='number' id='soluong' name='soluong' value='<?php echo $row['soluong']; ?>' required><br>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <button type='button' onclick='luuSua()'>Lưu sửa</button>
                            </td>
                        </tr>
                    </table>
                    <input type='hidden' id='masach' name='masach' value='<?php echo $masach; ?>'>
                </form>
            </div>
        </div>
    <?php
    } else {
        echo "Không tìm thấy sách có mã $masach";
    }

    // Đóng kết nối CSDL
    $conn->close();
    ?>

    <script>
        // Hàm để gửi yêu cầu cập nhật thông tin sách
        function luuSua() {
        var formData = $("#suaForm").serialize();
        formData+="&action=sua";

        $.ajax({
            type: "POST",
            url: "crudSach.php",
            data: formData,
            success: function(response) {
                // Chuyển về trang sách.php sau khi cập nhật sách
                if(response.trim()==="Sửa sách thành công"){
                    alert("Update successfully");
                    window.location.href = "sach.php";
                }else{
                    console.error("error: "+response);
                }
                
            }
        });
    }
    </script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</html>