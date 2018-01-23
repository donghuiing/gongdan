<?php 
header("Content-type: text/html; charset=utf-8");
$status = isset($_POST['status'])	? $_POST['status'] : false;
if($status){
	





	//检测数据库账号密码
	$mysql = mysqli_connect($_POST['db_host'],$_POST['db_user'],$_POST['db_pwd'],$_POST['db_name']);
	// var_dump($mysql);
	// exit();
	$link =  $mysql ? 1 : 2;
	// var_dump($link);
	// exit();
	if($link == 1){

		//创建数据库
		$db_name = $_POST['db_name'];
		//查询数据库是否存在 ，存在则删除，再创建
		// $sel_db = mysql_select_db($_POST['db_name'],$mysql);
		$sel_db =$mysql;
		
		if(1){

			
			$i = 16;
// var_dump($sql_arr);
// 			foreach ($sql_arr as $k=>$v){

// 				$result = mysqli_query($mysql,$v);
// var_dump($result);
// 				if($result){
// 					$i += 1;
// 				}
// 			}
		// 	echo "result";	
		// echo "$i";	
		// exit;
// echo "<script>alert('dsadsa');</script>";
			if($i == 16){
				// $result = mysqli_query($mysql,"insert into ".$_POST['db_prefix']."user(userid,pwd,email,limits) values('".$_POST['userid']."','".md5($_POST['pwd'])."','".$_POST['email']."','1')");
				if(1){
					//创建项目的配置文件
					$config ="<?php
							return array(

								'DB_TYPE'		=>	'mysql'	,							// 数据库类型
								'DB_HOST'		=> '".$_POST['db_host']."',					// 服务器地址
								'DB_NAME'		=> '".$_POST['db_name']."',					// 数据库名
								'DB_USER'		=> '".$_POST['db_user']."',					// 账号
								'DB_PWD'		=> '".$_POST['db_pwd']."',					// 密码
								'DB_PORT'		=>	3306,								// 端口
								'DB_PREFIX'		=> '".$_POST['db_prefix']."',					// 数据库表前缀
								'DB_CHARSET'	=> '".$_POST['db_charset']."',				// 数据库字符集
								'URL'			=>	__ROOT__.'/haoidcn/Admin/Public/',	//引入文件路径


								//邮箱
								'MAIL_CHARSET'	=>	'UTF-8',							//编码
								'MAIL_AUTH'		=>	true,								//邮箱认证
								'MAIL_HTML'		=>	true,								//true HTML格式 false TXT格式

							);";
					$fp = fopen('../haoidcn/Admin/Conf/config.php',"w");
					$result = fwrite($fp, $config);
					
					if($result){
						$url = explode('/', $_SERVER['PHP_SELF']);
						echo "<script>alert('安装成功，现在跳转到工单系统的登录页面'); location.href='../';</script>";
					}
				}
			}

		}
	}else if($link == 2){

		echo "<script>alert('数据库服务器或登录密码不正确'); history.go(-1);</script>";
		exit;

	}
}
$step = isset($_GET['step']) ? $_GET['step'] : 1;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/install.css" type="text/css"/>

<script src="js/jquery.js" language="javascript" type="text/javascript"></script>
<script src="js/install.js" language="javascript" type="text/javascript"></script>


