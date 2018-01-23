//提交基本信息
function update_t(type){
	
	//修改资料
	if(type == "editprofile"){
		var pwd_status = $("#pwd_status").val();
		if(pwd_status != 1){
			//基本信息简单判断
			var editprofile = upd_jiben(type);
			if(editprofile == false){
				return false;
			}
//			if(($("#phone_yl").val() != $("#phone").val())){
//				jAlert("请获取手机校验码");
//				return false;
//			}
//			if(($("#email_yl").val() != $("#email").val())){
//				jAlert("请获取邮箱校验码");
//				return false;
//			}


			//if(($("#phone_yl").val() != $("#phone").val()) && $("#phone_y").val() == ""){
			//	jAlert("请输入手机校验码");
			//	return false;
			//}

			//if(($("#email_yl").val() != $("#email").val()) && $("#email_y").val() == ""){
			//	jAlert("请输入邮箱校验码");
			//	return false;
			//}
			$("#form01").submit();
		}
		if(pwd_status == 1){
			//基本信息简单判断
			var editprofile = upd_pass(type);
			if(editprofile == false){
				return false;
			}
		}
	}
	
	
	//添加类型
	if(type == "c_status"){
		
		var status = $("#status").val();
		if(status == ""){
			jAlert('类型不能为空，请输入');
			$("#status").focus();
			return false;
		}

		$("#form01").submit();
		
	}
	
	//添加客户
	if(type == "client"){
		
		//基本信息简单判断
		var client = upd_jiben(type);
		if(client == false){
			return false;
		}
		
		$("#form01").submit();
		
	}
	
	//修改客户
	if(type == "c_manage"){
		var pwd_status = $("#pwd_status").val();
		
		//修改基本信息
		if(pwd_status != 1){

			//基本信息简单判断
			var c_manage = upd_jiben(type);
			if(c_manage == false){
				return false;
			}
			
			$.get(type+".html", {sel:'upd', id:$("#id").val(), userid:$("#userid").val(), uname:$("#uname").val(), phone:$("#phone").val(), email:$("#email").val(), qq:$("#qq").val(), url:$("#url").val(), sid:$("[name='sid']").val(), u_status:$("[name='u_status']").val()}, function(data){
				if(data == 1){
					alert("修改成功");
					history.go(0);
				}
			});
			
		}
		
		//修改密码
		if(pwd_status == 1){
			//基本信息简单判断
			var c_manage = upd_pass(type);
			if(c_manage == false){
				return false;
			}
			
		}
		
	}
	
	
	//添加售后人员
	if(type == "service"){
		
		//基本信息简单判断
		var service = upd_jiben(type);
		
		if(service == false){
			return false;
		}
		
		$("#form01").submit();
		
	}
	//修改售后人员
	if(type == "s_manage"){
		var pwd_status = $("#pwd_status").val();
		if(pwd_status != 1){
			
			//基本信息简单判断
			var s_manage = upd_jiben(type);
			if(s_manage == false){
				return false;
			}
			$.get(type+".html", {sel:'upd', id:$("#id").val(), userid:$("#userid").val(), uname:$("#uname").val(), phone:$("#phone").val(), email:$("#email").val()}, function(data){
				if(data == 1){
					alert("修改成功");
					history.go(0);
				}else{
					alert("并没有修改任何资料");
				}
			});
			
		}
		if(pwd_status == 1){
			upd_pass("s_manage");
		}
	}
	
	//新工单
	if(type == "forms" || type == "c_forms"){
		
		if(type == "forms"){
			$("#cc_status").val(1);
		}

		if(type == "c_forms"){

			$("#cc_status").val("-1");
		}

		var title = $("#title").val();
		if(title == ""){
			jAlert("标题不能为空");
			$("#title").focus();
			return false;
		}
		//未定义此id为issue   为undefined  不为空 所以恒成立(作用未知)
		var issue = $("#issue").val();
		if(issue == ""){
			jAlert("标题不能为空");
			$("#issue").focus();
			return false;
		}
		
		var file_de= $("#file_de").val();
		var file_g = "";
		//判断是上传文件
		for ( var j = 2; j <= file_de; j++ ) {   
			if($("#file_s"+j).val() == ""){
				jAlert("请关闭未上传的操作");
				$("#file_s"+j).focus();
				return false;
			}
		}
		//file_s已弃用
		for ( var j = 1; j <= file_de; j++ ) { 
			if($("#file_s"+j).val() != ""){
				file_g +=$("#file_s"+j).val();
				var extStart = file_g.lastIndexOf(".");
				var ext = file_g.substring(extStart, file_g.length).toUpperCase();
				 if (ext != ".JPEG" && ext != ".JPG" && ext != ".GIF" && ext != ".PNG") {
					 jAlert("上传文件限于jpeg,jpg,gif,png格式");
		            return false;
		        }
			}
		}
		

		$("#form01").submit();
	}
	
	//更新
	if(type == "office"){
		var begin_time = $("#begin_time").val();
		var end_time = $("#end_time").val();
		var begin_beputtime = $("#begin_beputtime").val();
		var end_beputtime = $("#end_beputtime").val();
		
		if(begin_time == ""){
			jAlert("上班时候不能为空");
			$("#work_begin").focus();
			return false;
		}
		if(end_time == ""){
			jAlert("上班时候不能为空");
			$("#work_end").focus();
			return false;
		}
		/*if(recess_begin == ""){
			jAlert("放假时间不能为空");
			$("#recess_begin").focus();
			return false;
		}
		if(recess_end == ""){
			jAlert("放假时间不能为空");
			$("#recess_end").focus();
			return false;
		}*/

		$("#form01").submit();
	}
}



