<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria_system".
 *
 * @property int $cat_id
 * @property string $cat_descricao
 * @property string $cat_slug
 */
class CategoriaSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_descricao', 'cat_slug'], 'required'],
            [['cat_descricao', 'cat_slug'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_descricao' => 'Cat Descricao',
            'cat_slug' => 'Cat Slug',
        ];
    }

    public static function getAll(){
        return self::find()->where(['!=','cat_slug','outros'])->asArray()->all();
    }

    /**
     * {@inheritdoc}
     * @return queries\CategoriaSystemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new queries\CategoriaSystemQuery(get_called_class());
    }
}
