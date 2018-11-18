<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Article extends ActiveRecord{
    public static $params = [
        'id_category' => 0,
        'id_tags' => 0,
        'from' => 0
        ];
    public static $pages = 3;
    
    public static function tableName(){
        return 'articles';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }
    public function getAll(){
        $result = [];
        if(self::$params['id_category'] != 0){
            $id = self::$params['id_category'];
            $result = Article::find()->where(['id_category' => $id, 'status' => '1'])->offset(self::$params['from'])->limit(self::$pages)->all();
        } elseif(self::$params['id_tags'] != 0){
            $id = self::$params['id_tags'];
            $tag = Tags::findOne($id);
            $result = $tag->getArticles()->offset(self::$params['from'])->limit(self::$pages)->all();
        } else {
            $result = Article::find()->offset(self::$params['from'])->limit(self::$pages)->all(); 
        }
        return $result;
        
    }
    public function getAllArticles(){
        $articles = $this->getAll();
        $result = [];
        $i = 0;
        foreach($articles as $article)
        {
            $result[$i]['id'] = $article['id'];
            $result[$i]['name'] = $article['name'];
            $result[$i]['content'] = $this->getPrintContent($article['content']);
            $result[$i]['author'] = $article->user->name;
            $result[$i]['tags'] = $article->getTags()->select('id , name')->asArray()->all();
            $result[$i]['image'] = $this->getImage($article['image']);
            $result[$i]['date_on'] = $article['date_on'];
            $result[$i]['edit'] = $article['date_edit'];
            $i++;
        }
        return $result;

    }
    public function getPrintContent($content){
        if(!empty($content)){
            $result = substr($content, 0, 800);
            $final = $result . '....';
            return $final;
        } 
        return null;
    }
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['id' => 'id_tags'])->viaTable('article_tags', ['id_articles' => 'id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_author']);
    }
    public function getImage($image)
    {
        return ($image) ? '/web/images/' . $image : '/web/images/no-image.png';
    }
    public function putParams($data)
    {
        if(is_array($data)){
            foreach($data as $key => $value){
                self::$params[$key] = $value;
            }
        }
    }
    public function getCategoryName($id_category)
    {
        $model = Category::findOne($id_category);
        return $model->name;
    }
    public function getTagName($id)
    {
        $model = Tags::findOne($id);
        return 'Статьи на тег '.$model->name;
    }
    public function getArticle($id)
    {
        $article = Article::findOne($id);
        $result = [];
        $result['id'] = $article['id'];
        $result['name'] = $article['name'];
        $result['content'] = $article['content'];
        $result['author'] = $article->user->name;
        $result['tags'] = $article->getTags()->select('id , name')->asArray()->all();
        $result['image'] = $this->getImage($article['image']);
        $result['date_on'] = $article['date_on'];
        $result['edit'] = $article['date_edit'];
        return $result;
    }
}