//共用修改基本信息
function upd_jiben(type){
	
	if($("#userid").val() == ""){
		jAlert('账号不能为空，请输入');
		$("#userid").focus();
		return false;
	}
	if(upd_jiben == "c_manage"){

		if($("#uname").val() == ""){
			jAlert('姓名不能为空，请输入');
			$("#uname").focus();
			return false;
		}
	}
		
	//售后	添加客户
	if(type == "service" || type == "client"){
		
		if($("#pwd").val() == ""){
			jAlert('密码不能为空，请输入');
			$("#pwd").focus();
			return false;
		}
		
		if($("#pwd01").val() == ""){
			jAlert('确认密码不能为空，请输入');
			$("#pwd01").focus();
			return false;
		}
		
		if($("#pwd01").val() !== $("#pwd").val()){
			jAlert('两次密码输入不一致，请重新输入');
			$("#pwd01").focus();
			return false;
		}
		
	}
	
	//修改资料	修改客户
	if(type == "editprofile" ){

		var qq = $("#qq").val();
		if(qq == ""){
			jAlert('QQ不能为空，请输入');
			$("#qq").focus();
			return false;
		}
		
		
		var qq01 = isNaN(qq);
		
		if(qq01 || qq.length < 5){
			jAlert('非法QQ号码 ，请重新输入');
			return false;
		}
	}
	
	// 添加客户
	if(type == "client" || type == "c_manage" ){
		if($("#sid").val() == ""){
			jAlert('请选择负责人');
			$("#sid").focus();
			return false;
		}
		
		if($("#u_status").val() == ""){
			jAlert('请选择用户类型');
			$("#u_status").focus();
			return false;
		}
	}
	
	//售后   修改售后	修改资料   修改客户
	if(type == "service" || type == "s_manage" || type == "editprofile"){
		var phone = $("#phone").val();
		if(phone.length > 11 || phone.length < 11 ){
			jAlert('请输入11位的手机号码');
			$("#phone").focus();
			return false;
		}
		
		var val = document.getElementById('phone');
	    var reg = /(^13\d{9}$)|(^14)[5,7]\d{8}$|(^15[0,1,2,3,5,6,7,8,9]\d{8}$)|(^17)[6,7,8]\d{8}$|(^18\d{9}$)/g ; 
        if (reg.test(phone)){ var me=true};
		if(!me){
			jAlert("手机号码输入不正确，请重新输入");
			$("#phone").focus();
			return false;

		}
	
		var email = $("#email").val();
		if(email == ""){
			jAlert('email不能为空，请输入');
			$("#email").focus();
			return false;
		}
		
		if(email !== ""){
			if(!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
				jAlert("邮箱格式不正确，请重新输入");
				$("#email").focus();
				return false;
			}
		}
	}
	
	if( type == "editprofile"){
		var url = $("#url").val();
		if(url == ""){
			jAlert('URL不能为空，请输入');
			$("#url").focus();
			return false;
		}
	}
	
}

