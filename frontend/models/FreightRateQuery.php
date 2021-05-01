<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FreightRate]].
 *
 * @see FreightRate
 */
class FreightRateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FreightRate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FreightRate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
