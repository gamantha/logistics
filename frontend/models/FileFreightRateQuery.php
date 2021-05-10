<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FileFreightRate]].
 *
 * @see FileFreightRate
 */
class FileFreightRateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FileFreightRate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FileFreightRate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
