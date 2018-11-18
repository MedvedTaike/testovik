<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Test;

class TestController extends Controller{
    public $layout = 'test';
    
    public function actionIndex(){
        $model = new Test;
        $this->view->title = 'Решение теста на разработчика !';
        if ($model->load(Yii::$app->request->post())) {
            $result = $model->getTable();
            return $this->render('result', ['result' => $result]);
        } else {
            return $this->render('test', ['model' => $model]);
        }
        
    }
    public function actionResult(){
        $result = '';
        $this->view->title = 'Решение задачи !';
        if(Yii::$app->request->isPost){
            $result = 'Vse ok';
        }
        return $this->render('result', ['result' => $result]);
    }
}