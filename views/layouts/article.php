<?php

use app\assets\ArticleAsset;
use yii\helpers\Html;
use app\components\MenuWidget;
use app\components\TagsWidget;
use app\models\Article;

ArticleAsset::register($this);
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
    <div id="carouselExampleIndicators" class="carousel slide custom_carousel_wrap" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://sputnik.kg/images/102950/21/1029502121.jpg" alt="Горы Кыргызстана">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Горы Кыргызстана</h5>
                    <p>Великие горы Кыргызстана манят своим величием тысячи туристов с разных стран мира!!!</p>
                  </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvlXObio8SOzRnkfIq5cxpD-bCwpXuGdVgg-tU9arEPphm2bSI" alt="Животные Кыргызстана">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Животные Кыргызстана</h5>
                    <p>Богатая фауна животного мира Кыргызстана поистине впечатляет разнообразием !!!</p>
                  </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://www.advantour.com/img/kyrgyzstan/issyk-kul/issyk-kul.jpg" alt="Ыссык-Куль">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Самое большое озеро Кыргызстана !</h5>
                    <p>Ыссык-Куль это по настоящему жемчужина Кыргызстана и всей Центральной Азии !!!</p>
                  </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Следующая</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Предыдущая</span>
        </a>
    </div>
    <div class="custom_title">
        <h2> Список статей</h2>
    </div>
    <section class="w-100">
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
