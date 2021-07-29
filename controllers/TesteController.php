<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;

class TesteController extends Controller
{
    public function behaviors(){
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
            ],
        ];
    }

    public function actionIndex(){
        return json_encode([
            'resp' => 'teste requisição'
        ]);
    }
}