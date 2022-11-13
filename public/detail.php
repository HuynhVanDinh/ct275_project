<?php
session_start();
include "C:/xampp/apps/project/bootstrap.php";

use CT275\Project\Product;
use CT275\Project\User;
$user = new User($PDO);

$product = new Product($PDO);
use CT275\Project\Category;
$category = new Category($PDO);
$categorys = $category->all();

$id = isset($_REQUEST['id']) ?
    filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
if ($id < 0 || !($product->find($id))) {
    redirect(BASE_URL_PATH);
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
    <?php include('../partials/navbar.php'); ?>
    <div class="man-info bg-white h-75 mt-5">
        <h2 class="section-heading text-center wow fadeIn text-title" data-wow-duration="1s">CHI TIẾT SẢN PHẨM
        </h2>
        <div class="row">
            <div class="col-12 text-center">
                <p class="wow fadeIn note" data-wow-duration="2s">Uy tín - Chất lượng - Làm nên hương hiệu <i
                        class="fa fa-check" aria-hidden="true"></i> </p>
            </div>
        </div>

        <div class="main-layout pt-5 pb-5">
            <div class="container bg-white rounded">
                <section id="inner" class="inner-section section pt-3">

                    <div class="inner-wrapper row">
                        <div class="col-6 p-2 text-center">
                            <img class="img-thumbnail" style="width: 300px; height: 280px;"
                                src="img/upload/<?= htmlspecialchars($product->image) ?>">
                        </div>
                        <div class="col-6 ">
                            <div class="">
                                <div class="text-uppercase text-warning font-weight-bold p-2" style="font-size: 30px;">
                                    <?= htmlspecialchars($product->name) ?></div>
                                <hr>
                                <div class="font-weight-bold p-2">Giá: <i class="text-danger">
                                        <?php echo number_format($product->price, 0, '', '.'); ?> VNĐ</i> </div>
                                <div class="font-weight-bold p-2">
                                    <form action="add_to_cart.php" method="get">Số lượng: <input type="number"
                                            name="quantity" min="1" value="1"><input hidden type="number" name="id"
                                            min="1" value="<?php echo $product->getID(); ?>">
                                </div>
                                <div class="font-weight-bold p-2">Mô tả sản phẩm: </div>
                                <p><?= htmlspecialchars($product->description) ?></p>
                                <hr>
                                <div class="Mô tả sản phẩm: ">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"
                                            aria-hidden="true"> Thêm vào giỏ hàng</i> </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <hr>
            </div>
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