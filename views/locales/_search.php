<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\LocalesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="locales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'name')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(app\models\Locales::find()->all(), 'name', 'name'),
                'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
                'options' => ['placeholder' => 'Seleccione a Local ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "change" => 'function(data) { 
                        $(this).parents("form").submit();
            }',
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'text_address')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(app\models\Locales::find()->all(), 'text_address', 'text_address'),
                'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
                'options' => ['placeholder' => 'Seleccione por dirección ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "change" => 'function(data) { 
                        $(this).parents("form").submit();
            }',
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'commune')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(app\models\Locales::find()->all(), 'commune', 'commune'),
                'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
                'options' => ['placeholder' => 'Seleccione por dirección ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "change" => 'function(data) { 
                        $(this).parents("form").submit();
            }',
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo $form->field($model, 'region')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(app\models\Locales::find()->all(), 'region', 'region'),
                'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
                'options' => ['placeholder' => 'Seleccione por dirección ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "change" => 'function(data) { 
                        $(this).parents("form").submit();
            }',
                ]
            ]);
            ?>
        </div>
    </div>







    <?php ActiveForm::end(); ?>

</div>