//共用修改密码
function upd_pass(type){
	if($("#pwd").val() == ""){
		jAlert('旧密码不能为空，请输入');
		$("#pwd").focus();
		return false;
	}
	if($("#pwd01").val() == ""){
		jAlert('新密码不能为空，请输入');
		$("#pwd01").focus();
		return false;
	}
	
	if($("#pwd01").val() == $("#pwd").val()){
		jAlert('新密码不能与旧密码相同，请重新输入');
		$("#pwd01").focus();
		return false;
	}
	
	if($("#pwd01").val() !== $("#pwd02").val()){
		jAlert('两次密码输入不一致，请重新输入');
		$("#pwd02").focus();
		return false;
	}

	$.get(type+".html", { sel:'sel_p', id: $("#id").val(), pwd:$("#pwd").val(), pwd01:$("#pwd01").val() },function(data){
		if(data == '1'){
			pw();
			alert('密码修改成功');
			$("#caozuo").html("");
			$("#pwd_status").val(0);
			$("#update01").css("display","block");
			$("#update02").css("display","none");
		}
		if(data == '2'){
			pw();
			alert('旧密码输入不正确，请重新输入');
		}
	} );
}

//清楚已填的数据
function pw(){

	$("#pwd").val("");
	$("#pwd01").val("");
	$("#pwd02").val("");
}

//客户 售后   删除操作
function del(nb){

	var arr = nb.split('-');
	
	if(arr[0] == "messages"){
		var conf = confirm('确定取消吗？');	
	}else{
		var conf = confirm('确定删除吗？');
	}
	
	if(conf){
		location.href=arr[0]+".html?del=del&id="+arr[1];
	}else{
		return false;
	}
		
}

//售后人员	修改操作
function block(str){

	var arr = str.split('-');

	$("#pwd_status").val(0);
	$("#update").css("display","block");
	$("#update01").css("display","block");
	$("#update02").css("display","none");


	$.get(arr[0]+".html", { sel: "sel_u", id: arr[1] },function(data){
		
		var data_arr = data.split('-');

		if(arr[0] == "s_manage"){
			$("#id").val(data_arr[0]);
			$("#userid").val(data_arr[1]);
			$("#uname").val(data_arr[3]);
			$("#phone").val(data_arr[6]);
			$("#email").val(data_arr[5]);
		}
		if(arr[0] == "c_manage"){
			$("#id").val(data_arr[0]);
			$("#userid").val(data_arr[1]);
			$("#uname").val(data_arr[2]);
			//$("#uname").val(data_arr);
			$("#phone").val(data_arr[5]);
			$("#email").val(data_arr[4]);
			$("#qq").val(data_arr[3]);
			$("#url").val(data_arr[6]);
			$("#"+data_arr[7]).attr("selected","selected");
			$("#"+data_arr[8]).attr("selected","selected");
			
		}
		
	} );
}

//修改密码
function xiu(data){
	$("#pwd_status").val(1);
	$("#update01").css("display","none");
	$("#update02").css("display","block");
	$("#caozuo").append("<a href='javascript:void();' class='btn btn-primary' onclick='fanhui();'><small>返回</small></a>");
}

//返回按钮操作
function fanhui(){
	$("#pwd_status").val(0);
	$("#update01").css("display","block");
	$("#update02").css("display","none");
	$("#caozuo").html("");
}

//取消修改售后操作
function none(data){
	pw();
	$("#pwd_status").val(0);
	$("#"+data).css("display","none");
}


//添加售后人员，显示是否成功	提交工单 	
function ret(status){
	
	//添加售后人员
	if($("#result").val() == "1"){
		alert("提交成功");
		location.href=status+".html";
	}
	if($("#result").val() == "-1"){
		alert("提交失败");
		location.href=status+".html";
	}
	
	
}


