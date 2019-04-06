<?php
function dbConnect($usertype, $connectionType = 'mysqli') 

// ���������: ���� ����������� ������ ��� ������ ����� PDO,
// �� ���������� PDO ����������� ���������� � ��������� ��� ������������ 
// ���� ������ � ������ �� ������. ������� ����� try...catch.
{
   $host = '127.0.0.1';
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
      exit('Unrecognized connection type');
   }
   
   if ($connectionType == 'mysqli') 
   {
      return new mysqli($host, $user, $pwd, $db) or die ('Cannot open database');
   } 
      else 
   {
      try 
      {
         return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
      } 
      catch (PDOException $e) 
      {
         echo 'Cannot connect to database';
         exit;
      }
   }
}
