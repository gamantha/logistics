<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "file_freight_rate".
 *
 * @property int $id
 * @property int|null $freightRateId
 * @property string|null $type
 * @property string|null $name
 * @property string|null $path
 * @property int|null $uploaderUserId
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property FreightRate $freightRate
 * @property User $uploaderUser
 */
class FileFreightRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_freight_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['freightRateId', 'uploaderUserId'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['type', 'name', 'path'], 'string', 'max' => 255],
            [['freightRateId'], 'exist', 'skipOnError' => true, 'targetClass' => FreightRate::className(), 'targetAttribute' => ['freightRateId' => 'id']],
            [['uploaderUserId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['uploaderUserId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'freightRateId' => Yii::t('app', 'Freight Rate ID'),
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'path' => Yii::t('app', 'Path'),
            'uploaderUserId' => Yii::t('app', 'Uploader User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[FreightRate]].
     *
     * @return \yii\db\ActiveQuery|FreightRateQuery
     */
    public function getFreightRate()
    {
        return $this->hasOne(FreightRate::className(), ['id' => 'freightRateId']);
    }

    /**
     * Gets query for [[UploaderUser]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUploaderUser()
    {
        return $this->hasOne(User::className(), ['id' => 'uploaderUserId']);
    }

    /**
     * {@inheritdoc}
     * @return FileFreightRateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileFreightRateQuery(get_called_class());
    }
}
