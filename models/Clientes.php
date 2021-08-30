<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $cli_id
 * @property string $cli_nome
 * @property string $cli_telefone
 * @property string $cli_email
 * @property string|null $cli_avatar
 * @property int $cli_excluido
 * @property string $cli_data_criacao
 * @property string $cli_data_altera
 *
 * @property System[] $systems
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cli_nome', 'cli_telefone', 'cli_email', 'cli_excluido', 'cli_data_criacao', 'cli_data_altera'], 'required'],
            [['cli_excluido'], 'integer'],
            [['cli_data_criacao', 'cli_data_altera'], 'safe'],
            [['cli_nome', 'cli_telefone', 'cli_email', 'cli_avatar'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cli_id' => 'Cli ID',
            'cli_nome' => 'Cli Nome',
            'cli_telefone' => 'Cli Telefone',
            'cli_email' => 'Cli Email',
            'cli_avatar' => 'Cli Avatar',
            'cli_excluido' => 'Cli Excluido',
            'cli_data_criacao' => 'Cli Data Criacao',
            'cli_data_altera' => 'Cli Data Altera',
        ];
    }

    /**
     * Gets query for [[Systems]].
     *
     * @return \yii\db\ActiveQuery|SystemQuery
     */
    public function getSystems()
    {
        return $this->hasMany(System::className(), ['sys_cliente' => 'cli_id']);
    }

    /**
     * {@inheritdoc}
     * @return queries\ClientesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new queries\ClientesQuery(get_called_class());
    }
}
