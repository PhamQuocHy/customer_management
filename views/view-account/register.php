

<!DOCTYPE html>
<html>
<head>
	<title>Đăng kí</title>
</head>
<body>
	<h2>Đăng kí</h2>
	<form action="register.php" method="post">
		<div>
			<label for="user_name">User name:</label>
			<input type="text" id="user_name" name="user_name" required>
		</div>
		<div>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
		</div>
		<div>
			<label for="user_login">User login:</label>
			<input type="text" id="user_login" name="user_login" required>
		</div>
		<div>
			<label for="position">Bạn là ai:</label>
            <select required class="ctrl-input " type="text"  id="position" name="position">
                      <option value="1">Nguyễn Phúc Trọng Nhân</option>
                      <option value="2" selected>Nhân Viên</option>
            </select>
		</div>
		
		<div>
			<input type="submit" name="register" value="Đăng kí">
		</div>
	</form>
</body>
</html>
