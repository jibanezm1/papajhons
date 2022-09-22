<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
  <?php $this->beginBody() ?>

  <header id="header">
    <div class="navbar-fixed">

      <nav class="row">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo"><img id="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Papa_John%27s_Logo_2019.svg/4581px-Papa_John%27s_Logo_2019.svg.png"></a>
          
          
        </div>
      </nav>
    </div>
  </header>

  <main id="main" class="flex-shrink-0" role="main">
    <div class="container-fluid" style="padding:3%;">
      <?php if (!empty($this->params['breadcrumbs'])) : ?>

      <?php endif ?>
      <div class="container">
        <nav >
          <div style="background-color: #017a54!important;" class="nav-wrapper">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="<?php echo Url::to(['site/about']);  ?>">Inicio</a></li>
              <li><a href="<?php echo Url::to(['usuarios/index']);  ?>">Usuarios</a></li>
              <li><a href="<?php echo Url::to(['locales/index']);  ?>">Locales</a></li>
              <li><a href="<?php echo Url::to(['site/login']);  ?>">Salir (Admin) </a></li>

            </ul>
          </div>
        </nav>
      </div>
      <br><br>
      <?= Alert::widget() ?>
      <?= $content ?>
    </div>
  </main>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>


        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
<style>
  #logo {
    width: 10%;
    display: block;
    margin: 0px auto;

  }

  .nav-wrapper {
    background-color: whitesmoke;
  }

  footer.page-footer {
    background-color: #007953;
  }

  nav {
    background-color: #27a79a;
  }
</style>