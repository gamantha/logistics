<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "freight_rate".
 *
 * @property int $id
 * @property string|null $route_from
 * @property string|null $route_to
 * @property int|null $shippingId
 * @property string|null $mode_of_transport
 * @property string|null $currency
 * @property int|null $rate
 * @property string|null $unit
 * @property string|null $type
 * @property string|null $valid_from
 * @property string|null $valid_to
 * @property string|null $notes
 * @property string|null $status active,expired,inactive
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property FileFreightRate[] $fileFreightRates
 * @property Shipping $shipping
 */
class FreightRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'freight_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shippingId', 'rate'], 'integer'],
            [['valid_from', 'valid_to', 'created_at', 'updated_at'], 'safe'],
            [['notes'], 'string'],
            [['route_from', 'route_to', 'mode_of_transport', 'currency', 'unit', 'type', 'status'], 'string', 'max' => 255],
            [['shippingId'], 'exist', 'skipOnError' => true, 'targetClass' => Shipping::className(), 'targetAttribute' => ['shippingId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'route_from' => Yii::t('app', 'Route From'),
            'route_to' => Yii::t('app', 'Route To'),
            'shippingId' => Yii::t('app', 'Shipping ID'),
            'mode_of_transport' => Yii::t('app', 'Mode Of Transport'),
            'currency' => Yii::t('app', 'Currency'),
            'rate' => Yii::t('app', 'Rate'),
            'unit' => Yii::t('app', 'Unit'),
            'type' => Yii::t('app', 'Type'),
            'valid_from' => Yii::t('app', 'Valid From'),
            'valid_to' => Yii::t('app', 'Valid To'),
            'notes' => Yii::t('app', 'Notes'),
            'status' => Yii::t('app', 'active,expired,inactive'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[FileFreightRates]].
     *
     * @return \yii\db\ActiveQuery|FileFreightRateQuery
     */
    public function getFileFreightRates()
    {
        return $this->hasMany(FileFreightRate::className(), ['freightRateId' => 'id']);
    }

    /**
     * Gets query for [[Shipping]].
     *
     * @return \yii\db\ActiveQuery|ShippingQuery
     */
    public function getShipping()
    {
        return $this->hasOne(Shipping::className(), ['id' => 'shippingId']);
    }

    /**
     * {@inheritdoc}
     * @return FreightRateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FreightRateQuery(get_called_class());
    }
}
