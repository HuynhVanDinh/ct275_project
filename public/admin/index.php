<?php
include "C:/xampp/apps/project/bootstrap.php";

use CT275\Project\Product;
use CT275\Project\User;
use CT275\Project\Order;
use CT275\Project\Category;
use CT275\Project\Contact;
$product = new Product($PDO);
$user = new User($PDO);
$order = new Order($PDO);
$category = new Category($PDO);
$contact = new Contact($PDO);
$users = $user->getUser();
$products = $product->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D-twice</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL_PATH . "css/sticky-footer.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/font-awesome.min.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/animate.css" ?>" rel=" stylesheet">
    <link href="<?= BASE_URL_PATH . "css/style.css" ?>" rel=" stylesheet">
</head>

<body>
    <!-- Main Page Content -->
    <?php include "../../partials/navbar_admin.php" ?>
    <div class="container w-75 float-left">
        <!-- Tab panes -->
        <hr>
        <div class="row text-center">
            <div class="col-3">
                <a href="manage_user.php" class="col-6  btn btn-outline-info mw-100">
                    <i class="fa fa-users p-3" aria-hidden="true" style="font-size: 80px;"></i>
                    <p><?php echo htmlspecialchars($user->countUser()); ?> Người dùng</p>
                </a>
            </div>
            <div class="col-3">
                <a href="manage_Pro.php" class="col-6  btn btn-outline-info mw-100 ">
                    <i class="fa fa-shopping-cart p-3" aria-hidden="true" style="font-size: 80px;"></i>
                    <p><?php echo htmlspecialchars($product->countProduct()); ?> Sản phẩm</p>
                </a>
            </div>
            <div class="col-3">
                <a href="manage_order.php" class="col-6  btn btn-outline-info mw-100 ">
                    <i class="fa fa-pencil-square-o p-3" aria-hidden="true" style="font-size: 80px;"> </i>
                    <p> <?php echo htmlspecialchars($order->countOrder()); ?> Đơn hàng</p>
                </a>
            </div>
            <div class="col-3">
                <a href="manage_Category.php" class="col-6  btn btn-outline-info mw-100">
                    <i class="fa fa-folder p-3" aria-hidden="true" style="font-size: 80px;"> </i>
                    <p><?php echo htmlspecialchars($category->countCategory()); ?> Danh mục</p>
                </a>
            </div>
        </div>
        <hr>
        <div class="row text-center">
            <div class="col-3"></div>
            <div class="col-3">
                <a href="manage_order.php" class="col-6  btn btn-outline-info mw-100">
                    <i class="fa fa-product-hunt p-3 text-danger" aria-hidden="true" style="font-size: 80px;"> </i>
                    <p class="text-manage">Đơn hàng mới
                        <b>(<?php echo htmlspecialchars($order->countOrderNew()); ?>)</b>
                    </p>
                </a>
            </div>
            <div class="col-3">
                <a href="manage_contact.php" class="col-6  btn btn-outline-info mw-100">
                    <i class="fa fa-comments p-3 text-danger" aria-hidden="true" style="font-size: 80px;"> </i>
                    <p class="text-manage"> Liên hệ
                        <b>(<?php echo htmlspecialchars($contact->countContact()); ?>)</b>
                    </p>
                </a>
            </div>
            <div class="col-3"></div>
        </div>
        <hr>

    </div>

    <script src="<?= BASE_URL_PATH . " js/wow.min.js" ?>">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>

    <script>
    $(document).ready(function() {
        $('#product').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    </script>

</body>

</html>