<?php
$driver='mysql';
$host = 'localhost';
$db_name = 'museum';
$db_user = 'root';
$db_pass = 'mysql';
$charset = 'utf8mb4';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


try{
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",$db_user, $db_pass, $options
    );  // подключение к бд
}catch (PDOException $i){
    die("Ошибка подключения к базе данных");
}



//  опция [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] 
// указывает, что объект PDO должен использовать исключения (PDO::ERRMODE_EXCEPTION) 
// для обработки ошибок. Это означает, что при возникновении ошибки при выполнении запросов к базе данных, 
// будет выброшено исключение PDOException, которое может быть обработано в блоке catch.


?>