<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class AdminUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id' => Yii::t('backend', 'ID'),
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }


    public function getAuthKey()
    {
       return $this->authKey;
    }



    public function getId()
    {
       return $this->id;
    }



    public function validateAuthKey($authKey)
    {
       $this->authKey === $authKey;
    }


  
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
       throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username)
    {
       return self::findOne(['username'=>$username]);
    }


    /**
     * {@inheritdoc}
     * @return AdminUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdminUserQuery(get_called_class());
    }
}
