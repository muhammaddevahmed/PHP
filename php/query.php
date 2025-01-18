<?php
include('dcon.php');

$userName = $userEmail = $userPassword = $userConfirmPassword = "" ;
$userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "" ;

// Register

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
    else{
        $query = $pdo ->prepare("select * from users where email = :userEmail");
        $query->bindParam('userEmail',$userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
            $userEmailErr = 'email already exist';
        }
       
    }
    if (empty($userPassword)) {
        $userPasswordErr = "Password is required";
    }
    
    if (empty($userConfirmPassword)) {
        $userConfirmPasswordErr = "Confirm Your Password";
    } elseif ($userPassword !== $userConfirmPassword) {
        $userConfirmPasswordErr = "Passwords do not match";
    }
    
   
    if (empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr) ){
        $query = $pdo->prepare("insert into users(name,email,password) values(:name , :email, :password)");
        $query->bindParam('name',$userName);
        $query->bindParam('email',$userEmail);
        $query->bindParam('password',$userPassword);
        $query->execute();
        echo "<script>alert('register succesfully');location.assign('register.php')</script>";

    }
}

//Login 

if(isset($_POST['userLogin'])){

    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];

    if(empty($userEmail)){
        $userEmailErr = "Email is required";
    }
    if(empty($userPassword)){
        $userPasswordErr = "Password is required";
    }
    if(empty($userNameErr) && empty($userPasswordErr)){
        $query = $pdo->prepare("select * from users where email = :uEmail");
        $query->bindParam('uEmail',$userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        print_r($user);
        if($user){
            if($userPassword == $user['password']){
                echo "<script>location.assign('login.php?success=userlogin')</script>";
            }
            else{
                echo "<script>location.assign('login.php?error=invalid password')</script>";
            }
        }
        else{
            echo "<script>location.assign('login.php?error=user not found
            ')</script>"; 
        }
    }
}
?>