<?php 
include("app/database/db.php"); 


$exhibit = selectOne('exhibits', ['id'=>$_GET['exhibit']]);


// tt($exhibit);
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
<div class="container3" id="singlepage">
    <div class="content row">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2 class="repair212"><?php echo $exhibit['name'] ?></h2>

            <div class="single_post row">
                <div class="img col-12">
                    <img src="<?='assets/images/exhibits/' . $exhibit['img'] ?>" alt="<?=$exhibit['name']?>" class="img-thumbnail">
                </div>
                <div class="info">
                    <i class="s22">Место хранения: <?php echo $exhibit['place'] ?></i>
                    <i class="s22">Возраст: <?php echo $exhibit['age'] ?></i>
                    <i class="s22">Ценность: <?php echo $exhibit['valuation'] ?></i>
                </div>
                <div class="single_post_text col-12">
                <?php echo $exhibit['description'] ?>
                </div>
            </div>

        </div>

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
