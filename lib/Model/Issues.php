<?php
class Model_Issues extends Model_Table {
	public $table="issues";
	function init(){
		parent::init();

		$this->addField('Title')->mandatory('Introduceti titlul problemei');
		$this->addField('Priority')->mandatory('Care este prioritatea?');
		$this->addField('TargetDate')->type('date');
		$this->addField('is_fixed')->type('boolean')->hidden('true');
		//$this->addField('sprint_id')->editable(false);

		//$this->hasOne('User',null,'first_name');

		$this->hasOne('Proiect',null,'nume');

        //$this->addExpression('id')->set(function($m,$q){
        //    return $m->refSQL('Proiect')->count();
        //});
	}
	
	function Fixit(){
		$this['is_fixed']=true;
		$this->saveAndUnload();
    }
}