<?php
include "../bootstrap.php";

use CT275\Project\User;
use CT275\Project\Category;
$category = new Category($PDO);
$categorys = $category->all();
$user = new User($PDO);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}

?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D-twice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL_PATH . "css/login.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/sticky-footer.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/font-awesome.min.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/animate.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/style.css" ?>" rel=" stylesheet">
</head>

<body>
    <h2 class="text-title">WELCOME SNEAKER</h2>
    <h3><a href="index.php">Trở về trang chủ</a></h3>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="process.php" id="signupForm">
                <h1>ĐĂNG KÝ TÀI KHOẢN</h1>
                <input type="text" name="fullname" placeholder="Họ và tên..." required />
                <input type="text" name="username" placeholder="Tên đăng nhập..." required />
                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu..." required />
                <input type="password" name="password2" placeholder="Nhập lại mật khẩu..." required />
                <input type="text" name="address" placeholder="Địa chỉ..." required />

                <?php if(isset($_SESSION['message']))
                    {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if ($_POST['password'] === $_POST['password2']) {
                            $user->fill($_POST);
                            if ($user->validate()) {
                                $user->save();
                                echo '<script>alert("Đăng ký thành công.");</script>';
                                echo '<script>window.location.href= "login.php";</script>';
                                header("Location: login.php");
                            }
                        }
                    } 
                    ?>

                <button type="submit" name="dangky">ĐĂNG KÝ</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form id="login-form" class="form" action="process_login.php" method="post">
                <h1>ĐĂNG NHẬP TÀI KHOẢN</h1>
                <!-- <label for="username" class="text-right">Tên đăng nhập:</label><br> -->
                <input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập..." required />
                <!-- <label for="password" class="text-info">Mật khẩu:</label><br> -->
                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu..." required />

                <button type="submit" name="submit" value="Đăng nhập">ĐĂNG NHẬP</button>

            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Trở lại!</h1>
                    <p>Nếu có tài khoản, hãy đăng nhập tại đây</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Xin chào, bạn!</h1>
                    <p>Nếu chưa có tài khoản vui lòng đăng ký tại đây</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASE_URL_PATH ."js/login.js" ?>"></script>
    <script src="<?= BASE_URL_PATH . "js/wow.min.js" ?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        new WOW().init();
    });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery.validate.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        new WOW().init();
        $("#signupForm").validate({
            rules: {
                fullname: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password2: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
                address: {
                    required: true
                }

            },

            messages: {
                fullname: "Nhập vào tên của bạn",

                username: {
                    required: "Nhập tên đăng nhập của bạn",
                    minlength: "Tên đăng nhập phải có ít nhất 2 kí tự"
                },

                password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu ít nhất 8 kí tự"
                },

                password2: {
                    required: "Vui lòng nhập lại mật khẩu",
                    minlength: "mật khẩu ít nhất 8 kí tự",
                    equalTo: "Nhập lại mật khẩu không trùng khớp"
                },
                address: {
                    required: "Nhập vào địa chỉ của bạn"
                }

            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.siblings("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
    </script>
</body>

</html>