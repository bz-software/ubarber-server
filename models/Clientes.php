<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
 * @property string $cli_senha
 *
 * @property System[] $systems
 */
class Clientes extends \yii\db\ActiveRecord implements IdentityInterface
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
            [['cli_nome', 'cli_senha', 'cli_email'], 'required', 'message' => 'Campo obrigatório'],
            [['cli_excluido'], 'integer'],
            [['cli_data_criacao', 'cli_data_altera'], 'safe'],
            [['cli_nome', 'cli_telefone', 'cli_email', 'cli_avatar',], 'string', 'max' => 150],
            [['cli_senha'],'string', 'max' => 250],
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
            'cli_senha' => 'Senha',
            'cli_access_token' => "Access Token",
            'cli_auth_key' => "Auth Key"
        ];
    }

    public static function findIdentity($id){
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        return self::findOne(['cli_access_token' => $token]);
    }

    public static function findByEmail($email){
        return self::findOne(['cli_email' => $email]);
    }

    public function getId(){
        return $this->cli_id;
    }

    public function getAuthKey(){
        // return $this->cli_auth_key;
        return null;
    }

    public function validateAuthKey($authKey){
        // return $this->cli_auth_key;
        return null;
    }

    public function validatePassword($passWord){
        return password_verify($passWord, $this->cli_senha);
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
