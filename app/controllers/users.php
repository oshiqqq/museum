<?php 
include("app/database/db.php");

$errMsg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);            
    $passS = trim($_POST['pass-second']); 
    if($login === ''|| $email === '' || $passF === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }elseif ($passF !== $passS){
        $errMsg = "Пароли в обоих полях должны соответствовать!";
    }else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass,
        ];

        //    $id = insert('users',$post);
        //    $last_row = selectOne('users',['id'=>$id]);  
        tt($post);
    }

}else{
    echo "get";
    $login = '';
    $email = '';
}

//          $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);

