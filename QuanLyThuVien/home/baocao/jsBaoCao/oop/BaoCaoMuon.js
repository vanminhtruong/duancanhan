class MuonTra{
    static showMuonTra(){
        $.ajax({
            url: 'http://localhost:8081/QuanLyThuVien/home/baocao/CRUD/crudBaoCao.php',
            method: 'GET',
            success: function(response){
                // Nếu thành công, thêm dữ liệu vào bảng

                var data = JSON.parse(response);
                var tbody = $('#bao-cao-table tbody');
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

                    MuonTra.countTrangThai(countStatus, row);
                }); 
            },
            error: function(xhr, status, error){
                // Xử lý khi có lỗi xảy ra
                console.error(error);
            }
        });
    }

    static countTrangThai(countStatus, row){
        if (countStatus[row.trangthai]) {
            countStatus[row.trangthai]++;
        } else {
            countStatus[row.trangthai] = 1;
        }

        var countDiv = $('#count-status');
        countDiv.empty(); // Xóa nội dung cũ trong countDiv trước khi thêm mới
        $.each(countStatus, function(status, count) {
            countDiv.append('<div>Số Người ' + status + ': ' + count + '</div>');
        });
    }

    static muonQuaHan(){
        $(document).ready(function(){
            // Gọi API để lấy dữ liệu từ PHP
            $.ajax({
                url: 'http://localhost:8081/QuanLyThuVien/home/baocao/CRUD/crudBaoCao.php',
                method: 'GET',
                success: function(response){
                    // Nếu thành công, thêm dữ liệu vào bảng
                    var data = JSON.parse(response);
                    var tbody = $('#qua-han-table tbody');
                    
                    // Xóa nội dung cũ trong tbody trước khi thêm mới
                    tbody.empty(); 

                    // Lặp qua mỗi phiếu mượn
                    data.forEach(function(row){
                        // Tính số tháng giữa ngày trả và ngày mượn
                        var ngayMuon = new Date(row.ngaymuon);
                        var ngayTra = new Date(row.ngaytra);
                        var thangGiua = (ngayTra.getFullYear() - ngayMuon.getFullYear()) * 12;
                        thangGiua += ngayTra.getMonth() - ngayMuon.getMonth();
                        
                        // Nếu số tháng giữa lớn hơn 6, thêm phiếu vào bảng
                        if (thangGiua > 6) {
                            var newRow = '<tr>';
                            newRow += '<td>' + row.maphieumuon + '</td>';
                            newRow += '<td>' + row.ngaymuon + '</td>';
                            newRow += '<td>' + row.ngaytra + '</td>';
                            newRow += '<td>' + row.soluong + '</td>';
                            newRow += '<td>' + row.tinhtrangsach + '</td>';
                            newRow += '<td>' + row.trangthai + '</td>';
                            newRow += '</tr>';
                            tbody.append(newRow);
                        }
                    });
                },
                error: function(xhr, status, error){
                    // Xử lý khi có lỗi xảy ra
                    console.error(error);
                }
            });
        });
    }
}

export default MuonTra;