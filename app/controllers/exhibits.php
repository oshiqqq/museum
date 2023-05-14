<?php

include "../../app/database/db.php";

$errMsg = '';
$id = "";
$name = "";
$description = "";
$age = "";
$valuation = "";
$place = "";
$exhibitss = selectAll('exhibits');


// форма создания экспоната 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exhibits-create'])){
    // tt($_POST);
    // exit();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $age = $_POST['age'];
    $valuation = $_POST['valuation'];
    $place = $_POST['place'];

    

    if($name === ''|| $description === '' || $age === '' || $valuation === '' || $place === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Экспонат должен быть более 2-х символов";
    }else{
        $existence = selectOne('exhibits',['name'=> $name]);
       if(!empty($existence['name']) && $existence['name'] === $name) {
        $errMsg = "Такой эксопант уже существует";
       }else{
        $exhibits = [
            'name' => $name,
            'description' => $description,
            'age' => $age,
            'valuation' => $valuation,
            'place' => $place
        ];

                $id = insert('exhibits',$exhibits);
                $exhibits = selectOne('exhibits',['id' => $id]);
                header('location: ' . "index.php");
                
        }
    }
}else{
    $name = "";
    $description = "";
    $age = "";
    $valuation = "";
    $place = "";
}

// апдейт Редактирование экзибитов
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $exhibits = selectOne('exhibits', ['id'=> $id]);
    $id = $exhibits['id'];
    $name = $exhibits['name'];
    $description = $exhibits['description'];
    $age = $exhibits['age'];
    $valuation = $exhibits['valuation'];
    $place = $exhibits['place'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exhibits-edit'])){
    
    $name = $_POST['name'];
    $description = $_POST['description'];
    $age = $_POST['age'];
    $valuation = $_POST['valuation'];
    $place = $_POST['place'];

    

    if($name === ''|| $description === '' || $age === '' || $valuation === '' || $place === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Экспонат должен быть более 2-х символов";
    }else{
        
        $exhibits = [
            'name' => $name,
            'description' => $description,
            'age' => $age,
            'valuation' => $valuation,
            'place' => $place
        ];

                $id = $_POST['id'];
                $exhibits_id = update('exhibits', $id, $exhibits);
                header('location: ' . "index.php");
            
        }
    }


// УДАЛЕНИЕ ЭКЗИБИТОВ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('exhibits',$id);
    header('location: ' . "index.php");
}