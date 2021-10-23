<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicos".
 *
 * @property int $svs_id
 * @property float $svs_preco
 * @property string $svs_duracao
 * @property int|null $svs_retorno
 * @property int $svs_ativo
 * @property int $svs_system
 * @property string|null $sys_descricao
 * @property int $sys_excluido
 * @property string $sys_data_inclusao
 *
 * @property System $svsSystem
 */
class Servicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['svs_nome', 'svs_preco', 'svs_duracao', 'svs_ativo', 'svs_system'], 'required', 'message'=> 'Campo obrigatório'],
            [['svs_preco'], 'number'],
            [['svs_retorno', 'svs_ativo', 'svs_system', 'sys_excluido'], 'integer'],
            [['sys_descricao'], 'string'],
            [['sys_data_inclusao'], 'safe'],
            [['svs_nome', 'svs_duracao'], 'string', 'max' => 150],
            [['svs_system'], 'exist', 'skipOnError' => true, 'targetClass' => System::className(), 'targetAttribute' => ['svs_system' => 'sys_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'svs_id' => 'Svs ID',
            'svs_nome' => 'Nome',
            'svs_preco' => 'Svs Preco',
            'svs_duracao' => 'Svs Duracao',
            'svs_retorno' => 'Svs Retorno',
            'svs_ativo' => 'Svs Ativo',
            'svs_system' => 'Svs System',
            'sys_descricao' => 'Sys Descricao',
            'sys_excluido' => 'Sys Excluido',
            'sys_data_inclusao' => 'Sys Data Inclusao',
        ];
    }

    /**
     * Gets query for [[SvsSystem]].
     *
     * @return \yii\db\ActiveQuery|SystemQuery
     */
    public function getSvsSystem()
    {
        return $this->hasOne(System::className(), ['sys_id' => 'svs_system']);
    }

    /**
     * {@inheritdoc}
     * @return queries\ServicosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new queries\ServicosQuery(get_called_class());
    }
}
