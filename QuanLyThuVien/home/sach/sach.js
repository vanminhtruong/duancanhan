// Load danh sách sách khi trang được tải
$(document).ready(function () {
    hienThiDanhSachSach();
    checkLogin();
});

function isValidInput(value) {
    return value !== undefined && value !== null && value.trim() !== '';
}

function themSach() {
    var masach = $("#masach").val();
    var tensach = $("#tensach").val();
    var sotrang = $("#sotrang").val();
    var gia = $("#gia").val();
    var namxb = $("#namxb").val();
    var tinhtrangsach = $("#tinhtrangsach").val();
    var tentg = $("#tentg").val();
    var tennxb = $("#tennxb").val();
    var soluong = $("#soluong").val();

    // Kiểm tra dữ liệu nhập vào
    if (!isValidInput(masach) || !isValidInput(tensach) || !isValidInput(sotrang) || !isValidInput(gia) || !isValidInput(namxb) || !isValidInput(tinhtrangsach) || !isValidInput(tentg) || !isValidInput(tennxb) || !isValidInput(soluong)) {
        alert("Vui lòng nhập đầy đủ thông tin.");
        return;
    } else {
        var formData = $("#sachForm").serialize();
        formData += "&action=add";
        $.ajax({
            type: "POST",
            url: "http://localhost:8081/QuanLyThuVien/home/sach/crudSach.php",
            data: formData,
            success: function (response) {
                if (response.trim() === "Thêm sách thành công") {
                    alert("added books successfully");
                    hienThiDanhSachSach();
                } else if (response.trim() === "has exit") {
                    alert("The book already exists")
                } else {
                    console.error("Lỗi khi thêm sách: " + response);
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                alert("Lỗi khi gọi API thêm sách: " + errorMessage);
            }
        });
    }


}

// Hàm hiển thị danh sách sách
function hienThiDanhSachSach() {
    $.ajax({
        type: "GET",
        url: "crudSach.php?action=layDanhSach",
        success: function (response) {
            // console.log("show list: "+JSON.stringify(response));
            var sachArray = JSON.parse(response);
            var tableBody = $("#sachTableBody");

            // Xóa dữ liệu cũ
            tableBody.empty();

            // Hiển thị dữ liệu mới
            $.each(sachArray, function (index, sach) {
                tableBody.append("<tr>" +
                    "<td>" + sach.masach + "</td>" +
                    "<td>" + sach.tensach + "</td>" +
                    "<td>" + sach.sotrang + "</td>" +
                    "<td>" + sach.gia + "</td>" +
                    "<td>" + sach.namxb + "</td>" +
                    "<td>" + sach.tinhtrangsach + "</td>" +
                    "<td>" + sach.tentg + "</td>" +
                    "<td>" + sach.tennxb + "</td>" +
                    "<td>" + sach.soluong + "</td>" +
                    "<td><button class='edit' onclick=\"suaSach(" + sach.masach + ")\"><i class='fa-regular fa-pen-to-square'></i></button><button onclick=\"xoaSach(" + sach.masach + ")\"><i class='fa-solid fa-trash'></i></button></td>" +
                    "</tr>");
            });
        }
    });
}

// Hàm sửa sách
function suaSach(masach) {
    // Chuyển đến trang sua.php với mã sách được truyền qua URL
    window.location.href = "suaSach.php?masach=" + masach;
}

// Hàm cập nhật sách
function capNhatSach() {
    var formData = $("#sachForm").serialize();

    $.ajax({
        type: "POST",
        url: "crudSach.php?action='sua'",
        data: formData,
        success: function (response) {
            // Cập nhật bảng sau khi cập nhật sách
            hienThiDanhSachSach();
            // Reset form và chuyển nút về thêm sách
            $("#sachForm")[0].reset();
            $("#sachForm button").text("Thêm sách").attr("onclick", "themSach()");
        }
    });
}

// Hàm xóa sách
function xoaSach(masach) {
    $.ajax({
        type: "GET",
        url: "crudSach.php?action=xoa&masach=" + masach,
        success: function (response) {
            if (response.trim() == "Xóa masv thành công!") {
                alert("Xóa sách thành công");
                hienThiDanhSachSach();
            } else {
                alert("Xóa thất bại");
            }

        }
    });
}

function checkLogin() {
    if (localStorage.getItem('isLogin') !== 'true') {
        alert('Bạn cần phải đăng nhập trước');
        window.location.href = 'http://localhost:8081/QuanLyThuVien/home/home/index.php'; // Chuyển hướng về trang card.html
    }
}
