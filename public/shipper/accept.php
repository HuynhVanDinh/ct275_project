<?php 
include "C:/xampp/apps/project/bootstrap.php";
require_once 'C:/xampp/apps/project/bootstrap.php';
use CT275\Project\Order;
$order = new Order($PDO);
$id = $_GET['order_id'];
$findOrder = $order->find_orderid($id);
if ($findOrder != null) {
	$array = [];
	$array['userID'] = $findOrder->userID;
	$array['cart_id'] = $findOrder->cart_id;
	$array['status'] = $findOrder->status;
	$array['total_price'] = $findOrder->total_price;
	$result = $order->update2($array);
	if ($result == true) {
		echo '<script>alert("Xác nhận đã giao đơn hàng này.");</script>';
		echo '<script>window.location.href= "manage_order.php";</script>';
	} else {
		echo '<script>alert("Không thể xác nhận đơn hàng này.");</script>';
		echo '<script>window.location.href= "manage_order.php";</script>';
	}
} else {
	echo '<script>alert("Không thể xác nhận đơn hàng này.");</script>';
	echo '<script>window.location.href= "manage_order.php";</script>';
}

?>