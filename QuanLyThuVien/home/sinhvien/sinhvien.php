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
<script>
    $(document).ready(function() {
        loadSinhvienData();
        // Thêm sinh viên
        $("#btnThem").click(function() {
            addSinhvien();
        });

        // Sửa sinh viên
        $("#btnSua").click(function() {
            updateSinhvien();
        });

        // Xóa sinh viên
        // $(".delete-btn").click(function () {
        //     deleteSinhvien();
        // });
        checkLogin();
    });

    function checkLogin() {
        if (localStorage.getItem('isLogin') !== 'true') {
            alert("You need to login first");
            window.location.href = 'http://localhost:8081/QuanLyThuVien/home/home/index.php'; // Chuyển hướng về trang card.html
        }
    }

    function loadSinhvienData() {
        // Gọi API để lấy danh sách sinh viên
        $.ajax({
            url: "crudSinhvien.php",
            type: "GET",
            success: function(data) {
                $("#sinhvienBody").html(data);
            }
        });
    }

    function isValidDate(dateString) {
        var currentDate = new Date();
        var inputDate = new Date(dateString);

        return inputDate <= currentDate;
    }

    function addSinhvien() {
        // Lấy dữ liệu từ form
        var fields = [{
                name: "masv",
                condition: {
                    empty: true,
                    maxLength: 20
                }
            },
            {
                name: "hoten",
                condition: {
                    empty: true,
                    maxLength: 20
                }
            },
            {
                name: "gioitinh",
                condition: {
                    maxLength: 20
                }
            },
            {
                name: "lop",
                condition: {
                    maxLength: 20
                }
            },
            {
                name: "ngaysinh",
                condition: {
                    empty: true,
                    invalidDate: true
                }
            },
            {
                name: "diachi",
                condition: {
                    maxLength: 20
                }
            },
            {
                name: "khoa",
                condition: {
                    maxLength: 20
                }
            },
            {
                name: "manv",
                condition: {
                    maxLength: 20
                }
            }
        ];

        // Kiểm tra các trường dữ liệu có rỗng không và có quá 20 ký tự không
        for (var i = 0; i < fields.length; i++) {
            var fieldName = fields[i].name;
            var fieldValue = $("#" + fieldName).val().trim();
            if (fields[i].condition.empty && fieldValue === '') {
                alert(`Vui lòng nhập đầy đủ thông tin của ${fields[i].name}`);
                return;
            } else
                // Kiểm tra độ dài
                if (fields[i].condition.maxLength && fieldValue.length > fields[i].condition.maxLength) {
                    alert("Độ dài của " + fieldName + " không được vượt quá " + fields[i].condition.maxLength + " ký tự");
                    return;
                } else
                    // Kiểm tra ngày sinh hợp lệ
                    if (fields[i].condition.invalidDate && !isValidDate(fieldValue)) {
                        alert("Ngày sinh không hợp lệ");
                        return;
                    } else if (fieldName === "image") {
                var imageField = $("#image")[0];
                if (imageField.files.length === 0) {
                    alert("Vui lòng chọn ảnh");
                    return;
                }
            } else {
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
                formData.append("action", "add");
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

                console.log("form " + JSON.stringify(formData));
                // Gọi API để thêm sinh viên
                $.ajax({
                    url: "crudSinhvien.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log("data: " + JSON.stringify(data));
                        loadSinhvienData();
                        clearForm();
                    }
                });
            }
        }

    }

    function updateSinhvien() {
        // Lấy dữ liệu từ form
        var formData = $("#sinhvienForm").serialize();

        // Gọi API để sửa sinh viên
        $.ajax({
            url: "crudSinhvien.php",
            type: "PUT",
            data: formData,
            success: function() {
                loadSinhvienData();
                clearForm();
            }
        });
    }

    function deleteSinhvien() {
        // Lấy mã SV từ form
        var masv = $("#masv").val();

        // Gọi API để xóa sinh viên
        $.ajax({
            url: "crudSinhvien.php",
            type: "DELETE",
            data: {
                masv: masv
            },
            success: function() {
                loadSinhvienData();
                clearForm();
            }
        });
    }

    function clearForm() {
        // Xóa nội dung của form
        $("#sinhvienForm")[0].reset();
    }

    $(document).ready(function() {
        loadManvData();

        // Rest of the code...

        function loadManvData() {
            // Gọi API để lấy danh sách mã NV
            $.ajax({
                url: "crudSinhvien.php?action=getManvData",
                type: "GET",
                success: function(data) {
                    // Parse dữ liệu JSON và hiển thị lên dropdown
                    console.log("data: " + JSON.stringify(data))
                    var manvDropdown = $("#manv");
                    manvDropdown.empty();
                    var manvList = JSON.parse(data);
                    $.each(manvList, function(index, item) {
                        manvDropdown.append($("<option>").text(item).val(item));
                    });
                }
            });
        }
    });

    $("#sinhvienTable").on("click", ".edit-btn", function() {
        // Lấy mã sinh viên từ dòng được chọn
        var masv = $(this).closest("tr").find("td:first").text();
        var row = $(this).closest("tr");
        var gioitinh = row.find("td:nth-child(3)").text();
        // Chuyển hướng đến trang sửa với mã sinh viên được chọn
        window.location.href = "suaSinhvien.php?masv=" + masv + "&gioitinh=" + gioitinh;
        console.log("sinh viên của tôi: " + masv);
    })
    // $("#sinhvienTable").on("click", ".delete-btn", function() {
    //     // Lấy mã sinh viên từ dòng được chọn
    //     var masv = $(this).closest("tr").find("td:first").text();
    //     console.log("sinh " + masv);
    //     // Gọi API để xóa sinh viên
    //     $.ajax({
    //         type: "DELETE",
    //         url: "http://localhost:8081/QuanLyThuVien/home/sinhvien/crudSinhvien.php?masv=" + masv,
    //         success: function(response) {
    //             // console.log("res: "+JSON.stringify(response));
    //             // // Sau khi xóa thành công, hiển thị lại danh sách sinh viên
    //             // loadSinhvienData();
    //         }
    //     });

    // });
</script>

</html>