<?php

namespace app\models;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "system".
 *
 * @property int $sys_id
 * @property string $sys_nome_empresa
 * @property string $sys_dominio
 * @property string $sys_telefone
 * @property string $sys_cep
 * @property string $sys_cidade
 * @property string $sys_uf
 * @property string $sys_bairro
 * @property string $sys_endereco
 * @property string $sys_numero
 * @property string $sys_complemento
 * @property string $sys_logo
 * @property string $sys_data_inicio
 * @property int $sys_excluido
 * @property int $sys_cliente
 * @property string $sys_cnpj
 * @property string $sys_capa
 */
class System extends \yii\db\ActiveRecord
{

    public $avatar;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sys_nome_empresa', 'sys_cnpj', 'sys_dominio', 'sys_telefone', 'sys_cep', 'sys_cidade', 'sys_uf', 'sys_bairro', 'sys_endereco'], 'required', 'message' => 'Campo obrigatório'],
            [['sys_data_inicio'], 'safe'],
            [['sys_excluido'], 'integer'],
            [['sys_nome_empresa', 'sys_cnpj', 'sys_dominio', 'sys_telefone', 'sys_cep', 'sys_cidade', 'sys_bairro', 'sys_endereco', 'sys_complemento', 'sys_logo', 'sys_capa'], 'string', 'max' => 150],
            [['sys_uf'], 'string', 'max' => 2],
            [['sys_numero'], 'string', 'max' => 3],
            [['avatar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sys_id' => 'id',
            'sys_nome_empresa' => 'nomeEmpresa',
            'sys_dominio' => 'dominio',
            'sys_telefone' => 'telefone',
            'sys_cep' => 'cep',
            'sys_cidade' => 'cidade',
            'sys_uf' => 'uf',
            'sys_bairro' => 'bairro',
            'sys_endereco' => 'endereco',
            'sys_numero' => 'numero',
            'sys_complemento' => 'complemento',
            'sys_logo' => 'logo',
            'sys_data_inicio' => 'dataInicio',
            'sys_excluido' => 'excluido',
            'sys_capa' => 'capa'
        ];
    }

    public static function findByClienteId($id){
        return self::find()->where(['sys_cliente' => $id])
               ->andWhere(['!=','sys_excluido', 1])->one();
    }

    /**
     * {@inheritdoc}
     * @return queries\SystemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new queries\SystemQuery(get_called_class());
    }
}
