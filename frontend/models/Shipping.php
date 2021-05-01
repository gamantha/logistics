<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shipping".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property FreightRate[] $freightRates
 */
class Shipping extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shipping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[FreightRates]].
     *
     * @return \yii\db\ActiveQuery|FreightRateQuery
     */
    public function getFreightRates()
    {
        return $this->hasMany(FreightRate::className(), ['shippingId' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ShippingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShippingQuery(get_called_class());
    }
}
