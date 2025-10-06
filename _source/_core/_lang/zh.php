<?php if(isset($this)) { if(!is_object($this)) { Header("Location: ../"); exit(); } } else { Header("Location: ../"); exit(); }
#	 ░▒▓███████▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░▒▓████████▓▒░▒▓████████▓▒░▒▓████████▓▒░▒▓█▓▒░░▒▓███████▓▒░▒▓█▓▒░░▒▓█▓▒░ 
#	░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░ 
#	░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░      ░▒▓█▓▒░░▒▓█▓▒░ 
#	 ░▒▓██████▓▒░░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓██████▓▒░ ░▒▓██████▓▒░ ░▒▓█▓▒░░▒▓██████▓▒░░▒▓████████▓▒░ 
#		   ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░ 
#		   ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░      ░▒▓█▓▒░▒▓█▓▒░░▒▓█▓▒░ 
#	░▒▓███████▓▒░ ░▒▓██████▓▒░░▒▓█▓▒░  ░▒▓█▓▒░   ░▒▓████████▓▒░▒▓█▓▒░      ░▒▓█▓▒░▒▓███████▓▒░░▒▓█▓▒░░▒▓█▓▒░ 
	
#	Copyright (C) 2025 Jan Maurice Dahlmanns [Bugfish]

#	This program is free software: you can redistribute it and/or modify
#	it under the terms of the GNU General Public License as published by
#	the Free Software Foundation, either version 3 of the License, or
#	(at your option) any later version.

#	This program is distributed in the hope that it will be useful,
#	but WITHOUT ANY WARRANTY; without even the implied warranty of
#	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#	GNU General Public License for more details.

#	You should have received a copy of the GNU General Public License
#	along with this program.  If not, see <https://www.gnu.org/licenses/>. ?>
##########################################################################################
## Backend Default Language Overrides for Login Scripts
##########################################################################################

# Page - Actions
hive_login_changelanguage=您可以更改语言
hive_login_changelanguage_here=这里。
hive_login_lostpass=忘记密码？
hive_login_notregistered=尚未注册？
hive_login_rememberme=使用 Cookies？
hive_login_recoveraccount=恢复账户
hive_login_haveaccount=已有账户？
hive_login_password_confirm=确认密码
hive_login_mc_change_mail=更改电子邮件
hive_login_mc_backtohome=返回主页
hive_login_title_accactivation=账户激活
hive_cannotenterwhilenologin=您未登录，无法进入此页面！
hive_cannotenterwhilelogin=您已登录，无法进入此页面！
hive_cannotoperatesiteerror=站点模块存在严重错误，您当前无法执行任何操作！
hive_login_backtologin=返回登录
hive_login_change_Lang=更改语言
hive_login_language_changed=语言已更改！

# Login Events - General
hive_login_msg_l_wrong=密码/电子邮件组合错误。
hive_login_msg_csrf=表单已过期，请重试。
hive_login_msg_empty=请输入必填数据！
hive_login_msg_ipban=您的 IP 当前被阻止；请稍后再试。
hive_login_msg_logout=您已成功登出！
hive_login_msg_nomatchpass=密码确认与输入的密码不匹配。
hive_login_doremember=是否记住密码？

# Login Events - Login
hive_login_msg_l_ok=登录成功。
hive_login_msg_l_blocked=您的账户被阻止，无法登录。
hive_login_msg_l_inactive=您的用户账户尚未激活！请通过找回密码激活账户或点击收到的激活邮件中的链接！
hive_login_msg_l_blockedpwf=您多次输入错误密码，账户已被阻止！
hive_login_msg_l_disabled=您的用户账户已被禁用！
hive_login_mail_serror=尝试发送电子邮件时出错。这是一个需要调查的内部错误，请报告给我们的网站工作人员。
hive_login_msg_register_ok=请检查您的电子邮件收件箱以激活您的新账户！
hive_login_msg_passfiltererror=输入的密码不符合密码规则！
hive_login_msg_mailexist=您尝试使用已存在的电子邮件注册账户！
hive_login_password_rules=密码规则
hive_login_password_sign=必须包含的字符：
hive_login_password_cap=必须包含的大写字母：
hive_login_password_small=必须包含的小写字母：
hive_login_password_special=必须包含的特殊字符：
hive_login_password_numeric=必须包含的数字字符：

