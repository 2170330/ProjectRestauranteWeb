<?php

namespace backend\controllers;

use Yii;
use backend\models\Bebida;
use backend\models\BebidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BebidaController implements the CRUD actions for Bebida model.
 */
class BebidaController extends Controller
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
     * Lists all Bebida models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BebidaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bebida model.
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
     * Creates a new Bebida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bebida();

        if ($model->load(Yii::$app->request->post())) {
            //recebe a instância da imagem
            $img = UploadedFile::getInstance($model, 'imagem');

            //recebe o nome da imagem
            $model->imagem = $img->baseName.'.'.$img->extension;

            if ($model->save()){
                if ($model->tipoBebida->descricao == "Sumos") {
                    $img->saveAs('img/sumos/' . $model->imagem);
                }
                elseif ($model->tipoBebida->descricao  == "Vinhos") {
                    $img->saveAs('img/vinhos/' . $model->imagem);
                }
                else{
                    $img->saveAs('img/outros/' . $model->imagem);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bebida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //recebe a instância da imagem
            $img = UploadedFile::getInstance($model, 'imagem');

            //recebe o nome da imagem
            $model->imagem = $img->baseName.'.'.$img->extension;

            if ($model->save()){
                if ($model->tipoBebida->descricao == "Sumos") {
                    $img->saveAs('img/sumos/' . $model->imagem);
                }
                elseif ($model->tipoBebida->descricao  == "Vinhos") {
                    $img->saveAs('img/vinhos/' . $model->imagem);
                }
                else{
                    $img->saveAs('img/outros/' . $model->imagem);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bebida model.
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

    /**
     * Finds the Bebida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bebida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bebida::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
