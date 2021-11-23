<?php

namespace app\models\queries;

/**
 * This is the ActiveQuery class for [[RedesSociais]].
 *
 * @see RedesSociais
 */
class RedesSociaisQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RedesSociais[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RedesSociais|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
