<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="sach.css">
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
                <div class="group-content">
                    <div class="group-form">
                        <h2>Quản Lý Sách</h2>
                        <form id="sachForm">
                            <table>
                                <tr>
                                    <td><label for="">Mã Sách</label></td>
                                    <td><input type="text" id="masach" name="masach" required placeholder="Nhập Mã Sách"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Tên Sách</label></td>
                                    <td><input type="text" id="tensach" name="tensach" required placeholder="Nhập Tên Sách"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Số Trang</label></td>
                                    <td><input type="number" id="sotrang" name="sotrang" required placeholder="Nhập Số Trang"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Nhập Giá Tiền Sách</label></td>
                                    <td><input type="number" id="gia" name="gia" required placeholder="Nhập Giá Tiền Sách"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Nhập Năm Xuất Bản</label></td>
                                    <td><input type="number" id="namxb" name="namxb" required placeholder="Nhập Năm Xuất Bản"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Nhập Tình Trạng Sách</label></td>
                                    <td><input type="text" id="tinhtrangsach" name="tinhtrangsach" required placeholder="Nhập Tình Trạng Sách"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Nhập Tác Giả</label></td>
                                    <td><input type="text" id="tentg" name="tentg" required placeholder="Nhập Tác Giả"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Nhập Tên Nhà Xuất Bản</label></td>
                                    <td><input type="text" id="tennxb" name="tennxb" required placeholder="Nhập Tên Nhà Xuất Bản"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Nhập Số Lượng</label></td>
                                    <td><input type="number" id="soluong" name="soluong" required placeholder="Nhập Số Lượng"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="button">
                                            <button type="button" onclick="themSach()" class="add">Thêm sách</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </form>

                        <!-- Table để hiển thị danh sách sách -->
                        <table border="1" id="sachTable">
                            <thead>
                                <tr>
                                    <th>Mã Sách</th>
                                    <th>Tên Sách</th>
                                    <th>Số Trang</th>
                                    <th>Giá Tiền Sách</th>
                                    <th>Năm Xuất Bản</th>
                                    <th>Tình Trạng Sách</th>
                                    <th>Tên Tác Giả</th>
                                    <th>Tên Nhà Xuất Bản</th>
                                    <th>Số Lượng</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>

                            <tbody id="sachTableBody"></tbody>

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
<script src="sach.js"></script>

</html>