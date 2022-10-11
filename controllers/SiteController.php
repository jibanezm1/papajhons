<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Locales;
use app\models\LocalesSearch;
use app\models\UsersSystems;
use app\models\Usuarios;
use app\models\UsuariosSearch;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->valid();
        $searchModel = new LocalesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $arr = [];
        foreach ($dataProvider->models as $m) {
            $obj = [$m["name"], $m["latitude"], $m["longitude"]];

            array_push($arr, $obj);
        }
        return $this->render('index', [
            'mapa' => json_encode($arr)
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $model = new UsersSystems();

        if ($model->load(Yii::$app->request->post())) {
            $valid = UsersSystems::find()->where(["correoUsuario" => $model->correoUsuario])->andWhere(["claveUsuario" => $model->claveUsuario])->one();
            if ($valid) {
                $session = Yii::$app->session;
                $session->set('usuario', $valid);
                $session->open();
                return Yii::$app->response->redirect(['site/about']);

            } else {
                $this->layout = "login";
                $model->claveUsuario = '';
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }
        $this->layout = "login";
        $model->claveUsuario = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public static function actionInvalid()
    {
        $session = Yii::$app->session;
        $session->destroy();

        Yii::$app->getResponse()->redirect('../site/login');
    }

    public static function valid()
    {
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session->get('usuario');

        if (!$user_id) {
            return  Yii::$app->getResponse()->redirect('../site/login');
        }
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->valid();

        $rango1 = Usuarios::find()->where(['between', 'km', 0, 10000 ])->count('*');
        $rango2 = Usuarios::find()->where(['between', 'km', 10001, 20000 ])->count('*');
        $rango3 = Usuarios::find()->where(['between', 'km', 20001, 9999999 ])->count('*');

        

        $sumaTiempo = Usuarios::find()->sum('tiempo');
        $sumaKM = Usuarios::find()->sum('km');
        $top = Usuarios::find()->orderBy(['km' => SORT_DESC])->limit(3)->all();

        $total = Usuarios::find()->count('*');
        $locales = Locales::find()->count('*');

        $promedioHora = $sumaTiempo / $total;

        $horas = floor($promedioHora / 3600);
        $minutos = floor(($promedioHora - ($horas * 3600)) / 60);
        $segundos = $promedioHora - ($horas * 3600) - ($minutos * 60);

        $totales =  $horas . ':' . $minutos . ":" . round($segundos);
        $totalkm = ($sumaKM) / 1000;

        $promediokm = $totalkm / $total;

        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);


        $arr = [];
        foreach ($dataProvider->models as $m) {


            $obj = [$m["cliente"], $m["lat"], $m["lng"], [
                $m["cliente"], $m["direccion"], $m["region"], $m["comuna"], $m["telefono"], $m["correo"],
                $m->local->name, $m->local->text_address, $m->local->commune, $m["id"]
            ]];
            array_push($arr, $obj);
        }
        return $this->render('about',[
            'tiempo' => $totales,
            'distancia' => $promediokm,
            'rango1' => $rango1,
            'rango2' => $rango2,
            'rango3' => $rango3,
            'usuarios' => $total,
            'locales' => $locales,
            'mapa' => json_encode($arr),


        ]);
    }
}
