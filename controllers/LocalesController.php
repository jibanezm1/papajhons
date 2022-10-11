<?php

namespace app\controllers;

use app\models\Locales;
use app\models\LocalesSearch;
use app\models\Usuarios;
use app\models\UsuariosSearch;
use ErrorException;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\SiteController;
use Yii;

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
        $dataProvider->query->where(["idLocal" => $id])->orderBy(["km" => SORT_DESC]);
        $dataProvider->pagination = ['pageSize' => 7,];

        return $this->renderAjax('top', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTodos()
    {
        $local = Locales::find()->all();
        $arr = [];
        foreach ($local as $l) {
            try {
                $usuarios = Usuarios::find()->where(["idLocal" => $l->id])->all();

                $sumaTiempo = Usuarios::find()->where(["idLocal" => $l->id])->sum('tiempo');
                $sumaKM = Usuarios::find()->where(["idLocal" => $l->id])->sum('km');
                $top = Usuarios::find()->where(["idLocal" => $l->id])->orderBy(['km' => SORT_DESC])->limit(3)->asArray()->all();
                $total = Usuarios::find()->where(["idLocal" => $l->id])->count('*');
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

                array_push($arr, $local);
                foreach ($usuarios as $m) {
                    $obj = [$m["cliente"], $m["lat"], $m["lng"], $m["direccion"] . ", " . $m["comuna"] . ", " . $m["region"], [
                        $m["cliente"], $m["direccion"], $m["region"], $m["comuna"], $m["telefono"], $m["correo"], $m["id"], $m["tiempo"], $m["km"]
                    ]];
                    array_push($arr, $obj);
                }
            } catch (ErrorException $e) {
                Yii::warning("Division by zero.");
            }
        }



        return json_encode($arr);
    }

    public function actionData($id)
    {
        $local = Locales::find()->where(["id" => $id])->asArray()->one();

        $usuarios = Usuarios::find()->where(["idLocal" => $id])->all();
        $top = Usuarios::find()->where(["idLocal" => $id])->orderBy(['km' => SORT_DESC])->limit(3)->asArray()->all();

        $sumaTiempo = Usuarios::find()->where(["idLocal" => $id])->sum('tiempo');
        $sumaKM = Usuarios::find()->where(["idLocal" => $id])->sum('km');

        $total = Usuarios::find()->where(["idLocal" => $id])->count('*');
        $promedioHora = $sumaTiempo / $total;

        $horas = floor($promedioHora / 3600);
        $minutos = floor(($promedioHora - ($horas * 3600)) / 60);
        $segundos = $promedioHora - ($horas * 3600) - ($minutos * 60);

        $totales =  $horas . ':' . $minutos . ":" . round($segundos);
        $totalkm = ($sumaKM) / 1000;

        $promediokm = $totalkm / $total;
        $rango1 = Usuarios::find()->where(['between', 'km', 0, 10000 ])->andWhere(['idLocal' => $id])->count('*');
        $rango2 = Usuarios::find()->where(['between', 'km', 10001, 20000 ])->andWhere(['idLocal' => $id])->count('*');
        $rango3 = Usuarios::find()->where(['between', 'km', 20001, 9999999 ])->andWhere(['idLocal' => $id])->count('*');
    
        $total = Usuarios::find()->where(["idLocal" => $id])->count('*');
        $locales = Locales::find()->where(["id" => $id])->count('*');

        array_push($local, $totales);
        array_push($local, round($promediokm, 1));
        array_push($local, $top);

        array_push($local, $rango1);
        array_push($local, $rango2);
        array_push($local, $rango3);
        array_push($local, $total);
        array_push($local, $locales);

        $arr = [];
        array_push($arr, $local);
        $dats = $local['name'].", ".$local['text_address'];
        foreach ($usuarios as $m) {
            $obj = [$m["cliente"], $m["lat"], $m["lng"], $m["direccion"] . ", " . $m["comuna"] . ", " . $m["region"], [
                $m["cliente"], $m["direccion"], $m["region"], $m["comuna"], $m["telefono"], $m["correo"], $m["id"], $m["tiempo"], $m["km"],$dats
            ]];
            array_push($arr, $obj);
        }

        return json_encode($arr);
    }

    public function actionImporta()
    {
        $modelImport = new \yii\base\DynamicModel(['fileImport' => 'Archivo con Nomina']);
        $modelImport->addRule(['fileImport'], 'required');
        $modelImport->addRule(['fileImport'], 'file', ['extensions' => 'ods,xls,xlsx'], ['maxSize' => 1024 * 1024]);
        return $this->render('import', [
            'modelImport' => $modelImport,
        ]);
    }
    public function actionSubir()
    {
        ini_set('max_execution_time', '300'); //300 seconds = 5 minutes

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $modelImport = new \yii\base\DynamicModel([
            'fileImport' => 'Archivo con Nomina',
        ]);
        $modelImport->addRule(['fileImport'], 'required');
        $modelImport->addRule(['fileImport'], 'file', ['extensions' => 'ods,xls,xlsx'], ['maxSize' => 1024 * 1024]);

        if (Yii::$app->request->post()) {




            $modelImport->fileImport = \yii\web\UploadedFile::getInstance($modelImport, 'fileImport');


            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadDataOnly(true);

            $spreadsheet = $reader->load($modelImport->fileImport->tempName);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);



            $baseRow = 2;

            $contador = 0;
            while (!empty($sheetData[$baseRow]['A'])) {
                // var_dump($sheetData[$baseRow]);die();
                $usuario = new Usuarios();
                try {
                    $usuario->cliente = (string) $sheetData[$baseRow]['B'];
                    $usuario->correo = "N/A";
                    $usuario->telefono = "N/A";
                    $usuario->direccion = (string) $sheetData[$baseRow]['C'];
                    $usuario->region = (string) $sheetData[$baseRow]['F'] . ", " . $sheetData[$baseRow]['D'];
                    $usuario->comuna = (string) $sheetData[$baseRow]['E'];
                    $usuario->idLocal = Yii::$app->request->post()["state_10"];

                    $address = $usuario->direccion . " " . $usuario->comuna . " " . $usuario->region . " Chile";
                    $url = "https://maps.google.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=AIzaSyAQbmLRDXnmodAxAj-KiDRbbZPHT8oil_E";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $responseJson = curl_exec($ch);
                    curl_close($ch);

                    $response = json_decode($responseJson, true);

                    $usuario->lat = $response["results"][0]["geometry"]["location"]["lat"];
                    $usuario->lng = $response["results"][0]["geometry"]["location"]["lng"];
                    $usuario->km = 0;
                    $usuario->tiempo = 0;

                    $usuario->sugeridoTiempo = 0;

                    $usuario->sugeridoKm = 0;
                } catch (ErrorException $e) {
                    Yii::warning("Error en la definicion de los pedidos, revise la configuracion de la columna correo como texto en el excel.");
                }


                $usuario->save(false);


                $contador++;

                $baseRow++;
            }
            $this->actionDistancia(Yii::$app->request->post()["state_10"]);
        }
        return $this->redirect(['locales/view', 'id' => Yii::$app->request->post()["state_10"]]);
    }

    public function actionDistancia($id)
    {

        $l = Locales::find()->where(['id' => $id])->one();
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
