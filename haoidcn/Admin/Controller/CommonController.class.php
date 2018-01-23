<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller {
	
	public function _initialize() {

		header("Content-type: text/html; charset=utf-8");
		
		Session_start();
		$userid = strtolower(I("session.userid"));
		$pass = I("session.pass");
		 
		//是否已登录
		if(empty($userid) && empty($pass)){
			 
			$this->redirect('Index/index');
			exit;
			 
		}
		 
		//是否已完善资料
		if(I("session.zl_status") == "-1" and I("session.limtis") == "3"){
		
			$this->redirect('Index/editprofile');
			exit;
		}
		
		$User = D("User");
		$user_arr = $User->where("userid='$userid'")->find();

		//权限
		$limits = $user_arr['limits'];
		$this->assign("limits",$limits);
		
		//是否已经完善资料
		if($user_arr['zl_status'] == "-1" and $user_arr['limits'] == "3"){
				
			$this->redirect('Index/editprofile');
				
			exit;
		}
		
	}
	
	
	
}