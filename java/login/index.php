<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLogin</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <style>
        #rememberMe {
            width: 15px;
        }
    </style>
    <div class="container">
        <div class="box">
            <div class="group-form">
                <h2>Login</h2>
                <form id="loginForm" action="">
                    <table>
                        <tr>
                            <td class="group-input">
                                <input type="text" id="username" name="username" required placeholder="User">
                                <i class="fa-regular fa-user"></i>
                            </td>
                        </tr>

                        <tr>
                            <td class="group-input">
                                <input type="password" id="password" name="password" required placeholder="Password">
                                <i class="fa-solid fa-lock"></i>
                            </td>
                        </tr>

                        <tr>
                            <td style="display: flex;">
                                <input type="checkbox" id="rememberMe" name="rememberMe">
                                <label for="" style="margin-top: 5px;margin-left: 4px;">Ghi nhớ mật khẩu</label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <button type="button" onclick="performLogin()">Login</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <a href="http://localhost:8081/jquery/java/register/">Bạn chưa có tài khoản đăng ký ngay</a>
            </div>
        </div>
    </div>
</body>

<!-- <script src="login.js"></script> -->
<script>
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
                            window.location.href = "http://localhost:8081/home/home/";
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
</script>

</html>