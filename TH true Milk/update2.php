<!DOCTYPE html>
<html>
<head>
	<title>Cập nhật thể loại</title>
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
        input{
			padding: 8px;
		}
    </style>
</head>
<body>
<?php
	
	//lấy id truyền trên đường dẫn từ trang list.php --> nằm trong mảng $_GET
	$id = $_GET["id"];
	//lấy thông tin của thể loại có id lấy được từ đường dẫn
	$sever="localhost";
    $user="root";
    $password="";
    $db_name="product_db";
    $conn= mysqli_connect($sever,$user,$password,$db_name);
	$sql = "select * from product where id = $id";
	//$result là 1 table có 1 hàng duy nhất, và đó là hàng chứa thông tin cần đưa vào form
	$result = mysqli_query($conn, $sql);
	//lấy hàng duy nhất đó ra --> $row
	$row = mysqli_fetch_assoc($result);
	//đưa nội dung cũ vào form
	//update
    if(isset($_POST["btnHuy"])){
			header("location:product-list .php");
    }
	if(isset($_POST["btnCapnhat"]))
	{
		//lấy dữ liệu trên form gởi đến server bằng phương thức truyền post
		$ten = $_POST["txtName"];
		$loai = $_POST["txtLoai"];
		$gia = $_POST["sltGia"];
        $soluong=$_POST["txtSoluong"];
		
		$sql = "UPDATE product SET `tên sp` = '$ten',
                            loại = '$loai',
                            giá = '$gia',
                            `số lượng` = '$soluong'
                        WHERE id = $id";

		//thực hiện insert
		$result = mysqli_query($conn, $sql);
		//$result trả về giá trị TRUE hoặc FALSE

		//kiểm tra thành công hay thất bại
		if($result)
		{
			//đóng kết nối và chuyển trang list.php
			mysqli_close($conn);
			header("location:product-list.php");
			//echo "<script language='javascript'>alert('Thêm mới thanh cong');";
			//echo "location.href='list.php';</script>";
		}
		else
		{
			//thông báo lỗi thất bại ra màn hình --> đóng kết nối
			echo "Thêm mới thất bại: " . mysqli_error($conn);
			mysqli_close($conn);
		}
	}
?>
	<form method="post">
		<table border="1" style="border-collapse:collapse" ;>
			<tr>
				<td>
					<label for="txtName">Tên sản  phẩm</label>
				</td>
				<td>
					<input type="text" name="txtName" id="txtName" value="<?php echo $row['tên sp']; ?>">
				</td>
			</tr>
            <tr>
				<td>
					<label for="txtLoai">Loại</label>
				</td>
				<td>
					<input type="text" name="txtLoai" id="txtLoai" value="<?php echo $row['loại']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="sltGia">giá</label>
				</td>
				<td>
					<input type="text" name="sltGia" id="sltGia" value="<?php echo $row['giá']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="txtSoluong">Số lượng</label>
				</td>
				<td>
                <input type="text" name="txtSoluong" id="txtSoluong" value="<?php echo $row['số lượng']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Cập nhật" name="btnCapnhat">
				</td>
				<td>
					<input type="submit" value="Hủy" name="btnHuy">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>