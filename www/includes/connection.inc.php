<?php
function dbConnect($usertype, $connectionType = 'mysqli') 

// ���������: ���� ����������� ������ ��� ������ ����� PDO,
// �� ���������� PDO ����������� ���������� � ��������� ��� ������������ 
// ���� ������ � ������ �� ������. ������� ����� try...catch.

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
         echo "����������� � ������� MySQL ����������. ��� ������: ".mysqli_connect_error(); 
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
