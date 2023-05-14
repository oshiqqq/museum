<?php

include "../../app/database/db.php";
if(!$_SESSION){
    header('location: ' . "../../log.php");
}

$errMsg = '';
$id = "";
$name = "";
$description = "";
$age = "";
$valuation = "";
$place = "";
$img = "";
// $exhibitss = selectAll('exhibits');
$exhibitssADM = selectAllFromExhibitsWithUsers('exhibits','users'); // для вывода имени к

// форма создания экспоната 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exhibits-create'])){
    // tt($_FILES);
    if(!empty($_FILES['image']['name'])){
        $imagename = time() . "_" . $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $filetype = $_FILES['image']['type'];
        $destination = "../../assets/images/exhibits\\" . $imagename;
        

        if(strpos($filetype, 'image')===false){
            die("Можно загружать только изображения");
        }elseif ($filesize > 10 * 1024 * 1024) {
            die("Размер файла превышает максимальный размер (10 МБ)");

        }else{$result = move_uploaded_file($filetmpname,$destination);
   


        if($result){
           $_POST['image'] = $imagename;
        }else{
            $errMsg = "Ошибка загрузки изображения на сервер";
        }
    }
       
}
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $age = trim($_POST['age']);
    $valuation = trim($_POST['valuation']);
    $place = trim($_POST['place']);
    $publish = ($_POST['publish'] !==null)  ? 1 : 0;  
//   tt($_POST);
    if($name === ''|| $description === '' || $age === '' || $valuation === '' || $place === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Экспонат должен быть более 2-х символов";
    }else{

             $exhibits = [
            'id_user'=> $_SESSION['id'],
            'name' => $name,
            'description' => $description,
            'age' => $age,
            'valuation' => $valuation,
            'place' => $place,
            'img' => $_POST['image'],
            'status' => $publish
        ];
        // tt($exhibits);
                $exhibits = insert('exhibits',$exhibits);
                $exhibits = selectOne('exhibits',['id' => $id]);
                header('location: ' . "index.php");
                
        }
    }
else{
    $id = "";
    $name = "";
    $description = "";
    $age = "";
    $valuation = "";
    $place = "";
    $publish = "";
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
    $publish = $exhibits['status'];

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exhibits-edit'])){
    
    $name = $_POST['name'];
    $description = $_POST['description'];
    $age = $_POST['age'];
    $valuation = $_POST['valuation'];
    $place = $_POST['place'];
    $publish = ($_POST['publish'] !==null)  ? 1 : 0;  
    if(!empty($_FILES['image']['name'])){
        $imagename = time() . "_" . $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $filetype = $_FILES['image']['type'];
        $destination = "../../assets/images/exhibits\\" . $imagename;
        

        if(strpos($filetype, 'image')===false){
            die("Можно загружать только изображения");
        }elseif ($filesize > 10 * 1024 * 1024) {
            die("Размер файла превышает максимальный размер (10 МБ)");

        }else{$result = move_uploaded_file($filetmpname,$destination);
   


        if($result){
            
           $_POST['image'] = $imagename;
         
        }else{
            $errMsg = "Ошибка загрузки изображения на сервер";
        }
    }
       
}
    

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
            'place' => $place,
            'img' => $imagename,
            'status' => $publish
        ];

                $id = $_POST['id'];
                $exhibits_id = update('exhibits', $id, $exhibits);
                header('location: ' . "index.php");
            
        }
    }
     else{
    
    }
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
        $id = $_GET['pub_id'];
        $publish = $_GET['publish'];
        $exhibitId = update('exhibits',$id,['status'=>$publish]);
        header('location: ' . "index.php");
        exit();
    }


// УДАЛЕНИЕ ЭКЗИБИТОВ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('exhibits',$id);
    header('location: ' . "index.php");
}


