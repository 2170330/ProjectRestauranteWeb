<?php

namespace backend\controllers;


use Yii;
use backend\models\Prato;
use app\models\PratoSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PratoController implements the CRUD actions for Prato model.
 */
class PratoController extends Controller
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
     * Lists all Prato models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PratoSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Prato::find(),
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prato model.
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
     * Creates a new Prato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prato();

        if ($model->load(Yii::$app->request->post())) {
            //recebe a instância da imagem
            $img = UploadedFile::getInstance($model, 'imagem');

            //recebe o nome da imagem
            $model->imagem = $img->baseName.'.'.$img->extension;

                if ($model->save()){
                    if ($model->tipoPrato->descricao == "Carne") {
                        $img->saveAs('img/carne/' . $model->imagem);
                    }
                    elseif ($model->tipoPrato->descricao  == "Peixe") {
                        $img->saveAs('img/peixe/' . $model->imagem);
                    }
                    elseif ($model->tipoPrato->descricao  == "Vegetariano") {
                        $img->saveAs('img/vegetariano/' . $model->imagem);
                    }
                    else{
                        $img->saveAs('img/vegan/' . $model->imagem);
                    }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Prato model.
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
                if ($model->tipoPrato->descricao == "Carne") {
                    $img->saveAs('img/carne/' . $model->imagem);
                }
                elseif ($model->tipoPrato->descricao  == "Peixe") {
                    $img->saveAs('img/peixe/' . $model->imagem);
                }
                elseif ($model->tipoPrato->descricao  == "Vegetariano") {
                    $img->saveAs('img/vegetariano/' . $model->imagem);
                }
                else{
                    $img->saveAs('img/vegan/' . $model->imagem);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Prato model.
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
     * Finds the Prato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prato::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMenu()
    {
        $pratos = Prato::find()->all();



        return $this->render('menu', [
            'prato'=>$pratos,
        ]);
    }
}
