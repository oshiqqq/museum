<?php 
include("app/database/db.php"); 
$exhibits = selectAll('exhibits',['status'=>1]); 

?>
<!doctype html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/e2d43346f2.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Коллекция</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <style>
    
    </style>
</head>
<body>
<!-- шапка -->
<?php include("app/include/header.php"); ?>
<!-- Контент страницы "Отображение, поиск и изменение описания экспоната" -->
<div class="container">

    <!-- Форма для поиска экспоната -->
    <form action="search.php" method="post">
        <div class="mb-3">
            <label for="search" class="form-label">Поиск экспоната</label>
            <input type="text" name="search-tearm" class="form-control" id="search" placeholder="Введите название экспоната">
        </div>
        <button type="submit" action="search.php" method="post" class="btn btn-primary">Найти</button>
    </form>

    <div class="row">
        <!-- Первый экспонат -->
        <?php foreach ($exhibits as $exhibit): ?>
        <div class="col-sm-6">
            <div class="post row1">
                <div class="col-12 col-md-4 img">
                <!-- assets/images/exhibits/159734810613621269.jpg -->
                    <img src="<?='assets/images/exhibits/' . $exhibit['img'] ?>" alt="<?=$exhibit['name']?>" class="img-thumbnail custom-thumbnail">
                </div>
                <div class="col-12 col-md-8 post_text">
                    <h3>
                        <a href="<?='' . 'single.php?exhibit=' . $exhibit['id'];?>"><?= isset($exhibit['name']) ? (strlen($exhibit['name']) > 50 ? mb_substr($exhibit['name'], 0,30,'UTF-8') . '...' : $exhibit['name']) : '' ?></a>
                    </h3>            
                    <i class="s22" >Место: <?= $exhibit['place']?></i>
                    <i class="s22" >Дата: <?= $exhibit['age']?></i>
                    <p class="preview-text">
                    <?= isset($exhibit['description']) ? (strlen($exhibit['description']) > 170 ? mb_substr($exhibit['description'], 0, 170,'UTF-8') . '...' : $exhibit['description']) : '' ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>


    </div>

</div>


<!-- footer -->
<?php include("app/include/footer.php"); ?>
<!-- footer -->

<!-- скрипты -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
