<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\UsuariosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuarios-search row">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="col-md-3">
        <?php
        echo $form->field($model, 'cliente')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(app\models\Usuarios::find()->all(), 'cliente', 'cliente'),
            'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
            'options' => ['placeholder' => 'Seleccione a colaborador ...'],
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
        echo $form->field($model, 'direccion')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(app\models\Usuarios::find()->all(), 'direccion', 'direccion'),
            'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
            'options' => ['placeholder' => 'Seleccion Direccion ...'],
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
        echo $form->field($model, 'comuna')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(app\models\Usuarios::find()->all(), 'comuna', 'comuna'),
            'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
            'options' => ['placeholder' => 'Seleccion Dirección ...'],
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
            'data' => ArrayHelper::map(app\models\Usuarios::find()->all(), 'region', 'region'),
            'theme' => Select2::THEME_KRAJEE, // this is the default if theme is not set
            'options' => ['placeholder' => 'Seleccion Region ...'],
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
   
    



    <?php // echo $form->field($model, 'telefono') 
    ?>

    <?php // echo $form->field($model, 'correo') 
    ?>

    <?php // echo $form->field($model, 'lat') 
    ?>

    <?php // echo $form->field($model, 'lng') 
    ?>



    <?php ActiveForm::end(); ?>

</div>