function isValidEmail(email) {
        // Sử dụng biểu thức chính quy để kiểm tra định dạng email
        var emailRegex = /^[^\s@]+@gmail\.com$/i;  // Chỉ chấp nhận đuôi là @gmail.com
        return emailRegex.test(email);
    }

    function signup() {
        // Lấy giá trị từ các trường input
        
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        // Gọi API sử dụng jQuery

        if (!username || !email || !password || !confirmPassword) {
            // $("#error-message").text("Vui lòng điền đầy đủ thông tin vào các trường.");
            alert("Please input your data");
            return;
        }else

        // Kiểm tra xác nhận mật khẩu
        if (password !== confirmPassword) {
            // $("#error-message").text("Mật khẩu và xác nhận mật khẩu không khớp.");
            alert("Please input your password again");
            return;
        }else if(!isValidEmail(email)){
            alert("Email sai định dạng");
        }
        
        else{
            $.ajax({
            type: "POST",
            url: "crud.php",
            data: {
                username: username,
                password: password
            },
                success: function (response) {
                    // Xử lý kết quả từ API
                    console.log(response);
                    // Thực hiện các bước tiếp theo nếu cần
                    if (response.trim() === "success") {
                        alert("Sing Up successfully");
                        window.location.href = "http://localhost:8081/login";
                    }else if(response.trim()==="duplicate"){
                        alert("Tài khoản user hoặc email đã tồn tại");
                    } 
                    else {
                        // Xử lý các trường hợp lỗi khác nếu cần
                        alert("Đăng ký không thành công. Vui lòng thử lại.");
                    }
                },
                error: function (error) {
                    // Xử lý lỗi nếu có
                    console.error(error);
                }
            });
        }

        
    }