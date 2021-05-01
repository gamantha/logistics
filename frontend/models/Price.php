<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $unit
 * @property int|null $min_qty
 * @property int|null $max_qty
 * @property string|null $type
 * @property string|null $status
 * @property string|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property CompanyPrice[] $companyPrices
 * @property PriceCategoryRelation[] $priceCategoryRelations
 * @property PriceRelation[] $priceRelations
 * @property PriceRelation[] $priceRelations0
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['min_qty', 'max_qty'], 'integer'],
            [['meta'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'unit', 'type', 'status'], 'string', 'max' => 255],
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
            'unit' => Yii::t('app', 'Unit'),
            'min_qty' => Yii::t('app', 'Min Qty'),
            'max_qty' => Yii::t('app', 'Max Qty'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
            'meta' => Yii::t('app', 'Meta'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[CompanyPrices]].
     *
     * @return \yii\db\ActiveQuery|CompanyPriceQuery
     */
    public function getCompanyPrices()
    {
        return $this->hasMany(CompanyPrice::className(), ['priceId' => 'id']);
    }

    /**
     * Gets query for [[PriceCategoryRelations]].
     *
     * @return \yii\db\ActiveQuery|PriceCategoryRelationQuery
     */
    public function getPriceCategoryRelations()
    {
        return $this->hasMany(PriceCategoryRelation::className(), ['priceId' => 'id']);
    }

    /**
     * Gets query for [[PriceRelations]].
     *
     * @return \yii\db\ActiveQuery|PriceRelationQuery
     */
    public function getPriceRelations()
    {
        return $this->hasMany(PriceRelation::className(), ['priceId1' => 'id']);
    }

    /**
     * Gets query for [[PriceRelations0]].
     *
     * @return \yii\db\ActiveQuery|PriceRelationQuery
     */
    public function getPriceRelations0()
    {
        return $this->hasMany(PriceRelation::className(), ['priceId2' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PriceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PriceQuery(get_called_class());
    }
}
