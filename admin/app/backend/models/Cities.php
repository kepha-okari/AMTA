<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property int $CityID
 * @property string $CityName
 * @property int $IsPriority
 * @property int $StateID
 * @property string $StateName
 * @property int $isFavourite
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CityID', 'CityName', 'StateID', 'StateName'], 'required'],
            [['CityID', 'IsPriority', 'StateID', 'isFavourite'], 'integer'],
            [['CityName', 'StateName'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CityID' => 'City ID',
            'CityName' => 'City Name',
            'IsPriority' => 'Is Priority',
            'StateID' => 'State ID',
            'StateName' => 'State Name',
            'isFavourite' => 'Is Favourite',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CitiesQuery(get_called_class());
    }
}
