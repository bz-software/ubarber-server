<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\System;
use app\models\Clientes;
use app\helpers\ControllerHelper;

class SistemaController extends Controller{

    public function sendJson($data){
        return ControllerHelper::sendJson($data);
    }

    public function behaviors(){
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
            ],
        ];
    }

    public function actionLogin(){
        
    }
}