<?php if(isset($this)) { if(!is_object($this)) { exit(); } } else { exit(); }
#		@@@@@@@   @@@  @@@   @@@@@@@@  @@@@@@@@  @@@   @@@@@@   @@@  @@@  
#		@@@@@@@@  @@@  @@@  @@@@@@@@@  @@@@@@@@  @@@  @@@@@@@   @@@  @@@  
#		@@!  @@@  @@!  @@@  !@@        @@!       @@!  !@@       @@!  @@@  
#		!@   @!@  !@!  @!@  !@!        !@!       !@!  !@!       !@!  @!@  
#		@!@!@!@   @!@  !@!  !@! @!@!@  @!!!:!    !!@  !!@@!!    @!@!@!@!  
#		!!!@!!!!  !@!  !!!  !!! !!@!!  !!!!!:    !!!   !!@!!!   !!!@!!!!  
#		!!:  !!!  !!:  !!!  :!!   !!:  !!:       !!:       !:!  !!:  !!!  
#		:!:  !:!  :!:  !:!  :!:   !::  :!:       :!:      !:!   :!:  !:!  
#		 :: ::::  ::::: ::   ::: ::::   ::        ::  :::: ::   ::   :::  
#		:: : ::    : :  :    :: :: :    :        :    :: : :     :   : :  www.bugfish.eu?>
##########################################################################################
## Backend Default Language Overrides for Login Scripts
##########################################################################################

# Strings - General
string_email=电子邮件
string_password=密码
string_login=登录
string_register=注册
string_close=关闭

# Page - Actions
login_lostpass=忘记密码？
login_notregistered=尚未注册？
login_rememberme=使用Cookies？
login_recoveraccount=找回账户
login_haveaccount=已有账户？
login_password_confirm=确认密码
login_mc_change_mail=更改电子邮件
login_mc_backtohome=返回首页
login_title_accactivation=账户激活

# Login Events - General
hive_login_msg_l_wrong=密码/电子邮件组合错误。
hive_login_msg_csrf=表单已过期，请重试。
hive_login_msg_empty=请输入必填信息！
hive_login_msg_ipban=您的IP当前被封禁，请稍后再试。
hive_login_msg_logout=您已退出登录！
hive_login_msg_nomatchpass=确认密码与输入的密码不匹配。
login_doremember=您想记住密码吗？

# Login Events - Login
hive_login_msg_l_ok=登录成功。
hive_login_msg_l_blocked=您的账户已被封禁，无法登录。
hive_login_msg_l_inactive=您的账户尚未激活！请通过找回密码激活您的账户，或点击您收到的激活电子邮件中的链接！
hive_login_msg_l_blockedpwf=您输入错误密码次数过多，账户已被封禁！
hive_login_msg_l_disabled=您的账户已被禁用！
hive_login_mail_serror=尝试发送电子邮件时出错。这是一个内部错误，需要报告给我们网站的工作人员处理。
hive_login_msg_register_ok=请检查您的电子邮件收件箱以激活您的新账户！
hive_login_msg_passfiltererror=输入的密码不符合密码规则！
hive_login_msg_mailexist=您尝试注册的电子邮件已存在！
login_password_rules=密码规则
login_password_sign=必需字符：
login_password_cap=必需大写字母：
login_password_small=必需小写字母：
login_password_special=必需特殊字符：
login_password_numeric=必需数字字符：

# Login Events - Mail Change
hive_login_msg_m_ok=您已成功激活新电子邮件！
hive_login_msg_m_er=激活新电子邮件地址时出错，请重试。
hive_login_msg_m_exp=电子邮件激活码已过期！请重新尝试更改电子邮件！
hive_login_msg_m_res=您尝试激活的电子邮件已被其他账户使用，无法与您的账户关联！
hive_login_msg_m_block=您的账户已被禁止更改电子邮件！
hive_login_msg_m_noadr=请求失败。请稍后再试。
login_mc_cmailtext=您的当前电子邮件是：
hive_login_msg_rec_ok=请检查新电子邮件收件箱以激活新电子邮件地址。
hive_login_msg_rec_err=尝试更改电子邮件地址时出错。
hive_login_msg_rec_wait=您需要等待120分钟才能再次更改电子邮件！
hive_login_msg_rec_exist=您尝试更改的电子邮件已被其他用户账户使用！
hive_login_msg_rec_block=您的账户已被禁止更改电子邮件！
hive_login_msg_rec_disable=您无法更改已被禁用账户的电子邮件！

# Login Mails
hive_login_mail_pre_change=在此激活您的新电子邮件：
hive_login_mail_title_change=激活您的新电子邮件
hive_login_mail_title_register=激活您的新账户
hive_login_mail_pre_register=点击以下链接以激活您的账户：
hive_login_mail_title_rec=找回您的账户
hive_login_mail_pre_rec=点击以下链接以找回您的账户密码：

# Login - Activation
hive_login_msg_a_ok=您已成功激活账户！您现在可以在本网站的登录页面登录。
hive_login_msg_a_er=激活账户时出错。请尝试找回您的账户密码或注册一个新账户。
hive_login_msg_a_exp=激活令牌无效。请在登录页面找回您的账户以激活您的账户！
hive_login_msg_a_block=您的账户激活已被禁用，请稍后再试！

# Login - Recover Request
hive_login_msg_rr_recnewunk=提供的电子邮件未注册。
hive_login_msg_rr_recnope=您的账户无权找回密码！
hive_login_msg_rr_recnopede=您的账户已被禁用，无法进行新请求！
hive_login_msg_rr_recwait=您需要等待120分钟才能发起新的找回请求！
hive_login_msg_rr_recnok=请检查您的收件箱，您会收到一封密码重置电子邮件。该邮件包含找回密码的链接。
hive_login_msg_recfr_ok=请检查您的电子邮件收件箱以获取密码找回链接！

# Login - Recover Execute
hive_login_msg_pwtexpire=此密码恢复令牌已过期！请重试找回您的账户。
hive_login_msg_recexecerror=尝试恢复密码时出错。请重试找回您的账户。
hive_login_msg_recexecok=您已成功恢复密码，现在可以使用新密码登录。
