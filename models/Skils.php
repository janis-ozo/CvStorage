<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%skils}}".
 *
 * @property int $id
 * @property int $cv_id
 * @property string|null $description
 * @property string $type
 *
 * @property Cv $cv
 */
class Skils extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%skils}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cv_id', 'type'], 'required'],
            [['cv_id'], 'integer'],
            [['description'], 'string'],
            [['type'], 'string', 'max' => 255],
            [['cv_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cv::className(), 'targetAttribute' => ['cv_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cv_id' => 'Cv ID',
            'description' => 'Description',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Cv]].
     *
     * @return \yii\db\ActiveQuery|CvQuery
     */
    public function getCv()
    {
        return $this->hasOne(Cv::className(), ['id' => 'cv_id']);
    }

    /**
     * {@inheritdoc}
     * @return SkilsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SkilsQuery(get_called_class());
    }
}
