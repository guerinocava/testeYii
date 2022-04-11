<?php

namespace app\controllers;

use app\models\imagem;
use app\models\ImagemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ImagemController implements the CRUD actions for imagem model.
 */
class ImagemController extends Controller
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
     * Lists all imagem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ImagemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single imagem model.
     * @param int $idImagem Id Imagem
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idImagem)
    {
        return $this->render('view', [
            'model' => $this->findModel($idImagem),
        ]);
    }

    /**
     * Creates a new imagem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new imagem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idImagem' => $model->idImagem]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing imagem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idImagem Id Imagem
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idImagem)
    {
        $model = $this->findModel($idImagem);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idImagem' => $model->idImagem]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing imagem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idImagem Id Imagem
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idImagem)
    {
        $this->findModel($idImagem)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the imagem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idImagem Id Imagem
     * @return imagem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idImagem)
    {
        if (($model = imagem::findOne(['idImagem' => $idImagem])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
