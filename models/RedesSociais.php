<?php

namespace app\models;

use Yii;
use app\models\RedesSociaisSystem;

/**
 * This is the model class for table "redes_sociais".
 *
 * @property int $res_id
 * @property string $res_descricao
 * @property string $res_slug_descricao
 */
class RedesSociais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'redes_sociais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['res_descricao', 'res_slug_descricao'], 'required'],
            [['res_descricao', 'res_slug_descricao'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'res_id' => 'Res ID',
            'res_descricao' => 'Res Descricao',
            'res_slug_descricao' => 'Res Slug Descricao',
        ];
    }

    public static function buscarDisponivel($idSistema){
        return self::find()->where(['NOT IN', 'res_id', RedesSociaisSystem::find()->where(['rss_sys_id' => $idSistema])->asArray()->all()])->all();
    }

    /**
     * {@inheritdoc}
     * @return queries\RedesSociaisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new queries\RedesSociaisQuery(get_called_class());
    }
}
