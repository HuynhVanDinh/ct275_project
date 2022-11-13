<?php
session_start();

use CT275\Project\User;

$user = new User($PDO);
if (!isset($_SESSION['id_user'])) {
    redirect(BASE_URL_PATH);
} elseif ($user->find($_SESSION['id_user'])->admin == 0) {
    redirect(BASE_URL_PATH);
}
?>
<style>
.dropdown-select {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
}

.dropdown-item {
    position: relative;
    color: black;
    padding-block: 10px;
    z-index: 2;
    transition: color 0.25s linear 0.25s;
}

.dropdown-item:hover:before {
    height: 100%;
    width: 100%;
}

.dropdown-item:hover {
    color: white !important;
    background-color: transparent;
}

.dropdown-item:before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;
    background-color: pink;
    width: 5px;
    height: 0%;
    transition: height 0.25s linear 0s, width 0.25s linear 0.35s;
}

.dropdown-list {
    opacity: 0;
    visibility: hidden;
    z-index: -1;
    max-height: 0;
    transform: translateY(-1em);
    transition: all 0.25s linear;
}

.active {
    opacity: 1;
    visibility: visible;
    z-index: 1;
    max-height: 100%;
    transform: translateY(0);
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.slists {
    width: 300px;
    height: 750px;
    background-color: #dddddd;
}

.headers {
    background-color: #0c0116;
}

.headers a {
    color: pink;
    font-size: larger;
}


.glow {
    font-size: 50px;
    color: #fff;
    text-align: center;
    animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
    from {
        text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
    }

    to {
        text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
    }
}
</style>

<body>
    <div class="headers">
        <div class="row">
            <div class="col-3">
                <img class="img-thumbnail m-3" src="../img/logo.png" alt="" style="width:200px;">
            </div>
            <div class="col-4 mt-5 text-center">
                <h4 class="glow">Trang quản trị D-twice</h4>
            </div>
            <?php if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {unset($_SESSION['id_user']); } ?>
            <div class="col-5">
                <ul class="text-right float-right mr-3 mt-4">
                    <li><i class="text-danger">Admin&nbsp;</i></li>
                    <li><i class="text-danger"><?php echo $user->find($_SESSION['id_user'])->fullname; ?></i>
                    </li>
                    <li><a class="nav-link" href="../index.php?dangxuat=1">Đăng xuất <img src="../img/logout.png"
                                alt=""></a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="slists float-left border rounded shadow ml-2">
        <h3 class="bg-info border rounded"><i class="fa fa-bars ml-2 pr-2"></i>Danh mục</h3>
        <div class="dropdown">
            <div class="dropdown-select" onclick="show(this)">
                <span class="dropdown-value"><i class="fa fa-money m-3"></i>Quản lý sản phẩm và danh mục</span>
                <i class="fa fa-caret-down mr-3"></i>
            </div>
            <div class="dropdown-list">
                <a href="manage_Pro.php" class="dropdown-item">
                    <div>Quản lý sản phẩm</div>
                </a>
                <a href="manage_category.php" class="dropdown-item">
                    <div>Quản lý danh mục</div>
                </a>
            </div>

        </div>
        <div class="dropdown">
            <div class="dropdown-select" onclick="show(this)">
                <span class="dropdown-value"><i class="fa fa-ils m-3"></i>Quản lý người dùng và liên hệ</span>
                <i class="fa fa-caret-down mr-3"></i>
            </div>
            <div class="dropdown-list">
                <a href="manage_user.php" class="dropdown-item">
                    <div>Quản lý người dùng</div>
                </a>
                <a href="manage_contact.php" class="dropdown-item">
                    <div>Quản lý liên hệ</div>
                </a>
            </div>

        </div>
        <div class="dropdown-select">
            <a href="manage_order.php" class="dropdown-item">
                <i class="fa fa-pencil-square-o m-2"></i>Quản lý đơn hàng
            </a>
        </div>
        <div class="dropdown-select">
            <a href="index.php" class="dropdown-item">
                <i class="fa fa-bar-chart m-2"></i>Thống kê
            </a>
        </div>
    </div>
    <script>
    function show(dropdown) {
        dropdownlist = dropdown.parentNode.getElementsByClassName("dropdown-list")[0];
        if (dropdownlist.className == "dropdown-list active")
            dropdownlist.classList.remove("active");
        else
            dropdownlist.classList.add("active");

    }
    </script>