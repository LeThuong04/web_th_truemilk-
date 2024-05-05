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
    $db_name="test_db";
    $conn= mysqli_connect($sever,$user,$password,$db_name);

	
	if(isset($_POST["btnThem"]))
	{
		
		$ten = $_POST["txtAccount"];
		$password = $_POST["txtpassword"];
		$role = $_POST["sltRole"];
        $name_user=$_POST["txtName"];
		$sql = "insert into user(user_name, password,name ,role)
							values('$ten', '$password','$name_user', '$role')";
		
		$result = mysqli_query($conn, $sql);



		if($result)
		{
			
			mysqli_close($conn);
			header("location:account.php");
			
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
					<label for="txtAccount">Account</label>
				</td>
				<td>
					<input type="text" name="txtAccount" id="txtAccount">
				</td>
			</tr>
            <tr>
				<td>
					<label for="txtName">Name</label>
				</td>
				<td>
					<input type="text" name="txtName" id="txtName">
				</td>
			</tr>
			<tr>
				<td>
					<label for="txtpassword">Pass</label>
				</td>
				<td>
					<input type="text" name="txtpassword" id="txtpassword">
				</td>
			</tr>
			<tr>
				<td>
					<label for="sltRole">Vai trò</label>
				</td>
				<td>
					<select name="sltRole" id="sltRole">
						<option value="0">User</option>
						<option value="1">Admin</option>
					</select>
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