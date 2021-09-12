<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%address}}".
 *
 * @property int $id
 * @property string|null $country
 * @property string|null $index
 * @property string|null $city
 * @property string|null $street_name
 * @property string|null $street_number
 *
 * @property Cv $id0
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%address}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['country', 'index', 'city', 'street_name', 'street_number'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Cv::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'index' => 'Index',
            'city' => 'City',
            'street_name' => 'Street Name',
            'street_number' => 'Street Number',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery|CvQuery
     */
    public function getId0()
    {
        return $this->hasOne(Cv::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }

    public function getAddressString():string
    {
        return $this->country.", ".$this->city.", ".$this->street_name.", ".$this->street_number.", ".$this->index;
    }

}
