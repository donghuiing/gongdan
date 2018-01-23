function DoInstall(){

	if($("#db_host").val() == ""){
		alert("数据库主机不能为空");
		$("#db_host").focus();
		return false;
	}
	
	if($("#db_user").val() == ""){
		alert("数据库账号不能为空");
		$("#db_user").focus();
		return false;
	}

	/*if($("#db_pwd").val() == ""){
		alert("数据库密码不能为空");
		$("#db_pwd").focus();
		return false;
	}*/

	if($("#db_prefix").val() == ""){
		alert("数据表前缀不能为空");
		$("#db_prefix").focus();
		return false;
	}

	if($("#db_name").val() == ""){
		alert("数据库名称不能为空");
		$("#db_name").focus();
		return false;
	}

	if($("#db_charset").val() == ""){
		alert("数据库编码不能为空");
		$("#db_charset").focus();
		return false;
	}

	if($("#userid").val() == ""){
		alert("管理员账号不能为空");
		$("#userid").focus();
		return false;
	}

	if($("#pwd").val() == ""){
		alert("管理员密码不能为空");
		$("#pwd").focus();
		return false;
	}

	if($("#email").val() == ""){
		alert("管理员邮箱不能为空");
		$("#email").focus();
		return false;
	}
	$("#fomr01").submit();
}