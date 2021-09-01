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

    public function actionIndex(){
        $teste = System::findOne(1);
        return $this->sendJson($teste);
    }

    public function actionCadastrar(){
        $Clientes = new Clientes();
        $Sistema = new System();
        $requisicao = Yii::$app->request->post('dados');

        $Clientes->attributes = $requisicao['clientes'];
        $Clientes->validate();

        $Sistema->attributes = $requisicao['system'];
        $Sistema->sys_data_inicio = date('Y-m-d');
        $Sistema->sys_excluido = 0;
        $Sistema->validate();
        
        if(!$Clientes->errors && !$Sistema->errors){
            // $Clientes->save();

            // $Sistema->sys_cliente = $Clientes->cli_id;
            // $Sistema->save();
            // return throw new \yii\web\HttpException(200);

            return $this->sendJson( [
                'message' => ['200']
            ]);
        }else {
            return $this->sendJson( [
                'errors' => [
                    'clientes' => $Clientes->getFirstErrors(), 
                    'system' => $Sistema->getFirstErrors()
                ]
            ]);
        }
    }
}