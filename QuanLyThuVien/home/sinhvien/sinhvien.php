<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
    <link rel="stylesheet" href="sinhvien.css">
    <link rel="stylesheet" href="sinhvien1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                <div class="group-form">
                    <div class="group">
                        <h2>Quản lý Sinh viên</h2>

                        <!-- Form -->
                        <form id="sinhvienForm" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>
                                        <label for="">Mã sinh viên</label>
                                    </td>
                                    <td>
                                        <input type="text" id="masv" name="masv" placeholder="Nhập Mã Sinh Viên" required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Họ tên</label>
                                    </td>
                                    <td>
                                        <input type="text" id="hoten" name="hoten" placeholder="Nhập Họ Tên" required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <!-- <td>
                                        <input type="radio" id="nu" name="gioitinh" value="Nữ">
                                        <label for="nu">Nữ</label><br>
                                    </td> -->
                                    <td>
                                        <label for="">Giới tính</label>
                                    </td>
                                    <td>
                                        <select name="gioitinh" id="gioitinh">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Lớp</label>
                                    </td>
                                    <td>
                                        <input type="text" id="lop" name="lop" placeholder="Nhập Lớp" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Ngày sinh</label>
                                    </td>
                                    <td>
                                        <input type="date" id="ngaysinh" name="ngaysinh" placeholder="Nhập Ngày Sinh" required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Địa chỉ</label>
                                    </td>
                                    <td>
                                        <input type="text" id="diachi" name="diachi" placeholder="Nhập Địa Chỉ" required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Khoa</label>
                                    </td>
                                    <td>
                                        <input type="text" id="khoa" name="khoa" placeholder="Nhập Khoa" required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Chọn mã nhân viên</label>
                                    </td>
                                    <td>
                                        <select id="manv" name="manv" required></select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Chọn ảnh</label>
                                    </td>
                                    <td>
                                        <input type="file" id="image" accept="image/*">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <div class="button" style="display: flex;justify-content: center;">
                                            <button type="button" id="btnThem">Thêm</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <!-- Table -->
                        <table id="sinhvienTable" border="1">
                            <thead>
                                <tr>
                                    <th>Mã SV</th>
                                    <th>Họ tên</th>
                                    <th>Giới tính</th>
                                    <th>Lớp</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Khoa</th>
                                    <th>Mã NV</th>
                                    <th>Ảnh</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="sinhvienBody"></tbody>
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

<!-- <script src="sinhvien.js"></script> -->
<script src="sinhvien.js"></script>

</html>