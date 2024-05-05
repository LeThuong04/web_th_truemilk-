<?php 
$sever="localhost";
$user="root";
$password="";
$db_name="test_db";
$conn= mysqli_connect($sever,$user,$password,$db_name);
$sql="select * from user";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tài Khoản</title>
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
    <h1>Thông tin khách hàng</h1>
    <table border="1" style="border-collapse:collapse ;">
    <tr>
        <th>id</th>
        <th>Account</th>
        <th>password</th>
        <th>Name</th>
        <th>Role</th>
        <th colspan="2"><a href="add.php">Thêm</a></th>
    </tr>
    <?php 
    while($row=mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo $row["id"]?></td>
        <td><?php echo $row["user_name"]?></td>
        <td><?php echo $row["password"]?></td>
        <td><?php echo $row["name"]?></td>
        <td><?php echo ($row["role"]==="1") ? "admin" : "user";?></td>
        <td><a href="update.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
        <td><a href="delete.php?key=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')">Xóa</a></td>
    </tr>
    <?php 
    }
    mysqli_close($conn);
    ?>
    </table>
</body>
</html>
