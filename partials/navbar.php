<?php
use CT275\Project\Cart;
use CT275\Project\Category;
$category = new Category($PDO);
$categorys = $category->all();
$cart = new Cart($PDO);
?>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index.php">
        <img src="img/logo3.png" alt="" style="width:100px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Trang chủ </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="product.php" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sản phẩm
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="product.php">Tất cả sản phẩm</a>
                    <div class="dropdown-divider"></div>
                    <?php foreach ($categorys as $category) :
						$categoryID = $category->getId(); ?>
                    <a class="dropdown-item" href="product.php?category_id=<?php echo $categoryID; ?>">
                        <?php htmlspecialchars($category->getId());
							echo htmlspecialchars($category->category_name) ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="presentation.php">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Liên hệ</a>
            </li>
        </ul>
        <div class="text-right row">
            <form method="POST" action="search.php" class="form-inline my-2 my-lg-0 ">
                <div class="input-group mw-100 ">
                    <input type="search" class="search-left pl-2" placeholder="Tìm kiếm..." name="tukhoa"
                        aria-label="Search">
                    <div class="input-group-append ">
                        <button class="btn btn-outline-primary searchs " type="submit" name="timkiem">
                            <i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <button class="btn btn-outline-primary my-2 my-sm-0 ml-2 cart" onclick="openCart();">
                <i class="fa fa-shopping-bag">
                    <?php 
                    if (isset($_SESSION["id_user"])) {
	                $cart->find($_SESSION["id_user"]); 
                    ?>
                    <sup class="text-danger">(<?php echo htmlspecialchars($cart->countCart()); ?>)</sup>
                    <?php } else {
                        ?>
                    <sup class="text-danger">(0)</sup>
                    <?php
                    }
                    ?>


                </i>
            </button>
            <script type="text/javascript">
            function openCart() {
                window.location.href = "cart.php";
            }
            </script>
        </div>
        <ul class="nav navbar-nav ml-5">
            <!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
        </ul>


        <ul class="navbar-nav">
            <?php

				use CT275\Project\User;

				$user = new User($PDO);
			if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
				unset($_SESSION['id_user']);
				}
			if (isset($_SESSION['id_user'])) {
				$username = $_SESSION['id_user'];
				$userData = $user->find($username);
			?>
            <li class="nav-item">
                <i style="color: red;"><?php echo "Xin chào,</br> " . $userData->fullname; ?></i>
                <a class="nav-link" href="index.php?dangxuat=1">Đăng xuất <img src="img/logout.png" alt=""></a>
            </li>
        </ul>

        <?php
		} else {
		?>

        <ul class="navbar-nav">
            <!-- <li class="nav-item">
					<a class="nav-link" href="register.php">Đăng ký </a>
				</li> -->
            <li class="nav-item">
                <a class="nav-link" href="login.php">Đăng nhập <img src="img/login.png" alt=""></a>
            </li>
        </ul>
        <?php
		}
		?>



    </div>
</nav>