<?php
$dbms = 'mysql';

//Replace the below connection parameters to fit your environment
$host = 'localhost'; 
$db = 'bustransport';
$user = 'root';
$pass = '';
$dsn = "$dbms:host=$host;dbname=$db";

$cn=new PDO($dsn, $user, $pass);

$q=$cn->exec('CALL `studentRoute`(@p0)');
$res=$cn->query('select @p0')->fetchAll();
print_r($res);
?>