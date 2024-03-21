class ViPham {
    static showViPham(){
        $(document).ready(function(){
            $.ajax({
                url: 'http://localhost:8081/QuanLyThuVien/home/baocao/CRUD/crudBaoCaoViPham.php',
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    
                    var len = response.length;
                    for(var i=0; i<len; i++){
                        var mabienban = response[i].mabienban;
                        var masv = response[i].masv;
                        var masach = response[i].masach;
                        var loivipham = response[i].loivipham;
                        var bienphapxuly = response[i].bienphapxuly;
                        var ngay = response[i].ngay;
                        var tr_str = "<tr>" +
                            "<td align='center'>" + mabienban + "</td>" +
                            "<td align='center'>" + masv + "</td>" +
                            "<td align='center'>" + masach + "</td>" +
                            "<td align='center'>" + loivipham + "</td>" +
                            "<td align='center'>" + bienphapxuly + "</td>" +
                            "<td align='center'>" + ngay + "</td>" +
                            "</tr>";
                        $("#viPhamTable tbody").append(tr_str);
                    }
                    ViPham.countMaPhieuMuon();
                }
            });
        });
    }

    static countMaPhieuMuon(){
        $.ajax({
            url: 'http://localhost:8081/QuanLyThuVien/home/baocao/CRUD/crudBaoCaoViPham.php?action=count',
            type: 'GET',
            dataType: 'json',
            success: function(response){
                console.log("res: "+JSON.stringify(response))
                var totalBienBanHtml = '';
                $.each(response, function(mabienban, count){
                    totalBienBanHtml += 'Số Người Của ' + mabienban + ' Vi Phạm là: ' + count + '<br>';
                });
                $("#totalBienBan").html(totalBienBanHtml);
            }
        });
    }
}

export default ViPham;