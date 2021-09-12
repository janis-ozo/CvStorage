<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%education}}".
 *
 * @property int $id
 * @property int $cv_id
 * @property string|null $educational_institution
 * @property string|null $faculty
 * @property string|null $field_of_study
 * @property string|null $education_level
 * @property string|null $status
 *
 * @property Cv $cv
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%education}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cv_id'], 'required'],
            [['cv_id'], 'integer'],
            [['educational_institution', 'faculty', 'field_of_study', 'education_level', 'status'], 'string', 'max' => 255],
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
            'educational_institution' => 'Educational Institution',
            'faculty' => 'Faculty',
            'field_of_study' => 'Field Of Study',
            'education_level' => 'Education Level',
            'status' => 'Status',
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
     * @return EducationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EducationQuery(get_called_class());
    }
}
