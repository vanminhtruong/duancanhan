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

<script>
    function loadSelectOptions() {
        $.ajax({
            url: 'crudMuonTra.php',
            method: 'GET',
            dataType: 'json',
            data: {
                action: 'get_masv_masach'
            },
            success: function(data) {
                // Load dữ liệu cho masv
                var masvSelect = $('#masv');
                masvSelect.empty();
                $.each(data.masv, function(key, value) {
                    masvSelect.append($('<option>').text(value).attr('value', value));
                });

                // Load dữ liệu cho masach
                var masachSelect = $('#masach');
                masachSelect.empty();
                $.each(data.masach, function(key, value) {
                    masachSelect.append($('<option>').text(value).attr('value', value));
                });
            }
        });
    }

    function loadSearchOptions() {
        $.ajax({
            url: 'crudMuonTra.php?action=get_ma_phieu_muon_options',
            type: 'GET',
            dataType: 'json',
            success: function(options) {
                // Xử lý dữ liệu và hiển thị vào select tìm kiếm
                console.log("options: " + JSON.stringify(options))
                // displaySearchOptions(options);
                displaySearchOptions(options);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('Error loading search options:', textStatus, errorThrown);
                alert('Không thể tải danh sách mã phiếu mượn. Vui lòng kiểm tra lại.');
            }
        });
    }

    // Hàm để hiển thị dữ liệu vào select tìm kiếm
    function displaySearchOptions(options) {
        var searchSelect = $('#search');
        searchSelect.empty();

        $.each(options, function(index, option) {
            searchSelect.append($('<option>').text(option).val(option));
        });
    }

    // Function để load dữ liệu cho bảng phieumuon
    function loadPhieuMuonData() {
        $.ajax({
            url: 'crudMuonTra.php',
            method: 'GET',
            dataType: 'json',
            data: {
                action: 'get_all'
            },
            success: function(data) {
                display(data);
            }
        });
    }

    function display(data) {
        var phieumuonTable = $('#phieumuonTable tbody');
        phieumuonTable.empty();

        $.each(data, function(index, row) {
            var tr = $('<tr>');
            tr.append('<td>' + row.maphieumuon + '</td>');
            tr.append('<td>' + row.ngaymuon + '</td>');
            tr.append('<td>' + row.ngaytra + '</td>');
            tr.append('<td>' + row.soluong + '</td>');
            tr.append('<td>' + row.tinhtrangsach + '</td>');
            tr.append('<td>' + row.masach + '</td>');
            tr.append('<td>' + row.masv + '</td>');
            tr.append('<td>' + row.trangthai + '</td>');
            tr.append('<td><button class="edit" data-id="' + row.maphieumuon + '"><i class="fa-solid fa-pen-to-square"></i></button>');
            tr.append('<td><button class="delete" data-id="' + row.maphieumuon + '"><i class="fa-solid fa-trash"></i></button>')
            phieumuonTable.append(tr);
        });
    }

    $("#phieumuonTable").on("click", ".edit", function() {
        // Lấy mã sinh viên từ dòng được chọn
        var maphieumuon = $(this).closest("tr").find("td:first").text();
        // Chuyển hướng đến trang sửa với mã sinh viên được chọn
        window.location.href = "suaMuontra.php?maphieumuon=" + maphieumuon;
        console.log("sinh viên của tôi: " + masv);
    })

    function validateFormData(formData) {
        for (var i = 0; i < formData.length; i++) {
            if (!formData[i].value.trim()) {
                alert('Vui lòng nhập đầy đủ thông tin ' + formData[i].name);
                return false; // Dừng vòng lặp và trả về false nếu một trường không được nhập
            }
        }
        return true; // Trả về true nếu tất cả các trường đều được nhập
    }

    // Function để thêm phiếu mượn mới
    function addPhieuMuon() {
        var formDataArray = $('#phieumuonForm').serializeArray();
        console.log(JSON.stringify(formDataArray))

        var trangthai = $('#trangthai').val();
        if (trangthai === 'Trạng Thái Mượn Sách') {
            alert("Vui lòng chọn mã sinh viên của bạn");
            return;
        } else
        if (validateFormData(formDataArray) === true) {
            var formData = $('#phieumuonForm').serialize();
            formData += '&action=add';
            $.ajax({
                url: 'crudMuonTra.php',
                method: 'POST',
                data: formData,
                success: function(data) {
                    console.log("data: " + data);
                    if (data.trim() == 'exit') {
                        alert("Masv và masach đã tồn tại hoặc maphieumuon đã tồn tại");
                    } else {
                        loadPhieuMuonData();
                        loadSelectOptions();
                    }
                }
            });
        }
    }

    // Function để sửa thông tin phiếu mượn
    function updatePhieuMuon() {
        var formData = $('#phieumuonForm').serialize();
        formData += '&action=update';

        $.ajax({
            url: 'crudMuonTra.php',
            method: 'POST',
            data: formData,
            success: function() {
                loadPhieuMuonData();
                loadSelectOptions();
            }
        });
    }

    $("#phieumuonTable").on("click", ".delete", function() {
        var maphieumuon = $(this).closest("tr").find("td:first").text();
        // Chuyển hướng đến trang sửa với mã sinh viên được chọn

        var result = confirm("Bạn có chắc chắn muốn xóa không?");
        if (result) {
            // Nếu người dùng chọn "OK", thực hiện xóa
            alert("Đã xóa sinh viên mượn trả");
            deletePhieuMuon(maphieumuon);
        }
    })

    // Function để xóa phiếu mượn
    function deletePhieuMuon(maphieumuon) {
        var formData = $('#phieumuonForm').serialize();
        formData += '&action=delete';
        $.ajax({
            url: 'crudMuonTra.php?ma=' + maphieumuon,
            method: 'POST',
            data: formData,
            success: function(e) {
                console.log(e);
                loadPhieuMuonData();
                loadSelectOptions();
            }
        });
    }

    $('#search').change(function() {
        var selectedId = $(this).val();
        if (selectedId !== '') {
            // Gọi API để thực hiện tìm kiếm theo mã phiếu mượn
            searchMuonTra(selectedId);

        } else {
            // Nếu giá trị trống, hiển thị lại toàn bộ dữ liệu
            loadPhieuMuonData()
        }

    });

    function searchMuonTra(maPhieuMuon) {
        $.ajax({
            url: 'crudMuonTra.php?action=search_by_maphieumuon',
            type: 'GET',
            dataType: 'json',
            data: {
                maphieumuon: maPhieuMuon
            },
            success: function(data) {
                // Xử lý dữ liệu và hiển thị vào bảng
                display(data);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('Error searching data:', textStatus, errorThrown);
                alert('Không thể thực hiện tìm kiếm. Vui lòng kiểm tra lại.');
            }
        });
    }

    function checkLogin() {
        // if (localStorage.getItem('isLogin') !== 'true') {
        //     alert('Bạn cần phải đăng nhập trước');
        //     window.location.href = 'http://localhost:8081/QuanLyThuVien//home/home/index.php'; // Chuyển hướng về trang card.html
        // }
        return localStorage.getItem('isLogin') === 'true';
    }
    // Load dữ liệu ban đầu
    $(document).ready(function() {
        loadPhieuMuonData();
        loadSelectOptions();
        loadSearchOptions();
        if (checkLogin() === false) {
            alert("You need to login first");
            window.location.href = 'http://localhost:8081/QuanLyThuVien/home/home/index.php';
        } else if (localStorage.getItem('validatedCard') !== 'true') {
            alert('You need check libary card');
            window.location.href = 'http://localhost:8081/QuanLyThuVien/home/kiemtrathe/check.html'; // Chuyển hướng về trang card.html
        }
    });
</script>

</html>