<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>管理客户</title>

<!-- header binge -->


<link rel="stylesheet" href="<?php echo (C("URL")); ?>css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo (C("URL")); ?>css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo (C("URL")); ?>css/bootstrap-timepicker.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo (C("URL")); ?>css/responsive-tables.css">


<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/responsive-tables.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/custom.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>prettify/prettify.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery.alerts.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/elements.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery.dataTables.min.js"></script>


<!-- header end -->

<script type="text/javascript" src="<?php echo (C("URL")); ?>js/new/unify.js"></script>

<script type="text/javascript">
jQuery(document).ready(function(){

	
	jQuery('.taglist .close').click(function(){
		jQuery(this).parent().remove();
		return false;
	});
	
});
</script>
</head>


<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>
<body >

<!-- header binge -->


<div class="mainwrapper">
    <div class="header">
        <div class="logo">
            <a href="<?php echo U('Console/dashboard');?>"><img src="<?php echo (C("URL")); ?>/images/logo.png" alt="" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="count"></span>
                        <span class="head-icon head-message"></span>
                        <span class="headmenu-label">工单管理</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">工单管理</li>
                        <?php if($data["limits"] == '3'): ?><li><a href="<?php echo U('Client/forms');?>"><span class="icon-tasks"></span> 新工单</a></li><?php endif; ?>
                        <li><a href="<?php echo U('Client/messages?case=dai');?>"><span class="icon-tasks"></span> 待处理的工单 </a></li>
                        <li><a href="<?php echo U('Client/messages?case=zhong');?>"><span class="icon-tasks"></span> 处理中的工单 </a></li>
                        <li><a href="<?php echo U('Client/messages?case=yi');?>"><span class="icon-tasks"></span> 已处理的工单</a></li>
                        <?php if($data["limits"] == '3'): ?><li><a href="<?php echo U('Client/messages?case=cao');?>"><span class="icon-tasks"></span> 草稿箱 </a></li><?php endif; ?>
                    </ul>
                </li>
                <li class="right">
                    <div class="userloggedinfo">
                    	<div style="height:20px;"></div>
                        <div class="userinfo">
                            <h5><?php echo (session('userid')); ?><small><?php echo (session('email')); ?></small></h5>
                            <ul>
                                <li><a href="<?php echo U('Index/editprofile');?>">修改资料</a></li>
<!--                                 <li><a href="">帐户设置</a></li> -->
                                <li><a href="<?php echo U('Index/exit_t');?>">退出</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
    <div class="leftpanel">
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            <?php if($limits == '1'): ?><!-- 管理员 -->
            	<li class="nav-header">总后台管理</li>
