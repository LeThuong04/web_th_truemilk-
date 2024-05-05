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
    $db_name="test_db";
    $conn= mysqli_connect($sever,$user,$password,$db_name);
	$sql = "select * from user where id = $id";
	//$result là 1 table có 1 hàng duy nhất, và đó là hàng chứa thông tin cần đưa vào form
	$result = mysqli_query($conn, $sql);
	//lấy hàng duy nhất đó ra --> $row
	$row = mysqli_fetch_assoc($result);
	//đưa nội dung cũ vào form
	//update
    if(isset($_POST["btnHuy"])){
			header("location:account.php");
    }
	if(isset($_POST["btnCapnhat"]))
	{
		//lấy dữ liệu trên form gởi đến server bằng phương thức truyền post
		$ten = $_POST["txtAccount"];
		$password = $_POST["txtpassword"];
		$role = $_POST["sltRole"];
        $name_user=$_POST["txtName"];
		
		$sql = "UPDATE user SET user_name = '$ten',
									password = '$password',
                                    role = '$role ',
									 name='$name_user'

								where id = $id";
		//thực hiện insert
		$result = mysqli_query($conn, $sql);
		//$result trả về giá trị TRUE hoặc FALSE

		//kiểm tra thành công hay thất bại
		if($result)
		{
			//đóng kết nối và chuyển trang list.php
			mysqli_close($conn);
			header("location:account.php");
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
	<form method="post" >
		<table  border="1" style="border-collapse:collapse">
			<tr>
				<td>
					<label for="txtAccount">Account</label>
				</td>
				<td>
					<input type="text" name="txtAccount" id="txtAccount" value="<?php echo $row['user_name']; ?>">
				</td>
			</tr>
            <tr>
				<td>
					<label for="txtName">Tên người dùng</label>
				</td>
				<td>
					<input type="text" name="txtName" id="txtName" value="<?php echo $row['name']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="txtpassword">pass</label>
				</td>
				<td>
					<input type="text" name="txtpassword" id="txtpassword" value="<?php echo $row['password']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="sltRole">Vai trò</label>
				</td>
				<td>
					<select name="sltRole" id="sltRole">
						<option value="0">User</option>
						<option value="1" 
							<?php
								if($row["role"] == 1)
									echo "selected";
							?>
						>Admin</option>
					</select>
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