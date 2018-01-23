<?php
namespace Admin\Controller;

use Think\Controller;

class ConsoleController extends CommonController {
	
	//控制台
 	public function dashboard(){
		$set = array(
			'active' => 'class="active"',
			'limits' => I('session.limits'),
		); 
		$this->assign("set",$set);
    	$this->display();
 	}
}