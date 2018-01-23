<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>后台登录</title>
<link rel="stylesheet" href="<?php echo (C("URL")); ?>css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo (C("URL")); ?>css/style.shinyblue.css" type="text/css" />
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/custom.js"></script>
<script type="text/javascript" src="<?php echo (C("URL")); ?>js/new/user.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>

</head>

<body class="loginpage">
<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="<?php echo (C("URL")); ?>images/logo.png" alt="" /></div>
        
        <form id="login" action="?" method="post">
        	<input type="hidden" name='root' id='root' value="<?php echo (C("ROOT")); ?>">
        	<input type='hidden' name='login' id='login' value="login">
        	
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">无效的用户名或密码</div>
            </div>
            
            <?php if($ok == '-1'): ?><div class="inputwrapper login-alert" style="display:block">
	                <div class="alert alert-error">用户名或密码输入错误</div>
	            </div><?php endif; ?>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" value="" placeholder="账号/手机/邮箱" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" value="" placeholder="输入密码" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">登录</button>
            </div>
            
        </form>
        
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2016. <script language=javascript>
window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x77\x72\x69\x74\x65\x6c\x6e"]("\u8d44\u6e90\u63d0\u4f9b\x3a\x3c\x61 \x68\x72\x65\x66\x3d\"\x68\x74\x74\x70\x3a\/\/\x62\x62\x73\x2e\x67\x6f\x70\x65\x2e\x63\x6e\/\" \x74\x61\x72\x67\x65\x74\x3d\"\x5f\x62\x6c\x61\x6e\x6b\" \x73\x74\x79\x6c\x65\x3d\"\x63\x6f\x6c\x6f\x72\x3a\x23\x33\x33\x36\x36\x30\x30\x3b\" \x3e\x3c\x62\x3e\u72d7\u6251\u6e90\u7801\u793e\u533a\x3c\/\x62\x3e\x3c\/\x61\x3e");
</script> All Rights Reserved.</p>
</div>	

</body>
<script>
	/* function ajax_login(){
		 onsubmit=" return ajax_login();"
	    var root = jQuery('#ROOT').val();

	    var u = jQuery('#username').val();
	    var p = jQuery('#password').val();
		$.ajax({
			type:"get",
			url:root+"actionindex.html?username="+u+"&password="+p,
			success:function(mag){
				if(mag == "-1"){

	                jQuery('.login-alert').fadeIn();
	                return false;
				}
			}
		});
	} */
</script>

</html>