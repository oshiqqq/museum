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

$params = [
    'admin' =>0,
    'username'=>'chelklim'
];

// tt(selectAll('`users`',$params));
tt(selectOne('users'))
?>