<!--             	<li class="active"><a href="<?php echo U('Console/dashboard');?>"><span class="iconfa-question-sign"></span> 工单</a></li> -->
				
				
            	<li <?php echo ($set["active"]); ?>><a href="<?php echo U('Console/dashboard');?>"><span class="iconfa-laptop"></span> 后台面板</a></li>

                <li class="dropdown <?php echo ($data01["kh_one"]); ?>"><a href=""><span class="iconfa-user"></span> 客户管理</a>
                	<ul <?php echo ($data01["kh_block"]); ?>>
                    	<li <?php echo ($data01["kh_two01"]); ?>><a href="<?php echo U('Admin/client');?>">添加客户</a></li>
                        <li <?php echo ($data01["kh_two02"]); ?>><a href="<?php echo U('Admin/c_manage');?>">管理客户</a></li>
                        <li <?php echo ($data01["kh_two03"]); ?>><a href="<?php echo U('Admin/c_status');?>">客户类型管理</a></li>
                    </ul>
                </li>
                
                <li class="dropdown <?php echo ($data["sh_one"]); ?>"><a href=""><span class="iconfa-comments"></span> 售后人员管理</a>
                	<ul <?php echo ($data["sh_block"]); ?>>
                    	<li <?php echo ($data["sh_two01"]); ?>><a href="<?php echo U('Admin/service');?>">添加售后人员</a></li>
                        <li <?php echo ($data["sh_two02"]); ?>><a href="<?php echo U('Admin/s_manage');?>">管理售后人员</a></li>
                    </ul>
                </li>
                
                <li <?php echo ($data02["sh_two01"]); ?>><a href="<?php echo U('Admin/office');?>"><span class="iconfa-comments"></span> 工作时间</a></li>
                <li <?php echo ($data03["sh_two01"]); ?>><a href="<?php echo U('Admin/config');?>"><span class="iconfa-comments"></span> 基本配置</a></li><?php endif; ?>
            
            <?php if($limits == '2' or $limits == '1' ): ?><!-- 售后人员 -->
            	<?php if($limits == '2'): ?><li class="nav-header">售后后台管理</li>
            		<li <?php echo ($set["active"]); ?>><a href="<?php echo U('Console/dashboard');?>"><span class="iconfa-laptop"></span> 后台面板</a></li><?php endif; ?>
            	<?php if($limits == '1'): ?><li class="nav-header">工单管理</li><?php endif; ?>
            	
                <li <?php if($data["case"] == 'dai'): echo ($data["active02"]); endif; ?>><a href="<?php echo U('Client/messages?case=dai');?>"><span class="iconfa-pencil"></span> 待处理的工单</a></li>
                <li <?php if($data["case"] == 'zhong'): echo ($data["active02"]); endif; ?>><a href="<?php echo U('Client/messages?case=zhong');?>"><span class="iconfa-refresh"></span> 处理中的工单</a></li>
                <li <?php if($data["case"] == 'yi'): echo ($data["active02"]); endif; ?>><a href="<?php echo U('Client/messages?case=yi');?>"><span class="iconfa-briefcase"></span> 已处理的工单</a></li><?php endif; ?>
            <?php if($limits == '3'): ?><li class="nav-header">工单管理</li>
            	<li <?php echo ($set["active"]); ?>><a href="<?php echo U('Console/dashboard');?>"><span class="iconfa-laptop"></span> 后台面板</a></li>
                <li <?php echo ($data["active01"]); ?>><a href="<?php echo U('Client/forms');?>"><span class="iconfa-pencil"></span> 新工单</a></li>
                <li <?php if($data["case"] == 'dai'): echo ($data["active02"]); endif; ?> ><a href="<?php echo U('Client/messages?case=dai');?>"><span class="iconfa-pencil"></span> 待处理的工单</a></li>
                <li <?php if($data["case"] == 'zhong'): echo ($data["active02"]); endif; ?> ><a href="<?php echo U('Client/messages?case=zhong');?>"><span class="iconfa-refresh"></span> 处理中的工单</a></li>
                <li <?php if($data["case"] == 'yi'): echo ($data["active02"]); endif; ?> ><a href="<?php echo U('Client/messages?case=yi');?>"><span class="iconfa-briefcase"></span> 已处理的工单</a></li>
                <li <?php if($data["case"] == 'cao'): echo ($data["active02"]); endif; ?> ><a href="<?php echo U('Client/messages?case=cao');?>"><span class="iconfa-th-list"></span> 草稿箱</a></li><?php endif; ?>
            </ul>
        </div><!--leftmenu-->
    </div><!-- leftpanel -->

