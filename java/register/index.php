<!DOCTYPE html>
<html lang="en">
<!-- bây giờ tôi có bảng taikhoan(user, password) và 1 file là forgot.php và crudForgot.php hãy code file forgot.php gọi api jquery crudForgot.php để code giao diện quên mật khẩu gồm các label input tương ứng là user và  -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <style>
        #email{
            width: 250px;
            height: 30px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            color: white;
            padding-bottom: 3px;
            margin-bottom: 15px;
        }
    </style>
    <div class="container">
        <div class="box">
            <div class="group-form">
                <h2>Form Đăng ký</h2>
                <form id="signupForm">
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
                            <td class="group-input">
                                <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="ConfirmPassword">
                                <i class="fa-solid fa-lock"></i>
                            </td>
                        </tr>

                        <tr>
                            <td class="group-input">
                                <input type="email" id="email" name="email" required placeholder="Email">
                                <i class="fa-solid fa-envelope"></i>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <button type="button" onclick="signup()">Sing Up</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="index.js"></script>

</html>