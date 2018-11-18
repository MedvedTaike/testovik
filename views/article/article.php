<?php use yii\helpers\Url;?>
<div class="col-9">
    <section class="w-100" id="articles">
            <div class="card mb-3 custom_card_img">
                <img class="card-img-top" src="<?= $article['image']; ?>" >
                <div class="card-body">
                    <h5 class="card-title"><?= $article['name']; ?></h5>
                    <p class="card-text"><?= $article['content']; ?></p>
                    <p class="card-text">
                        <?php if(!empty($article['tags'])) : ?>
                        <?php foreach($article['tags'] as $tag): ?>
                        <a href="<?= Url::toRoute(['article/tags', 'id_tags'=>$tag['id']]);?>" class="card-link ml-0"><?= $tag['name'] ;?></a>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    <p class="card-text"><small class="text-muted">Опубликовано <?= $article['date_on'];?> 
                    <?php if(!empty($article['edit'])): echo 'Отредактировано '. $article['edit']; else: echo ''; endif; ?></small></p>
                    <footer class="blockquote-footer">Автор : <cite title="Source Title"><?= $article['author']; ?></cite></footer>
                </div>
            </div>
    </section>
</div>
