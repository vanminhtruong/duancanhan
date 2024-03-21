class Sach {
    static showSachChuaMuon(){
        $.ajax({
            url: 'http://localhost:8081/home/baocao/CRUD/crudBaoCaoChuaMuon.php',
            method: 'GET',
            success: function(response){
                // Nếu thành công, thêm dữ liệu vào bảng
                var data = JSON.parse(response);
                var tbody = $('#SachChuaMuon tbody');
                tbody.empty(); // Xóa nội dung cũ trong tbody trước khi thêm mới
                var countStatus = {};
                // Duyệt qua mỗi dòng dữ liệu và thêm vào bảng
                data.forEach(function(row){
                    var newRow = '<tr>';
                    newRow += '<td>' + row.maphieumuon + '</td>';
                    newRow += '<td>' + row.ngaymuon + '</td>';
                    newRow += '<td>' + row.ngaytra + '</td>';
                    newRow += '<td>' + row.soluong + '</td>';
                    newRow += '<td>' + row.tinhtrangsach + '</td>';
                    newRow += '<td>' + row.trangthai + '</td>';
                    newRow += '</tr>';
                    tbody.append(newRow);

                }); 
            },
            error: function(xhr, status, error){
                // Xử lý khi có lỗi xảy ra
                console.error(error);
            }
        });
    }

    //SachChuaMuon
}

export default Sach;