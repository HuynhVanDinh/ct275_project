<?php
session_start();
include "C:/xampp/apps/project/bootstrap.php";
require_once 'C:/xampp/apps/project/bootstrap.php';
// $_SESSION['id_user'] = '';
use CT275\Project\User;

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = new User($PDO);
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $row = $user->checkpoint($username,$password);
    $results = $user->checkpoint2($username,$password);
    
    if($row > 0){
        $_SESSION["id_user"] =  $results['id'];
       
    } else {
        unset($_SESSION["id_user"]);
    }
    
    if(isset($_SESSION["id_user"])){

        if ($results['admin'] == 1) {
            header("Location: admin/index.php");
        } elseif ($results['admin'] == 2){
            header("Location: shipper/index.php");
            }else header("Location: index.php");
        
    }else {
        echo '<script>alert("Đăng nhập thất bại!!! Vui lòng kiểm tra lại.");</script>';
		echo '<script>window.location.href= "login.php";</script>';
    }
       
    
    
}