<?php 
require('connect.php');

function tt($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

// проверка выполнения запроса к бд

function dbCheckError($query){
    $errinfo = $query->errorInfo();  
    if($errinfo[0] !== PDO::ERR_NONE){
    echo $errinfo[2];
    exit();
    }
    return true;
}

// запроос на получение данных c одной таблицы

function selectAll($table,$params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
       $i=0;
       foreach($params as $key => $value){
            if(!is_numeric($value)){
              $value = "'".$value."'";  
            }
            if($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;    
       }     
    }
    
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//запрос на получение одной строки с таблицы

    function selectOne($table,$params = []){
        global $pdo;
        $sql = "SELECT * FROM $table";
    
        if(!empty($params)){
           $i=0;
           foreach($params as $key => $value){
                if(!is_numeric($value)){
                  $value = "'".$value."'";  
                }
                if($i === 0){
                    $sql = $sql . " WHERE $key=$value";
                }else{
                    $sql = $sql . " AND $key=$value";
                }
                $i++;    
           }     
        }   

//  $sql = $sql . " LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);   
    return $query->fetch();

}

// запись в таблицу бд
function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll='';
    $mask='';
    foreach ($params as $key => $value) {
        if ($i === 0){
        $coll = $coll . "$key";
        $mask = $mask . "'" . "$value" . "'"; 
        }else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'"; 
            }   
        
        
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    // tt($sql);
    // exit();
    
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);   

} 
$arrdata = [
    'admin' => '1',
    'username' => 'artemsstest1',
    'email' => 'tre2141s@mail.ru',
    'password' => '213123',
    'created' => '2023-05-11 14:21:52'
];

insert('users',$arrdata);


?>