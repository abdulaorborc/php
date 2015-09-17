<html>
<head>
</head>
<body>
<form action="myviewdata.php" method="post">
<Select name="catagory">
<option value ="Topic">Topic</option>
<option value="Name">Name</option>
<option value="Attendance">Attendance</option>
</select>
<label>search:<input type="text" name="criteria"/></label>
<input type="submit"name="submit">
</form>
<?php
if(isset($_POST['submit']))
{
define('DB_USER','root');
define('DB_PASSWORD','123@ab');
define('DB_HOST','localhost');
$link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if(!$link){
die('can not connect: '.mysql_error());
}
$criteria = $_POST['criteria'];
$catagory = $_POST['catagory'];
mysql_select_db("snippets", $link);
$sql = "SELECT * FROM lectures  WHERE $catagory='$criteria'";
$myData = mysql_query($sql,$link);
while($record = mysql_fetch_array($myData))
{
echo $record['Topic'] . " " . $record['Name'] . " " . $record['Attendance'];  
echo "<br />";
}
mysql_close($link);
}
?>
</body>
</html>
