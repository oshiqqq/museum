<?php 
include "../../app/controllers/users.php";
if (!isset($_SESSION['id']) || $_SESSION['admin'] != 1) {
    header('Location: ../../index.php'); // Перенаправление на страницу с отказом в доступе
    exit;
}
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
                    <a href = "edit.php" class="col-3 btn btn-dark">Создать</a>
                    <span class = "col-1"></span>
                    <a href = "index.php" class="col-3 btn btn-secondary">Редактировать</a>
                </div>
                <div class = "row title-table">
                    <h1>Создать пользователя</h1>
                    
                    
                </div>
                <div class = "row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                <p><?=$errMsg?></p>
        </div>
                <form action="create.php" method="post">
                <input name="id" value="<?=$id?>" type="hidden">
                <div class="col">
            <label for="formGroupExampleInput" class="form-label">Логин</label>
            <input name="login" value="<?=$username?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ваш логин..." maxlength="12">
        </div>
        <div class="w-100"></div>
        <div class="col">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input readonly name="email" value=" <?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email..." maxlength="30">
        </div>
        <div class="w-100"></div>
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Сбросить пароль</label>
            <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="введите ваш пароль...">
        </div>
        <div class="w-100"></div>
        <div class="col">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="повторите ваш пароль...">
        </div>
        <input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
            
                Admin
            </label>
                <div class="col">
        <button name="update-user" type="submit" class="btn btn-primary" id="repair5">Обновить</button>
                </div>
    </form>
                </div>
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
