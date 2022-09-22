<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Locales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="locales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'latitude')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longitude')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'commune')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'region')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
