<?php
require_once('../includes/connection.inc.php');
// Подсоединяемся к MySQL
$conn = dbConnect('read');

/*
if ($result = $conn->query('SELECT image_id, filename FROM images ORDER BY image_id DESC LIMIT 5')) 
{ 
    print("Очень крупные результаты:\n"); 
    // Выбираем результаты запроса 
    while( $row = $result->fetch_assoc() )
    { 
        printf("%s (%s)\n", $row['image_id'], $row['filename']); 
    } 
    // Освобождаем память 
    $result->close(); 
} 
*/

// Готовим SQL запрос
$sql = 'SELECT * FROM images';
// Сбрасываем счетчик считанных записей
$numRows=-1;
// Передаем запрос и получаем результат
$result=$conn->query($sql);
if (!$result) 
{ 
   echo "Ошибка запроса. Код ошибки: ".$conn->error(); 
} 
else 
{
   // Определяем сколько записей было получено
   $numRows = $result->num_rows;
}      
// Закрываем соединение 
$conn->close(); 
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