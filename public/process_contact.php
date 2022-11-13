<?php
include "C:/xampp/apps/project/bootstrap.php";
require_once 'C:/xampp/apps/project/bootstrap.php';
use CT275\Project\Contact;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = new Contact($PDO);
    	$contact->fill($_POST);
		if ($contact->validate()) {
				$contact->save(); 
				echo '<script>alert("Gửi liên hệ thành công.");</script>';
				echo '<script>window.location.href= "contact.php";</script>';
			} 
		$errors = $contact->getValidationErrors();
		if (isset($errors['fullname'])) {
			echo '<script>alert("Họ tên không hợp lệ.");</script>';
			echo "<script>window.location.href= 'contact.php?sdt=$sdt';</script>";
		}
        if (isset($errors['email'])) {
			echo '<script>alert("Email không đúng.");</script>';
			echo "<script>window.location.href= 'contact.php?address=$email';</script>";
		}
		if (isset($errors['sdt'])) {
			$fullname = $_POST['fullname'];
			echo '<script>alert("Số diện thoại không hợp lệ.");</script>';
			echo "<script>window.location.href= 'conatct.php?fullname=$sdt';</script>";
		}
		if (isset($errors['description'])) {
			$username = $_POST['email'];
			$fullname = $_POST['fullname'];
			echo '<script>alert("Mật khẩu không hợp lệ.");</script>';
			echo "<script>window.location.href= 'contact.php?fullname=$fullname&username=$username';</script>";
		}
}
?>