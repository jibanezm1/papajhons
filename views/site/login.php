<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UsersSystems $model */
/** @var yii\widgets\ActiveForm $form */
?>
<main>
  <center>
    <img class="responsive-img" style="width: 350px;" src="https://www.aedcr.com/sites/default/files/2022-05/logo_papa_johns_sitio_web.png" />



    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
      <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
        <h5 class="indigo-text">Ingrese sus Credenciales</h5>

        <form class="col s12" action="../usuarios/index" method="get">
          <div class='row'>
            <div class='col s12'>
            </div>
          </div>

          <div class='row'>
            <div class='input-field col s12'>
              <?= $form->field($model, 'correoUsuario')->textInput() ?>
            </div>
          </div>

          <div class='row'>
            <div class='input-field col s12'>
            <?= $form->field($model, 'claveUsuario')->passwordInput() ?>

            </div>
            <label style='float: right;'>
              <a class='pink-text' href='#!'><b>Olvido su password?</b></a>
            </label>
          </div>

          <br />
          <center>
            <div class='row'>
              <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Entrar</button>
            </div>
          </center>
        </form>
      </div>
    </div>
    <?php ActiveForm::end(); ?>

  </center>

  <div class="section"></div>
  <div class="section"></div>
</main>