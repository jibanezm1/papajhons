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


  <?= Alert::widget() ?>
  <?= $content ?>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
<style>
  html {
    height: 100%
  }

  body {
    background-image: url("https://pbs.twimg.com/ext_tw_video_thumb/1438976325373636617/pu/img/kLNlW01Edo5V9Cyp.jpg:large");
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }

  button.col.s12.btn.btn-large.waves-effect.indigo {
    background-color: #007753 !important;
  }
</style>