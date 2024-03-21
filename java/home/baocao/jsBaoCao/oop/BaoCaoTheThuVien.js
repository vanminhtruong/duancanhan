class TheThuVien {
    static showTheThuVien() {
        $(document).ready(function(){
            // Gọi API để lấy dữ liệu từ file crudCard.php
           TheThuVien.loadData();
           TheThuVien.sumTheThuVien();
        });
    }


    // hàm gọi api xử lý hiển thị dữ liệu từ database
    static loadData(){
        $.ajax({
            url: 'http://localhost:8081/home/baocao/CRUD/crudBaoCaoThe.php?action=getData',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Nếu thành công, thêm dữ liệu vào bảng
                if (response && response.length > 0) {
                    var tbody = $('#cardTable tbody');
                    var totalMathe = 0; 
                    $.each(response, function(index, card) {
                        // Tạo một dòng mới trong bảng và thêm dữ liệu
                        var row = '<tr>' +
                                    '<td>' + card.mathe + '</td>' +
                                    '<td>' + card.thoigiancap + '</td>' +
                                    '<td>' + card.hsd + '</td>' +
                                    '<td>' + card.masv + '</td>' +
                                  '</tr>';
                        tbody.append(row);
                        totalMathe += parseInt(card.mathe);
                    });
                    $('#totalMathe').text('Tổng Số Sinh Viên Làm Thẻ là: ' + totalMathe);
                } else {
                    // Hiển thị thông báo nếu không có dữ liệu
                    $('#cardTable tbody').append('<tr><td colspan="4">Không có dữ liệu.</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error('Đã xảy ra lỗi:', error);
            }
        });
    }

    // api xử lý tính số lượng sinh viên làm thẻ thư Viện
    static sumTheThuVien(){
        $.ajax({
            url: 'http://localhost:8081/home/baocao/CRUD/crudBaoCaoThe.php?action=sumMathe',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Hiển thị kết quả trong thẻ div
                $('#totalMathe').text('Tổng Tất Cả Số Sinh Viên Làm Thẻ Thư Viện: ' + response.totalMathe);
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error('Đã xảy ra lỗi:', error);
            }
        });
    }
}

export default TheThuVien;