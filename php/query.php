<?php
include('dcon.php');

$userName = $userEmail = $userPassword = $userConfirmPassword = "" ;
$userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "" ;

if(isset($_POST['addUser'])){
    $userName = $_POST['uName'];
    $userEmail =$_POST['uEmail'];
    $userPassword = $_POST['uPassword'];
    $userConfirmPassword = $_POST['uConfirmPassword'];

    if(empty($userName)){
        $userNameErr = "name is required";
    }
    if(empty($userEmail)){
        $userEmailErr = "Email is required";
    }
    if(empty($userPassword)){
        $userPasswordErr = "Password is required";
    }
    if(empty($userConfirmPassword)){
        $userConfirmPasswordErr = "Confirm Your Password";
    }
}
?>