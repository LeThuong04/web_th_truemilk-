<?php
session_start();
include"dp_con.php";
if(isset($_POST['phptk']) && isset($_POST['phpmk'] ) && isset($_POST['name']) && isset($_POST['php2mk'] )){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $phptk=validate($_POST['phptk']);
    $phpmk=validate($_POST['phpmk']);
    $name=validate($_POST['name']);
    $php2mk=validate($_POST['php2mk']);
    $user_data='phptk='.$phptk.'&name='.$name;
    echo   $user_data;
    if(empty( $phptk)){
        header("Location:sanpham.php?error=TK is required&$user_data");
        exit();
    }else if(empty( $phpmk)){
        header("Location:sanpham.php?error=MK is required&$user_data");
        exit();
    }else if(empty( $name)){
        header("Location:sanpham.php?error=name is required&$user_data");
        exit();
    }
    else if(empty( $php2mk)){
        header("Location:sanpham.php?error=re pass is required&$user_data");
        exit();
    }
    else if($phpmk != $php2mk){
        header("Location:sanpham.php?error=Mat khau phai trung nhau$user_data");
        exit();
    }
    else{
        $sql="INSERT INTO user(user_name,password,name) value('$phptk','$phpmk','$name')";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("Location:sanpham.php?success=Đăng ký thành công");
            exit();
        }
    }
}else{
    header("Location:sanpham.php");
    exit();
}