</head>
<body class="body">
	<div class="con_bg">
		<div class="con">
			<?php 
				if($step == 1){
			?>
				<div>
					<div class="con_title"><h3><b>阅读许可协议</b></h3></div>
					<div class="con-agreement" >
							<p>版权所有 (c)2012-2014，www.haoid.cn 保留所有权利。 </p>
							<p>感谢您选择好站长工单系统。</p>
							<p>好站长 的官方网址是： <a href="http://www.haoid.cn" target="_blank">www.haoid.cn</a> 交流论坛：<a href="http://www.haoid.cn" target="_blank">www.haoid.cn</a></p>
							<p>为了使你正确并合法的使用本软件，请你在使用前务必阅读清楚下面的协议条款：</p>
						<strong>一、本授权协议适用且仅适用于 haoidcn 工单1.0 版本，好站长官方对本授权协议的最终解释权。</strong>
						<strong>二、协议许可的权利 </strong>
							<p>1、您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用。 </p>
							<p>2、您可以在协议规定的约束和限制范围内修改 好站长 源代码或界面风格以适应您的网站要求。 </p>
							<p>3、您拥有使用本软件构建的网站全部内容所有权，并独立承担与这些内容的相关法律义务。 </p>
							<p>2、未经官方许可，不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。</p>
						<strong>三、有限担保和免责声明 </strong>
							<p>1、本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。 </p>
							<p>2、用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺对免费用户提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。 </p>
							<p>3、电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始确认本协议并安装   好站长 工单系统，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</p>
							<p>4、如果本软件带有其它软件的整合API示范例子包，这些文件版权不属于本软件官方，并且这些文件是没经过授权发布的，请参考相关软件的使用许可合法的使用。</p>
							<p><b>协议发布时间：</b> 2015年9月28日</p>
							<p><b>版本最新更新：</b> 2015年9月28日 By www.haoid.cn</p>
					</div>
					<br/>
					<br/>
					<div class="con-base">
						<input name="readpact" type="checkbox" id="readpact" value="" />&nbsp;<label for="readpact"><strong class="con-fc">我已经阅读并同意此协议</strong></label>&nbsp;&nbsp;&nbsp;
						<input type="button" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;&nbsp;继续&nbsp;&nbsp;&nbsp;&nbsp;" onclick="document.getElementById('readpact').checked ?window.location.href='index.php?step=2' : alert('您必须同意软件许可协议才能安装！');" />
					</div>
				</div>
			<?php }?>
			<?php 
				if($step == 2){
			?>
				<div class="con-config">
					<form action="" id='fomr01' class="editprofileform" method="post">
						<input type="hidden" name="status" value="1">
						<div class="con_title"><h3><b>基本配置</b></h3></div>
						<div class="con-agreement01">
							<div class="con-email">
								<br/>
								<div style="color : #337ab7;"><label>数据库配置</label></div>
								<p>
									<label style="width:150px;">数据库主机：</label>
									<input type="text" class="input-xlarge" name="db_host" id="db_host" value="localhost" placeholder="" style="width:350px;"/>
								</p>
								<p>
									<label style="width:150px;">数据库账号：</label>
									<input type="text" class="input-xlarge" name="db_user" id="db_user" value="root" placeholder="" style="width:350px;"/>
								</p>
								<p>
									<label style="width:150px;">数据库密码：</label>
									<input type="text" class="input-xlarge" name="db_pwd" id="db_pwd" value="" placeholder="" style="width:350px;"/>
								</p>
								<p>
									<label style="width:150px;">数据表前缀：</label>
									<input type="text" class="input-xlarge" name="db_prefix" id="db_prefix" value="haoidcn_" placeholder="如：haoidcn_" style="width:350px;"/>
								</p>
								<p>
									<label style="width:150px;">数据库名称：</label>
									<input type="text" class="input-xlarge" name="db_name" id="db_name" value="" placeholder="如：haoidcn" style="width:350px;"/>
									
								</p>
								<p>
									<label style="width:150px;"></label>
									<font>如数据库已存在，系统将会覆盖已有的数据库</font>
								</p>
								<br/>
								<p>
									<label style="width:150px;">数据库编码：</label>
									<input type="text" class="input-xlarge" name="db_charset" id="db_charset" value="UTF8" readonly="readonly" style="width:350px;"/>
								</p>
							</div>
							
							<div class="con-admin">
								<br/>
								<div style="color : #337ab7;"><label>管理员初始密码</label></div>
								<p>
									<label style="width:150px;">管理员账号：</label>
									<input type="text" class="input-xlarge" name="userid" id="userid" value="admin" placeholder="" style="width:350px;"/>
								</p>
								<p>
									<label style="width:150px;">管理员密码：</label>
									<input type="text" class="input-xlarge" name="pwd" id="pwd" value="admin" placeholder="" style="width:350px;"/>
								</p>
								<p>
									<label style="width:150px;">管理员邮箱：</label>
									<input type="text" class="input-xlarge" name="email" id="email" value="" placeholder="如：admin@163.com" style="width:350px;"/>
								</p>
							</div>
							<br/>
						</div>
						<div class="con-base">
	   						 <input type="button" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;后退&nbsp;&nbsp;&nbsp;" onclick="window.location.href='index.php?step=1';" />&nbsp;&nbsp;&nbsp;
	            			<input type="button" class="btn btn-primary" value="开始安装" onclick="DoInstall();" />
						</div>
					</form>
				</div>
			<?php }?>
		</div>
	</div>
</body>
</html>
