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
string_email=Eメール
string_password=パスワード
string_login=ログイン
string_register=登録
string_close=閉じる

# Page - Actions
login_lostpass=パスワードを忘れましたか？
login_notregistered=未登録ですか？
login_rememberme=クッキーを使用しますか？
login_recoveraccount=アカウントを回復する
login_haveaccount=すでにアカウントをお持ちですか？
login_password_confirm=パスワードを確認
login_mc_change_mail=Eメールを変更
login_mc_backtohome=ホームに戻る
login_title_accactivation=アカウントの有効化

# Login Events - General
hive_login_msg_l_wrong=パスワード/Eメールの組み合わせが間違っています。
hive_login_msg_csrf=フォームが期限切れです。もう一度やり直してください。
hive_login_msg_empty=必要なデータを入力してください！
hive_login_msg_ipban=あなたのIPは現在ブロックされています。後でもう一度お試しください。
hive_login_msg_logout=ログアウトしました！
hive_login_msg_nomatchpass=パスワード確認が入力したパスワードと一致しません。
login_doremember=パスワードを記憶しますか？

# Login Events - Login
hive_login_msg_l_ok=ログインに成功しました。
hive_login_msg_l_blocked=アカウントがブロックされているため、ログインできません。
hive_login_msg_l_inactive=ユーザーアカウントがまだ有効化されていません！パスワードを回復してアカウントを有効化するか、受信した有効化EメールのURLをクリックしてください！
hive_login_msg_l_blockedpwf=パスワードを何度も間違えたため、アカウントがブロックされました！
hive_login_msg_l_disabled=ユーザーアカウントが無効になっています！
hive_login_mail_serror=Eメール送信中にエラーが発生しました。これは内部エラーであり、ウェブサイトのスタッフに報告する必要があります。
hive_login_msg_register_ok=新しいアカウントを有効化するため、Eメールの受信トレイを確認してください！
hive_login_msg_passfiltererror=入力したパスワードはパスワード規則を満たしていません！
hive_login_msg_mailexist=このメールアドレスは既に登録されています。
login_password_rules=パスワード規則
login_password_sign=必須文字:
login_password_cap=必須の大文字:
login_password_small=必須の小文字:
login_password_special=必須の特殊文字:
login_password_numeric=必須の数字文字:

# Login Events - Mail Change
hive_login_msg_m_ok=新しいEメールを正常に有効化しました！
hive_login_msg_m_er=新しいEメールアドレスを有効化中にエラーが発生しました。もう一度お試しください。
hive_login_msg_m_exp=Eメール有効化コードが期限切れです！もう一度Eメールを変更してください！
hive_login_msg_m_res=有効化しようとしたEメールはすでに別のアカウントで使用されているため、あなたのアカウントには関連付けできません！
hive_login_msg_m_block=アカウントはEメール変更がブロックされています！
hive_login_msg_m_noadr=リクエストが失敗しました。後でもう一度お試しください。
login_mc_cmailtext=現在のEメールは:
hive_login_msg_rec_ok=新しいEメールの受信トレイを確認して、新しいEメールアドレスを有効化してください。
hive_login_msg_rec_err=Eメールアドレスの変更中にエラーが発生しました。
hive_login_msg_rec_wait=Eメールの変更には120分待つ必要があります！
hive_login_msg_rec_exist=変更しようとしているEメールはすでに別のユーザーアカウントで使用されています！
hive_login_msg_rec_block=アカウントはEメール変更がブロックされています！
hive_login_msg_rec_disable=無効なアカウントのEメールは変更できません！

# Login Mails
hive_login_mail_pre_change=新しいメールを有効化するには、こちらをクリックしてください:
hive_login_mail_title_change=新しいEメールを有効化
hive_login_mail_title_register=新しいアカウントを有効化
hive_login_mail_pre_register=アカウントを有効化するには、次のリンクをクリックしてください:
hive_login_mail_title_rec=アカウントを回復
hive_login_mail_pre_rec=アカウントのパスワードを回復するには、次のリンクをクリックしてください:

# Login - Activation
hive_login_msg_a_ok=アカウントを正常に有効化しました！このウェブサイトのログインページでログインできます。
hive_login_msg_a_er=ユーザーアカウントの有効化中にエラーが発生しました。アカウントのパスワードを回復するか、新しいアカウントを登録してください。
hive_login_msg_a_exp=有効化トークンが無効です。アカウントを有効化するためにログインページでアカウントを回復してください！
hive_login_msg_a_block=アカウントの有効化が無効になっています。後でもう一度お試しください！

# Login - Recover Request
hive_login_msg_rr_recnewunk=提供されたEメールは登録されていません。
hive_login_msg_rr_recnope=アカウントにはパスワード回復の権限がありません！
hive_login_msg_rr_recnopede=アカウントが無効化されているため、新しいリクエストを作成できません！
hive_login_msg_rr_recwait=新しい回復リクエストを開始するには120分待つ必要があります！
hive_login_msg_rr_recnok=パスワードリセットEメールの受信トレイを確認してください。このメールにはパスワードを回復するためのリンクが含まれています。
hive_login_msg_recfr_ok=パスワード回復リンクを受け取るために、Eメールの受信トレイを確認してください！

# Login - Recover Execute
hive_login_msg_pwtexpire=このパスワード回復トークンは期限切れです！もう一度アカウントを回復してください。
hive_login_msg_recexecerror=パスワードを回復中にエラーが発生しました。アカウントを回復するためにもう一度お試しください。
hive_login_msg_recexecok=パスワードを正常に回復しました。新しいパスワードでログインできます。
