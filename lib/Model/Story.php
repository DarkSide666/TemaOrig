<?php
class Model_Story extends Model_Table {
	public $table="story";
	function init(){
		parent::init();

		$this->addField('Nume')->mandatory('Introduceti numele elementului de tip story');
		$this->addField('Prioritate')->mandatory('Care este prioritatea?');
		$this->addField('Estimare')->mandatory('Cate zile lucratoare estimati?');
		$this->addField('MetodaValidare')->mandatory('Metoda de validare folosita');
		$this->addField('Note');
		//$this->addField('sprint_id')->editable(false);

		//$this->hasOne('User',null,'first_name');

		//$this->hasOne('Proiect','id');

        //$this->addExpression('id')->set(function($m,$q){
        //    return $m->refSQL('Proiect')->count();
        //});


        // simple implementation of log
        $this->addHook('afterInsert',function($m){

            $x=$m->add('Model_Log');
            $m['action']='new_story';
            $m['user_id']=$m->api->auth->model->id;
            $m['info']='blah blah';
            $m->save();

        });

	}

		function action_Muta_In_Sprint1(){
            /*
             * DEMO: how to assign story with sprint
            $this['sprint_id']=123;
            $this->save()
             */
		}
		function action_Muta_In_Sprint2(){}
		function action_Muta_In_Sprint3(){}

}
