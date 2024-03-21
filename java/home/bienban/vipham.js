    var urlParams = new URLSearchParams(window.location.search);
    var masv = urlParams.get('masv');
    var masach = urlParams.get('masach');

    function getAllDayPass() {
        var ngayMuon = new Date(urlParams.get('ngaymuon'));
        var ngayTra = new Date(urlParams.get('ngaytra'));
        var soNgay = Math.floor((ngayTra - ngayMuon) / (1000 * 60 * 60 * 24));
        var soThang = Math.floor(soNgay / 30);
        $('#soNgayDiv').text('Số Ngày Mượn: ' + soNgay);
        $('#soThangDiv').text('Số Tháng Mượn: ' + soThang);
    }

    function editViPham(mabienban) {
        window.location.href = 'suaViPham.php?mabienban=' + mabienban + '&masv=' + masv + '&masach=' + masach;
    }


    function getMaSvandMaSach() {
        // Đổ dữ liệu vào các select option
        $('#masv').append('<option value="' + masv + '">' + masv + '</option>');
        $('#masach').append('<option value="' + masach + '">' + masach + '</option>');

        // Đổ dữ liệu vào các input readonly
        $('#mabiennhan').val(urlParams.get('mabiennhan'));
    }

    function getViPhamList() {
        $.ajax({
            url: 'crudViPham.php?action=getList',
            type: 'GET',
            success: function(response) {
                $('#viPhamList').html(response);
                getMaSvandMaSach();
            }
        });
    }

    function validateFormData(formData) {
        var errors = [];
        for (var i = 0; i < formData.length; i++) {
            if (!formData[i].value) {
                errors.push('Vui lòng nhập ' + formData[i].name);
            }
        }

        return errors;
    }

    // Hàm để thêm mới vi phạm
    function insertViPham() {
        var formDataArray = $('#viPhamForm').serializeArray();
        console.log("form: " + JSON.stringify(formDataArray))
        formDataArray.push({name: 'action', value: 'insert'});

        // Kiểm tra dữ liệu trước khi gửi đi
        var errors = validateFormData(formDataArray);
        if (errors.length > 0) {
            for (var i = 0; i < errors.length; i++) {
                alert(errors[i]);
                return;
            }
            
        }else{
            var formData = $('#viPhamForm').serialize();

            formData += '&action=insert';
            
            $.ajax({
                url: 'crudViPham.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Sau khi thêm mới, làm mới danh sách
                    getViPhamList();
                    getMaSvandMaSach();
                }
            });
        }

        
    }
    // Hàm để xóa vi phạm
    function deleteViPham(mabienban) {
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            $.ajax({
                url: 'crudViPham.php',
                type: 'POST',
                data: {
                    action: 'delete',
                    mabienban: mabienban
                },
                success: function(response) {
                    // Sau khi xóa, làm mới danh sách
                    getViPhamList();
                }
            });
        }
    }

    function loadDanhSachSinhVien() {
        $.ajax({
            url: 'crudViPham.php?action=getDanhSachSinhVien',
            type: 'GET',
            success: function(response) {
                $('#masv').html(response);
            }
        });
    }

    // Hàm để load danh sách sách từ server và đổ vào dropdown masach
    function loadDanhSachSach() {
        $.ajax({
            url: 'crudViPham.php?action=getDanhSachSach',
            type: 'GET',
            success: function(response) {
                $('#masach').html(response);
            }
        });
    }

    // Hàm để đặt lại các trường trong form

    // Gọi hàm để lấy danh sách vi phạm khi trang được load
    $(document).ready(function() {
        getMaSvandMaSach();
        getViPhamList();
        getAllDayPass();
        // loadDanhSachSinhVien();
        // loadDanhSachSach();
    });