# Login Events - Mail Change
hive_login_msg_m_ok=您已成功激活新的电子邮件！
hive_login_msg_m_er=尝试激活新电子邮件地址时出错，请重试。
hive_login_msg_m_exp=电子邮件激活码已过期！请重新尝试更改电子邮件！
hive_login_msg_m_res=您尝试激活的电子邮件已被另一个账户使用，无法与您的账户关联！
hive_login_msg_m_block=您的账户被禁止更改电子邮件！
hive_login_msg_m_noadr=请求失败，请稍后再试。
hive_login_mc_cmailtext=您当前的电子邮件是：
hive_login_msg_rec_ok=请检查新的电子邮件收件箱以激活新的电子邮件地址。
hive_login_msg_rec_err=尝试更改电子邮件地址时出错。
hive_login_msg_rec_wait=电子邮件更改在一段时间内受到限制。请稍后再试。
hive_login_msg_rec_exist=您尝试更改的电子邮件已被其他用户账户使用！
hive_login_msg_rec_block=您的账户被禁止更改电子邮件！
hive_login_msg_rec_disable=您无法更改已禁用账户的电子邮件！

# Login Mails
hive_login_mail_pre_change=在此激活您的新电子邮件： <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=激活您的新电子邮件
hive_login_mail_title_register=激活您的新账户
hive_login_mail_pre_register=点击以下链接激活您的账户： <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=找回您的账户
hive_login_mail_pre_rec=点击以下链接找回您的账户密码： <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=您已成功激活账户！您现在可以通过本网站的登录页面登录。
hive_login_msg_a_er=尝试激活用户账户时出错。请尝试找回账户密码或注册新账户。
hive_login_msg_a_exp=激活令牌无效。请通过登录页面找回账户以激活账户！
hive_login_msg_a_block=您的账户激活已被禁用，请稍后再试！

# Login - Recover Request
hive_login_msg_rr_recnewunk=提供的电子邮件未注册。
hive_login_msg_rr_recnope=您的账户无权找回密码！
hive_login_msg_rr_recnopede=您的账户已被停用，无法提出新请求！
hive_login_msg_rr_recwait=为防止滥用，恢复请求受到限制。请稍后再试。
hive_login_msg_rr_recnok=请检查您的收件箱以获取密码重置电子邮件。此邮件包含一个链接用于找回密码。
hive_login_msg_recfr_ok=请检查您的电子邮件收件箱以获取密码恢复链接！

# Login - Recover Execute
hive_login_msg_pwtexpire=此密码恢复令牌已过期！请重新尝试找回您的账户。
hive_login_msg_recexecerror=尝试找回密码时出错。请重新尝试找回您的账户。
hive_login_msg_recexecok=您已成功找回密码，现在可以使用新密码登录。

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=您当前以其他用户身份登录。如果继续，您所做的更改将影响当前登录的账户，而不是您自己的账户。
hive_login_msg_passc_enterold=请输入您当前的密码。
hive_login_msg_passc_enternew=请输入新密码。
hive_login_msg_passc_enternewc=请确认您的新密码。
hive_login_msg_passc_cwrong=您输入的当前密码与我们的记录不符。
hive_login_msg_passc_ok=您的密码已成功更改！
hive_login_msg_2fa=在此设置双重认证（2FA），以增强账户安全性。启用后，您将看到一个代码和一个二维码，可用于连接认证应用。您可以随时在此部分启用或禁用 2FA。
hive_login_msg_2fa_request=2FA 验证码（如启用）
hive_login_msg_2fa_error=您的账户已启用 2FA，您提供的 2FA 密钥不正确，请重试。


