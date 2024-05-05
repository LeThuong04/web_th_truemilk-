<?php
session_start();
include"dp_con.php";
if(isset($_POST['phptk']) && isset($_POST['phpmk'] )){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $phptk=validate($_POST['phptk']);
    $phpmk=validate($_POST['phpmk']); 
    

    if(empty( $phptk)){
        header("Location:sanpham.php?error=TK is required");
        exit();
    }elseif(empty( $phpmk)){
        header("Location:sanpham.php?error=MK is required");
        exit();
    }else{
        $sql="select * from user where user_name='$phptk' and password='$phpmk'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)===1){
          $row=mysqli_fetch_assoc($result);
          if($row['user_name']===$phptk && $row['password']===$phpmk && $row['role']==='1'){
           $_SESSION['s_user']=$row;
            header("Location:admin-login.php");
          }else if($row['user_name']===$phptk && $row['password']===$phpmk){
            $_SESSION['user_name']=$row['user_name'];
            $_SESSION['name']=$row['name'];
            $_SESSION['id']=$row['id'];
            header("Location:home.php");
            exit();
          }
          else{
            header("Location:sanpham.php?error=Ko tim thay tai khoan cua ban");
            exit();
          }
          }else{
            header("Location:sanpham.php?error=Ko tim thay tai khoan cua ban");
            exit();
          }
        
    }
}else{
    header("Location:sanpham.php");
    exit();
}