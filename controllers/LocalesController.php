<?php

namespace app\controllers;

use app\models\Locales;
use app\models\LocalesSearch;
use app\models\Usuarios;
use app\models\UsuariosSearch;
use Codeception\Coverage\Subscriber\Local;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocalesController implements the CRUD actions for Locales model.
 */
class LocalesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
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

    /**
     * Lists all Locales models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LocalesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $arr = [];
        foreach ($dataProvider->models as $m) {
            $obj = [$m["name"], $m["latitude"], $m["longitude"]];

            array_push($arr, $obj);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mapa' => json_encode($arr)

        ]);
    }

    // public function actionApi()
    // {
    //     $i=1;
    //     while($i<30){
    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => 'https://api.papajohns.cl/v1/stores?latitude=-33.4843354&longitude=-70.6216794&page=' . $i,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'GET',
    //         ));

    //         $response = curl_exec($curl);
    //         $data = json_decode($response);

    //         foreach ($data->page as $local) {

    //             $nuevo = new Locales();

    //             $nuevo->id = $local->id;
    //             $nuevo->name = $local->name;
    //             $nuevo->text_address = $local->text_address;
    //             $nuevo->latitude = $local->latitude;
    //             $nuevo->longitude = $local->longitude;
    //             $nuevo->phone = $local->phone;
    //             $nuevo->commune = $local->commune;
    //             $nuevo->region = $local->region;
    //             $nuevo->save(false);

    //         }
    //         curl_close($curl);
    //         $i++;
    //     }

    // }

    /**
     * Displays a single Locales model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {


        $model = $this->findModel($id);
        if (isset($_GET["UsuariosSearch"]["cliente"])) {
            $usuarios = Usuarios::find()
                ->where(["idLocal" => $id])
                ->andWhere(["like", "cliente", $_GET["UsuariosSearch"]["cliente"]])

                ->all();
        } else {
            $usuarios = Usuarios::find()->where(["idLocal" => $id])->all();
        }
        $locales = Locales::find()->where(['!=', 'id', $id])->all();

        $arr = [];
        foreach ($usuarios as $m) {
            $obj = [$m["cliente"], $m["lat"], $m["lng"], $m["direccion"] . ", " . $m["comuna"] . ", " . $m["region"], [
                $m["cliente"], $m["direccion"], $m["region"], $m["comuna"], $m["telefono"], $m["correo"], $m["id"]
            ]];
            array_push($arr, $obj);
        }

        $arr2 = [];
        foreach ($locales as $m) {
            $objs = [$m["name"], $m["latitude"], $m["longitude"]];
            array_push($arr2, $objs);
        }
        //$this->actionDistancia($id);

        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(["idLocal" => $id]);
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'model' => $model,
            'mapa' => json_encode($arr),
            'locales' => json_encode($arr2)

        ]);
    }

    public function actionTop($id)
    {
        // $top = Usuarios::find()->where(["idLocal" => $id])->orderBy(['km' => SORT_DESC])->limit(3)->asArray()->all();
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->where(["idLocal" => $id]);
        $dataProvider->pagination = ['pageSize' => 7, ];
        

        return $this->renderAjax('top', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionData($id)
    {
        $local = Locales::find()->where(["id" => $id])->asArray()->one();

        $usuarios = Usuarios::find()->where(["idLocal" => $id])->all();

        $sumaTiempo = Usuarios::find()->where(["idLocal" => $id])->sum('tiempo');
        $sumaKM = Usuarios::find()->where(["idLocal" => $id])->sum('km');
        $top = Usuarios::find()->where(["idLocal" => $id])->orderBy(['km' => SORT_DESC])->limit(3)->asArray()->all();

        $total = Usuarios::find()->where(["idLocal" => $id])->count('*');
        $promedioHora = $sumaTiempo / $total;

        $horas = floor($promedioHora / 3600);
        $minutos = floor(($promedioHora - ($horas * 3600)) / 60);
        $segundos = $promedioHora - ($horas * 3600) - ($minutos * 60);

        $totales =  $horas . ':' . $minutos . ":" . round($segundos);
        $totalkm = ($sumaKM) / 1000;

        $promediokm = $totalkm / $total;


        array_push($local, $totales);
        array_push($local, round($promediokm, 1));
        array_push($local, $top);
        $arr = [];
        array_push($arr, $local);
        foreach ($usuarios as $m) {
            $obj = [$m["cliente"], $m["lat"], $m["lng"], $m["direccion"] . ", " . $m["comuna"] . ", " . $m["region"], [
                $m["cliente"], $m["direccion"], $m["region"], $m["comuna"], $m["telefono"], $m["correo"], $m["id"], $m["tiempo"], $m["km"]
            ]];
            array_push($arr, $obj);
        }

        return json_encode($arr);
    }




    /**
     * Creates a new Locales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Locales();

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
     * Updates an existing Locales model.
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
     * Deletes an existing Locales model.
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
     * Finds the Locales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Locales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Locales::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
