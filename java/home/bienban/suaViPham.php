<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Vi Phạm</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="sua.css">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="box-header">
                <header>
                    <div class="boxs"></div>
                    <div class="tool"></div>
                </header>

                <div class="box-menu">
                    <nav>
                        <ul>
                            <li>
                                <a href="">Trang chủ</a>
                            </li>
                            <li>
                                <a href="../docgia/docgia.php">Quản lý độc giả</a>
                            </li>
                            <li>
                                <a href="../sinhvien/sinhvien.php">Thông tin sinh viên</a>
                            </li>
                            <li class="end">
                                <a href="../sach/sach.php">Quản lý sách</a>
                            </li>
                            <li class="midde">
                                <a href="">Báo cáo</a>
                            </li>

                            <li>
                                <a href="../muontra/muontra.php">Quản lý mượn trả</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="tool2"></div>
                </div>
            </div>

            <div class="banner">
                <div id="slider-container">
                    <div id="slider">
                        <div class="slide" style="background-image: url('https://phanmemungdungvn.com/wp-content/uploads/2019/04/phan-mem-quan-ly-thu-vien-2.jpg');"></div>
                        <div class="slide" style="background-image: url('https://designs.vn/wp-content/images/25-11-2015/Library_16.jpg');"></div>
                        <div class="slide" style="background-image: url('https://cloudify.vn/wp-content/uploads/2022/01/quan-ly-thu-vien-1.jpg');"></div>
                        <!-- Thêm nhiều slide khác nếu cần -->
                    </div>
                </div>


                <div class="prev">
                    <button id="prevBtn">Prev</button>
                    <button id="nextBtn">Next</button>
                </div>
            </div>

            <div class="box-content">
                <div class="group-content">
                    <div class="group-input">
                        <h1>Thông tin sửa</h1>
                        <form id="suaForm">
                            <table>
                                <tr>
                                    <td>
                                        <label for="masv">Mã Sinh Viên:</label>
                                    </td>
                                    <td>
                                        <select name="masv" id="masv">
                                            <!-- Dữ liệu masv sẽ được load bằng jQuery -->
                                        </select><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="masach">Mã Sách:</label>
                                    </td>
                                    <td>
                                        <select name="masach" id="masach">
                                            <!-- Dữ liệu masach sẽ được load bằng jQuery -->
                                        </select><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="loivipham">Loại Vi Phạm:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="loivipham" name="loivipham" required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="bienphapxuly">Biện Pháp Xử Lý:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="bienphapxuly" name="bienphapxuly" required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="ngay">Ngày Vi Phạm:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="ngay" name="ngay" required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <div class="button" id="trEnd">
                                            <button type="button" onclick="submitSua()" id="save">Save</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!-- <input type="hidden" id="mabienban" name="mabienban"> -->
                        </form>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <footer>
                    <p>Email: your@email.com</p>
                </footer>
            </div>
        </div>
    </div>

    <!-- Form sửa vi phạm -->


    <script>
        // Hàm để lấy thông tin vi phạm từ server và điền vào form

        var urlParams = new URLSearchParams(window.location.search);
        var masv = urlParams.get('masv');
        var masach = urlParams.get('masach');
        var trangthai = urlParams.get('trangthai');

        function getAndFillViPhamInfo() {
            // Lấy tham số từ URL
            var urlParams = new URLSearchParams(window.location.search);
            var mabienban = urlParams.get('mabienban');

            // Nếu có mabienban, thực hiện AJAX để lấy thông tin từ server
            if (mabienban) {
                $.ajax({
                    url: 'crudViPham.php',
                    type: 'GET',
                    data: {
                        mabienban: mabienban
                    },
                    success: function(response) {
                        var viPhamInfo = JSON.parse(response);
                        console.log(viPhamInfo);
                        fillFormForEdit(viPhamInfo);
                    }
                });
            }
        }

        // Hàm để điền thông tin từ dòng được click vào form để sửa
        function fillFormForEdit(viPhamInfo) {
            $('#mabienban').val(viPhamInfo.mabienban);
            $('#loivipham').val(viPhamInfo.loivipham);
            $('#bienphapxuly').val(viPhamInfo.bienphapxuly);
            $('#ngay').val(viPhamInfo.ngay);
        }

        function getMaSvandMaSach() {
            // Đổ dữ liệu vào các select option
            $('#masv').append('<option value="' + masv + '">' + masv + '</option>');
            $('#masach').append('<option value="' + masach + '">' + masach + '</option>');
        }

        // Hàm để thực hiện chức năng sửa
        function submitSua() {
            var formData = $('#suaForm').serialize();
            console.log("form: " + JSON.stringify(formData))
            formData += '&action=update';

            $.ajax({
                url: 'crudViPham.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log("res: " + JSON.stringify(response));
                    // Sau khi sửa, chuyển hướng về trang danh sách
                    window.location.href = 'vipham.php?masv=' + masv + '&masach=' + masach;
                }
            });
        }

        // Gọi hàm để lấy và điền thông tin vi phạm khi trang được load
        $(document).ready(function() {
            getAndFillViPhamInfo();
            getMaSvandMaSach();
        });
    </script>

</body>

</html>