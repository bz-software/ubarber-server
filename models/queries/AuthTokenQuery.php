<?php

namespace app\models\queries;

/**
 * This is the ActiveQuery class for [[AuthToken]].
 *
 * @see AuthToken
 */
class AuthTokenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AuthToken[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AuthToken|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
