<?php 
include __DIR__ . '/../database/db.php';

$errMsg = '';

function userAuth($user){
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];
            if($_SESSION['admin']){
                header('location: ' . "../museum1/admin/posts/index.php");
            }else{
                header('location: ' . "../museum1/index.php");
            }
        }

$users = selectAll('users');
// Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    
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
        $existence = selectOne('users',['email'=> $email]);
       if(!empty($existence['email']) && $existence['email'] === $email) {
        $errMsg = "Пользователь с такой почтой уже зарегистрирован";
       }else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass
        ];

                $id = insert('users',$post);
                $user = selectOne('users',['id' => $id]);
                
                userAuth($user);
                
                
        }
    }

}else{
    $login = '';
    $email = '';
}
// код для формы авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);  
    
    if($email === '' || $pass === ''){
        $errMsg = "Не все поля заполнены!";

    }else{
    $existence = selectOne('users',['email'=> $email]);
        if($existence && password_verify($pass, $existence['password'])){
            userAuth($existence);
            
        }else{
            $errMsg = "Почта либо пароль введены: неверно!";
        }
       }
    }else{
        $email = '';
    }

// Код добавления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){
    
    $admin = 0;
    $pass = '';
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);            
    $passS = trim($_POST['pass-second']); 
    

    if ($login === '' || $email === '' || $passF === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        $errMsg = "Логин должен быть более 2-х символов";
    } elseif ($passF !== $passS) {
        $errMsg = "Пароли в обоих полях должны соответствовать!";
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence) && $existence['email'] === $email) {
            $errMsg = "Пользователь с такой почтой уже зарегистрирован";
        } else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) {
                $admin = 1;
            }
        $post1 = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass
        ];

                $id = insert('users',$post1);
                $user = selectOne('users',['id' => $id]);
                
                
            
                
        }
    }
}else{
    $login = '';
    $email = '';
}
// код удаления юзера
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users',$id);
    header('location: ' . "index.php");
}

// редактор пользователя через админку
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $user = selectOne('users', ['id'=> $id]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
    

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
    
    $id = $_POST['id'];
    $email =trim($_POST['email']);
    $login = $_POST['login'];
    $passS = $_POST['pass-second'];
    $passF = $_POST['pass-first'];
    $admin = ($_POST['admin'] !==null)  ? 1 : 0;  
    
    if($login === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }elseif ($passF !== $passS) {
        $errMsg = "Пароли в обоих полях должны соответствовать!";
    }else{ 
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) {
            $admin = 1;
        }
    $user1 = [
        'admin' => $admin,
        'username' => $login,
        'password' => $pass
    ];

                $id = $_POST['id'];
                $user = update('users', $id, $user1);
                header('location: ' . "index.php");
            
        }
    }
     else{ 
        $login = '';
    }


