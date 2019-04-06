<?php
require_once('../includes/connection.inc.php');
// Сбрасываем счетчик считанных записей
$numRows=-1;
// Подсоединяемся к MySQL
//$conn = dbConnect('read');
// Готовим SQL запрос
//$sql = 'SELECT * FROM images';
// Передаем запрос и получаем результат
// $result = 
//$conn->mysqli_query($sql); // or die(mysqli_error());
// Определяем сколько записей было получено
//$numRows = $result->num_rows;


$mysqli = new mysqli("localhost", 'psread', 'K1y0mi$u', 'phpsols');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* Create table doesn't return a resultset */
if ($mysqli->query("CREATE TEMPORARY TABLE myCity LIKE City") === TRUE) {
    printf("Table myCity successfully created.\n");
}

if ($mysqli->query("SELECT * FROM images") === TRUE) {$numRows=7;}
else {$numRows=9;}





?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Connecting with MySQLi</title>
</head>

<body>
<p>A total of <?php echo $numRows; /* phpinfo(); */ ?> records were found.</p>
</body>
</html>