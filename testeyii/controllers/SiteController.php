<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\FormularioDeRegistro;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
        return $this->render('index');
    }





    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

// meu codigo

    public function acttionCumprimentar($mensagem = 'Olá'){
        return $this->render('cumprimentar', ['mensagem' => $mensagem]);
    }

    public function actionRegistro()
    {
        $model = new FormularioDeRegistro();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // dados válidos recebidos no $model

            // faça alguma coisa significativa com o $model aqui ...

            return $this->render('confirmar-registro', ['model' => $model]);
        } else {
            // Ou a página esta sendo exibida inicial ou houve algum erro de validação
            return $this->render('registro', ['model' => $model]);
        }
    }


}
