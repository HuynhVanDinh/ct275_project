<?php
include "../bootstrap.php";
session_start();

use CT275\Project\Product;
use CT275\Project\User;
use CT275\Project\Category;

$product = new Product($PDO);
$category = new Category($PDO);
$products = $product->getProNew();
$categorys = $category->all();


$user = new User($PDO);
if (isset($_SESSION["id_user"])) {
	$user->find($_SESSION["id_user"]);
}

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
    <?php include('../partials/navbar.php');?>
    <?php include('../partials/slide.php');?>
    <div class="man-info bg-white h-75">
        <h2 class="section-heading text-center wow fadeIn text-title" data-wow-duration="1s">SẢN PHẨM</h2>
        <div class="row">
            <div class="col-12 text-center">
                <p class="wow fadeIn note" data-wow-duration="2s">Uy tín - Chất lượng - Làm nên hương hiệu <i
                        class="fa fa-check" aria-hidden="true"></i> </p>
            </div>
            <div class="container">
                <div class="row ml-5 mr-5 text-center">
                    <div class="col-3">
                        <img class="img-bg" src="img/giaohang.png" alt="">
                        <h4 class="ft_h4">GIAO HÀNG TOÀN QUỐC </h4>
                        <p class="higlight">Vận chuyển khắp Việt Nam</p>
                    </div>
                    <div class="col-3">
                        <img class="img-bg" src="img/thanhtoan.png" alt="">
                        <h4 class="ft_h4">THANH TOÁN KHI NHẬN HÀNG</h4>
                        <p class="higlight">Nhận hàng tại nhà rồi thanh toán</p>
                    </div>
                    <div class="col-3">
                        <img class="img-bg" src="img/baohanh.png" alt="">
                        <h4 class="ft_h4">BẢO HÀNH DÀI HẠNG</h4>
                        <p class="higlight">Bảo hành lên đến 60 ngày</p>
                    </div>
                    <div class="col-3">
                        <img class="img-bg" src="img/doihang.png" alt="">
                        <h4 class="ft_h4">ĐỔI HÀNG DỄ DÀNG</h4>
                        <p class="higlight">Đổi hàng thoải mái trong 30 ngày</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <marquee direction="right" style="height:100px">
            <img src="img/adidas.png" alt="" height="100px" width="100px">
            <img src="img/balance.png" alt="" height="100px" width="100px">
            <img src="img/converse.png" alt="" height="100px" width="100px">
            <img src="img/puma.png" alt="" height="100px" width="100px">
            <img src="img/nike.png" alt="" height="100px" width="100px">
        </marquee>
    </div>
    <div class="main-layout pt-5">
        <section id="inner" class="inner-section section">
            <h1 class="text-center twinkle pb-2">Sản phẩm mới</h1>
            <!-- SECTION HEADING -->
            <div class=" row">
                <div class="col-md-9 card-container mb-5 ml-5">
                    <?php foreach ($products as $product) :
						$productID = $product->getId();
						?>
                    <div class="card-item bg-white ml-2 mb-3">
                        <a href="detail.php?id=<?php echo $productID; ?>">
                            <img class="w-100 rounded" style="height: 200px;"
                                src="img/upload/<?= htmlspecialchars($product->image) ?>">
                        </a>

                        <div class="text-uppercase p-3 font-weight-bold"><?= htmlspecialchars($product->name) ?></div>
                        <div class="p-3 font-weight-bold">
                            <?php $ct =  $category->find($product->category_id); echo $ct->category_name;?></div>
                        <div><b>Giá:</b> <i class="text-danger">
                                <?php echo number_format($product->price, 0, '', '.'); ?> VNĐ</i></div>
                        <hr>
                        <div class="card-footer">
                            <a class="btn btn-primary" href="detail.php?id=<?php echo $productID; ?>">Xem chi tiết</a>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="list-group col-md-2 ml-2">
                    <b class="list-group-item list-group-item-action">DANH MỤC</b>
                    <?php foreach ($categorys as $category) :
						$categoryID = $category->getId(); ?>
                    <a class="list-group-item list-group-item-action"
                        href="product.php?category_id=<?php echo $categoryID; ?>">
                        <?php echo htmlspecialchars($category->category_name) ?>
                    </a>
                    <?php endforeach; ?>
                </div>

            </div>


        </section>

    </div>
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