<!-- header end -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="<?php echo U('Console/dashboard');?>"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="<?php echo U('Console/dashboard');?>">后台面板</a> <span class="separator"></span></li>
            <li>客户管理</li>
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
				<h5 style="height:10px;"></h5>
                <h1>管理客户</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                        <div>
                           <div class="widgetbox personal-information">
                               <h4 class="widgettitle">管理客户</h4>
                               <div class="widgetcontent dataTables_wrapper">
                                   <table class="table">
                                   	<tr>
                                   		<th width="50px">序号</th>
                                   		<th width="200px">账号</th>
                                   		<th width="200px">姓名</th>
                                   		<th width="200px">QQ</th>
                                   		<th width="200px">手机</th>
                                   		<th width="200px">Email</th>
                                   		<th width="200px">URL</th>
                                   		<th width="200px">类型</th>
                                   		<th width="200px">负责人</th>
                                   		<th width="80px">操作</th>
                                   	</tr>
                                   	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="c_manage<?php echo ($vo["id"]); ?>">
                                   			<td><?php echo ($i); ?></td>
                                   			<td><?php echo ($vo["userid"]); ?></td>
                                   			<td><?php echo ($vo["uname"]); ?></td>
                                   			<td><?php echo ($vo["u_qq"]); ?></td>
                                   			<td><?php echo ($vo["u_phone"]); ?></td>
                                   			<td><?php echo ($vo["u_email"]); ?></td>
                                   			<td><?php echo ($vo["u_url"]); ?></td>
                                   			<td><?php echo ($vo["u_status"]); ?></td>
                                   			<td><?php echo ($vo["s_name"]); ?></td>
	                         				<td>
	                         					<a href="javascript:void();" onclick="block('c_manage-<?php echo ($vo["id"]); ?>');"  class="icon-pencil"></a>&nbsp;&nbsp;&nbsp;
	                         					<a href="javascript:void();" onclick="del('c_manage-<?php echo ($vo["id"]); ?>');"  class="icon-trash"></a>
	                         				</td>
                                   		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                   	
                                   </table>
                                   
		                           <?php echo ($page); ?>
                                 
                           </div>
                        </div>
                        
                        <div id="update" style="display:none;">
                           	<form class="editprofileform" method="post">
                              <div class="widgetbox personal-information">
                                  <h4 class="widgettitle">修改客户</h4>
                                  <div class="widgetcontent">
                                  	  <input type="hidden" name="id" id="id" value="">
                                       <div id="update01">
		                                   	<p>
		                                         <label>账号：</label>
		                                         <input type="text" name="userid" id="userid" class="input-xlarge" value="" />
		                                    </p>
		                                   	<p>
		                                         <label>姓名：</label>
		                                         <input type="text" name="uname" id="uname" class="input-xlarge" value="" />
		                                    </p>
		                                    <p>
		                                         <label>密码：</label>
		                                         <a href="javascript:void();" onclick="xiu('c_manage');">修改密码？</a>
		                                    </p>
		                                      
		                                    <p>
		                                          <label>QQ：</label>
		                                          <input type="text" name="qq" id="qq" class="input-xlarge" value="" />
		                                     </p>
		                                    <p>
		                                          <label>手机：</label>
		                                          <input type="text" name="phone" id="phone" class="input-xlarge" value="" />
		                                     </p>
		                                     <p>
		                                          <label>email：</label>
		                                          <input type="text" name="email" id="email" class="input-xlarge" value="" />
		                                     </p>
		                                     <p>
		                                          <label>网址：</label>
		                                          <input type="text" name="url" id="url" class="input-xlarge" value="" />
		                                     </p>
			                                 <p>
		                                          <label>负责人：</label>
		                                          <select name="sid" id="sid">
			                                          <option value="">请选择</option>
			                                          <?php if(is_array($data02)): $i = 0; $__LIST__ = $data02;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option id="<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["uname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		                                          </select>
		                                     </p>
		                                     <p>
		                                          <label>客户类型：</label>
			                                      <select name="u_status" id="u_status">
			                                          <option value="">请选择</option>checked
			                                          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option id="<?php echo ($vo["status"]); ?>" value="<?php echo ($vo["status"]); ?>"><?php echo ($vo["status"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			                                          
		                                          </select>
		                                     </p>
		                                </div>
		                                   
		                                      
		                                <div id="update02" style="display:none;">
		                                 	
	                                 		<input type="hidden" name="pwd_status" id="pwd_status" value="">
	                                      	<p>
	                                           <label>旧密码：</label>
	                                           <input type="password" name="pwd" id="pwd" class="input-xlarge" value="" />
	                                       </p>
	                                       <p>
	                                           <label>新密码：</label>
	                                           <input type="password" name="pwd01" id="pwd01" class="input-xlarge" value="" />
	                                       </p>
	                                       
	                                       <p>
	                                           <label>确认密码：</label>
	                                           <input type="password" name="pwd02" id="pwd02" class="input-xlarge" value="" />
		                                       </p>
		                                       
		                                 </div>
		                                <p>
		                                	<a href="javascript:void();" class="btn btn-primary" onclick="update_t('c_manage');"><small>提交信息</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                	<a href="javascript:void();" class="btn btn-primary" onclick="none('update');"><small>取消</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                	<span id="caozuo"></span>
		                                </p>
                                  </div>
                              </div>
                           </form>
                        </div>
                    </div><!--row-fluid-->
                  
                  
        		 <!-- footer binge -->
								<div class="footer">
                    <div class="footer-left">
                        <span>&copy; 2016. <a href="http://www.haoid.cn" target="_blank">www.haoid.cn.</a> All Rights Reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed by: <a href="http://www.haoid.cn/" target="_blank">好站长源码社区</a></span>
                    </div>
                </div><!--footer-->
				
				<!-- footer end -->
                
                
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->

</body>
</html>