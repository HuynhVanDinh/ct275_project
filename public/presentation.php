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
        <h2 class="section-heading text-center wow fadeIn text-title" data-wow-duration="1s">GIỚI THIỆU</h2>
        <hr>
        <div class="container-fluid ram mb-5">

            <div class="layout_padding collection_section">
                <div class="container">
                    <h1 class="new_text"><strong>Giới thiệu D-twice Sneaker Shop</strong></h1>
                    <p class="consectetur_text">Thành lập năm 2022 hoạt động như một nhà bán lẻ sneaker Adidas, Nike
                        chính hãng.
                        <br>Cửa hàng chúng tôi phục vụ qua hai nền tảng: Cửa hàng vật lý tại Cần Thơ và website trực
                        tuyến.
                        <br>D-twice là sân chơi dành cho những người trẻ đam mê sneaker, với mong muốn mang đến tất cả
                        người yêu
                        sneaker tại Việt Nam những sản phẩm chính hãng, chất lượng.
                        to
                        lớn hơn.
                    </p>
                    <div class="collection_section_2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-img">
                                    <div class="shoes-img"><img src="img/logo3.png" width="90%"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="about-img2">
                                    <div class="shoes-img2"><img src="img/pre.png"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h1 class="new_text"><strong>Cam kết của chúng tôi</strong></h1>
                    <p class="consectetur_text">D-twice được định hướng là trở thành một website giúp người dùng có
                        thể trải
                        nghiệm thời trang được chân thực nhất với những tính năng đặc biệt hơn trong tương lai, giúp
                        người dùng
                        tương tác tốt hơn
                        với sản phẩm.</p>

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