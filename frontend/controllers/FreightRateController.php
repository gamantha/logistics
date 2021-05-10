<?php

namespace frontend\controllers;

use app\models\FileFreightRate;
use app\models\FreightRateExpiration;
use app\models\UploadForm;
use Yii;
use app\models\FreightRate;
use app\models\FreightRateSearch;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FreightRateController implements the CRUD actions for FreightRate model.
 */
class FreightRateController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FreightRate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FreightRateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FreightRate model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FreightRate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FreightRate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FreightRate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FreightRate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionFiledelete($id)
    {
        $model = FileFreightRate::findOne($id);
        unlink($model->path . $model->name);
        $model->delete();

        Yii::$app->session->setFlash('success', "file deleted");
        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionAddfile($id)
    {
        $model = new UploadForm();
        $freightrateupload = new FileFreightRate();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $timestamp = time();
            if ($model->upload($id,$timestamp)) {
                $freightrateupload->freightRateId = $id;
                $freightrateupload->name = $id . '_' . $timestamp . '.' . $model->imageFile->extension;
                $freightrateupload->path = 'uploads/freight-rate/';
                $freightrateupload->save();
                // file is uploaded successfully
                Yii::$app->session->setFlash('success', "file upload success");

                return $this->goBack();
            }
        }

        return $this->render('addfile', ['model' => $model]);
    }
    public function actionFiles($id) {

        \yii\helpers\Url::remember();
//        $searchModel = new FreightRateSearch();
        $query = FileFreightRate::find()->where(['freightRateId' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
//                    'title' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('files', [
//            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id
        ]);
    }

    /**
     * Finds the FreightRate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FreightRate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FreightRate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
