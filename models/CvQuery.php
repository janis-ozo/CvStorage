<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cv]].
 *
 * @see Cv
 */
class CvQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Cv[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Cv|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
