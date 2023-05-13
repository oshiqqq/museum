<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="index.php"><i class="fa-solid fa-landmark"></i> музей</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="koll.php">Коллекция</a></li>
                   
                    <li id="regist">
                            <?php if(isset($_SESSION['id'])): ?>
                                    <a href="#">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['login']; ?>

                        </a>
                        <ul>
                        <?php if($_SESSION['admin']): ?>

                        <li><a href="#">Админ панель</a> </li>

                        <?php endif; ?>

                            <li><a href="#">Выход</a> </li>
                        </ul>
                                <?php else: ?>

                            <a href="../log.php">
                            <i class="fa fa-user"></i>
                            Войти
                            </a>
                            <ul>
                                <li><a href = "../reg.php">Регистрация</a> </li>
                            </ul>
                                <?php endif; ?>
                        
                    </li>
                    <li><a href="add.php">Добавить экспонат</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>