<?php
class Model_Log extends Model_Table {
	public $table="log";
	function init(){
		parent::init();

		$this->addField('action')->mandatory('Introduceti numele elementului de tip story');
		$this->addField('user_id')->mandatory('Care este prioritatea?');
		$this->addField('info')->mandatory('Cate zile lucratoare estimati?');
		
		//$this->hasOne('User',null,'first_name');
		//$this->hasOne('User');



	}
}
