<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $id
 * @property string $branch
 * @property string $contact
 * @property string $county
 * @property string $sub_county
 * @property string $saved_at
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['saved_at'], 'safe'],
            [['branch', 'contact', 'county', 'sub_county'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'branch' => 'Branch',
            'contact' => 'Contact',
            'county' => 'County',
            'sub_county' => 'Sub County',
            'saved_at' => 'Saved At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BranchesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BranchesQuery(get_called_class());
    }
}
