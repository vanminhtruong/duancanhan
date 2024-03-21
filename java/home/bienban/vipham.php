<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="bienban.css">
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
                                <a href="../home/index.php">Trang chủ</a>
                            </li>
                            <li>
                                <a href="../docgia/docgia.html">Quản lý độc giả</a>
                            </li>
                            <li>
                                <a href="../sinhvien/sinhvien.php">Thông tin sinh viên</a>
                            </li>
                            <li class="end">
                                <a href="../sach/sach.php">Quản lý sách</a>
                            </li>
                            <li class="midde">
                                <a href="../baocao/baocao.html">Báo cáo</a>
                            </li>

                            <li>
                                <a href="../muontra/muontra.php">Quản lý mượn trả</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="tool2"></div>
                </div>
            </div>

            <div class="box-content">
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

                <div class="group-content">
                    <div class="group-input">
                        <h1>THÔNG TIN VI PHẠM</h1>
                        <div class="group-form">
                            <form id="viPhamForm">
                                <table>
                                    <tr>
                                        <td>
                                            <label for="">Nhập Mã Biên Bản</label>
                                        </td>
                                        <td>
                                            <input type="text" name="mabienban" id="mabienban" placeholder="Nhập mã biên bản"><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="">Chọn Mã Sinh Viên</label>
                                        </td>
                                        <td>
                                            <select name="masv" id="masv">
                                                <!-- Dữ liệu masv sẽ được load bằng jQuery -->
                                            </select><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="">Chọn Mã Sách</label>
                                        </td>

                                        <td>
                                            <select name="masach" id="masach">
                                                <!-- Dữ liệu masach sẽ được load bằng jQuery -->
                                            </select><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="">Nhập Lỗi Vi Phạm</label>
                                        </td>
                                        <td>
                                            <input type="text" name="loivipham" id="loivipham" placeholder="Nhập lỗi vi phạm"><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="">Nhập Biện Pháp Xử lý</label>
                                        </td>

                                        <td>
                                            <input type="text" name="bienphapxuly" id="bienphapxuly" placeholder="Nhập biện pháp xử lý"><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="">Nhập Ngày</label>
                                        </td>

                                        <td>
                                            <input type="date" name="ngay" id="ngay" placeholder="Nhập ngày"><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <div class="button">
                                                <button class="add" type="button" onclick="insertViPham()">Submit</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="group-days">
                                    <div class="days">
                                        <div id="soNgayDiv"></div>
                                        <div id="soThangDiv"></div>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <table id="viPhamTable" border="1">
                            <thead>
                                <tr>
                                    <th>Mã Biên Bản</th>
                                    <th>Mã Sinh Viên</th>
                                    <th>Mã Sách</th>
                                    <th>Loại Vi Phạm</th>
                                    <th>Biện Pháp Xử Lý</th>
                                    <th>Ngày Vi Phạm</th>
                                    <th>Thao Tác Sửa</th>
                                    <th>Thao tác Xóa</th>
                                </tr>
                            </thead>
                            <tbody id="viPhamList">

                            </tbody>
                        </table>
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

</body>
<script src="vipham.js"></script>
</html>