<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "votes".
 *
 * @property int $id
 * @property string $msisdn
 * @property string $shortcode
 * @property int $candidate_id
 * @property string $inserted_at
 */
class Votes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'votes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['candidate_id'], 'integer'],
            [['inserted_at'], 'safe'],
            [['msisdn'], 'string', 'max' => 20],
            [['shortcode'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'msisdn' => 'Msisdn',
            'shortcode' => 'Shortcode',
            'candidate_id' => 'Candidate ID',
            'inserted_at' => 'Inserted At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return VotesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VotesQuery(get_called_class());
    }
}
