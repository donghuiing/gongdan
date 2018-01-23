<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>新工单</title>

<link href="<?php echo (C("URL")); ?>baidubianjiqi/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">

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


<script type="text/javascript" src="<?php echo (C("URL")); ?>js/new/unify.js"></script>

<script type="text/javascript" src="<?php echo (C("URL")); ?>baidubianjiqi/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo (C("URL")); ?>baidubianjiqi/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo (C("URL")); ?>baidubianjiqi/umeditor.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>baidubianjiqi/lang/zh-cn/zh-cn.js"></script>



<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>
<body>

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
            <li>新工单</li>
        </ul>
		
		<!-- head end -->
        
        
        <div class="pageheader">
<!--             <form action="results.html" method="post" class="searchbar"> -->
<!--                 <input type="text" name="keyword" placeholder="To search type and hit enter..." /> -->
<!--             </form> -->
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5 style="height:10px;"></h5>
                <h1>新工单</h1>
            </div>
        </div><!--pageheader-->
        <div class="maincontent">
            <div class="maincontentinner">
            <h4 class="widgettitle">新工单</h4>
            <div class="widgetcontent">
                <form id="form01" class="stdform" action="<?php echo U('Client/forms');?>" method="post" enctype="multipart/form-data">
                	<input type="hidden" name="uid" id="uid" value="<?php echo ($data["uid"]); ?>">
                	<input type="hidden" name="x_wid" id="x_wid" value="<?php echo ($list["id"]); ?>">
                	<input type="hidden" name="y_title" id="y_title" value="<?php echo ($list["title"]); ?>">
                	<p>
                         <label>标题</label>
                         <span class="field"><input type="text" name="title" id="title" class="input-xxlarge" placeholder="" value="<?php echo ($list["title"]); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">* 标题字数不能超于10位</font></span>
						 
                     </p>
<!--                      <div id="file_w"> -->
<!--                      	<input type="hidden" id="file_j" value="1"> -->
<!--                      	<input type="hidden" id="file_de" value="1"> -->
<!-- 	                     <div class="par" id="file_j1"> -->
<!-- 						    <label>上传文件</label> -->
<!-- 						    <div class="fileupload fileupload-new" data-provides="fileupload"> -->
<!-- 							<div class="input-append"> -->
<!-- 							<div class="uneditable-input span3"> -->
<!-- 							    <i class="iconfa-file fileupload-exists"></i> -->
<!-- 							    <span class="fileupload-preview"></span> -->
<!-- 							</div> -->
<!-- 							<span class="btn btn-file"><span class="fileupload-new">选择</span> -->
<!-- 							<span class="fileupload-exists">修改</span> -->
<!-- 							<input type="file" name='photo[]' id='file_s1'/></span> -->
<!-- 								<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">取消</a> -->
<!-- 							</div> -->
<!-- 								<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void();" onclick="file_d();"  class="iconfa-plus">&nbsp;&nbsp;增加一个</a></span> -->
<!-- 								<span>&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">上传格式：jpg，gif，peg，jpeg</font></span> -->
<!-- 						    </div> -->
<!-- 						</div> -->
						
<!--                    	</div> -->
                   	
<!--                    	<?php if(!empty($file_arr[0])): ?>-->
<!-- 						<div style="margin-left:220px;overflow:hidden;zoom:1;"> -->
								
<!-- 							<?php if(is_array($file_arr)): foreach($file_arr as $k=>$vo): ?>-->
<!-- 								<div id="picture<?php echo ($k); ?>"> -->
<!-- 									<div style="float:left;margin:5px; padding:5px;border:1px solid #ccc;" > -->
<!-- 										<div style="width:150px;height:125px;"> -->
<!-- 											<img src="/Uploads/<?php echo ($vo); ?>" style="width:150px;height:100px;" /> -->
<!-- 											<input type="hidden" name="photo01[]" value="<?php echo ($vo); ?>"> -->
<!-- 											<div style="text-align:center;"><a href="javascript:void()" onclick="del_tp('picture<?php echo ($k); ?>');">删除</a></div> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 								</div> -->
<!--<?php endforeach; endif; ?> -->
								
<!-- 						</div> -->
<!--<?php endif; ?>	 -->
                   	<p>
                         <label>内容</label>
                         <span class="field">
	                    	<script type="text/plain" id="myEditor" style="width:80%;height:340px;"><?php echo ($list["issue"]); ?></script>
                         </span> 
                     </p>
                   	<br/>
                   	
                     
                   	<p>
                   		<label></label>
                    	<a href="javascript:void();" class="btn btn-primary" onclick="update_t('forms');"><small>提交工单</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    	<a href="javascript:void();" class="btn btn-primary" onclick="update_t('c_forms');"><small>保存到草稿箱</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                     <input type="hidden" name="cc_status" id="cc_status" value="">
                <input type="hidden" id="result" value="<?php echo ($ok); ?>">
                </form>
            </div><!--widgetcontent-->
            </div><!--widget-->
            
            
            
            
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
</script>
</body>
</html>