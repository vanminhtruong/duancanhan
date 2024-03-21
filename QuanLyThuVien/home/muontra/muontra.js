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