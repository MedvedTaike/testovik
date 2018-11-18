<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container">
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'column')->label('Количество столбцов')->textInput() ?>

    <?= $form->field($model, 'row')->label('Количество рядов')->textInput() ?>
    
    <?= $form->field($model, 'text')->label('Введите желаемый текст')->textarea(['rows' => 4, 'value' => 'Любой уважающий себя программист должен решить эту задачу']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
</div>