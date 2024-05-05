<?php 
$sever="localhost";
$user="root";
$password="";
$db_name="product_db";
$conn= mysqli_connect($sever,$user,$password,$db_name);
$sql="select * from product";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height:100vh ;
            flex-direction: column;
        }
        table{
        }
        th,td{
            padding: 10px;
        }
        a{
            color: black;
        }
        a:hover{
            color:blue ;
        }
    </style>
</head>
<body>
    <h1>Thông tin sản phẩm</h1>
    <table border="1" style="border-collapse:collapse ;">
    <tr>
        <th>id</th>
        <th>Tên mặt hàng</th>
        <th>Loại</th>
        <th>giá</th>
        <th>Số lượng</th>
        <th colspan="2"><a href="add2.php">Thêm</a></th>
    </tr>
    <?php 
    while($row=mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo $row["id"]?></td>
        <td><?php echo $row["tên sp"]?></td>
        <td><?php echo $row["loại"]?></td>
        <td><?php echo $row["giá"]?></td>
        <td><?php echo $row["số lượng"]?></td>
        <td><a href="update2.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
        <td><a href="delete2.php?key=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')">Xóa</a></td>
    </tr>
    <?php 
    }
    mysqli_close($conn);
    ?>
    </table>
</body>
</html>
