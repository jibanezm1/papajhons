<?php

namespace app\controllers;

use app\models\Locales;
use app\models\Usuarios;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            'locales' => json_encode($locales)
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
