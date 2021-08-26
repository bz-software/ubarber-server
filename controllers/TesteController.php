<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\System;

class TesteController extends Controller
{

    public function sendJson($data){
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = $data;
        return $response;
    }

    public function behaviors(){
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
            ],
        ];
    }

    public function actionIndex(){
        $teste = System::findOne(1);
        return $this->sendJson($teste);
    }
}