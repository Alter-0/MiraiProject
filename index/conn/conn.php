<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>数据库连接</title>
</head>

<body>
$conn=mysqli_connect("47.115.15.18","wangyesheji","e7BLUzfQv69wXybN","web_design") or die("连接数据库服务器失败！".mysqli_error());
echo "数据库连接成功";
mysqli_query($conn,"set names utf8");	
</body>
</html>