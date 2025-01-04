<?php
include('connection.php');
$catImageAdd = "img/categories/";

// addcategory
if (isset($_POST['addCategory'])){
    $catName = $_POST['catName'];
    $catImageName = $_FILES['catImage']['name'];
    $fileObject = $_FILES['catImage']['tmp_name'];
    $directory = 'img/categories/'.$catImageName;
    $extension = pathinfo($catImageName,PATHINFO_EXTENSION); 
    if($extension == "jpeg" || $extension == "png" || $extension == "webp"){
    if(move_uploaded_file($fileObject,$directory)){
        $query = $pdo ->prepare("insert into categories(name,image)values(:pn,:pi)");
          $query->bindParam("pn",$catName);
          $query->bindParam("pi",$catImageName);
          $query->execute();
          echo"<script>alert('Data Inserted');</script>";
    }
    else{
        echo"<script>alert('invalid file address');</script>";
    }
}
else{
    echo"<script>alert('invalid file extension');</script>";
}
}
?>