//新工单			-- 上传文件
function file_d(){
	$("#file_j").val($("#file_j").val()-0+1);
	$("#file_de").val($("#file_de").val()-0+1);
	var file_j = $("#file_j").val();
	$("#file_w").append("<div class='par' id='file_j"+file_j+"'>"+
						    "<label></label>"+
						    "<div class='fileupload fileupload-new' data-provides='fileupload'>"+
							"<div class='input-append'>"+
							"<div class='uneditable-input span3'>"+
							"    <i class='iconfa-file fileupload-exists'></i>"+
							"    <span class='fileupload-preview'></span>"+
							"</div>"+
							"<span class='btn btn-file'><span class='fileupload-new'>选择</span>"+
							"<span class='fileupload-exists'>修改</span>"+
							"<input type='file' name='photo[]' id='file_s"+file_j+"'/></span>"+
							"	<a href='#' class='btn fileupload-exists' data-dismiss='fileupload'>取消</a>"+
							"</div>"+
							"	<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void();' onclick="+"file_del('file_j"+file_j+"');"+"  class='iconfa-remove'>&nbsp;&nbsp;关闭</a></span>"+
						    "</div>"+
						"</div>");
	
	
	
	
	
}

//上传文件
function file_del(data){
	$("#file_de").val($("#file_de").val()-1);
	$("#"+data).html("");
}


//删除图片
function del_tp(data){
	$("#"+data).html("");
}


//搜索
function seek(data){
	if(data == "messages"){
		if($("#sou").val() != ""){
			jAlert($("#sou").val());
		}
	}
}

//修改资料--验证手机号
function mobile_code(){

	$("#phone_bs").val("1");

	$.post("sms.html",{type:'phone', phone:$("#phone").val() , send_code:$("#send_code").val()},function(msg){
		if(msg == "-1"){
			jAlert("手机号不能为空");
			return false;
		}
		if(msg == "-2"){
			jAlert("请求超时，请刷新页面后重试");
			return false;
		}
		if(msg == '2'){
			$("#yzm").html("");
			jAlert("已发送成功，请留意手机短信");
			RemainTime();
		}
	});
}


var iTime = 59;
var Account;
function RemainTime(){
	
//	if(iTime == 59){
//		$("#yzm").append('<input type="text" name="phone_y" id="phone_y" class="input-xlarge" value="" style="width:80px;" placeholder="输入校验码"/> &nbsp;&nbsp;&nbsp;');
//	}
	document.getElementById('phone01').disabled = true;
	var iSecond,sSecond="",sTime="";
	if (iTime >= 0){
		iSecond = parseInt(iTime%60);
		iMinute = parseInt(iTime/60)
		if (iSecond >= 0){
			if(iMinute>0){
				sSecond = iMinute + "分" + iSecond + "秒";
			}else{
				sSecond = iSecond + "秒";
			}
		}
		sTime=sSecond;
		if(iTime==0){
			clearTimeout(Account);
			sTime='获取手机验证码';
			iTime = 59;
			document.getElementById('phone01').disabled = false;
		}else{
			Account = setTimeout("RemainTime()",1000);
			iTime=iTime-1;
		}
	}else{
		sTime='没有倒计时';
	}
	document.getElementById('phone01').value = sTime;
}



//修改资料--验证邮箱
function email_code(){
	//alert('sssssssss');
	$("#yzm01").html("");
	$("#email_bs").val("1");

	$.post("sms.html",{type:'email',email:$("#email").val() , email_code:$("#email_code").val()},function(msg){
		if(msg == "-1"){
			jAlert("邮箱账号不能为空");
			return false;
		}
		if(msg == '1'){
			jAlert("已发送成功，请留意接受邮件");
			emailTime();
		}
	});
}

var iTime01 = 59;
var Account01;
function emailTime(){
	
//	if(iTime01 == 59){
//		$("#yzm01").append('<input type="text" name="email_y" id="email_y" class="input-xlarge" value="" style="width:80px;" placeholder="输入校验码"/> &nbsp;&nbsp;&nbsp;');
//	}
	document.getElementById('email01').disabled = true;
	var iSecond,sSecond="",sTime="";
	if (iTime01 >= 0){
		iSecond = parseInt(iTime01%60);
		iMinute = parseInt(iTime01/60)
		if (iSecond >= 0){
			if(iMinute>0){
				sSecond = iMinute + "分" + iSecond + "秒";
			}else{
				sSecond = iSecond + "秒";
			}
		}
		sTime=sSecond;
		if(iTime01==0){
			clearTimeout(Account01);
			sTime='获取手机验证码';
			iTime01 = 59;
			document.getElementById('email01').disabled = false;
		}else{
			Account01 = setTimeout("emailTime()",1000);
			iTime01=iTime01-1;
		}
	}else{
		sTime='没有倒计时';
	}
	document.getElementById('email01').value = sTime;
}