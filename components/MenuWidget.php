<?php

namespace app\components;

use yii\base\Widget;
use app\models\Category;

class MenuWidget extends Widget{
    public $id_category;

    public function init()
    {
        parent::init();
    }
    public function run(){
        $category = Category::getAll();
        return $this->render('menu', ['categories' => $category , 'id' => $this->id_category ]);
    }
}