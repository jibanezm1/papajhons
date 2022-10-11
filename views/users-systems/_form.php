<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var app\models\UsersSystems $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-systems-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreUsuario')->textInput() ?>

    <?= $form->field($model, 'correoUsuario')->textInput() ?>

    <?= $form->field($model, 'claveUsuario')->textInput() ?>

    <?php
    echo $form->field($model, 'idTipo')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\TipoUsuario::find()->all(), 'idTipo', 'tipo'),
        'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
        'options' => ['placeholder' => 'Seleccione el rol del usuario ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>