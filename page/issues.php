<?php

class page_issues extends Page{
	function init(){
		parent::init();

		$page=$this;
		$page->add('H3')->set('List of Unresolved Issues');
		
		if($this->api->auth->model['is_scrum'])		//if user= Scrum Master, he can modify these records or even state that they're fixed
		{
			$g = $page->add('gridext/CRUD_Extended');
			$g->setModel('Issues')
			  ->addCondition('is_fixed','0');
			if($g->grid) {
				$g->grid->addPaginator(4);
				$g->grid->addQuickSearch(array('Title'));
				$g->grid->addColumn('button','fixed','Fix it');
				$g->grid->getColumn('Priority')->makeSortable();
				if($_GET['fixed'])
				{
					$g->model->loadData($_GET['fixed']);
					
					$g->model->Fixit();

					$g->js(null,$g->grid->js()->reload())
					->univ()->alert('Success')->execute();
				}
			}
		}
		else
		{
			$g = $page->add('Grid');
			$g->setModel('Issues')
			  ->addCondition('is_fixed','0');
			$g->addPaginator(4);
			$g->addQuickSearch(array('Title'));
			$g->getColumn('Priority')->makeSortable();
			
		}
		
		$page->add('H3')->set('List of Fixed Issues');
		$g = $page->add('Grid');
		$g->setModel('Issues')
		  ->addCondition('is_fixed','1');
		$g->addPaginator(4);
		$g->addQuickSearch(array('Title'));
	}
}