##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=启用默认CMS用户邮箱修改页面？
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=启用默认CMS用户密码修改页面？
hive_var-_HIVE_ENABLESITE_RECOVER_=启用默认CMS用户找回页面？
hive_var-_HIVE_ENABLESITE_LOGIN_=启用默认CMS用户登录页面？
hive_var-_HIVE_ENABLESITE_LOGOUT_=启用默认CMS用户注销页面？
hive_var-_HIVE_ENABLESITE_REGISTER_=启用默认CMS用户注册页面？
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=启用默认CMS语言切换页面？
hive_var-_HIVE_ENABLESITE_MODESWITCH_=启用默认CMS前后台切换页面？
hive_var-_HIVE_ENABLESITE_2FA_=启用默认CMS用户双因素认证页面？
hive_var-_HIVE_ENABLESITE_ACTIVATE_=启用默认CMS用户激活页面？
hive_var-_HIVE_LANG_DEFAULT_=默认语言。
hive_var-_REDIS_=Redis启用状态。
hive_var-_REDIS_HOST_=Redis主机。
hive_var-_REDIS_PORT_=Redis端口。
hive_var-_SMTP_MAILS_HEADER_=默认邮件头。
hive_var-_SMTP_MAILS_FOOTER_=默认邮件尾。
hive_var-_SMTP_SENDER_MAIL_=默认发件人邮箱。
hive_var-_SMTP_SENDER_NAME_=默认发件人名称。
hive_var-_SMTP_MAILS_IN_HTML_=以HTML格式发送邮件？
hive_var-_SMTP_INSECURE_=允许不安全的服务器连接？
hive_var-_SMTP_DEBUG_=邮件调试状态（0-3）。
hive_var-_SMTP_HOST_=邮件服务器主机。
hive_var-_SMTP_PORT_=邮件服务器端口。
hive_var-_SMTP_AUTH_=邮件认证方式。
hive_var-_SMTP_USER_=邮件用户名。
hive_var-_SMTP_PASS_=邮件密码。
hive_var-_USER_MAX_SESSION_=会话过期天数。
hive_var-_USER_TOKEN_TIME_=用户令牌过期时间（分钟）。
hive_var-_USER_AUTOBLOCK_=连续登录失败后自动封锁用户。
hive_var-_USER_WAIT_COUNTER_=用户在重置与激活/注册之间需等待的分钟数。
hive_var-_USER_LOG_SESSIONS_=将过期会话记录到数据库？
hive_var-_USER_LOG_IP_=将IP记录到数据库？
hive_var-_USER_PF_SIGNS_=密码过滤器：至少包含符号。
hive_var-_USER_PF_CAPSIGNS_=密码过滤器：至少包含大写字母。
hive_var-_USER_PF_SMSIGNS_=密码过滤器：至少包含小写字母。
hive_var-_USER_PF_SPSIGNS_=密码过滤器：至少包含特殊字符。
hive_var-_USER_PF_NUMSIGNS_=密码过滤器：至少包含数字。
hive_var-_UPDATER_CODE_=运行更新管理器所需的代码？（可被ruleset.cfg覆盖）
hive_var-_HIVE_CURL_LOGGING_=启用Curl日志？
hive_var-_HIVE_IP_LIMIT_=IP被封锁前的失败尝试次数限制。
hive_var-_HIVE_REFERER_=启用来源记录功能？
hive_var-_HIVE_CSRF_TIME_=CSRF表单令牌的有效时间（秒）。
hive_var-_HIVE_JS_ACTION_ACTIVE_=启用JavaScript错误记录脚本？
hive_var-_HIVE_TITLE_=默认网站标题。
hive_var-_HIVE_TITLE_SPACER_=默认网站标签分隔符。
hive_var-_HIVE_PHP_DEBUG_=启用PHP调试模式？
hive_var-_HIVE_MYSQL_DEBUG_=启用MySQL调试模式？
hive_var-_HIVE_URL_SEO_=使用SEO友好的URL吗？
hive_var-_HIVE_ROBOTS_CREATE_=创建初始 robots.txt 文件？
hive_var-_CRON_ENABLE_LOG_=启用 cron 执行协议？
hive_var-_USER_REC_DROP_=在登录或账户恢复时删除已弃用的恢复密钥
hive_var-_USER_MULTI_LOGIN_=允许每个用户进行多个同时登录
hive_var-_HIVE_BENCHMARK_EXECUTE_=在 index.php 上启用基准日志记录
hive_var-_HIVE_HITCOUNTER_EXECUTE_=在 index.php 上启用点击计数日志记录

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=电子邮件
string_password=密码
string_close=关闭
string_delete=删除
string_url=网址
string_name=名称
string_date=日期
string_details=详情
string_operation=操作
string_add=添加
string_execute=执行
string_executed=已执行
string_coming_soon=即将推出
string_value=值
string_edit=编辑
string_not_available=不可用
string_identifier=标识符
string_latest_version=最新版本
string_description=描述
string_install=安装
string_framework=框架
String_internal=内部
string_library=库
string_extension=扩展
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=进程ID
string_status=状态
string_parameter=参数
string_type=类型
string_waiting=等待中
string_done=完成
string_settings=设置
string_deprecated=已弃用
string_theme=主题
string_valid=有效
string_invalid=无效
string_general=通用
string_update=更新
string_cleanup=清理
string_object=对象
string_restricted=受限
string_confirm=确认
string_reset=重置
string_logout=退出登录
string_website=网站
string_login=登录
string_favicon=网站图标
string_visibility=可见性
string_developer=开发者
string_user=用户
string_redis=Redis
string_cancel=取消
string_local=本地
string_online=在线
string_save=保存
string_meta=元数据
string_administration=管理
string_block=封锁
string_unblock=解除封锁
string_confirmed=已确认
string_data=数据
string_inheritance=继承
string_relations=关系
string_docker=Docker
string_background_worker=后台工作线程
string_refresh=刷新
string_token=令牌
string_activate=激活
string_session=会话
string_license=许可证
string_github=Github
string_documentation=文档
string_author=作者
string_switch=切换
string_readme=自述文件
string_disabled=已禁用
string_enabled=已启用
string_rename=重命名
string_hardlink=硬链接
string_create_folder=创建文件夹
string_location=位置
string_truncate=截断
string_delete_data=删除数据
string_not_found=未找到
string_objects=对象
string_pages=页面
string_please_wait=请稍候
string_default=默认
string_register=注册
string_recover=恢复
string_notifications=通知
string_calender=日历
string_profile=个人资料
string_manage=管理
string_view=查看
string_key=密钥
string_enable=启用
string_disable=禁用
string_folder=文件夹
string_version=版本
string_visit=访问
string_module=模块
string_style=样式
string_low=低
string_medium=中
string_high=高
string_active=活动
string_inactive=非活动
string_upload=上传
string_receiver=接收者
string_error=错误
string_subject=主题
string_delay=延迟
string_memory=内存
string_cpu=CPU
string_groups=组
string_mail=电子邮件
string_identification=身份验证
string_permissions=权限
string_websites=网站
string_dashboards=仪表板
string_language=语言
string_translation=翻译
string_empty=空
string_page=页面
string_include=包含
string_public=公开
string_private=私有
string_image=图像
string_sort=排序
string_sql_queries=SQL 查询
string_referer=引用来源
string_hits=点击数
string_flush=刷新
string_information=信息
string_tables=表
string_back=返回
string_field_list=字段列表
string_value_list=值列表
string_failures=失败
string_content=内容
string_line=行
string_users=用户
string_create=创建
string_privisioned=已配置
string_not_privisioned=未配置
string_not_blocked=未阻止
string_blocked=已阻止
string_no_login=无法登录
string_can_login=可以登录
string_page_builder=页面构建器
string_object_builder=对象构建器
string_permitted=允许
string_yes=是
string_no=否
string_download=下载
string_flush_table=清空表格
string_logging=日志记录
string_request=请求
string_visits=访问
string_limit=限制
string_activities=活动
string_list=列表
string_show_more=显示更多
string_show_less=显示更少
string_delete_item=删除项目
string_delete_table=删除表格
string_allow_insecure=允许不安全
string_strict_security=严格安全
string_templates=模板
string_script_path=脚本路径
string_cms=CMS
string_token_switch=令牌切换
string_debugging=调试
string_progress=进度
string_files=文件
string_short_description=简短描述
string_long_description=详细描述
string_creation_operation=创建操作
string_update_operation=更新操作
string_tasks=任务
string_javascript=JavaScript
string_endpoint=端点
string_triggers=触发器
string_builder=构建器
string_trace=追踪
string_ip_address=IP地址
string_reference=参考
string_videos=视频
string_codename=代号
string_included_libraries=包含的库
string_initialized=已初始化
string_last_use=最后使用
string_creation=创建
string_disable_item=禁用项目
string_enable_item=启用项目
string_view_item=查看项目
string_core_version=核心版本
string_framework_version=框架版本
string_module_version=模块版本
string_php_date=PHP日期
string_mysql_date=MySQL日期
string_php_version=PHP版本
string_no_items=无项目
string_back_to_website=返回网站
string_install_item=安装项目
string_frontend_switch=前端切换
string_please_choose_items=请选择项目
string_upload_in_progress=上传中
string_upload_completed=上传完成
string_new_password=新密码
string_current_password=当前密码
string_confirm_new_password=确认新密码
string_change_password=更改密码
string_2fa=双重认证