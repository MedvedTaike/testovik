<?php use yii\helpers\Url; ?>
<div class="card mb-3">
    <div class="card-header">
    <h4>Теги</h4>
        </div>
        <div class="card-body">
            <?php foreach($tags as $tag): ?>
              <?php if($id == $tag->id) :?>
              <a href="#" style="font-size:<?= mt_rand(12, 24); ?>px"class="card-link active_category"><?= $tag->name; ?></a>
              <?php else : ?>
              <a href="<?= Url::toRoute(['article/tags', 'id_tags'=>$tag->id]);?>" style="font-size:<?= mt_rand(12, 24); ?>px"class="card-link"><?= $tag->name; ?></a>
              <?php endif ; ?>
            <?php endforeach; ?>
    </div>
</div>