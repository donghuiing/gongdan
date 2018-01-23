<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo ($main["w_title"]); ?></title>
<!-- header binge -->
<link href="<?php echo (C("URL")); ?>baidubianjiqi/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">



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


<script type="text/javascript" src="<?php echo (C("URL")); ?>js/new/unify.js"></script>

<script type="text/javascript" src="<?php echo (C("URL")); ?>baidubianjiqi/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo (C("URL")); ?>baidubianjiqi/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo (C("URL")); ?>baidubianjiqi/umeditor.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>baidubianjiqi/lang/zh-cn/zh-cn.js"></script>


<style type="text/css">
	a:hover{
		text-decoration:none;
	}
	.comments li:last-child .comment p{margin-top:15px;}
</style>
</head>

<body>

<div class="mainwrapper">
    
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
        
         <!-- head binge -->
        
			
        <ul class="breadcrumbs">
            <li><a href="<?php echo U('Console/dashboard');?>"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="<?php echo U('Console/dashboard');?>">后台面板</a> <span class="separator"></span></li>
            <li>处理工单</li>
        </ul>
		
		<!-- head end -->
		
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="messagepanel">
                    <div class="messagemenu">
                        <ul>
                            <li class="back"><a><span class="iconfa-chevron-left"></span > Back</a></li>
                            <li <?php if($data["case"] == 'dai'): echo ($data["class"]); endif; ?>><a href="<?php echo U('Client/messages?case=dai');?>" ><span></span> 待处理的工单</a></li>
                            <li <?php if($data["case"] == 'zhong'): echo ($data["class"]); endif; ?>><a href="<?php echo U('Client/messages?case=zhong');?>"><span class="iconfa-inbox"></span> 处理中的工单</a></li>
                            <li <?php if($data["case"] == 'yi'): echo ($data["class"]); endif; ?>><a href="<?php echo U('Client/messages?case=yi');?>"><span class="iconfa-edit"></span> 已处理的工单</a></li>
                            <?php if($data["limits"] == '3'): ?><li <?php if($data["case"] == 'cao'): echo ($data["class"]); endif; ?>><a href="<?php echo U('Client/messages?case=cao');?>"><span class="iconfa-edit"></span> 草稿箱</a></li><?php endif; ?>
                        </ul>
                    </div>
                    <div class="messagecontent">
                        <div class="messageleft" style="height:1000px;width:15%;">
                            <div class="messagesearch">
                            	<input type="hidden" id="url" value="<?php echo ($data["url"]); ?>">
                                <input type="text" class="input-block-level" placeholder="填写标题。。。" /*onkeydown="seek('messages');" */value="" id="sou"/>
                            </div>
                            <ul class="msglist">
                            
                            	<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Client/messages?case='.$data['case'].'&messages='.$vo['id'].$data['sou']);?>">
	                               	 	<li class="<?php if($k%2 == 0): echo ($data["unread"]); endif; ?> <?php if(($vo["id"]) == $data["aid"]): echo ($data["selected"]); endif; ?>"  >
		                                    <div class="summary" style="margin-left:10px;">
		                                        <span class="date pull-right"><small><?php echo (date("Y-m-d",$vo["puddate"])); ?></small></span>
		                                        <h4><?php echo ($vo["title"]); ?></h4>
		                                        <p><strong><?php echo (strip_tags(msubstr($vo["issue"],0,18))); ?></strong></p>
		                                    </div>
	                                	</li>
	                               </a><?php endforeach; endif; else: echo "" ;endif; ?>
                                
                            </ul>
                        </div><!--messageleft-->
                        <div class="messageright" style="height:1000px; margin-left:15%;">
                            <div class="messageview" <?php if($data["case"] == 'zhong'): ?>style="height:700px;"<?php else: ?> 	style="height:1000px;"<?php endif; ?>>	
                            	<?php if(!empty($list)): ?><div class="btn-group pull-right">
	                            		<?php if($data["limits"] == 3 and $data["case"] == 'dai'): ?><a href="<?php echo U('Client/forms?type=xiu&forms='.$main['w_id']);?>" class="btn dropdown-toggle"  style="color:#555;">&nbsp;&nbsp;修改&nbsp;&nbsp;</a>
	                            				&nbsp;&nbsp;&nbsp;
	                            				<a href="javascript:void();" onclick="del('messages-<?php echo ($main["w_id"]); ?>');" class="btn btn-danger alertdanger" style="color:#fff;">&nbsp;&nbsp;取消&nbsp;&nbsp;</a><?php endif; ?>
	                            		
	                            		<?php if($data["limits"] == 2 and $data["case"] == 'dai'): ?><a href="<?php echo U('Client/messages?type=chu&wc_sataus='.$main['w_id']);?>" class="btn dropdown-toggle"  style="color:#555;">&nbsp;&nbsp;处理&nbsp;&nbsp;</a><?php endif; ?>
	                            		
	                            		<?php if($data["limits"] == 3 and $data["case"] == 'zhong'): ?><a href="<?php echo U('Client/messages?type=wang&wc_sataus='.$main['w_id']);?>" class="btn btn-success alertsuccess" style="color:#fff;">&nbsp;&nbsp;结束&nbsp;&nbsp;</a><?php endif; ?>
	                            		<?php if($data["limits"] == 3 and $data["case"] == 'cao'): ?><a href="<?php echo U('Client/forms?type=xiu&forms='.$main['w_id']);?>" class="btn dropdown-toggle" style="color:#555;">&nbsp;&nbsp;编辑&nbsp;&nbsp;</a><?php endif; ?>
	                            	</div>
	                                <h1 class="subject"><b>【标题】<?php echo ($main["w_title"]); ?></b></h1>
	                                
	                                <div class="msgauthor">
	                                    <div class="authorinfo" style="margin-left:0px;">
	                                        <span class="date pull-right"><?php echo (date("Y-m-d",$main["w_puddate"])); ?></span>
	                                        <h5><strong><?php echo ($main["u_uname"]); ?></strong> <span><?php echo ($main["u_email"]); ?></span></h5>
	                                        <span class="to"><?php echo ($main["u_url"]); ?></span>
	                                    </div><!--authorinfo-->
	                                </div><!--msgauthor-->
	                                <div class="msgbody"  style="background:#fcfcfc;">
	                                	<div style="margin-left:40px;">
	                                    	<?php echo ($main["w_issue"]); ?>
	                                	</div>
	                                	
	                                	<?php if(!empty($file_arr[0])): ?><div style="margin-left:220px;overflow:hidden;zoom:1;">
													
												<?php if(is_array($file_arr)): foreach($file_arr as $k=>$vo): ?><div id="picture<?php echo ($k); ?>">
														<div style="float:left;margin:5px; padding:5px;border:1px solid #ccc;" >
															<div style="width:150px;height:125px;">
																<img src="/Uploads/<?php echo ($vo); ?>" style="width:150px;height:100px;" />
																<input type="hidden" name="photo01[]" value="<?php echo ($vo); ?>">
																<div style="text-align:center;"><a href="javascript:void()" onclick="del_tp('picture<?php echo ($k); ?>');">删除</a></div>
															</div>
														</div>
													</div><?php endforeach; endif; ?>
											</div><?php endif; ?>	
	                                	
	                                	
	                                	<?php if($data["limits"] == 3 and $data["case"] == 'zhong'): ?><p style="color:red;">【备注】：若本工单已无问题，请点击右上角的“结束”按钮，本工单将处理完毕，将会在“已处理的工单”处显示。</p><?php endif; ?>
		                                
	                                </div><!--msgbody-->
	                                
	                                <?php if(is_array($record)): $i = 0; $__LIST__ = $record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="border-top:1px solid #ddd;">
	                                		<div class="msgauthor"  style="padding:0 0;border:1px solid #ddd;margin:10px 0;width:50%;<?php if($vo['limits'] == 2): ?>margin-left:49.85%;<?php endif; ?>">
	                                		
	                               				<?php if($vo['limits'] == 2): ?><h3 class="widgettitle" style="background:#FF8888;">回复<span class="date pull-right"><?php echo (date("Y-m-d",$vo["repdate"])); ?></span></h3><?php endif; ?>
	                                			
	                                			<?php if($vo['limits'] == 3): ?><h3 class="widgettitle" style="background:#ddd;">追加<span class="date pull-right"><?php echo (date("Y-m-d",$vo["repdate"])); ?></span></h3><?php endif; ?>
	                                			
			                                    <div >
			                                    	<div class="authorinfo"  style="margin:15px 0px 0px 15px;">
														<?php echo ($vo["uname"]); ?>
				                                    </div><!--authorinfo-->
				                                   	
			                                		<div class="msgbody"  style="margin-left:25px;">
				                                   		<?php echo ($vo["g_reply"]); ?>
				                                   	</div>
			                                    </div>
			                                </div><!--msgauthor-->
	                                	</div><?php endforeach; endif; else: echo "" ;endif; ?>
                            		<div name="one"></div>
	                                <br/>
	                                <br/><?php endif; ?>
                            </div><!--messageview-->
                            <?php if($data["case"] == 'zhong' or $data["limits"] == '2' or $data["limits"] == '3'): ?><div class="msgreply">
                					<form id="form01" action="<?php echo U('Client/messages');?>" method="post" enctype="multipart/form-data">
                						<input type="hidden" name="insert" value="insert" />
                						<input type="hidden" name="pid" value="<?php echo ($main["w_id"]); ?>">
	                                    <p>
					                    	<script type="text/plain" id="myEditor" style="width:100%;height:200px;"></script>
					                    </p>
					                    <p style="margin-top:10px;" align="right">
					                    	<input type="submit"  class="btn btn-primary" value="  发送  ">
		                                </p>
		                            </form>
	                            </div><!--messagereply--><?php endif; ?>
                            
                        </div><!--messageright-->
                    </div><!--messagecontent-->
                </div><!--messagepanel-->
                
               <!-- footer binge -->
								<div class="footer">
                    <div class="footer-left">
                        <span>&copy; 2016. <a href="http://www.gope.cn" target="_blank">www.gope.cn.</a> All Rights Reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed by: <a href="http://www.gope.cn/" target="_blank">狗扑源码社区</a></span>
                    </div>
                </div><!--footer-->
				
				<!-- footer end -->
                
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->
<script type="text/javascript">

    //实例化编辑器
    var um = UM.getEditor('myEditor');
    um.addListener('blur',function(){
        $('#focush2').html('编辑器失去焦点了')
    });
    um.addListener('focus',function(){
        $('#focush2').html('')
    });
    //按钮的操作
    function insertHtml() {
        var value = prompt('插入html代码', '');
        um.execCommand('insertHtml', value)
    }
    function isFocus(){
        alert(um.isFocus())
    }
    function doBlur(){
        um.blur()
    }
    function createEditor() {
        enableBtn();
        um = UM.getEditor('myEditor');
    }
    function getAllHtml() {
        alert(UM.getEditor('myEditor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UM.getEditor('myEditor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UM.getEditor('myEditor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用umeditor')方法可以设置编辑器的内容");
        UM.getEditor('myEditor').setContent('欢迎使用umeditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UM.getEditor('myEditor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UM.getEditor('myEditor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UM.getEditor('myEditor').selection.getRange();
        range.select();
        var txt = UM.getEditor('myEditor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UM.getEditor('myEditor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UM.getEditor('myEditor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UM.getEditor('myEditor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UM.getEditor('myEditor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            domUtils.removeAttributes(btn, ["disabled"]);
        }
    }
    

    function keyevent(){
        if(event.keyCode==13){
        	if($("#sou").val() != ""){
        		location.href=$("#url").val()+"/sou/"+$("#sou").val();
        	}
        }
    }
    document.onkeydown = keyevent;

</script>
</body>
</html>