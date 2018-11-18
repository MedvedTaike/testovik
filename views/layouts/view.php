<?php

use app\assets\ViewAsset;
use yii\helpers\Html;
use app\components\MenuWidget;
use app\components\TagsWidget;
use app\models\Article;

ViewAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <? Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
   <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
                        <img src="https://icon-icons.com/icons2/390/PNG/512/mountains_38193.png" width="30" height="30" class="d-inline-block align-top" alt="">
                        <span class="custom_title"><b>KYRGYZSTAN</b></span>
                      </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                        <a class="nav-link" href="/">Статьи</a>
                      </li>
            </ul>
        </div>
    </nav>
</header>
<div class="container">
    <section class="w-100 mt-4">
        <div class="row">
            <div class="col-3">
                <?= MenuWidget::widget(['id_category' => Article::$params['id_category']]); ?>
                <?= TagsWidget::widget(['id_tag' => Article::$params['id_tags']]); ?>
            </div>
            <?= $content; ?>
        </div>
    </section>
</div>


<footer>
    <nav class="navbar navbar-dark bg-primary">
         <p class="custom_footer_title w-100">All rights reserved(C) Created by respective owner Medion Tagmginskii :)</p>
    </nav>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
