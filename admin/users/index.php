<?php 
include ("../../app/controllers/users.php");
?>
<!doctype html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/e2d43346f2.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>museum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<!-- header -->
<?php include("../../app/include/header-admin.php"); ?>
<div class ="container">
<?php include("../../app/include/sidebar-admin.php"); ?>
          
            <div class = "posts col-9">
                <div class="button row">
                    <a href = "create.php" class="col-3 btn btn-dark">Создать</a>
                    <span class = "col-1"></span>
                    <a href = "index.php" class="col-3 btn btn-secondary">Редактировать</a>
                </div>
                <div class = "row title-table">
                    <h1>пользователи</h1>
                    <div class ="col-1">ID</div>
                    <div class ="col-2">Логин</div>
                    <div class ="col-3">Email</div>
                    <div class ="col-2">Роль</div>
                    <div class ="col-4">Управление</div>
                    </div>
                    <?php foreach($users as $key=>$user): ?>
                <div class = "row post">
                <div class ="col-1"><?=$user['id'];?></div>
                    <div class ="col-2"><?=$user['username'];?></div>
                    <div class ="col-3"><?=$user['email'];?></div>
                    <?php if($user['admin'] == 1): ?>
                    <div class ="col-2">Admin</div>
                    <?php else: ?>
                    <div class ="col-2">User</div>
                    <? endif; ?>
                    <div class ="red col-2"><a href="edit.php?edit_id=<?=$user['id'];?>">edit</a></div>
                    <div class ="del col-2"><a href="index.php?delete_id=<?=$user['id'];?>">delete</a></div>
                </div>
                        <?php endforeach; ?>
              
                
                </div>
            
            </div>
        </div>
        
      
<!-- footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>                                
