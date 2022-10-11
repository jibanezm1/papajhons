<?php

namespace app\controllers;

use app\models\Locales;
use app\models\Usuarios;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\SiteController;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        SiteController::valid();
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionTest()
    {
        $locales = Locales::find()->all();

        foreach ($locales as $l) {

            $usuarios = Usuarios::find()->where(["idLocal" => $l->id])->all();

            foreach ($usuarios as $u) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://maps.googleapis.com/maps/api/directions/json?origin=' . urlencode($u->direccion . ", " . $u->comuna . ", " . $u->region) . '&destination=' . urlencode($l->text_address . ", " . $l->commune . ", " . $l->region) . '&travelMode=TRANSIT&key=AIzaSyAQbmLRDXnmodAxAj-KiDRbbZPHT8oil_E',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json'
                    ),
                ));


                $response = curl_exec($curl);

                $data = json_decode($response);

                $user = Usuarios::find()->where(["id" => $u->id])->one();
                if (isset($data->routes[0]->legs[0]->distance->value)) {
                    $user->km = $data->routes[0]->legs[0]->distance->value;
                    $user->tiempo = $data->routes[0]->legs[0]->duration->value;
                    $user->save(false);
                }

                curl_close($curl);
            }
        }
    }

    public function actionDistancia()
    {

        $locales = Locales::find()->all();

        foreach ($locales as $l) {

            $usuarios = Usuarios::find()->where(["idLocal" => $l->id])->all();

            foreach ($usuarios as $u) {
                $curl = curl_init();
                $url = 'https://maps.googleapis.com/maps/api/directions/json?destination=' . $l->text_address . '&origin=' . $u->direccion . '&travelMode=TRANSIT&key=AIzaSyAQbmLRDXnmodAxAj-KiDRbbZPHT8oil_E';

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json'
                    ),
                ));

                $response = curl_exec($curl);
                curl_close($curl);


                print_r($response);
                die();
            }
        }
    }

    /**
     * Lists all Usuarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 30];

        if (count($_GET) != 0) {
            if (isset($_GET["UsuariosSearch"]["region"])) {
                $region = $_GET["UsuariosSearch"]["region"];
                // var_dump($_GET["UsuariosSearch"]["region"] );die();
                $rango1 = Usuarios::find()->where(['between', 'km', 0, 10000])->andWhere(['like', 'region', $region])->count('*');
                $rango2 = Usuarios::find()->where(['between', 'km', 10001, 20000])->andWhere(['like', 'region', $region])->count('*');
                $rango3 = Usuarios::find()->where(['between', 'km', 20001, 9999999])->andWhere(['like', 'region', $region])->count('*');
                $sumaTiempo = Usuarios::find()->where(['like', 'region', $region])->sum('tiempo');
                $sumaKM = Usuarios::find()->where(['like', 'region', $region])->sum('km');

                $total = Usuarios::find()->where(['like', 'region', $region])->count('*');
                $promedioHora = $sumaTiempo / $total;

                $horas = floor($promedioHora / 3600);
                $minutos = floor(($promedioHora - ($horas * 3600)) / 60);
                $segundos = $promedioHora - ($horas * 3600) - ($minutos * 60);

                $totales =  $horas . ':' . $minutos . ":" . round($segundos);
                $totalkm = ($sumaKM) / 1000;

                $promediokm = $totalkm / $total;
            } else {
                if (isset($_GET["UsuariosSearch"]["comuna"])) {
                    $comuna = $_GET["UsuariosSearch"]["comuna"];

                    $rango1 = Usuarios::find()->where(['between', 'km', 0, 10000])->andWhere(['like', 'comuna', $comuna])->count('*');
                    $rango2 = Usuarios::find()->where(['between', 'km', 10001, 20000])->andWhere(['like', 'comuna', $comuna])->count('*');
                    $rango3 = Usuarios::find()->where(['between', 'km', 20001, 9999999])->andWhere(['like', 'comuna', $comuna])->count('*');
                    $sumaTiempo = Usuarios::find()->where(['like', 'comuna', $comuna])->sum('tiempo');
                    $sumaKM = Usuarios::find()->where(['like', 'comuna', $comuna])->sum('km');

                    $total = Usuarios::find()->where(['like', 'comuna', $comuna])->count('*');
                    $promedioHora = $sumaTiempo / $total;

                    $horas = floor($promedioHora / 3600);
                    $minutos = floor(($promedioHora - ($horas * 3600)) / 60);
                    $segundos = $promedioHora - ($horas * 3600) - ($minutos * 60);

                    $totales =  $horas . ':' . $minutos . ":" . round($segundos);
                    $totalkm = ($sumaKM) / 1000;

                    $promediokm = $totalkm / $total;
                } else {
                    if (isset($_GET["UsuariosSearch"]["cliente"])) {
                        $cliente = $_GET["UsuariosSearch"]["cliente"];

                        $rango1 = Usuarios::find()->where(['between', 'km', 0, 10000])->andWhere(['like', 'cliente', $cliente])->count('*');
                        $rango2 = Usuarios::find()->where(['between', 'km', 10001, 20000])->andWhere(['like', 'cliente', $cliente])->count('*');
                        $rango3 = Usuarios::find()->where(['between', 'km', 20001, 9999999])->andWhere(['like', 'cliente', $cliente])->count('*');
                        $sumaTiempo = Usuarios::find()->where(['like', 'cliente', $cliente])->sum('tiempo');
                        $sumaKM = Usuarios::find()->where(['like', 'cliente', $cliente])->sum('km');

                        $total = Usuarios::find()->where(['like', 'cliente', $cliente])->count('*');
                        $promedioHora = $sumaTiempo / $total;

                        $horas = floor($promedioHora / 3600);
                        $minutos = floor(($promedioHora - ($horas * 3600)) / 60);
                        $segundos = $promedioHora - ($horas * 3600) - ($minutos * 60);

                        $totales =  $horas . ':' . $minutos . ":" . round($segundos);
                        $totalkm = ($sumaKM) / 1000;

                        $promediokm = $totalkm / $total;
                    } else {
                        $rango1 = Usuarios::find()->where(['between', 'km', 0, 10000])->count('*');
                        $rango2 = Usuarios::find()->where(['between', 'km', 10001, 20000])->count('*');
                        $rango3 = Usuarios::find()->where(['between', 'km', 20001, 9999999])->count('*');
                        $sumaTiempo = Usuarios::find()->sum('tiempo');
                        $sumaKM = Usuarios::find()->sum('km');

                        $total = Usuarios::find()->count('*');
                        $promedioHora = $sumaTiempo / $total;

                        $horas = floor($promedioHora / 3600);
                        $minutos = floor(($promedioHora - ($horas * 3600)) / 60);
                        $segundos = $promedioHora - ($horas * 3600) - ($minutos * 60);

                        $totales =  $horas . ':' . $minutos . ":" . round($segundos);
                        $totalkm = ($sumaKM) / 1000;

                        $promediokm = $totalkm / $total;
                    }
                }
            }
        } else {
            $rango1 = Usuarios::find()->where(['between', 'km', 0, 10000])->count('*');
                        $rango2 = Usuarios::find()->where(['between', 'km', 10001, 20000])->count('*');
                        $rango3 = Usuarios::find()->where(['between', 'km', 20001, 9999999])->count('*');
                        $sumaTiempo = Usuarios::find()->sum('tiempo');
                        $sumaKM = Usuarios::find()->sum('km');

                        $total = Usuarios::find()->count('*');
                        $promedioHora = $sumaTiempo / $total;

                        $horas = floor($promedioHora / 3600);
                        $minutos = floor(($promedioHora - ($horas * 3600)) / 60);
                        $segundos = $promedioHora - ($horas * 3600) - ($minutos * 60);

                        $totales =  $horas . ':' . $minutos . ":" . round($segundos);
                        $totalkm = ($sumaKM) / 1000;

                        $promediokm = $totalkm / $total;
        }


        $total = Usuarios::find()->count('*');
        $countLocales = Locales::find()->count('*');
        $locales = Locales::find()->asArray()->all();

        $arr = [];
        foreach ($dataProvider->models as $m) {


            $obj = [$m["cliente"], $m["lat"], $m["lng"], [
                $m["cliente"], $m["direccion"], $m["region"], $m["comuna"], $m["telefono"], $m["correo"],
                $m->local->name, $m->local->text_address, $m->local->commune, $m["id"]
            ]];
            array_push($arr, $obj);
        }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagina' => $dataProvider->pagination,
            'mapa' => json_encode($arr),
            'locales' => json_encode($locales),
            'rango1' => $rango1,
            'rango2' => $rango2,
            'rango3' => $rango3,
            'totales' => $totales,
            'promediokm' => $promediokm,

            'totalUsuarios' => $dataProvider->getTotalCount()

        ]);
    }

    public function actionApi($inicial, $final)
    {
        $model = Usuarios::find()->select('cliente, lat, lng')
            ->asArray()
            ->offset($inicial)
            ->limit($final)
            ->all();
        $arr = [];
        foreach ($model as $m) {
            $obj = [$m["cliente"], $m["lat"], $m["lng"]];
            array_push($arr, $obj);
        }
        return json_encode($arr);
    }

    /**
     * Displays a single Usuarios model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
