<?php
							return array(

								'DB_TYPE'		=>	'mysql'	,							// 数据库类型
								'DB_HOST'		=> 'localhost',					// 服务器地址
								'DB_NAME'		=> 'nainuogdsys',					// 数据库名
								'DB_USER'		=> 'root',					// 账号
								'DB_PWD'		=> '123456',					// 密码
								'DB_PORT'		=>	3306,								// 端口
								'DB_PREFIX'		=> 'haoidcn_',					// 数据库表前缀
								'DB_CHARSET'	=> 'UTF8',				// 数据库字符集
								'URL'			=>	__ROOT__.'/haoidcn/Admin/Public/',	//引入文件路径


								//邮箱
								'MAIL_CHARSET'	=>	'UTF-8',							//编码
								'MAIL_AUTH'		=>	true,								//邮箱认证
								'MAIL_HTML'		=>	true,								//true HTML格式 false TXT格式

							);