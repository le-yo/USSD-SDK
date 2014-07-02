<?php

class ArticleController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }
    public function weeksAction(){
        
    }

    public function weekAction() {
         $request = $this->getRequest();
         $id = $request->GetParam('id');
         $modelContent = new Model_Content();
         $weekContent = $modelContent->getWeek($id);
         $this->view->week=$id;
         $this->view->weekContent = $weekContent;
    }
    public function dayAction(){
         $request = $this->getRequest();
         $day = $request->GetParam('day');
         $modelContent = new Model_Content();
         $articles = $modelContent->getArticlesByDay($day);
         $this->view->articles=$articles;
         $this->view->day=$day;
        
    }

    public function articleAction() {
         $request = $this->getRequest();
         $id = $request->GetParam('id');
         $modelContent = new Model_Content();
         $article = $modelContent->getArticleById($id);
      
         $this->view->article = $article;
    }

}
