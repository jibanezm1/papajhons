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
try {
  $session = Yii::$app->session;
  $session->open();
  $user_id = $session->get('usuario');
  if (!$user_id) {
    return  Yii::$app->getResponse()->redirect('../site/login');
  }
} catch (\Exception $exception) {
  Yii::$app->getResponse()->redirect('../site/login');
}
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<style>
  span.menu-title {
    font-size: 10px;
  }

  #logo {
    width: 18%;
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

  .navbar-brand>img {
    display: block;
    margin: 0 auto !important;
    padding-top: 25px !important;
    filter: invert(18%) sepia(42%) saturate(1352%) hue-rotate(81deg) brightness(119%) contrast(200);
  }
</style>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <title><?= Html::encode($this->title) ?></title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <link href="../nifty/css/bootstrap.min.css" rel="stylesheet">


  <link href="../nifty/css/nifty.min.css" rel="stylesheet">


  <link href="../nifty/css/demo/nifty-demo-icons.min.css" rel="stylesheet">



  <link href="../nifty/plugins/pace/pace.min.css" rel="stylesheet">
  <script src="../nifty/plugins/pace/pace.min.js"></script>


  <link href="../nifty/css/demo/nifty-demo.min.css" rel="stylesheet">
  <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
  <?php $this->beginBody() ?>
  <div id="container" class="effect aside-float aside-bright mainnav-lg">


    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
      <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
          <a href="index.html" class="navbar-brand">
            <img src="https://quotidian.cl/wp-content/themes/quotidian-v3/img/logo.svg" alt="Nifty Logo" class=" ">

          </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content">
          <ul class="nav navbar-top-links">

            <!--Navigation toogle button-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <li class="tgl-menu-btn">
              <a class="mainnav-toggle" href="#">
                <i class="demo-pli-list-view"></i>
              </a>
            </li>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End Navigation toogle button-->




          </ul>

        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

      </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->
    <div class="boxed">

      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-head">

          <div class="pad-all text-center">

            <a href="#" class="brand-logo"><img id="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Papa_John%27s_Logo_2019.svg/4581px-Papa_John%27s_Logo_2019.svg.png"></a>

          </div>
        </div>


        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">

          <?= Alert::widget() ?>
          <?= $content ?>


        </div>
        <!--===================================================-->
        <!--End page content-->

      </div>
      <!--===================================================-->
      <!--END CONTENT CONTAINER-->



      <!--ASIDE-->
      <!--===================================================-->
      <aside id="aside-container">
        <div id="aside">
          <div class="nano">
            <div class="nano-content">

              <!--Nav tabs-->
              <!--================================-->
              <ul class="nav nav-tabs nav-justified">
                <li class="active">
                  <a href="#demo-asd-tab-1" data-toggle="tab">
                    <i class="demo-pli-speech-bubble-7 icon-lg"></i>
                  </a>
                </li>
                <li>
                  <a href="#demo-asd-tab-2" data-toggle="tab">
                    <i class="demo-pli-information icon-lg icon-fw"></i> Report
                  </a>
                </li>
                <li>
                  <a href="#demo-asd-tab-3" data-toggle="tab">
                    <i class="demo-pli-wrench icon-lg icon-fw"></i> Settings
                  </a>
                </li>
              </ul>
              <!--================================-->
              <!--End nav tabs-->



              <!-- Tabs Content -->
              <!--================================-->
              <div class="tab-content">

                <!--First tab (Contact list)-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="tab-pane fade in active" id="demo-asd-tab-1">
                  <p class="pad-all text-main text-sm text-uppercase text-bold">
                    <span class="pull-right badge badge-warning">3</span> Family
                  </p>

                  <!--Family-->
                  <div class="list-group bg-trans">
                    <a href="#" class="list-group-item">
                      <div class="media-left pos-rel">
                        <img class="img-circle img-xs" src="../nifty/img/profile-photos/2.png" alt="Profile Picture">
                        <i class="badge badge-success badge-stat badge-icon pull-left"></i>
                      </div>
                      <div class="media-body">
                        <p class="mar-no text-main">Stephen Tran</p>
                        <small class="text-muteds">Availabe</small>
                      </div>
                    </a>
                    <a href="#" class="list-group-item">
                      <div class="media-left pos-rel">
                        <img class="img-circle img-xs" src="../nifty/img/profile-photos/7.png" alt="Profile Picture">
                      </div>
                      <div class="media-body">
                        <p class="mar-no text-main">Brittany Meyer</p>
                        <small class="text-muteds">I think so</small>
                      </div>
                    </a>
                    <a href="#" class="list-group-item">
                      <div class="media-left pos-rel">
                        <img class="img-circle img-xs" src="../nifty/img/profile-photos/1.png" alt="Profile Picture">
                        <i class="badge badge-info badge-stat badge-icon pull-left"></i>
                      </div>
                      <div class="media-body">
                        <p class="mar-no text-main">Jack George</p>
                        <small class="text-muteds">Last Seen 2 hours ago</small>
                      </div>
                    </a>
                    <a href="#" class="list-group-item">
                      <div class="media-left pos-rel">
                        <img class="img-circle img-xs" src="../nifty/img/profile-photos/4.png" alt="Profile Picture">
                      </div>
                      <div class="media-body">
                        <p class="mar-no text-main">Donald Brown</p>
                        <small class="text-muteds">Lorem ipsum dolor sit amet.</small>
                      </div>
                    </a>
                    <a href="#" class="list-group-item">
                      <div class="media-left pos-rel">
                        <img class="img-circle img-xs" src="../nifty/img/profile-photos/8.png" alt="Profile Picture">
                        <i class="badge badge-warning badge-stat badge-icon pull-left"></i>
                      </div>
                      <div class="media-body">
                        <p class="mar-no text-main">Betty Murphy</p>
                        <small class="text-muteds">Idle</small>
                      </div>
                    </a>
                    <a href="#" class="list-group-item">
                      <div class="media-left pos-rel">
                        <img class="img-circle img-xs" src="../nifty/img/profile-photos/9.png" alt="Profile Picture">
                        <i class="badge badge-danger badge-stat badge-icon pull-left"></i>
                      </div>
                      <div class="media-body">
                        <p class="mar-no text-main">Samantha Reid</p>
                        <small class="text-muteds">Offline</small>
                      </div>
                    </a>
                  </div>

                  <hr>
                  <p class="pad-all text-main text-sm text-uppercase text-bold">
                    <span class="pull-right badge badge-success">Offline</span> Friends
                  </p>

                  <!--Works-->
                  <div class="list-group bg-trans">
                    <a href="#" class="list-group-item">
                      <span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K. Greyson
                    </a>
                    <a href="#" class="list-group-item">
                      <span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea Branden
                    </a>
                    <a href="#" class="list-group-item">
                      <span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny Juan
                    </a>
                    <a href="#" class="list-group-item">
                      <span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
                    </a>
                  </div>


                  <hr>
                  <p class="pad-all text-main text-sm text-uppercase text-bold">News</p>

                  <div class="pad-hor">
                    <p>Lorem ipsum dolor sit amet, consectetuer
                      <a data-title="45%" class="add-tooltip text-semibold text-main" href="#">adipiscing elit</a>, sed diam nonummy nibh. Lorem ipsum dolor sit amet.
                    </p>
                    <small><em>Last Update : Des 12, 2014</em></small>
                  </div>


                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End first tab (Contact list)-->


                <!--Second tab (Custom layout)-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="tab-pane fade" id="demo-asd-tab-2">

                  <!--Monthly billing-->
                  <div class="pad-all">
                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Billing &amp; reports</p>
                    <p>Get <strong class="text-main">$5.00</strong> off your next bill by making sure your full payment reaches us before August 5, 2018.</p>
                  </div>
                  <hr class="new-section-xs">
                  <div class="pad-all">
                    <span class="pad-ver text-main text-sm text-uppercase text-bold">Amount Due On</span>
                    <p class="text-sm">August 17, 2018</p>
                    <p class="text-2x text-thin text-main">$83.09</p>
                    <button class="btn btn-block btn-success mar-top">Pay Now</button>
                  </div>


                  <hr>

                  <p class="pad-all text-main text-sm text-uppercase text-bold">Additional Actions</p>

                  <!--Simple Menu-->
                  <div class="list-group bg-trans">
                    <a href="#" class="list-group-item"><i class="demo-pli-information icon-lg icon-fw"></i> Service Information</a>
                    <a href="#" class="list-group-item"><i class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
                    <a href="#" class="list-group-item"><span class="label label-info pull-right">New</span><i class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
                    <a href="#" class="list-group-item"><i class="demo-pli-support icon-lg icon-fw"></i> Message Center</a>
                  </div>


                  <hr>

                  <div class="text-center">
                    <div><i class="demo-pli-old-telephone icon-3x"></i></div>
                    Questions?
                    <p class="text-lg text-semibold text-main"> (415) 234-53454 </p>
                    <small><em>We are here 24/7</em></small>
                  </div>
                </div>
                <!--End second tab (Custom layout)-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


                <!--Third tab (Settings)-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="tab-pane fade" id="demo-asd-tab-3">
                  <ul class="list-group bg-trans">
                    <li class="pad-top list-header">
                      <p class="text-main text-sm text-uppercase text-bold mar-no">Account Settings</p>
                    </li>
                    <li class="list-group-item">
                      <div class="pull-right">
                        <input class="toggle-switch" id="demo-switch-1" type="checkbox" checked>
                        <label for="demo-switch-1"></label>
                      </div>
                      <p class="mar-no text-main">Show my personal status</p>
                      <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                    </li>
                    <li class="list-group-item">
                      <div class="pull-right">
                        <input class="toggle-switch" id="demo-switch-2" type="checkbox" checked>
                        <label for="demo-switch-2"></label>
                      </div>
                      <p class="mar-no text-main">Show offline contact</p>
                      <small class="text-muted">Aenean commodo ligula eget dolor. Aenean massa.</small>
                    </li>
                    <li class="list-group-item">
                      <div class="pull-right">
                        <input class="toggle-switch" id="demo-switch-3" type="checkbox">
                        <label for="demo-switch-3"></label>
                      </div>
                      <p class="mar-no text-main">Invisible mode </p>
                      <small class="text-muted">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </small>
                    </li>
                  </ul>


                  <hr>

                  <ul class="list-group pad-btm bg-trans">
                    <li class="list-header">
                      <p class="text-main text-sm text-uppercase text-bold mar-no">Public Settings</p>
                    </li>
                    <li class="list-group-item">
                      <div class="pull-right">
                        <input class="toggle-switch" id="demo-switch-4" type="checkbox" checked>
                        <label for="demo-switch-4"></label>
                      </div>
                      Online status
                    </li>
                    <li class="list-group-item">
                      <div class="pull-right">
                        <input class="toggle-switch" id="demo-switch-5" type="checkbox" checked>
                        <label for="demo-switch-5"></label>
                      </div>
                      Show offline contact
                    </li>
                    <li class="list-group-item">
                      <div class="pull-right">
                        <input class="toggle-switch" id="demo-switch-6" type="checkbox" checked>
                        <label for="demo-switch-6"></label>
                      </div>
                      Show my device icon
                    </li>
                  </ul>



                  <hr>

                  <p class="pad-hor text-main text-sm text-uppercase text-bold mar-no">Task Progress</p>
                  <div class="pad-all">
                    <p class="text-main">Upgrade Progress</p>
                    <div class="progress progress-sm">
                      <div class="progress-bar progress-bar-success" style="width: 15%;"><span class="sr-only">15%</span></div>
                    </div>
                    <small>15% Completed</small>
                  </div>
                  <div class="pad-hor">
                    <p class="text-main">Database</p>
                    <div class="progress progress-sm">
                      <div class="progress-bar progress-bar-danger" style="width: 75%;"><span class="sr-only">75%</span></div>
                    </div>
                    <small>17/23 Database</small>
                  </div>

                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--Third tab (Settings)-->

              </div>
            </div>
          </div>
        </div>
      </aside>
      <!--===================================================-->
      <!--END ASIDE-->


      <!--MAIN NAVIGATION-->
      <!--===================================================-->
      <nav id="mainnav-container">
        <div id="mainnav">


          <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
          <!--It will only appear on small screen devices.-->
          <!--================================
        <div class="mainnav-brand">
            <a href="index.html" class="brand">
                <img src="../nifty/img/logo.png" alt="Nifty Logo" class="brand-icon">
                <span class="brand-text">Nifty</span>
            </a>
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>
        -->



          <!--Menu-->
          <!--================================-->
          <div id="mainnav-menu-wrap">
            <div class="nano">
              <div class="nano-content">

                <!--Profile Widget-->
                <!--================================-->
                <div id="mainnav-profile" class="mainnav-profile">
                  <div class="profile-wrap text-center">
                    <div class="pad-btm">
                      <img class="img-circle img-md" src="../nifty/img/profile-photos/1.png" alt="Profile Picture">
                    </div>
                    <a href="<?php echo Url::to(['site/login']);  ?>" class="box-block" data-toggle="collapse" aria-expanded="false">

                      <p class="mnp-name"><?php
                                          if ($user_id) {
                                            echo $user_id->nombreUsuario;
                                          } else {
                                            return   Yii::$app->getResponse()->redirect('../site/login');
                                          }
                                          ?></p>
                      <span class="mnp-desc"><?php
                                              if ($user_id) {
                                                echo $user_id->correoUsuario;
                                              } else {
                                                return   Yii::$app->getResponse()->redirect('../site/login');
                                              }
                                              ?></span>
                    </a>
                  </div>

                </div>





                <ul id="mainnav-menu" class="list-group">

                  <!--Category name-->
                  <li class="list-header">Navegacion</li>


                  <!--Menu list item-->
                  <li class="active-sub">
                    <a href="<?php echo Url::to(['site/about']);  ?>">
                      <i class="demo-pli-home"></i>
                      <span class="menu-title">Dashboard</span>
                      <i class="arrow"></i>
                    </a>

                    <!--Submenu-->

                  </li>

                  <li class="sub">
                    <a href="<?php echo Url::to(['site/invalid']);  ?>">
                      <i class="demo-pli-close"></i>
                      <span class="menu-title">Salir</span>

                    </a>

                    <!--Submenu-->

                  </li>




                  <!--Menu list item-->


                  <li class="list-divider"></li>

                  <!--Category name-->
                  <li class="list-header">Administración</li>

                  <!--Menu list item-->
                  <li>
                    <a href="<?php echo Url::to(['usuarios/index']);  ?>">
                      <i class="demo-pli-male"></i>
                      <span class="menu-title">Colaboradores</span>
                      <i class="arrow"></i>
                    </a>

                    <!--Submenu-->

                  </li>

                  <!--Menu list item-->
                  <li>
                    <a href="<?php echo Url::to(['locales/index']);  ?>">
                      <i class="demo-pli-building"></i>
                      <span class="menu-title">Locales</span>
                      <i class="arrow"></i>
                    </a>

                    <!--Submenu-->

                  </li>
                  <li>
                    <a href="<?php echo Url::to(['locales/importa']);  ?>">
                      <i class="demo-pli-data-storage"></i>
                      <span class="menu-title">Importar Usuarios</span>
                      <i class="arrow"></i>
                    </a>

                    <!--Submenu-->

                  </li>
                  <?php

                  if ($user_id->idTipo == 1) {
                  ?>
                    <li>
                      <a href="<?php echo Url::to(['users-systems/index']);  ?>">
                        <i class="demo-pli-add-user"></i>
                        <span class="menu-title">Usuarios Sistema</span>
                        <i class="arrow"></i>
                      </a>

                      <!--Submenu-->

                    </li>
                  <?php
                  }
                  ?>
                  <li>
                    <a href="#">
                      <i class="demo-pli-information"></i>
                      <span class="menu-title">Huella de Carbono
                        <span class="label label-success pull-right">Version full</span>
                      </span>

                    </a>

                    <!--Submenu-->

                  </li>


                  <li>
                    <a href="#">
                      <i class="demo-pli-data-cloud"></i>
                      <span class="menu-title">Api
                        <span class="label label-success pull-right">Version full</span>
                      </span>

                    </a>

                    <!--Submenu-->

                  </li>
                  <li>
                    <a href="#">
                      <i class="demo-pli-laptop"></i>
                      <span class="menu-title">Reporteria
                        <span class="label label-success pull-right">Version full</span>
                      </span>

                    </a>

                    <!--Submenu-->

                  </li>
                  <li>
                    <a href="#">
                      <i class="demo-pli-mail-send"></i>
                      <span class="menu-title">Gestion Int.
                        <span class="label label-success pull-right">Version full</span>
                      </span>

                    </a>

                    <!--Submenu-->

                  </li>

                  <li>
                    <a href="#">
                      <i class="demo-pli-monitor-2"></i>
                      <span class="menu-title">Desempeño
                        <span class="label label-success pull-right">Version full</span>
                      </span>

                    </a>

                    <!--Submenu-->

                  </li>
                  <li>
                    <a href="#">
                      <i class="demo-pli-share"></i>
                      <span class="menu-title">Comunicaciones
                        <span class="label label-success pull-right">Version full</span>
                      </span>

                    </a>

                    <!--Submenu-->

                  </li>









                  <li class="list-divider"></li>

                  <!--Category name-->

                </ul>



              </div>
            </div>
          </div>
          <!--================================-->
          <!--End menu-->

        </div>
      </nav>
      <!--===================================================-->
      <!--END MAIN NAVIGATION-->

    </div>



    <!-- FOOTER -->
    <!--===================================================-->
    <footer id="footer">

      <!-- Visible when footer positions are fixed -->
      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
      <div class="show-fixed pad-rgt pull-right">
        You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
      </div>



      <!-- Visible when footer positions are static -->
      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
      <div class="hide-fixed pull-right pad-rgt">
        14GB of <strong>512GB</strong> Free.
      </div>



      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
      <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

      <p class="pad-lft">&#0169; 2018 Your Company</p>



    </footer>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
      <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->

  </div>
  <style>
    .panel-heading {
      position: relative;
      height: 14vh !important;
      /* padding: 0; */
      color: #4d627b;
    }
  </style>


  <?php $this->endBody() ?>
  <script src="../nifty/js/bootstrap.min.js"></script>
  <script src="../nifty/js/nifty.min.js"></script>
  <script src="../nifty/plugins/flot-charts/jquery.flot.min.js"></script>
  <script src="../nifty/plugins/flot-charts/jquery.flot.resize.min.js"></script>
  <script src="../nifty/plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
  <script src="../nifty/plugins/sparkline/jquery.sparkline.min.js"></script>
</body>

</html>
<?php $this->endPage() ?>