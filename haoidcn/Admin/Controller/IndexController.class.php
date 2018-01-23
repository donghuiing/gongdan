<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
		
    	timer();	//定时执行任务
    	
    	Session_start();
    	
    	$login = I('post.login');
    	
		if($login){
//			var_dump(THINK_VERSION);exit;
			$userid = strtolower(I("post.username"));
			$pass = md5(I('post.password'));
			$User = D("User"); // 实例化User对象
			$user_arr = $User->where("(userid='$userid' or email='$userid' or phone='$userid') AND pwd='$pass'")->find();
    		$ok = empty($user_arr) ? "-1" : "1";
    		
    		if($ok == "1"){
				// 登陆成功
    			$_SESSION['userid'] = $user_arr['userid'];
    			$_SESSION['pass'] = $pass;
    			$_SESSION['uid'] = $user_arr['id'];
    			$_SESSION['email'] = $user_arr['email'];
    			$_SESSION['limits'] = $user_arr['limits'];
    			$this->redirect('Console/dashboard');
    			exit;
    			
    		}else{

    			$this->redirect('index','ok=-1');
    			
    			exit;
    		}
    		
		}
		
		$userid = strtolower(I("session.userid"));
		$pass = I("session.pass");
		 
		if(!empty($userid) && !empty($pass)){
			 
			$this->redirect('Console/dashboard');
			exit;
			 
		}
		
		$ok = I('get.ok');
		$this->assign('ok',$ok);
		
    	$this->display();
    	
    }
    
    //退出登录
    public function exit_t(){

    	Session_start();
    	session_destroy() ;
    	$this->redirect('index');
    	
    }
    
   
    
    //修改资料
    public function editprofile(){

    	header("Content-type: text/html; charset=utf-8");
    	
    	
    	Session_start();
		$userid = strtolower(I("session.userid"));
		$pass = I("session.pass");
		
		$_SESSION['send_code'] = rand(1000,9999);	//手机4位随即数
		$_SESSION['email_code'] = rand(1000,9999);	//邮箱4位随即数
		
		
    	if(empty($userid) && empty($pass)){
    			
    		$this->redirect('index');
    		exit;
    			
    	}
    	
    	$User = D("User");
		$user_arr = $User->where("userid='$userid'")->find();
		
		//权限
		$limits = $user_arr['limits'];
		$this->assign("limits",$limits);
    	
    	//修改密码
    	if(IS_AJAX){
    		//修改密码
    		if(I("get.sel") == "sel_p"){
    			if(md5(I("get.pwd")) == $user_arr['pwd']){
    				$data = array(
    						'pwd'	=>	md5(I("get.pwd01"))
    				);
    				$id = I("get.id");
    				$re = D("user")->where("id='$id'")->save($data);
    				if($re){
    					$se = 1;
    				}
    			}else{
    				$se = 2;
    			}
    			$this->ajaxReturn($se);
    		}
    			
    		exit;
    	}

    	// 显示数据
    	$this->assign('user_arr',$user_arr);
    	 
    	//更新个人信息
		if(I("post.f_submit")){
			
			//验证
			$phone_y = I("post.phone_y");
			$email_y = I("post.email_y");
			if(!empty($phone_y) || !empty($email_y)){
				
				if($phone_y){
					if($phone_y != I("session.mobile_code")){
						echo "<script>alert('手机号验证码输入不正确'); history.go(-1);</script>";
						exit;
					}
				}
				
				if($email_y){
					if($email_y != I("session.email_code01")){
						echo "<script>alert('邮箱验证码输入不正确'); history.go(-1);</script>";
						exit;
					}
				}
			}
			$_SESSION['zl_status'] = 1 ;	//已完善资料
				
			$id = I("post.id");
			$data = array(
					'userid' => strtolower(I("post.userid")),
					'uname' => I("post.uname"),
					'qq' => I("post.qq"),
					'email' => strtolower(I("post.email")),
					'phone' => I("post.phone"),
					'url' => I("post.url"),
					'zl_status' => '1',
			);
				
			$result = D('User')->where("id=$id")->save($data);
			$_SESSION['email'] = $result['email'];
			
			//同时更新售后人员表
			if($limits == 2){
			
				$data01 = array(
						'uname' => I("post.uname"),
						'email' => strtolower(I("post.email")),
						'phone' => I("post.phone"),
				);
				D("service")->where("id='$id'")->save($data01);
			}
				
			
			if($result){
				echo "<script>alert('信息修改成功');  location.href='editprofile.html';</script>";
				exit;
			}else{
				echo "<script>alert('您并没有作任何修改');  history.go(-1);</script>";
				exit;
			} 
    		
		}
		
		

		$data = array(
			'succeed' => I('get.succeed'),
		);
		
		$this->assign('data',$data);
		
		
    	$this->display();
    }
   
    
    //电话验证，跟邮箱验证
    public function sms(){
    	
    	//手机号验证
    	if(I('post.type') == "phone"){
    		$phone = trim($_POST['phone']);

    		$send_code = $_POST['send_code'];
    		 
    		if(empty($phone)){
    			$msg = '-1';
    		}
    		if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
    			//防用户恶意请求
    			$msg = '-2';
    		}
    		$msg = Mobile($phone,"您的校验码是：".$send_code."。请不要把校验码泄露给其他人。");
    		if($msg == "2"){
    			$_SESSION['phone'] = $phone;
    			$_SESSION['mobile_code'] = $send_code;
    		}
    	}
    	
    	//邮箱验证
    	if(I('post.type') == "email"){
    		$email = trim($_POST['email']);
    		$email_code = $_POST['email_code'];
    		 
    		if(empty($phone)){
    			$msg = '-1';
    		}

    		$E = Email($email,"校验码通知","您的校验码是".$email_code."。请不要把校验码泄露给其他人。",C('MAIL_FROMNAME'));
    		if($E){
    			$_SESSION['email'] = $email;
    			$_SESSION['email_code01'] = $email_code;
    			$msg = "1";
    		}
    		
    	}

    	$this->ajaxReturn($msg);
    	$this->display();
    }
}