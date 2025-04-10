<?php

namespace app\controllers;

use app\models\Producto;
use app\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
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
     * Lists all Producto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
     * @param int $_id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($_id),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Producto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $categoria = \app\models\Categorias::findOne(['_id' => $model->categoria_id]);
                if ($categoria) {
                    $model->categoria_id = $categoria->_id;
                } else {
                    Yii::$app->session->setFlash('error', 'Categoría no válida.');
                    return $this->redirect(['index']);
                }

                if ($model->save()) {
                    return $this->redirect(['view', '_id' => (string) $model->_id]);
                }
            }
        }
        $categorias = \app\models\Categorias::find()->all();
        $categorias = \yii\helpers\ArrayHelper::map($categorias, function ($categoria) {
            return (string) $categoria->_id;
        }, 'nombre');
        return $this->render('create', [
            'model' => $model,
            'categorias' => $categorias,
        ]);
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $_id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($_id)
    {
        $model = $this->findModel($_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', '_id' => (string) $model->_id]);
        }

        $categorias = \app\models\Categorias::find()->all();
        $categorias = \yii\helpers\ArrayHelper::map($categorias, function ($categoria) {
            return (string) $categoria->_id;
        }, 'nombre');

        
        return $this->render('update', [
            'model' => $model,
            'categorias' => $categorias,
        ]);
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $_id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($_id)
    {
        $this->findModel($_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $_id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($_id)
    {
        if (($model = Producto::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
