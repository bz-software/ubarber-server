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
            $clientePorEmail = Clientes::find()->where(['cli_email' => $Clientes->cli_email])->one();
            $sistemaPorDominio = System::find()->where(['sys_dominio' => $Sistema->sys_dominio])->one();
            $sistemaPorCnpj = System::find()->where(['sys_cnpj' => $Sistema->sys_cnpj])->one();

            if(!empty($sistemaPorCnpj)){
                $Sistema->addError('sys_cnpj', "Já existe uma empresa cadastrada com o CNPJ informado");
            }

            if(!empty($clientePorEmail)){                
                $Clientes->addError('cli_email', "Já existe um usuário cadastrado com o e-mail informado");
            }

            if(!empty($sistemaPorDominio)){
                $Sistema->addError('sys_dominio', "Já existe uma empresa cadastrada com o domínio informado");
            }
            
            if(!$Clientes->errors && !$Sistema->errors){  
                $Clientes->cli_senha = password_hash($Clientes->cli_senha, PASSWORD_DEFAULT);
                $Sistema->sys_capa = "imgs/cover/default.jpg";
                $Sistema->sys_logo = "imgs/avatar/default.jpg";
                $Clientes->save();
            
                $Sistema->sys_cliente = $Clientes->cli_id;
                $Sistema->save();

                return $this->sendJson( [
                    'message' => ['200'],
                    'cli_id' => $Clientes->cli_id
                ]);
            }
        }

        return $this->sendJson( [
            'errors' => [
                'clientes' => $Clientes->getFirstErrors(), 
                'system' => $Sistema->getFirstErrors()
            ]
        ]);
    }

    public function actionBuscar(){
        $dominio = strtolower(Yii::$app->request->post('domain')); 
        $sistema = System::find()
                ->where(['sys_dominio' => $dominio])
                ->andWhere(['sys_excluido' => 0])
                ->one();
        if(!empty($sistema)){
            return $this->sendJson(['sysData' => $sistema]);
        }else{
            return  $this->sendJson(['error' => 'not-found']);
        }
    }

    public function actionEstados(){
        $estados = System::find()->select(['sys_uf'])->groupBy(['sys_uf'])->orderBy(['sys_uf' => SORT_ASC])->all();

        return $this->sendJson(['estados' => $estados]);
    }

    public function actionCidades(){
        $estado = Yii::$app->request->post('estado');
        $cidades = System::find()->select(['sys_cidade'])->where(['sys_uf' => $estado])->groupBy(['sys_cidade'])->orderBy(['sys_cidade' => SORT_ASC])->all();

        return $this->sendJson(['cidades' => $cidades]);
    }

    public function actionBairros(){
        $cidade = Yii::$app->request->post('cidade');
        $bairros = System::find()->select(['sys_bairro'])->where(['sys_cidade' => $cidade])->groupBy(['sys_bairro'])->orderBy(['sys_bairro' => SORT_ASC])->all();

        return $this->sendJson(['bairros' => $bairros]);
    }
}