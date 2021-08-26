<?php

namespace app\models\queries;

/**
 * This is the ActiveQuery class for [[System]].
 *
 * @see System
 */
class SystemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return System[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return System|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
