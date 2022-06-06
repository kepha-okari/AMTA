<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Candidates]].
 *
 * @see Candidates
 */
class CandidatesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Candidates[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Candidates|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
