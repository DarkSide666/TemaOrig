<?php
class page_progress extends Page {
    function init(){
        parent::init();
        $page=$this;
		
        $this->add('View_Info')->set('Mister '.$this->api->auth->model['first_name'].' this is your current work so far:');
		//$id=
       $c=$this->add('Grid');
	   $c->setModel('Log')
	    ->addCondition('user_id',$this->api->auth->model['id']);
    }
}
