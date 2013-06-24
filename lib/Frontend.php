<?php
class Frontend extends ApiFrontend {
    function init(){
        parent::init();
        $this->dbConnect();
        $this->requires('atk','4.2.0');
        $this->add('jUI');

        $this->pathfinder->addLocation('/',array(
            'addons'=>array('my-addons','ambient-addons','atk4-addons'),
			'js'=>array(
						 'templates/js',
						 'misc/templates/js'
            ),
			'template'=> array(
                'tree/templates/default'
            )))
           ->setParent($this->pathfinder->base_location)
           ->setRelativePath('/');  
		   
		   $this->pathfinder->addLocation('.',array('addons'=>'ds-addons'));    
		
		$this->add("cms/Controller_Cms");
        $this->add('Auth')
        ->setModel('User');
        $this->auth->allowPage(array('index'));  

		if($this->auth->isLoggedIn()){

		$menu = $this->add('menu/Menu_Dropdown',null,'Menu');
        $menu
		->setType('horizontal')
		->setPosition('left')
		->addMenuItem('index','Welcome');


        $menu
		->addMenuItem('proiect','Project Planning')
		->sub()
				->addMenuItem('proiect','Current Project')
				->addMenuItem('story','Story')
				->addMenuItem('issues','Issues')	
		->end()




        ->addMenuItem('test2','Sprint Planning')
        ->sub()
			->addMenuItem('test2','Sprint Backlog')
			->addMenuItem('subnotes','Manage Notes')
			->addMenuItem('test','Sprint Schedule')
			->addMenuItem('mypage','Sprint Tracking')	
        ->end()
		->addMenuItem('user','Current User')
		->sub()
			->addMenuItem('vizUseri','Team Members')
			->addMenuItem('user','Preferences')
			->addMenuItem('progress','Work in Progress')
		->end();

        $menu
		->addMenuItem('log','Log')
        ->addMenuItem('logout','Logout');
		
		// DEMO - how you can add menu only if admin
        //if($this->auth->model['is_admin']){
		      //  }
        // DEMO: Secondary Menu
		$menu = $this->add('Menu',null,'Menu2');

        $menu->addMenuItem('test');
        //$fm = $menu->addSubMenu('Submenu >');
        $menu->addMenuItem('test2');
        $menu->addMenuItem('test3');
        $menu->addMenuItem('test4');
            












		}else{
		$menu=$this->add('Menu',null,'Menu')
            ->addMenuItem('index','Welcome')
            ->addMenuItem('login');
		}
			
			
        $this->auth->check();
    } 
}
