<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "redes_sociais_system".
 *
 * @property int $rss_id
 * @property int $rss_res_id
 * @property string $rss_url
 * @property int $rss_sys_id
 */
class RedesSociaisSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'redes_sociais_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rss_res_id', 'rss_url', 'rss_sys_id'], 'required', 'message' => "Campo obrigatório"],
            [['rss_res_id', 'rss_sys_id'], 'integer'],
            [['rss_url'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rss_id' => 'Rss ID',
            'rss_res_id' => 'Rss Res ID',
            'rss_url' => 'Rss Url',
            'rss_sys_id' => 'Rss Sys ID',
        ];
    }

    public static function getIdFromArray($dados){
        $ids = [];
        foreach($dados as $dado){
            array_push($ids, $dado['rss_res_id']);
        }

        return implode(',', $ids);
    }

    public static function buscarPorSistema($idSistema){
        return self::find()
        ->innerJoinWith('redes_sociais', 'res_id = rss_res_id')
        ->where(['rss_sys_id' => $idSistema])->all();

        // adicionar a relação para buscar o nome da rede social pelas redes sociais do sistema
    }

    /**
     * {@inheritdoc}
     * @return queries\RedesSociaisSystemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new queries\RedesSociaisSystemQuery(get_called_class());
    }
}
