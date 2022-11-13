<?php
include "../bootstrap.php";
session_start();
use CT275\Project\Contact;
$contact = new Contact($PDO);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D-twice</title>
    <!-- 
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL_PATH . "css/sticky-footer.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/font-awesome.min.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/animate.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/style.css" ?>" rel=" stylesheet">
</head>

<body>
    <!-- Main Page Content -->

    <?php include('../partials/navbar.php');
        ?>
    <section id="inner" class="inner-section section">
        <!-- SECTION HEADING -->
        <hr>
        <h2 class="section-heading text-center wow fadeIn text-title" data-wow-duration="1s">LIÊN HỆ</h2>
        <hr>
        <div class="container-fluid ram mb-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="email_box">
                        <div class="input_main">
                            <div class="container">
                                <form action="process_contact.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Nhập vào họ tên của bạn"
                                            name="fullname">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Nhập vào số điện thoại của bạn"
                                            name="sdt">
                                    </div>
                                    <div class="form-group">
                                        <input class="email-bt" name="email" type="email" placeholder="Nhập vào email">
                                    </div>

                                    <div class="form-group">
                                        <textarea class="massage-bt" name="description" id="noidung" cols="92" rows="5"
                                            placeholder="Nội dung liên hệ ..."></textarea>
                                    </div>
                                    <div class="send_btn">
                                        <button type="submit" class="main_bt">Gửi liên hệ</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop_banner">
                        <div class="our_shop">
                            <a href="presentation.php">
                                <button class="out_shop_bt">Thông tin về Shop</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('../partials/footer.php'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= BASE_URL_PATH . "js/wow.min.js" ?>"></script>
    <script>
    $(document).ready(function() {
        new WOW().init();
    });
    </script>
</body>

</html>