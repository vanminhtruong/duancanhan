<meta charset="UTF-8">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý mượn trả</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="muontra.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <style>
        .fa-solid {
            font-size: 30px;
            background-color: #2c3e50;
            cursor: pointer;
            color: red;
            border: none;
            outline: none;
            box-shadow: none;
            text-shadow: none;
        }
    </style>
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
                                <a href="">Quản lý mượn trả</a>
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

                    <h1>Quản lý phiếu mượn sách</h1>

                    <form id="phieumuonForm">
                        <div class="group-input">
                            <table>
                                <tr>
                                    <td>
                                        <label for="">Tìm kiếm</label>
                                    </td>

                                    <td>
                                        <select id="search" name="search"></select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Nhập Mã Phiếu Mượn</label>
                                    </td>
                                    <td>
                                        <input type="text" id="maphieumuon" name="maphieumuon" required placeholder="Nhập mã phiếu mượn"><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Nhập Ngày Mượn</label>
                                    </td>

                                    <td>
                                        <input type="date" id="ngaymuon" name="ngaymuon" required placeholder="Nhập ngày mượn"><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Nhập Ngày Trả</label>
                                    </td>
                                    <td>
                                        <input type="date" id="ngaytra" name="ngaytra" required placeholder="Nhập ngày trả"><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Nhập Số Lượng</label>
                                    </td>

                                    <td>
                                        <input type="number" id="soluong" name="soluong" required placeholder="Nhập số lượng"><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Tình Trạng Sách Mượn</label>
                                    </td>
                                    <td>
                                        <input type="text" id="tinhtrangsach" name="tinhtrangsach" required placeholder="Nhập tình trạng sách"><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Chọn Mã Sách</label>
                                    </td>
                                    <td>
                                        <select id="masach" name="masach" required>
                                            <!-- Dữ liệu sẽ được load bằng jQuery -->
                                        </select><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Chọn Mã Sinh Viên</label>
                                    </td>
                                    <td>
                                        <select id="masv" name="masv" required>
                                            <!-- Dữ liệu sẽ được load bằng jQuery -->
                                        </select><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="">Chọn Trạng Thái</label>
                                    </td>
                                    <td>
                                        <!-- <input type="text" id="trangthai" name="trangthai" required placeholder="Nhập trạng thái"><br> -->
                                        <select name="trangthai" id="trangthai">
                                            <option value="Trạng Thái Mượn Sách">Trạng Thái Mượn Sách</option>
                                            <option value="Đang Mượn">Đang Mượn</option>
                                            <option value="Chưa Mượn">Chưa Mượn</option>
                                            <option value="Đã Trả">Đã Trả</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <button type="button" onclick="addPhieuMuon()" id="add">Thêm</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>

                    <!-- Hiển thị danh sách -->
                    <table id="phieumuonTable" border="1">
                        <div>
                            <div class="showTable">
                                <thead>
                                    <tr>
                                        <th>Mã Phiếu Mượn</th>
                                        <th>Ngày Mượn</th>
                                        <th>Ngày Trả</th>
                                        <th>Số Lượng</th>
                                        <th>Tình Trạng Sách</th>
                                        <th>Mã Sách</th>
                                        <th>Mã Sinh Viên</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao tác sửa</th>
                                        <th>Thao tác xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dữ liệu sẽ được load bằng jQuery -->
                                </tbody>
                            </div>
                        </div>
                    </table>
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

<script src="muontra.js"></script>

</html>