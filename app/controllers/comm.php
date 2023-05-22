<?php 
include_once __DIR__ . "../../database/db.php";
$commentsForAdm = selectAll('comments');
$page = $_GET['exhibit'];
$email = "";
$comment = "";
$errMsg = "";
$status = 0;
$comments = [];

//код формы создания комментария 

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])){


    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
    if($email === ''|| $comment === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($comment, 'UTF8') < 10){
        $errMsg = "Комментарий должен быть длинее 10 символов";
    }else{
        $user = selectOne('users',['email' => $email]);
        if ($user['email'] == $email && $user['admin'] === 1 ){
            $status = 1;
        }
             $comment = [
            'status'=> $status,
            'page' => $page,
            'email' => $email,
            'comment' => $comment,

        ];
        // tt($exhibits);
                $comment = insert('comments', $comment);
                $comments = selectAll('comments',['page' => $page, 'status'=> 1]);
          
                
        }
    }
else{
    $email = "";
    $comment = "";
    $comments = selectAll('comments',['page' => $page, 'status'=> 1]);
}
// удаление комментария 
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('comments',$id);
    header('location: ' . "index.php");
}
// publish or not
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $exhibitId = update('comments',$id,['status'=>$publish]);
    header('location: ' . "index.php");
    exit();
}
//upadte com
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $comment = selectOne('comments', ['id'=> $_GET['id']]);

    $id = $comment['id'];
    $email = $comment['email'];
    $text = $comment['comment'];
    $publish = $comment['status'];

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-comment'])){

    $id = $_POST['id'];
    $text = $_POST['content'];    
    $publish = ($_POST['publish'] !==null)  ? 1 : 0;   

    if($text === ''){
        $errMsg = "Комментарий не имеет содержимого текста!";
    }elseif (mb_strlen($text, 'UTF8') < 10){
        $errMsg = "Комментарий должен быть более 10-х символов";
    }else{
        
        $com = [
            'id' => $id,
            'comment' => $text,
            'status' => $publish
        ];

                
                $comment = update('comments', $id, $com);
                header('location: ' . "index.php");
            
        }
    }
     else{
        // $id = $_POST['id'];
        // $text = $_POST['content'];    
        // $publish = ($_POST['publish'] !==null)  ? 1 : 0;   
    
    }
?>