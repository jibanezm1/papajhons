<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
?>
<div class="panel">
    <div class="panel-heading">
        <h1>Carga Masiva de Colaboradores</h1>
    </div>
    <div class="panel-body">


        <br>
        <?php
        $form = ActiveForm::begin([
            'action' => ['locales/subir'],
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data'],
        ]);
        ?>
        <div class="row">
            <div class="col-md-6"><img src="../formato.png" style="width: 65%; display:block; margin:0 auto;" ><br>
                <a href="../ejemplo.xlsx">Descargar Formato</a>
                <p>* Esta carga de usuarios puede tardar unos minutos por los cruces de información que se realiza, no cierre la pagina hasta que lo rediriga al local de destino</p>
            </div>
            <div class="col-md-6">
                <?php
                echo '<label class="control-label">Locales</label>';
                echo Select2::widget([
                    'name' => 'state_10',
                    'data' => ArrayHelper::map(app\models\Locales::find()->all(), 'id', 'name'),
                    'options' => [
                        'placeholder' => 'Seleccione el local de destino ...',
                    ],
                    
                ]);
                ?>
                <br><br>
                <?= $form->field($modelImport, 'fileImport')->widget(FileInput::classname(), [])->label("Cargar Archivo") ?>
                <?= Html::submitButton('Cargar excel', ['class' => 'btn btn-primary']); ?>

            </div>

        </div>

        <br>
        <br>

        <?php ActiveForm::end(); ?>
    </div>
</div>