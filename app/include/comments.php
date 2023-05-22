<?php
include __DIR__ . "../../controllers/comm.php";
?>
<div class="col-md-12 col-12 comments" id="repka">
    <h3 id="h33">Оставить комментарий</h3>
    <form action="<?="single.php?exhibit=$page"?>" method="post">
        <input type="hidden" name="page" value="<?=$page;?>">
    <!-- http://localhost/museum1/single.php?exhibit=54 -->
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Адрес электронной почты</label>
  <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Напишите ваш отзыв</label>
  <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
</div>
<div class="col-12">
    <button type="submit" name="goComment" class="btn btn-primary">Отправить</button>
</form>
<?php if(count($comments) > 0): ?>
    <div class="row all-comments">
        <h3 class="col-12" id="h33">Отзывы к экспонатам</h3>
    <?php foreach($comments as $comment): ?>
        <div class="one-comment col-12">
            <span><i class="fa-regular fa-envelope"></i><?=$comment['email']?></span>
            <span><i class="fa-regular fa-calendar-days"></i><?=$comment['created_date']?></span>
            <div class="col-12 text">
            <?=$comment['comment']?>
            </div>
         </div>
    <?php endforeach; ?>
</div>
<?php endif; ?> 

</div>