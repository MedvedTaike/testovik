<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property int $id_category
 * @property int $id_author
 * @property string $name
 * @property string $content
 * @property string $image
 * @property string $date_on
 * @property string $date_edit
 * @property string $status
 *
 * @property ArticleTags[] $articleTags
 * @property Users $author
 * @property Category $category
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'id_author'], 'integer'],
            [['id_author', 'name'], 'required'],
            [['content', 'status'], 'string'],
            [['date_on', 'date_edit'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_author' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Id Category',
            'id_author' => 'Id Author',
            'name' => 'Name',
            'content' => 'Content',
            'image' => 'Image',
            'date_on' => 'Date On',
            'date_edit' => 'Date Edit',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTags::className(), ['id_articles' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_author']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }
}
