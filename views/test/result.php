<?php 
use yii\helpers\Html;
?>
<div class="container">
    <h1></h1>
    <?= Html::a('Назад', ['/test'], ['class' => 'profile-link']) ?>
    <br>
    <br>
    <?= $result ;?>
</div>
<div class="container">
    <?php
    echo '<pre>';
    echo htmlspecialchars(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/models/Test.php'));
    echo '</pre>';
?>
</div>

