<?php

namespace app\models;

use Yii;
use yii\captcha\CaptchaValidator;

/**
 * This is the model class for table "{{%workplace}}".
 *
 * @property int $id
 * @property int $cv_id
 * @property string|null $workplace_name
 * @property string|null $position
 * @property string|null $types_of_work_schedules
 * @property string|null $work_experience
 * @property string|null $created_at
 *
 * @property Cv $cv
 */
class Workplace extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%workplace}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cv_id'], 'required'],
            [['cv_id'], 'integer'],
            [['created_at'], 'safe'],
            [['workplace_name', 'position', 'types_of_work_schedules', 'work_experience'], 'string', 'max' => 255],
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
            'workplace_name' => 'Workplace Name',
            'position' => 'Position',
            'types_of_work_schedules' => 'Types Of Work Schedules',
            'work_experience' => 'Work Experience',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Cv]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCv()
    {
        return $this->hasOne(Cv::className(), ['id' => 'cv_id']);
    }

    /**
     * {@inheritdoc}
     * @return WorkplaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkplaceQuery(static::class);
    }
}
