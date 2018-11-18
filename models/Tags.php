<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

class Tags extends ActiveRecord
{

    public static function tableName()
    {
        return 'tags';
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
        return Tags::find()->where(['status' => '1'])->all();
    }
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['id' => 'id_articles'])->viaTable('article_tags', ['id_tags' => 'id']);
    }
}
