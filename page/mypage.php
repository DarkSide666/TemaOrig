<?php
class page_mypage extends Page {

    function init(){
	parent::init();
	$p=$this;

		$this->js(true)->_load("highcharts/js/highcharts");
		
		$this->js(true)->_load("ui.highcharts");
		
		 $this->add("View_HtmlElement")->setElement("div")
       ->js(true)
       ->univ()
       ->highchart(array(
       'chart'=>array('width'=>480,'height'=>300),
       'title'=>array('text'=>'Why Will Love You Agile Toolkit?'),
       'series'=>array(array('type'=>'pie',
		  'name'=>'First chart',
          'data'=>array(
            array('Simple to Learn',40),
            array('Looks Awesome',30),
            array('Enterprise Features',55)
            )
            ))));

		$this->add("View_HtmlElement")->setElement("div")
       ->js(true)
       ->univ()
       ->highchart(array(
       'chart'=>array('type'=>'line'),
       'title'=>array('text'=>'Monthly Average Temperature'),
	   'subtitle'=>array('text'=>'Source: WorldClimate.com'),
	   'xAxis'=>array('categories'=>array(
			array('Jan'),
			array('Feb'),
			array('Mar'),
			array('Apr'),
			array('May'),
			array('Jun'),
			array('Jul'),
			array('Aug'),
			array('Sep'),
			array('Oct'),
			array('Nov'),
			array('Dec'))),
		'yAxis'=>array('title'=>array(
			'text'=>'Temperature (°C)')),
		'tooltip'=>array(array(
			'enabled'=>'false'),
			'formatter'=>array(
                // DEMO: next line will put "myfunc" inside javascript without
                // any modifications
                $this->js(null,'myfunc')


                //$this->js(null,'function(){ return .... } ')
                // ^^

			//'function()'=>'return '<b>'+ this.series.name +'</b><br/>'+
              //          this.x +': '+ this.y +'°C';')
			),
		'plotOptions'=>array('line'=>array(
			'dataLabels'=>array('enabled'=>'true'),
			'enableMouseTracking'=>'false')),	
       'series'=>array(array(
			'name'=>'Tokyo',
			'data'=>array(
            array('7.0'),
            array('6.9'),
            array('9.5'),
			array('14.5'),
			array('18.4'),
			array('21.5'),
			array('25.2'),
			array('26.5'),
			array('23.3'),
			array('18.3'),
			array('13.9'),
			array('9.6')
            )),
					array(
			'name'=>'London',
			'data'=>array(
            array('3.9'),
            array('4.2'),
            array('5.7'),
			array('8.5'),
			array('11.9'),
			array('15.2'),
			array('17.0'),
			array('16.6'),
			array('14.2'),
			array('10.3'),
			array('6.6'),
			array('4.8')
            ))
			))))->debug();
   }
   
   
}
