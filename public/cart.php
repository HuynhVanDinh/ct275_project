<?php
session_start();
include "../bootstrap.php";

// $user = new User($PDO);
// // use CT275\Project\User;
// $cart = new Cart($PDO);
// $product = new Product($PDO);
// $category = new Category($PDO);
// $categorys = $category->all();
// // $carts = $cart->findProductInCart($userID);
// $carts = $cart->all();
// if (isset($_SESSION["id_user"])) {
// 	$userID = $_SESSION["id_user"];
// } else {
// 	echo '<script>alert("Bạn cần đăng nhập để xem giỏ hàng của mình.");</script>';
// 	echo '<script>window.location.href = "login.php";</script>';
// }use CT275\Project\Cart;
use CT275\Project\Product;
use CT275\Project\Cart;
use CT275\Project\Category;
use CT275\Project\User;
$user = new User($PDO);
// use CT275\Project\User;
$cart = new Cart($PDO);
$product = new Product($PDO);
$category = new Category($PDO);
$categorys = $category->all();
$carts = $cart->all();
if (isset($_SESSION["id_user"])) {
	$userID = $_SESSION["id_user"];
} else {
	echo '<script>alert("Bạn cần đăng nhập để xem giỏ hàng của mình.");</script>';
	echo '<script>window.location.href = "login.php";</script>';
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
    <div class="main-info h-75 mt-5">
        <hr>
        <h2 class="section-heading text-center wow fadeIn text-title" data-wow-duration="1s">GIỎ HÀNG</h2>
        <hr>
    </div>
    <div class="main-layout pt-2 pb-5">
        <div class="container rounded bg-white">
            <hr>
            <section id="inner" class="inner-section section">
                <!-- SECTION HEADING -->
                <div class="btn btn-warning float-right">
                    <a class="p-3 text-dark" href="order.php">Lịch sử đặt hàng</a>
                </div>
                <button class="btn btn-danger float-right mr-3">
                    <a class="p-3 text-white" href="index.php">Tiếp tục mua hàng</a>
                </button>
                <table class="table table-borderd text-center ">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                            <th width="15%"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
					$n = 1;
					foreach ($carts as $cart) :
						if ($cart->userID == $userID) {
					?>
                        <tr>
                            <td><?php echo $n;
									$n++; ?></td>
                            <td><?php $pro = $product->find($cart->product_id);
									echo $pro->name; ?></td>
                            <td><img class="w-25 h-25" src="img/upload/<?php echo $pro->image; ?>"></td>
                            <td>
                                <form id="editCart" method="get" action="edit_cart.php">
                                    <input hidden type="text" name="cart_id" value="<?php echo $cart->getId(); ?>">
                                    <input hidden type="text" name="product_id"
                                        value="<?php echo $cart->product_id; ?>">
                                    <input required type="number" min="1" max="50" name="quantity"
                                        value="<?php echo $cart->quantity; ?>">
                            </td>
                            <td><?php echo $pro->price; ?><sup> vnđ</sup></td>
                            <td><?php echo $pro->price * $cart->quantity; ?><sup> vnđ</sup></td>
                            <td>
                                <button class="btn btn-warning" type="submit">Cập nhật</button>
                                <a class="btn btn-danger"
                                    href="delete_cart.php?cart_id=<?php echo $cart->getId(); ?>&product_id=<?php echo $cart->product_id; ?>">Xóa</a>
                            </td>
                            </form>
                        </tr>
                        <?php }
					endforeach ?>
                    </tbody>

                </table>

                <form method="get" enctype="multipart/form-data" action="checkout.php">
                    <input hidden type="text" name="cart_id" value="<?php echo $cart->getID(); ?>">

                    <div class="text-right"><button class="btn btn-primary">Thanh Toán Giỏ Hàng</button></div>
                </form>
                <hr>
            </section>

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