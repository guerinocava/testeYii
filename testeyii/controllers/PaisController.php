<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Pais;

class PaisController extends Controller
{
    public function actionIndex()
    {
        $query = Pais::find();

        $paginacao = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $query->count(),
        ]);

        $paises = $query->orderBy('nome')
            ->offset($paginacao->offset)
            ->limit($paginacao->limit)
            ->all();

        return $this->render('index', [
            'paises' => $paises,
            'paginacao' => $paginacao,
        ]);
    }
}