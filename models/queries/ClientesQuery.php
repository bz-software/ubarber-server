<?php

namespace app\models\queries;

/**
 * This is the ActiveQuery class for [[Clientes]].
 *
 * @see Clientes
 */
class ClientesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Clientes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Clientes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
