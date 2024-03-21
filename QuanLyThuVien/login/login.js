 $(document).ready(function() {
        performLogin();
    });

    function performLogin() {
        var username = $("#username").val();
        var password = $("#password").val();
        var rememberMe = $("#rememberMe").prop("checked");

        if (localStorage.getItem("rememberMe") === "true") {
            var savedUsername = localStorage.getItem("savedUsername");
            var savedPassword = localStorage.getItem("savedPassword");
            $("#username").val(savedUsername);
            $("#password").val(savedPassword);
            $("#rememberMe").prop("checked", true);
        }

        if (username.trim() !== "" || password.trim() !== "") {
            $.ajax({
                url: "crud.php",
                method: "POST",
                data: {
                    username: username,
                    password: password
                },
                success: function(response) {

                    if (username.trim() === "") {
                        alert("Please input a username");
                    } else if (password.trim() === "") {
                        alert("Please input a password");
                    } else {
                        if (response === "success") {
                            alert("Login successfuly");
                            localStorage.setItem("isLogin", "true");
                            if (rememberMe) {
                                // Lưu thông tin đăng nhập nếu người dùng chọn "Ghi nhớ mật khẩu"
                                localStorage.setItem("savedUsername", username);
                                localStorage.setItem("savedPassword", password);
                                localStorage.setItem("rememberMe", true);
                            } else {
                                // Xóa thông tin đã lưu nếu người dùng không chọn "Ghi nhớ mật khẩu"
                                localStorage.removeItem("savedUsername");
                                localStorage.removeItem("savedPassword");
                                localStorage.removeItem("rememberMe", false);
                            }
                            window.location.href = "http://localhost:8081/QuanLyThuVien/home/home/";
                        } else {
                            // $(".box").effect("shake", { distance: 5 });
                            alert("Login failed. Please check your username and password.");
                        }
                    }
                },
                error: function() {
                    alert("An error occurred during the login process.");
                }
            });
        }
    }
