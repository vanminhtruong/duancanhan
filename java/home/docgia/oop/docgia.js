import Slide from "../../home/Slide.js";
$(document).ready(function() {
    Slide.handleSlide();
    $('#show').click(function() {
        showData();
    })

    showData();

    $('#card').click(function() {
        window.location.href = "http://localhost:8081/home/thethuvien/card.html";
    })

    function showData() {
        $.ajax({
            url: 'crudDocGia.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Xử lý dữ liệu và hiển thị trong bảng
                display(data);
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    }

    function display(data) {
        console.log("data: " + JSON.stringify(data));
        var tableBody = $('#docgia-table tbody');
        tableBody.empty();

        data.forEach(function(row) {
            var tr = $('<tr>');
            tr.append('<td>' + row.masv + '</td>');
            tr.append('<td>' + row.masach + '</td>');
            tr.append('<td>' + row.tensach + '</td>');
            tr.append('<td>' + row.trangthai + '</td>');
            tr.append('<td>' + row.hoten + '</td>');
            tr.append('<td>' + row.gioitinh + '</td>');
            tr.append('<td>' + row.ngaymuon + '</td>');
            tr.append('<td>' + row.ngaytra + '</td>');
            tr.append('<td><button class="viewBtn" data-masv="' + row.masv + '" data-masach="' + row.masach + '"><i class="fa-solid fa-arrow-right"></i></button></td>' +
                '</tr>');
            tableBody.append(tr);
        });
    }
    $("#docgia-table").on("click", ".viewBtn", function() {
        var masv = $(this).data('masv');
        var masach = $(this).data('masach');
        var row = $(this).closest("tr");
        var ngaymuon = row.find("td:nth-child(7)").text();
        var ngaytra = row.find("td:nth-child(8)").text();
        var trangthai = row.find("td:nth-child(4)").text();
        window.location.href = 'http://localhost:8081/home/bienban/vipham.php?masv=' + masv + '&masach=' + masach + '&ngaymuon=' + ngaymuon + '&ngaytra=' + ngaytra +'&trangthai='+trangthai;
    })

    loadSearchOptions();

    function loadSearchOptions() {
        $.ajax({
            url: 'crudDocGia.php?action=get_ma_phieu_muon_options',
            type: 'GET',
            dataType: 'json',
            success: function(options) {
                // Xử lý dữ liệu và hiển thị vào select tìm kiếm
                console.log("options: " + JSON.stringify(options));
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

    $('#search').change(function() {
        var selectedId = $(this).val();
        if (selectedId !== '') {
            // Gọi API để thực hiện tìm kiếm theo mã phiếu mượn
            searchMuonTra(selectedId);

        } else {
            // Nếu giá trị trống, hiển thị lại toàn bộ dữ liệu
            showData();
        }

    });

    function searchMuonTra(masv) {
        $.ajax({
            url: 'crudDocGia.php?action=search_by_maphieumuon',
            type: 'GET',
            dataType: 'json',
            data: {
                masv: masv
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

    checkLogin();
});

function checkLogin(){
    if (localStorage.getItem('isLogin') !== 'true') {
        alert("You need to login first");
        window.location.href = 'http://localhost:8081/home/home/index.php'; // Chuyển hướng về trang card.html
    }
}