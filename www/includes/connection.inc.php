<?php
function dbConnect($usertype, $connectionType = 'mysqli') 

// Замечание: Если допускается ошибка при работе через PDO,
// то расширение PDO сгенерирует исключение и отобразит имя пользователя 
// базы данных и пароль на экране. Поэтому нужно try...catch.

{
   $host = 'localhost';
   $db = 'phpsols';
   if ($usertype  == 'read') 
   {
      $user = 'psread';
	   $pwd = 'K1y0mi$u';
   } 
   elseif ($usertype == 'write') 
   {
      $user = 'pswrite';
	   $pwd = '0Ch@Nom1$u';
   } 
   else 
   {  
      echo 'Unrecognized connection type';
   }
   
   if ($connectionType == 'mysqli') 
   {
      $mysqli=new mysqli($host, $user, $pwd, $db); 
      if (mysqli_connect_errno()) 
      { 
         echo "Подключение к серверу MySQL невозможно. Код ошибки: ".mysqli_connect_error(); 
      } 
      else {return $mysqli;}      
   } 
   else 
   {
      try 
      {
         return new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
      } 
      catch (PDOException $e) 
      {
         echo 'Cannot connect to database';
      }
   }
}
