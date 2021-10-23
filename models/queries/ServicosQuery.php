<?php

namespace app\models\queries;

/**
 * This is the ActiveQuery class for [[Servicos]].
 *
 * @see Servicos
 */
class ServicosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Servicos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Servicos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
