$(document).ready(function(){
    $(document).ready(function(){
        // Load dữ liệu vào select option khi trang được tải
        $.ajax({
            type: 'GET',
            url: 'crudCard.php', // API để lấy dữ liệu
            dataType: 'json',
            success: function(data) {
                // Duyệt qua dữ liệu trả về và thêm vào select option
                $.each(data, function(key, value) {
                    $('#masv').append($('<option>', {
                        value: value.masv,
                        text: value.masv
                    }));
                });
            }
        });

        $('#libraryForm').submit(function(event){
            event.preventDefault(); 

            var requiredFields = ['#mathe', '#thoigiancap', '#hsd', '#masv'];
            var thoigiancap = new Date($('#thoigiancap').val());
            var hsd = new Date($('#hsd').val());
            var timeDiff = Math.abs(hsd.getTime() - thoigiancap.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

            // Kiểm tra xem tất cả các trường bắt buộc đã được điền đầy đủ hay không
            var isValid = true;
            requiredFields.forEach(function(field) {
                if ($(field).val() === '') {
                    isValid = false;
                    $(field).css('border', '1px solid red');
                } else {
                    $(field).css('border', '');
                }
            });

            if (!isValid) {
                alert('Vui lòng điền đầy đủ thông tin.');
                return;
            }else if(diffDays < 60){
                isValid = false;
                alert('Vui lòng nhập lại hạn sử dụng sao cho cách thời gian cấp ít nhất 2 tháng.');
            }
            else{
                var formData = {
                    'mathe': $('#mathe').val(),
                    'thoigiancap': $('#thoigiancap').val(),
                    'hsd': $('#hsd').val(),
                    'masv': $('#masv').val()
                };

                $.ajax({
                    type: 'POST',
                    url: 'crudCard.php',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })
                .done(function(data){
                    console.log(data);
                    if(data.success){
                        alert('Đăng ký thành công!');
                        window.location.href = "http://localhost:8081/home/docgia/docgia.html";
                    } else {
                        alert(data.message);
                    }
                })
                .fail(function(xhr, status, error){
                    console.error(xhr.responseText);
                    alert('Đã xảy ra lỗi khi gọi API.');
                });
            }


            
        });
    });
});