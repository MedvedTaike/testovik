<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_tags".
 *
 * @property int $id_articles
 * @property int $id_tags
 *
 * @property Articles $articles
 * @property Tags $tags
 */
class ArticleTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_articles', 'id_tags'], 'required'],
            [['id_articles', 'id_tags'], 'integer'],
            [['id_articles'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['id_articles' => 'id']],
            [['id_tags'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['id_tags' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_articles' => 'Id Articles',
            'id_tags' => 'Id Tags',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasOne(Articles::className(), ['id' => 'id_articles']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasOne(Tags::className(), ['id' => 'id_tags']);
    }
}
