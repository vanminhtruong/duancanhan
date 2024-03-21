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
                <a href="http://localhost:8081/register/">Bạn chưa có tài khoản đăng ký ngay</a>
            </div>
        </div>
    </div>
</body>

<!-- <script src="login.js"></script> -->
<script src="login.js"></script>

</html>