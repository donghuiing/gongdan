<?php
namespace Admin\Controller;

use Think\Controller;

class ClientController extends CommonController {
	
	//新工单
	public function forms(){
		
		$office_date = D('time')->find();		//工作 时间
		$begin_time = str_replace(":","",$office_date['begin_time']);		//上班时间
		$end_time = str_replace(":","",$office_date['end_time']);			//下班时间
		$dan_time = str_replace(":","",date("H:i",time()));					//当前时间
//		var_dump($dan_time);exit;
		$begin_beputtime = $office_date['begin_beputtime'];					//开始放假时间
		$end_beputtime = $office_date['end_beputtime'];						//结束放假时间
		
		
		$userid = strtolower(I("session.userid"));
		$data = array(
			"active01"		=>	"class='active'",
			"uid"			=>	I("session.uid"),
			'x_status'		=>	I('get.status'),
		);
		$this->assign('data',$data);
		
		
		if(IS_POST){
			

			$string = I("post.title");
			preg_match_all("/./us", $string, $match);		//限制 标题的个数
			$title_totle = count($match[0]);
			if($title_totle > 10){
				echo "<script>alert('标题字数不能超于10位'); history.go(-1);</script>";
				exit;
			}
				
			//上传图片
			$sc_file = "";
			if(!empty($_FILES['photo']['tmp_name'])){
				$info = Upload_f();
				if($info){
					foreach ($info as $val){
						$savepath =  ltrim($val['savepath'],'.');
						$sc_file .= $savepath.$val['savename'].',';
					}
				}
			}
			//弃用了
			if(I("post.photo01")){
				$photo01_arr = I("post.photo01");
				$photo01 = implode($photo01_arr,',');
		
				//原有的图片名，拼接 上传的文件名
				$sc_file = $photo01.','.$sc_file;
			}
				
			$sc_file = rtrim($sc_file,',');
				
			$data = array(
					'title'		=>	I('post.title'),
					'issue'		=>	htmlspecialchars_decode(I('post.editorValue')),
					'sc_file'	=>	$sc_file,
					'puddate'	=>	time(),
					'wc_sataus'	=>	I('post.cc_status'),
					'uid'		=>	I('post.uid'),
			);
				
				
			if(I("post.x_wid")){
		
				//修改操作
				$id = $this->update_sql("work","id=".I("post.x_wid"),$data);
				$id = I("post.x_wid");
				if(I('post.cc_status') == "-1"){
					$url = __ROOT__."/index.php/Client/messages/case/cao/messages/".$id;
				}elseif (I('post.cc_status') == "1"){
					$url = __ROOT__."/index.php/Client/messages/case/dai/messages/".$id;
				}
				
				$type = "update";
				
			}else{
		
				//添加操作
				$id = $this->inser_sql("work",$data);	//添加到工单表
				$url = __ROOT__."/index.php/Client/forms";
				$type = "insert";
		
			}
				
			if($id){
				if(I('post.cc_status') == 1){
					if(time() < $begin_beputtime or time() > $end_beputtime){			//放假时间
						if($dan_time >= $begin_time && $dan_time <= $end_time and (date("w") != "0" or date("w") != '6')){		//判断上班时间以级周六日
							
							//查询 客户，售后人员的邮箱以及手机，发送通知
							$result_arr = $this->lianhe_sql("user",C('DB_PREFIX')."user u, ".C('DB_PREFIX')."service s","u.uname u_name,u.phone u_phone,u.email u_email,s.uname s_name,s.phone s_phone,s.email s_email,s.id s_id","u.sid=s.id and u.id=".I('post.uid'));
							
							if(!empty($result_arr['s_phone']) && !empty($result_arr["s_email"]) && I('post.cc_status') == 1){
								if($type == "insert" ){
									$E = Email($result_arr["s_email"],"新工单通知","亲爱的同事：".$result_arr["s_name"]."，".$result_arr["u_name"]."这位客户已提交新工单，工单标题为：“".$data['title']."”。请及时查看，并且处理。");
									$M = Mobile($result_arr["s_phone"],'亲爱的：'.$result_arr["s_name"].'同事。'.$result_arr["u_name"].'这位客户已提交新工单，工单标题为：“'.$data['title'].'”。请及时查看，并且处理。');
									
									$data = array(
											'tz_status'		=>	'1',
									);
									$this->update_sql("work","id=".$id,$data);
								}
								echo "<script>alert('工单提交成功，并且已通知售后人员，请耐心等候。'); location.href='$url';</script>";
								exit;
							}
						}else{
							echo "<script>alert('工单提交成功，由于现在不是上班时间，我们将会在上班时间通知售后人员，请耐心等候。'); location.href='$url';</script>";
							exit;
						}
					}else{

						echo "<script>alert('工单提交成功，由于现在不是上班时间，我们将会在上班时间通知售后人员，请耐心等候。'); location.href='$url';</script>";
						exit;
					}
					
				}else if(I('post.cc_status') == -1){

					echo "<script>alert('工单已保存到草稿箱，可到草稿箱修改该工单。'); location.href='$url';</script>";
					exit;
				}
				
			}else{
		
				if(I('post.cc_status') == 1){
					echo "<script>alert('工单提交失败'); history.go(-1);</script>";
					exit();
				}else if(I('post.cc_status') == -1){
					echo "<script>alert('工单保存失败'); history.go(-1);</script>";
					exit();
				}
		
			}

			echo 5555;
		}
		
		//修改操作
		if(IS_GET){
			$x_wid = I('get.forms');
			if($x_wid){
				//显示原本的数据
				$list = D('work')->where("id=".$x_wid)->find();
				$this->assign('list',$list);
				
				//图片
				$file_arr = explode(',',$list['sc_file']);
				$this->assign('file_arr',$file_arr);
			}
		}
		
		$this->display();
	}
	
	
	
	
	//工单 处理
	public function messages(){

		$office_date = D('time')->find();		//工作 时间
		$begin_time = str_replace(":","",$office_date['begin_time']);		//上班时间
		$end_time = str_replace(":","",$office_date['end_time']);			//下班时间
		$dan_time = str_replace(":","",date("H:i",time()));					//当前时间
		$begin_beputtime = $office_date['begin_beputtime'];					//开始放假时间
		$end_beputtime = $office_date['end_beputtime'];						//结束放假时间
		
		
		$limits = I("session.limits");		//权限    2-售后	3-会员
		$id = I("session.uid");				//当前用户id
		$status = I("get.case");			//工单状态
		$aid = I("get.messages");			//工单id
		
		if($status == "dai"){
			$sta_nb = '1';					//工单状态-待处理
		}elseif($status == "zhong"){
			$sta_nb = '2';					//工单状态-处理中
		}elseif($status == "yi"){
			$sta_nb = '3';					//工单状态-已处理
		}elseif($status == "cao"){
			$sta_nb = '-1';					//工单状态-草稿箱
		}
		
		//搜索操作
		if(I("get.sou")){
			$title = I("get.sou");
			$where = " and title like '%$title%'";
		}
		
		
		//列表显示数据	-- 分页
		if($limits == 3){
			
			$list = $this->sel_sql("work","wc_sataus='$sta_nb' and uid='$id' $where","puddate asc");
			$this->assign('list',$list);
			
		}else if($limits == 2){
		
			//获取当前的售后人员所负责 的 客户id
			$result_arr = D("user")->field("id")->where("sid='$id'")->select();
				
			$wid = "";
			foreach ($result_arr as $val){
				$wid .= $val['id'].',';
			}
			$wid = rtrim($wid,",");
//			var_dump($wid);exit();
			//显示当前售后人员所负责 的 客户工单
			$list = $this->sel_sql("work","wc_sataus='$sta_nb' and uid in($wid) $where","puddate asc");
			$this->assign('list',$list);
			
		}else if($limits == 1){
			
			$list = $this->sel_sql("work","wc_sataus='$sta_nb' $where","puddate asc");
			$this->assign('list',$list);
			
		}
		
		if(I("get.del")){
			$aid = I("get.id");
		}else if(I("get.type")){
			$aid = I("get.wc_sataus");
		}else{
			if(IS_POST){
				$aid = I('post.pid');
			}else{
				$aid = $aid == "" ? $list[0]['id'] : $aid;		//当没有id，默认选中第一条
			}
		}
		
		
		
		//列表选中显示样式
		$main = D('Work as w')->field("u.id u_id,u.uname u_uname,u.email u_email,u.url u_url,u.phone u_phone,
										w.id w_id,w.title w_title,w.issue w_issue,w.sc_file w_sc_file,w.puddate w_puddate,w.wc_sataus,
										s.id s_id,s.email s_email,s.uname s_uname,s.phone s_phone")->
										join("LEFT JOIN ".C('DB_PREFIX')."user as u ON w.uid=u.id")->
										join("LEFT JOIN ".C('DB_PREFIX')."service as s ON u.sid=s.id")->where("w.id='$aid'")->find();
		
		$this->assign('main',$main);

		//对话内容显示
		$record = D("addwork as a")->field("u.uname,u.email,u.phone,u.url,u.limits,a.id,a.g_reply,a.repdate,a.pid,a.uid")->join("LEFT JOIN ".C('DB_PREFIX')."user as u ON a.uid=u.id")->where("a.pid='$aid'")->order("repdate asc")->select();
		$this->assign('record',$record);

		

		//处理对话操作
		if(IS_POST){
			$url = __ROOT__."/index.php/Client/messages/case/zhong/messages/".I('post.pid');
			if(I("post.insert") != "" && I('post.editorValue') != ""){
				$data = array(
						'g_reply'		=>	htmlspecialchars_decode(I('post.editorValue')),
						'repdate'		=>	time(),
						'uid'			=>	$id,
						'pid'			=>	I('post.pid'),
				);
				$result = $this->inser_sql("addwork",$data);
				if($result){
					if(time() < $begin_beputtime or time() > $end_beputtime){			//放假时间
						if($dan_time >= $begin_time && $dan_time <= $end_time and (date("w") != "0" or date("w") != '6')){		//判断上班时间以级周六日
							
							if($limits == "2"){
								$E = Email($main["u_email"],"最新消息回复通知","尊敬的客户：".$main["u_uname"]."。您好！您的工单标题为：“".$main['w_title']."” 已有最新回复，请注意查看。");
								$M = Mobile($main["u_phone"],'尊敬的客户：'.$main['u_uname'].'。您好！您的工单标题为：“'.$main['w_title'].'”已有最新回复，请注意查看。');
								echo "<script>alert('发送成功，并且已通知客户。'); location.href='$url';</script>";
							}else if($limits == "3"){
								$E = Email($main["s_email"],"工单追加通知","亲爱的同事：".$main["s_uname"]."，".$main["u_uname"]."这位客户的工单标题为：“".$main['w_title']."” 已有最新追加，请及时查看，并且处理。");
								$M = Mobile($main["s_phone"],'亲爱的：'.$main['s_uname'].'同事。'.$main['u_uname'].'这位客户的工单标题为：“'.$main['w_title'].'”已有最新追加。请及时查看，并且处理。');
								echo "<script>alert('发送成功，并且已通知售后人员。'); location.href='$url';</script>";
							}
							exit;
							
						}
					}
					echo "<script>alert('发送成功，但由现在不是上班时间，我们将会在上班时间短息通知售后人员，请耐心等候'); location.href='$url';</script>";
					
				}
				exit;
			}else{
				echo "<script>alert('回复内容不能为空'); location.href='$url';</script>";
			}
		
		}
		
		
		//工单处理操作
		if(I("get.type") == "chu" && $limits == "2"){
		
			$url = __ROOT__."/index.php/Client/messages/case/dai";
			$data	=	array(
					"wc_sataus"		=>	2,
					"tz_status"		=>	1,
			);
			$result = $this->update_sql("work","id=".I('get.wc_sataus'),$data);
			
			if($result){
				$E = Email($main["u_email"],"工单处理中通知","尊敬的客户：".$main["u_uname"]."。您好！您的工单标题为：“".$main['w_title']."”。正在处理中，请耐心等候。");
				$M = Mobile($main["u_phone"],'尊敬的客户：'.$main['u_uname'].'。您好！您的工单标题为：“'.$main['w_title'].'”。正在处理中，请耐心等候。');
				echo "<script>alert('操作成功，请尽快处理完毕'); location.href='$url';</script>";
			}

			exit;
		}
		
		//工单结束操作
		if(I("get.type") == "wang" and $limits == "3"){
			
			$url = __ROOT__."/index.php/Client/messages/case/zhong";
			$wc_sataus = I("get.wc_sataus");
			$data = array(
					'wc_sataus'	=> 3,
			);
			
			$update = $this->update_sql("work","id='$wc_sataus'",$data);
			if($update){
				
				$E = Email($main["s_email"],"工单结束通知","亲爱的同事：".$main["s_uname"]."，".$main["u_uname"]."这位客户的工单标题为：“".$main['w_title']."” 已结束，辛苦了。");
				$M = Mobile($main["s_phone"],'亲爱的同事：'.$main['s_uname'].'。'.$main['u_uname'].'这位客户的工单标题为：“'.$main['w_title'].'”已结束，辛苦了。');
				
				$E = Email($main["u_email"],"工单结束通知","尊敬的客户：".$main["u_uname"]."。您好！您的工单标题为：“".$main['w_title']."”已结束，若不是本人操作，请联系售后人员。");
				$M1 = Mobile($main["u_phone"],'尊敬的客户：'.$main['u_uname'].'。您好！您的工单标题为：“'.$main['w_title'].'”已结束，若不是本人操作，请联系售后人员。');
				
				echo "<script>alert('操作成功'); location.href='$url';</script>";
				exit;
			
			}
		}
		
		
		
		//取消操作工单
		if(I("get.del")){

			$de = D('work')->where('id='.I("get.id"))->delete();
			if($de){
				
				$url = __ROOT__."/index.php/Client/messages/case/dai";
				
				$E = Email($main["s_email"],"工单取消通知","亲爱的同事：".$main["s_uname"]."，".$main["u_uname"]."这位客户的工单标题为：“".$main['w_title']."” 已取消。");
				$M = Mobile($main["s_phone"],'亲爱的同事：'.$main['s_uname'].'。'.$main['u_uname'].'这位客户的工单标题为：“'.$main['w_title'].'”已取消。');

				$E = Email($main["u_email"],"工单取消通知","尊敬的客户：".$main["u_uname"]."。您好！您的工单标题为：“".$main['w_title']."”已取消。若不是本人操作，请联系售后人员。");
				$M1 = Mobile($main["u_phone"],'尊敬的客户：'.$main['u_uname'].'。您好！您的工单标题为：“'.$main['w_title'].'”已取消。若不是本人操作，请联系售后人员。');
				echo "<script>alert('工单取消成功'); location.href='$url';</script>";
				exit;
			}
		}
		
		
		$data = array(
				'unread'		=>	"unread",
				"selected"		=>	"selected",
				'unread'		=>	"unread",
				'aid'			=>	$aid,
				'limits'		=>	$limits,
				'class'			=>	'class="active"',
				'case'			=>	$status,
				"active02"		=>	"class='active'",
				'url'			=>	__ROOT__."/index.php/Client/messages/case/".$status,
				'sou'			=>	'&sou='.I("get.sou"),
		);
		$this->assign('data',$data);
		
		$this->display();
	}
	
	//分页
	public function page_fan($wc_sataus){
		$Work = D('work');
		$count= $Work->where($wc_sataus)->count();    //计算总数
		$Page = new \Think\Page($count,10);
		$Page ->setConfig('prev', "上一页");
		$Page ->setConfig('next', '下一页');
		$Page ->setConfig('first', '首页');
		$Page ->setConfig('last', '尾页');
		$show = $Page->show();
		$list = $Work->where($wc_sataus)->limit($Page->firstRow. ',' . $Page->listRows)->order("puddate desc")->select();
		return $this ->assign('list',$list).$this ->assign('page',$show);
		
	}
	
	
	//添加数据
	public function inser_sql($model,$data){

		return D($model)->add($data);
		
	}
	
	//简单查询	多条
	public function sel_sql($model,$where,$orders){
		
		$result_arr = D($model)->where($where)->order($orders)->select();
		return $result_arr;
		
	}
	
	//联合查询
	public function lianhe_sql($model,$table,$field,$where){
		
		return  D($model)->table($table)->field($field)->where($where)->find();
		
	}
	//更新操作	
	public function update_sql($model,$where,$data){

		$result = D($model)->where($where)->setField($data);
		return $result;
	}
	

}