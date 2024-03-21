<?php
session_start();
$isAuthenticated = false;
if (isset($_SESSION["username"])) {
    // Đã đăng nhập
    $username = $_SESSION["username"];
    $isAuthenticated = true;
}
// elseif (isset($_COOKIE["username"])) {
//     // Lấy giá trị username từ cookie nếu không có trong session
//     $username = $_COOKIE["username"];
//     $isAuthenticated = true;
// }
else {
    // Chưa đăng nhập
    $isAuthenticated = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="box-header">
                <header>
                    <div class="boxs"></div>
                    <div class="tool"></div>
                    <div class="button">
                        <?php if ($isAuthenticated == true) : ?>
                            <button id="btnLogout">Logout</button>
                        <?php else : /*echo "localStorage.removeItem('validatedCard');"*/ ?>
                            <button id="btnLogin">Login</button>
                        <?php endif; ?>
                    </div>
                </header>

                <div class="box-menu">
                    <nav>
                        <ul>
                            <li>
                                <a href="">Trang chủ</a>
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

                <div>
                    <h2>Nội dung chính</h2>
                    <p>Đây là phần nội dung của trang web của bạn.</p>
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
<script src="home.js" type="module"></script>

</html>