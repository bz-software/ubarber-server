<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionarios".
 *
 * @property int $fun_id
 * @property string $fun_nome
 * @property string $fun_email
 * @property string $fun_senha
 * @property string|null $fun_avatar
 * @property string $fun_telefone
 * @property int $fun_excluido
 * @property string $fun_data_criacao
 * @property string $fun_data_altera
 */
class Funcionarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fun_nome', 'fun_email', 'fun_senha', 'fun_telefone', 'fun_excluido', 'fun_data_criacao', 'fun_data_altera'], 'required'],
            [['fun_excluido'], 'integer'],
            [['fun_data_criacao', 'fun_data_altera'], 'safe'],
            [['fun_nome', 'fun_email', 'fun_senha', 'fun_avatar', 'fun_telefone'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fun_id' => 'Fun ID',
            'fun_nome' => 'Fun Nome',
            'fun_email' => 'Fun Email',
            'fun_senha' => 'Fun Senha',
            'fun_avatar' => 'Fun Avatar',
            'fun_telefone' => 'Fun Telefone',
            'fun_excluido' => 'Fun Excluido',
            'fun_data_criacao' => 'Fun Data Criacao',
            'fun_data_altera' => 'Fun Data Altera',
        ];
    }

    /**
     * {@inheritdoc}
     * @return queries\FuncionariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new queries\FuncionariosQuery(get_called_class());
    }
}
