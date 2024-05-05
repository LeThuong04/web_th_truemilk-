<!DOCTYPE html>
<html>
<head>
	<title>Thêm mới thể loại</title>
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

	$sever="localhost";
    $user="root";
    $password="";
    $db_name="product_db";
    $conn= mysqli_connect($sever,$user,$password,$db_name);

	
	if(isset($_POST["btnThem"]))
	{
		
		$ten = $_POST["txtName"];
		$loai = $_POST["txtLoai"];
		$gia = $_POST["sltGia"];
        $soluong=$_POST["txtSoluong"];
		$sql = "insert into product(`tên sp`,loại,giá ,`số lượng`)
							values('$ten', '$loai','$gia', '$soluong')";
		
		$result = mysqli_query($conn, $sql);



		if($result)
		{
			
			mysqli_close($conn);
			header("location:product-list.php");
			
		}
		else
		{
			
			echo "Thêm mới thất bại: " . mysqli_error($conn);
			mysqli_close($conn);
		}
	}	
?>
	<form method="post">
		<table border="1" style="border-collapse:collapse" ;>
			<tr>
				<td>
					<label for="txtName">Tên sản phẩm</label>
				</td>
				<td>
					<input type="text" name="txtName" id="txtName">
				</td>
			</tr>
            <tr>
				<td>
					<label for="txtLoai">Loại</label>
				</td>
				<td>
					<input type="text" name="txtLoai" id="txtLoai">
				</td>
			</tr>
			<tr>
				<td>
					<label for="sltGia">Giá</label>
				</td>
				<td>
					<input type="text" name="sltGia" id="sltGia">
				</td>
			</tr>
			<tr>
				<td>
					<label for="txtSoluong">Số lượng</label>
				</td>
				<td>
                <input type="text" name="txtSoluong" id="txtSoluong">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Thêm mới" name="btnThem">
				</td>
				<td>
					<input type="reset" value="Hủy" name="btnHuy">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>