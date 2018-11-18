<?php

namespace app\components;

use yii\base\Widget;
use app\models\Tags;

class TagsWidget extends Widget{
    public $id_tag;

    public function init()
    {
        parent::init();
    }
    public function run(){
        $tags = Tags::getAll();
        return $this->render('tags', ['tags' => $tags, 'id' => $this->id_tag]);
    }
}