<?php

namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord 
{
    public static function tableName(){
        return 'users';
    }
    
   public function getArticles()
    {
        return $this->hasMany(User::className(), ['id_user' => 'id']);
    }

    // public static function findIdentity($id)
    // {
    //     return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    // }

    // public static function findIdentityByAccessToken($token, $type = null)
    // {
    //     foreach (self::$users as $user) {
    //         if ($user['accessToken'] === $token) {
    //             return new static($user);
    //         }
    //     }

    //     return null;
    // }

    // public static function findByUsername($username)
    // {
    //     foreach (self::$users as $user) {
    //         if (strcasecmp($user['username'], $username) === 0) {
    //             return new static($user);
    //         }
    //     }

    //     return null;
    // }
    // public function getId()
    // {
    //     return $this->id;
    // }
    // public function getAuthKey()
    // {
    //     return $this->authKey;
    // }
    // public function validateAuthKey($authKey)
    // {
    //     return $this->authKey === $authKey;
    // }
    // public function validatePassword($password)
    // {
    //     return $this->password === $password;
    // }
}
