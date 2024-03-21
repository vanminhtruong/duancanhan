$(document).ready(function(){
    let Errors = [
        {
            error: 'Vui lòng nhập Mã thẻ'
        },
        {
            error: 'Vui lòng nhập Thời gian cấp'
        },
        {
            error: 'Vui lòng nhập Hạn sử dụng'
        },
        {
            error: 'Vui lòng chọn Mã sinh viên',
        }
    ]

    $('#cardForm').submit(function(event){
        event.preventDefault(); // Prevent default form submission
        // $('.error').empty();
        // $('.input-error').removeClass('input-error');
        var formData = $(this).serializeArray();
        
        var errorFlag = true;
        for (var i = 0; i < formData.length; i++) {
            if (formData[i].value.trim() === '') {
                alert(Errors[i].error);
                $('#' + formData[i].name).addClass('input-error');
                errorFlag = false;
                break;
            }else{
                $('#' + formData[i].name).removeClass('input-error');
                errorFlag = true;
            }
        }

        if (errorFlag === false) {
            return;
        }else{
            $.ajax({
                type: 'POST',
                url: 'crudCheck.php',
                data: $(this).serialize(),
                success: function(response){
                    console.log("ressult: "+JSON.stringify(response));
                    if(response === 'error'){
                        alert("Thẻ thư viện không trùng khớp");
                    } else {
                        alert("Thẻ thư viện trùng khớp");
                        window.location.href = "http://localhost:8081/QuanLyThuVien/home/muontra/muontra.php";
                        localStorage.setItem('validatedCard', 'true');
                        setTimeout(function() {
                            localStorage.removeItem('validatedCard','false');
                        }, 1000);
                    }
                }
            });
            console.log("sadas")
        }
        
    });

    $.ajax({
        url: 'crudCheck.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            var select = $('#masv');
            select.empty();
            select.append('<option value="">Chọn Mã Sinh Viên</option>');
            $.each(data, function(key, value){
                select.append('<option value="' + value.masv + '">' + value.masv + '</option>');
            });
        }
    });
});