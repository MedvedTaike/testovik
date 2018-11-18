<?php use yii\helpers\Url; ?>
<div class="card mb-3">
    <div class="card-header">
        <h4>Категории</h4>
    </div>
        <ul class="list-group">
            <?php foreach($categories as $category) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php if($id == $category->id) : ?>
                <a href="#" class="card-link active_category"><?= $category->name; ?></a>
                    <span class="badge badge-primary badge-pill"><?= $category->getArticlesCount(); ?></span>
                <?php else : ?>
                <a href="<?= Url::toRoute(['article/category', 'id_category'=>$category->id]);?>" class="card-link"><?= $category->name; ?></a>
                    <span class="badge badge-primary badge-pill"><?= $category->getArticlesCount(); ?></span>
                <?php endif; ?>    
            </li>
            <?php endforeach; ?>
        </ul>
</div>