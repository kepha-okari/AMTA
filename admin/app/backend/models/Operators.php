<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "operators".
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property string $updated_at
 */
class Operators extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operators';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['active'], 'integer'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 250],
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
            'active' => 'Active',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OperatorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperatorsQuery(get_called_class());
    }
}
