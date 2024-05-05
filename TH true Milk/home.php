<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assets/style.css" />
    <link rel="stylesheet" href="./assets/style-khuyenmai.css" />
    <link rel="icon" type="image/png" href="https://www.thmilk.vn/wp-content/themes/wp-th/favicon.png">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
      .user{
        position: absolute;
        top: 38px;
        right: 18px;
       
      }
      .user   span{
        font-size: 20px;
      }
      .btn-home{
        font-size: 10px;
        padding: 10px;
      }
      .title-u{
        font-size: 13px;

        display: inline-block;
        margin-bottom: 15px;
        font-family: "Roboto", sans-serif;
  font-weight: 400;
  font-style: normal;
  text-transform: uppercase;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="container__nav canle">

            <div class="logo">
          <a href="./main.php"><img src="./assets/imgs/logo.png" alt="logo" /></a>
            </div>

         <ul class="nav__list">
          <li><a href="./ctr.php">câu chuyện thật th</a></li>
          <li>
            <a href="./sanpham.php">sản phẩm </a>
            <ul class="subnav left-1">
              <li><a href="">công bố sản phẩm</a></li>
            </ul>
          </li>
          <li><a href="./khuyenmai.php">khuyến mãi</a></li>
          <li><a href="#">cửa hàng</a></li>
          <li>
            <a href="#">truyền thông </a>
            <ul class="subnav left-2">
              <li><a href="">thongtin tu van su dung sua</a></li>
              <li><a href="">bi quyet ve dep tu nhien</a></li>
              <li><a href="">bi quyet cham soc con cai</a></li>
              <li><a href="">phong cach song xanh</a></li>
            </ul>
          </li>
          <li><a href="#">Tuyển dụng</a></li>
         </ul>



            <form action="" class="nav__form--search">
          <button type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
             </form>

            <a href="#" class="nav__language">
            <img src="./assets/imgs/download.png" alt="VN" />
          <span
            >VN
            <ul class="subnav">
              <li>
                <img src="./assets/imgs/download.png" alt="VN" />
                <span>VN</span>
              </li>
              <li>
                <img src="./assets/imgs/download (1).png" alt="AMERICA" />
                <span>EN</span>
              </li>
              <li>
                <img src="./assets/imgs/download (2).png" alt="ru" />
                <span>RU</span>
              </li>
            </ul>
          </span>
          <span><i class="fa-solid fa-caret-down"></i></span>
            </a>

          <div class="user">
         <span><i class="fa-solid fa-user"></i></span> <h1 class="title-u">User: <?php echo $_SESSION['name']  ?></h1>
          <br>
          <a class="btn btn-home" href="logout.php">Đăng xuất</a>
          </div>
    </div>

      <div class="slider">
        <div class="link-if canle">
          <a href="">Trang chủ</a>
          > Khuyến mãi > Sửa
        </div>
      </div>

        <div class="prodc">
            <div class="img--pro">
                <img  class="img-180p" src="./assets/imgs/co-duong-180ml-2024-1.jpg" alt="">
            </div>
            <div class="pro--inf">
                <h3 class="title1">Sửa Tươi  Tiệt Trùng Có Đường  TH true  MILK 180ml</h3>
                <h5 class="title-2">38.400đ (có VAT)</h5>
                <p class="title3">Quy cách đóng gói: hộp giấy <br>
                     Dung tích: 1 lít</p>
                <a class="btn" href="sanpham.php?success=Đặt hàng thành công">Đặt hàng</a><br>
                
            </div>
        </div>
     
    </div>
       
</body>
</html>
<?php }else{
     header("Location:main.php");
     exit();
} ?>