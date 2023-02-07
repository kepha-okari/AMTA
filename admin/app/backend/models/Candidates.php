<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "candidates".
 *
 * @property int $id
 * @property string $name
 * @property int $votes
 * @property int $status
 * @property int $category_id
 * @property string $inserted_at
 */
class Candidates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'candidates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['votes', 'status', 'category_id'], 'integer'],
            [['inserted_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
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
            'votes' => 'Votes',
            'status' => 'Status',
            'category_id' => 'Category ID',
            'inserted_at' => 'Inserted At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CandidatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CandidatesQuery(get_called_class());
    }
}
