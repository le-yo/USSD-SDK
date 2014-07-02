<?php

class CategoryController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }
    //    /category
    public function indexAction(){
       $modelContent=new Model_Content();
       $categories=$modelContent->getCategories();
//       $data=$categories->toArray();
//       
//       foreach ($data as $item){
//           $category=$item['TE_categories'];
//           $stringExplode=  explode(" ", $item['TE_categories']);
//           if(count($stringExplode)>1){
//               $string= trim(strtolower(implode("-", $stringExplode)));
//               $result=$modelContent->update_category_slug($string,$category);
//           }else{
//               $lower=  trim(strtolower($stringExplode[0]));
//               $result=$modelContent->update_category_slug($lower,$category);
//           }
//       }
      
       
       $this->view->categories=$categories;
    }
    
        //   /category/name
    public function categoryAction() {
        $request = $this->getRequest();
        $slug = $request->GetParam('slug');
        $modelContent = new Model_Content();
        $category_listed = $modelContent->getCategory($slug);
        
        $this->view->category_list=$category_listed;
        
    }

}
