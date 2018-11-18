<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
    public static function getAll()
    {
        return Category::find()->where(['status' => '1'])->all();
    }
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['id_category' => 'id']);
    }
    public function getArticlesCount()
    {
        return $this->getArticles()->count();
    }
}
