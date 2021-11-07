<?php

namespace app\models\queries;

/**
 * This is the ActiveQuery class for [[CategoriaSystem]].
 *
 * @see CategoriaSystem
 */
class CategoriaSystemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CategoriaSystem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CategoriaSystem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
