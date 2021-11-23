<?php

namespace app\models\queries;

/**
 * This is the ActiveQuery class for [[RedesSociaisSystem]].
 *
 * @see RedesSociaisSystem
 */
class RedesSociaisSystemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RedesSociaisSystem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RedesSociaisSystem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
