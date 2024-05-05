<?php
    session_start();
    ob_start();
    if(isset($_SESSION['s_user'])&&(is_array($_SESSION['s_user']))&& (count($_SESSION['s_user'])>0)
){ $admin=$_SESSION['s_user']; } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .title {
        text-align: center;
        padding: 50px 0;
        background-color: #ddd;
        color: blue;
      }
      .title2 {
        display: block;
      }
      .menu {
        display: flex;
        list-style: none;
        margin-bottom: 10px;
      }
      .menu li {
        width: 50%;
      }
      .menu a {
        font-size: 30px;
        color: #fff;
        display: block;
        width: 100%;
        text-align: center;
        text-decoration: none;
        padding: 50px 0;
        border: 1px solid #000;
        background-color: #3a55f1;
      }
      .menu a:hover {
        background-color: #ffffff;
        color: #3a55f1;
        transition: all ease 0.4s;
      }
      .btn{
        font-size: 17px;
  text-align: center;
  color: #ffffff;
  text-decoration: none;
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  background-color: #103a71;
  border-radius: 5px;
  padding: 11px 36px;
  border: 1px solid #103a71;
  transition: all ease 0.4s;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1 class="title">
          Admin
          <?php echo $admin['name']?>
        </h1>
      </div>
      <div>
        <ul class="menu">
          <li><a href="product-list.php">Sản phẩm</a></li>
          <li><a href="account.php">Tài khoản</a></li>
        </ul>
        
      </div>
      <a class="btn" href="logout.php">Đăng xuất</a>
    </div>
  </body>
</html>
