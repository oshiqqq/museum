<?php 
include("app/database/db.php");
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo 'POST';
}else{
    echo 'GET';
}


if (isset($_POST['login'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass-second']);
//          $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);

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