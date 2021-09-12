<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cv}}".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $phone
 * @property string $email
 * @property string|null $created_at
 *
 * @property Address $address
 * @property Education[] $educations
 * @property Skils[] $skils
 * @property Workplace[] $workplaces
 */
class Cv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cv}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'phone', 'email'], 'required'],
            [['email'] ,'email'],
            [['phone'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'surname', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery|AddressQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Educations]].
     *
     * @return \yii\db\ActiveQuery|EducationQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['cv_id' => 'id']);
    }

    /**
     * Gets query for [[Skils]].
     *
     * @return \yii\db\ActiveQuery|SkilsQuery
     */
    public function getSkils()
    {
        return $this->hasMany(Skils::className(), ['cv_id' => 'id']);
    }

    /**
     * Gets query for [[Workplaces]].
     *
     * @return \yii\db\ActiveQuery|WorkplaceQuery
     */
    public function getWorkplaces()
    {
        return $this->hasMany(Workplace::className(), ['cv_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CvQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CvQuery(get_called_class());
    }
}
