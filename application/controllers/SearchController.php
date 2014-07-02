<?php

class SearchController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        
    }
    public function searchAction(){
         $request = $this->getRequest();
        $term = $request->GetParam('search_term');
        
        if ($term || $this->_request->isPost()) {
            $keywords = $this->_request->getParam('search_term');
            $query = Zend_Search_Lucene_Search_QueryParser::parse($keywords);
            $index = Zend_Search_Lucene::open(APPLICATION_PATH . '/indexes');
            $hits = $index->find($query);
            $this->view->results = $hits;
            $this->view->keywords = $keywords;
        } else {
            $this->view->results = null;
        }
    }

    public function buildAction() {
        // create the index
        
        $index = Zend_Search_Lucene::create(APPLICATION_PATH . '/indexes');
        
        $modelCas = new Model_Content();
        $currentCas = $modelCas->fetchCasualties();
        if ($currentCas->count() > 0) {
            // create a new search document for each page
            foreach ($currentCas as $cas) {
                $doc = new Zend_Search_Lucene_Document();
                // you use an unindexed field for the id because you want the id
                // to be included in the search results but not searchable
                $doc->addField(Zend_Search_Lucene_Field::unIndexed('TE_content_id', $cas->TE_content_id));
                // you use text fields here because you want the content to be searchable
                // and to be returned in search results
                $doc->addField(Zend_Search_Lucene_Field::text('TE_template_id', $cas->TE_template_id));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_day', $cas->TE_day));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_week', $cas->TE_week));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_Content_type', $cas->TE_Content_type));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_title_en', $cas->TE_title_en));
                $doc->addField(Zend_Search_Lucene_Field::text('Title_Description_en', $cas->Title_Description_en));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_option_en', $cas->TE_option_en));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_explanation', $cas->TE_explanation));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_categories', $cas->TE_categories));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_category_slug', $cas->TE_category_slug));
                $doc->addField(Zend_Search_Lucene_Field::text('TE_adkeyword', $cas->TE_adkeyword));
                // add the document to the index
                $index->addDocument($doc);
            }
        }
        // optimize the index
        $index->optimize();
        // pass the view data for reporting
        $this->view->indexSize = $index->numDocs();
    }

}
