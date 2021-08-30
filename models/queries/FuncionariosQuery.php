<?php

namespace app\models\queries;

/**
 * This is the ActiveQuery class for [[Funcionarios]].
 *
 * @see Funcionarios
 */
class FuncionariosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Funcionarios[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Funcionarios|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
