<?php
	//lấy id truyền từ trang list.php sang
	$id = $_GET["key"];
    $sever="localhost";
    $user="root";
    $password="";
    $db_name="test_db";
	$sql = "delete from user where id = $id";
    $conn= mysqli_connect($sever,$user,$password,$db_name);
	$result = mysqli_query($conn, $sql);
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
		echo "Cập nhật thất bại: " . mysqli_error($conn);
		mysqli_close($conn);
	}
?>