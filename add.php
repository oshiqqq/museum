<!doctype html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/e2d43346f2.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавить экспонат</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<!-- шапка -->
<?php include("app/include/header.php"); ?>
<!-- Контент страницы "Добавить экспонат" -->
<!-- Контент страницы "Добавить экспонат" -->
<div class="container">
    <h2 class="addrep">Добавить экспонат</h2>
    <!-- Форма для добавления экспоната -->
    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" id="name" placeholder="Введите название экспоната" required>
        </div>
        <div class="mb-32">
            <label for="description" class="form-label" resize: none;>Краткое описание</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Введите краткое описание экспоната" required></textarea>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Возраст/год/эпоха</label>
            <input type="text" class="form-control" id="age" placeholder="Введите возраст/год/эпоху экспоната" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Ценность</label>
            <input type="text" class="form-control" id="value" placeholder="Введите ценность экспоната" required>
        </div>
        <div class="mb-3">
            <label for="storage" class="form-label">Место хранения</label>
            <input type="text" class="form-control" id="storage" placeholder="Введите место хранения экспоната" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="image" required>
        </div>
        <button type="submit" class="btn btn-primary" id="repair5">Добавить</button>
    </form>
</div>



<!-- Конец страницы -->

<!-- Футер -->
<!-- footer -->
<?php include("app/include/footer.php"); ?>
        <!-- footer -->

<!-- Подключение скриптов -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
    </html>