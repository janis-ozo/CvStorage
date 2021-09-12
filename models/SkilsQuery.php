<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CvSkils]].
 *
 * @see Skils
 */
class SkilsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Skils[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Skils|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
