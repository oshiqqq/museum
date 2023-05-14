<?php
include "../../app/controllers/exhibits.php"
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
                    <a href = "create.php" class="col-4 btn btn-dark">Добавить экспонат</a>
                    <span class = "col-1"></span>
                    <a href = "index.php" class="col-4 btn btn-secondary">Редактировать</a>
                </div>
                <div class = "row title-table">
                    <h1>Добавить экспонат</h1>
                    
                    
                </div>
                <div class = "row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                <p><?=$errMsg?></p>
        </div>
                <form action="create.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input name="name" value="<?= $name ?>" type="text" class="form-control" id="name" placeholder="Введите название экспоната" required minlength="3">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label" resize: none;>Краткое описание</label>
            <textarea name="description" class="form-control" rows="6" placeholder="Введите краткое описание экспоната" required><?= $description ?></textarea>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Возраст/год/эпоха</label>
            <input name="age" value="<?= $age ?>" type="text" class="form-control" id="age" placeholder="Введите возраст/год/эпоху экспоната" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Ценность</label>
            <input name="valuation" value="<?= $valuation ?>" type="text" class="form-control" id="value" placeholder="Введите ценность экспоната" required>
        </div>
        <div class="mb-3">
            <label for="storage" class="form-label">Место хранения</label>
            <input name="place" value="<?= $place ?>" type="text" class="form-control" id="storage" placeholder="Введите место хранения экспоната" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input name="image" type="file" class="form-control" id="image" required>
        </div> 
        <div class="form-check">
            <input name="publish" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
            
                Publish
            </label>
            
        </div>

        <button name="exhibits-create" type="submit" class="btn btn-primary" id="repair5" >Сохранить</button>
    </form>
                </div>
                </div>
            
            </div>
        </div>
        
      
<!-- footer -->
<?php include("../../app/include/footer.php"); ?>
<!-- footer -->
<!-- добавление визуального редактора -->
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>




<script src= "../../assets/js/script.js"></script>
</body>
</html>                                
