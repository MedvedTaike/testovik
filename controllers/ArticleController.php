<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Article;

class ArticleController extends Controller
{
    public $layout = 'article';
 
    public function beforeAction($action){
        if($action->id == 'ajax'){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    public function actionIndex()
    { 
        $this->view->title = "Потрясающий Кыргызстан!!!";
        $model = new Article;
        $articles = $model->getAllArticles();
        return $this->render('index', [
            'articles' => $articles
            ]);
    }
    public function actionView($id)
    {  
        $this->layout = 'view';
        $model = new Article;
        $article = $model->getArticle($id);
        $this->view->title = $article['name'];
        return $this->render('article',[
            'article' => $article
            ]);
    }
    public function actionTags($id_tags)
    {
        $model = new Article;
        $model->putParams(['id_tags' => $id_tags]);
        $this->view->title = $model->getTagName($id_tags);
        $articles = $model->getAllArticles();
        return $this->render('index', [
            'articles' => $articles
            ]);
    }
    public function actionCategory($id_category)
    {  
        $model = new Article;
        $this->view->title = $model->getCategoryName($id_category);
        $model->putParams(['id_category' => $id_category]);
        $articles = $model->getAllArticles();
        return $this->render('index', [
            'articles' => $articles
            ]);
    }
    public function actionAjax(){
        $this->layout = false;
        if(Yii::$app->request->isAjax){
            $model = new Article;
            $params = array(
                'from' => $_POST['startFrom'],
                'id_category' => $_POST['id_category'],
                'id_tags' => $_POST['id_tags']
                );
            $model->putParams($params);
            $result = $model->getAllArticles();
            echo json_encode($result);
        }
    }
}
