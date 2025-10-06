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
hive_login_changelanguage=言語を変更できます
hive_login_changelanguage_here=こちら.
hive_login_lostpass=パスワードを忘れましたか？
hive_login_notregistered=まだ登録していませんか？
hive_login_rememberme=クッキーを使用しますか？
hive_login_recoveraccount=アカウントを回復
hive_login_haveaccount=既にアカウントをお持ちですか？
hive_login_password_confirm=パスワードの確認
hive_login_mc_change_mail=メールアドレスを変更
hive_login_mc_backtohome=ホームに戻る
hive_login_title_accactivation=アカウントの有効化
hive_cannotenterwhilenologin=ログインしていない場合、このページにアクセスできません！
hive_cannotenterwhilelogin=ログイン中はこのページにアクセスできません！
hive_cannotoperatesiteerror=このサイトモジュールで重大なエラーが発生しているため、現在は操作を実行できません！
hive_login_backtologin=ログインページに戻る
hive_login_change_Lang=言語を変更
hive_login_language_changed=言語が変更されました！

# Login Events - General
hive_login_msg_l_wrong=パスワード/メールアドレスの組み合わせが間違っています。
hive_login_msg_csrf=フォームの有効期限が切れました。もう一度お試しください。
hive_login_msg_empty=必要な情報を入力してください！
hive_login_msg_ipban=現在、あなたのIPはブロックされています。後でもう一度お試しください。
hive_login_msg_logout=ログアウトしました！
hive_login_msg_nomatchpass=確認用パスワードが入力したパスワードと一致しません。
hive_login_doremember=パスワードを記憶しますか？

# Login Events - Login
hive_login_msg_l_ok=ログインに成功しました。
hive_login_msg_l_blocked=アカウントがブロックされているため、ログインできません。
hive_login_msg_l_inactive=ユーザーアカウントはまだ有効化されていません！アカウントを有効化するには、パスワードを回復するか、受信した有効化メールのURLをクリックしてください！
hive_login_msg_l_blockedpwf=パスワードを何度も間違えたため、アカウントがブロックされました！
hive_login_msg_l_disabled=ユーザーアカウントは無効化されています！
hive_login_mail_serror=メールの送信中にエラーが発生しました。この内部エラーは調査が必要であり、当サイトのスタッフに報告してください。
hive_login_msg_register_ok=新しいアカウントを有効化するには、メール受信箱を確認してください！
hive_login_msg_passfiltererror=入力されたパスワードがパスワード規則を満たしていません！
hive_login_msg_mailexist=既に存在するメールアドレスでアカウントを登録しようとしています！
hive_login_password_rules=パスワード規則
hive_login_password_sign=必須文字：
hive_login_password_cap=必須大文字：
hive_login_password_small=必須小文字：
hive_login_password_special=必須特殊文字：
hive_login_password_numeric=必須数字：

# Login Events - Mail Change
hive_login_msg_m_ok=新しいメールアドレスが正常に有効化されました！
hive_login_msg_m_er=新しいメールアドレスを有効化中にエラーが発生しました。再試行してください。
hive_login_msg_m_exp=メール有効化コードの有効期限が切れました！メール変更を再試行してください！
hive_login_msg_m_res=有効化しようとしたメールアドレスは既に他のアカウントで使用されているため、あなたのアカウントには関連付けられません！
hive_login_msg_m_block=アカウントがメール変更をブロックされています！
hive_login_msg_m_noadr=リクエストに失敗しました。後でもう一度お試しください。
hive_login_mc_cmailtext=現在のメールアドレスは：
hive_login_msg_rec_ok=新しいメールアドレスを有効化するには、その受信箱を確認してください。
hive_login_msg_rec_err=メールアドレスの変更中にエラーが発生しました。
hive_login_msg_rec_wait=一定期間、メールアドレスの変更は制限されています。後で再試行してください。
hive_login_msg_rec_exist=変更しようとしているメールアドレスは既に別のユーザーアカウントで使用されています！
hive_login_msg_rec_block=アカウントがメール変更をブロックされています！
hive_login_msg_rec_disable=無効なアカウントのメールアドレスは変更できません！

# Login Mails
hive_login_mail_pre_change=新しいメールを有効化するには、こちらをクリック： <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=新しいメールアドレスを有効化
hive_login_mail_title_register=新しいアカウントを有効化
hive_login_mail_pre_register=アカウントを有効化するには、以下のリンクをクリックしてください： <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=アカウントを回復
hive_login_mail_pre_rec=アカウントパスワードを回復するには、以下のリンクをクリックしてください： <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=アカウントを正常に有効化しました！このサイトのログインページでログインできます。
hive_login_msg_a_er=ユーザーアカウントの有効化中にエラーが発生しました。パスワードを回復するか、新しいアカウントを登録してください。
hive_login_msg_a_exp=有効化トークンが無効です。アカウントを有効化するには、ログインページでアカウントを回復してください！
hive_login_msg_a_block=アカウントの有効化が無効化されています。後でもう一度お試しください！

# Login - Recover Request
hive_login_msg_rr_recnewunk=提供されたメールアドレスは登録されていません。
hive_login_msg_rr_recnope=アカウントにはパスワードを回復する権限がありません！
hive_login_msg_rr_recnopede=アカウントが無効化されているため、新しいリクエストを行うことができません！
hive_login_msg_rr_recwait=不正使用を防ぐため、アカウントの復旧リクエストは制限されています。後で再試行してください。
hive_login_msg_rr_recnok=パスワードリセットメールを受信箱で確認してください。このメールにはパスワードを回復するためのリンクが含まれています。
hive_login_msg_recfr_ok=パスワード回復リンクを取得するには、メール受信箱を確認してください！

# Login - Recover Execute
hive_login_msg_pwtexpire=このパスワード回復トークンの有効期限が切れました！アカウント回復を再試行してください。
hive_login_msg_recexecerror=パスワード回復中にエラーが発生しました。もう一度お試しください。
hive_login_msg_recexecok=パスワードを正常に回復しました。新しいパスワードでログインできます。

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=現在、別のユーザーとしてログインしています。続行すると、行った変更は現在ログインしているアカウントに適用され、ご自身のアカウントには適用されません。
hive_login_msg_passc_enterold=現在のパスワードを入力してください。
hive_login_msg_passc_enternew=新しいパスワードを入力してください。
hive_login_msg_passc_enternewc=新しいパスワードを確認してください。
hive_login_msg_passc_cwrong=入力された現在のパスワードは記録と一致しません。
hive_login_msg_passc_ok=パスワードは正常に変更されました！
hive_login_msg_2fa=アカウントのセキュリティを強化するには、ここで2要素認証（2FA）を設定してください。有効にすると、認証アプリと接続するためのコードとQRコードが表示されます。このセクションから2FAをいつでも有効または無効にできます。
hive_login_msg_2fa_request=2FAコード（有効な場合）
hive_login_msg_2fa_error=アカウントに2FAが有効になっていますが、入力された2FAキーが正しくありません。再度お試しください。

##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=デフォルトのCMSユーザーメール変更サイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=デフォルトのCMSユーザーパスワード変更サイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_RECOVER_=デフォルトのCMSユーザー回復サイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_LOGIN_=デフォルトのCMSユーザーログインサイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_LOGOUT_=デフォルトのCMSユーザーログアウトサイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_REGISTER_=デフォルトのCMSユーザー登録サイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=デフォルトのCMS言語切り替えサイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_MODESWITCH_=デフォルトのCMSフロント/バック切り替えサイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_2FA_=デフォルトのCMSユーザー2FAサイトを有効にしますか？
hive_var-_HIVE_ENABLESITE_ACTIVATE_=デフォルトのCMSユーザーアクティベーションサイトを有効にしますか？
hive_var-_HIVE_LANG_DEFAULT_=デフォルト言語。
hive_var-_REDIS_=Redisの有効状態。
hive_var-_REDIS_HOST_=Redisホスト。
hive_var-_REDIS_PORT_=Redisポート。
hive_var-_SMTP_MAILS_HEADER_=デフォルトのメールヘッダー。
hive_var-_SMTP_MAILS_FOOTER_=デフォルトのメールフッター。
hive_var-_SMTP_SENDER_MAIL_=デフォルト送信者メール。
hive_var-_SMTP_SENDER_NAME_=デフォルト送信者名。
hive_var-_SMTP_MAILS_IN_HTML_=HTML形式でメール送信しますか？
hive_var-_SMTP_INSECURE_=安全でない接続を許可しますか？
hive_var-_SMTP_DEBUG_=メールデバッグ状態（0〜3）。
hive_var-_SMTP_HOST_=メールホスト。
hive_var-_SMTP_PORT_=メールポート。
hive_var-_SMTP_AUTH_=メール認証方式。
hive_var-_SMTP_USER_=メールユーザー名。
hive_var-_SMTP_PASS_=メールパスワード。
hive_var-_USER_MAX_SESSION_=セッションの有効期限（日数）。
hive_var-_USER_TOKEN_TIME_=ユーザートークンの有効時間（分）。
hive_var-_USER_AUTOBLOCK_=失敗回数後に自動でユーザーをブロック。
hive_var-_USER_WAIT_COUNTER_=回復とアクティベーション/登録リクエスト間の待機時間（分）。
hive_var-_USER_LOG_SESSIONS_=期限切れのセッションをログに記録しますか？
hive_var-_USER_LOG_IP_=IPをデータベースに記録しますか？
hive_var-_USER_PF_SIGNS_=パスワードフィルター：記号が必要。
hive_var-_USER_PF_CAPSIGNS_=パスワードフィルター：大文字が必要。
hive_var-_USER_PF_SMSIGNS_=パスワードフィルター：小文字が必要。
hive_var-_USER_PF_SPSIGNS_=パスワードフィルター：特殊記号が必要。
hive_var-_USER_PF_NUMSIGNS_=パスワードフィルター：数字が必要。
hive_var-_UPDATER_CODE_=アップデートマネージャーを実行するためのコード（ruleset.cfgで上書き可能）。
hive_var-_HIVE_CURL_LOGGING_=CURLログを有効にしますか？
hive_var-_HIVE_IP_LIMIT_=IPがブロックされるまでの失敗回数。
hive_var-_HIVE_REFERER_=リファラーのログ機能を有効にしますか？
hive_var-_HIVE_CSRF_TIME_=CSRFトークンの有効時間（秒）。
hive_var-_HIVE_JS_ACTION_ACTIVE_=JavaScriptエラーログスクリプトを有効にしますか？
hive_var-_HIVE_TITLE_=デフォルトのウェブサイトタイトル。
hive_var-_HIVE_TITLE_SPACER_=タブタイトルのデフォルト区切り。
hive_var-_HIVE_PHP_DEBUG_=PHPデバッグモードを有効にしますか？
hive_var-_HIVE_MYSQL_DEBUG_=MySQLデバッグモードを有効にしますか？
hive_var-_HIVE_URL_SEO_=SEOに優しいURLを使いますか？
hive_var-_HIVE_ROBOTS_CREATE_=初期 robots.txt ファイルを作成しますか?
hive_var-_CRON_ENABLE_LOG_=cron 実行プロトコルを有効にしますか?
hive_var-_USER_REC_DROP_=ログインまたはアカウント回復時に旧式のリカバリーキーを削除する
hive_var-_USER_MULTI_LOGIN_=ユーザーごとに複数の同時ログインを許可する
hive_var-_HIVE_BENCHMARK_EXECUTE_=index.phpでベンチマークログを有効にする
hive_var-_HIVE_HITCOUNTER_EXECUTE_=index.phpでヒットカウンターログを有効にする

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=メール
string_password=パスワード
string_close=閉じる
string_delete=削除
string_url=URL
string_name=名前
string_date=日付
string_details=詳細
string_operation=操作
string_add=追加
string_execute=実行
string_executed=実行済み
string_coming_soon=近日公開
string_value=値
string_edit=編集
string_not_available=利用不可
string_identifier=識別子
string_latest_version=最新バージョン
string_description=説明
string_install=インストール
string_framework=フレームワーク
String_internal=内部
string_library=ライブラリ
string_extension=拡張機能
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=プロセスID
string_status=ステータス
string_parameter=パラメーター
string_type=タイプ
string_waiting=待機中
string_done=完了
string_settings=設定
string_deprecated=非推奨
string_theme=テーマ
string_valid=有効
string_invalid=無効
string_general=一般
string_update=更新
string_cleanup=クリーンアップ
string_object=オブジェクト
string_restricted=制限付き
string_confirm=確認
string_reset=リセット
string_logout=ログアウト
string_website=ウェブサイト
string_login=ログイン
string_favicon=ファビコン
string_visibility=表示
string_developer=開発者
string_user=ユーザー
string_redis=Redis
string_cancel=キャンセル
string_local=ローカル
string_online=オンライン
string_save=保存
string_meta=メタ
string_administration=管理
string_block=ブロック
string_unblock=ブロック解除
string_confirmed=確認済み
string_data=データ
string_inheritance=継承
string_relations=関係
string_docker=Docker
string_background_worker=バックグラウンドワーカー
string_refresh=更新
string_token=トークン
string_activate=有効化
string_session=セッション
string_license=ライセンス
string_github=Github
string_documentation=ドキュメント
string_author=作成者
string_switch=切り替え
string_readme=リードミー
string_disabled=無効
string_enabled=有効
string_rename=名前を変更
string_hardlink=ハードリンク
string_create_folder=フォルダを作成
string_location=場所
string_truncate=切り詰める
string_delete_data=データを削除
string_not_found=見つかりません
string_objects=オブジェクト
string_pages=ページ
string_please_wait=お待ちください
string_default=デフォルト
string_register=登録
string_recover=回復
string_notifications=通知
string_calender=カレンダー
string_profile=プロフィール
string_manage=管理
string_view=表示
string_key=キー
string_enable=有効にする
string_disable=無効にする
string_folder=フォルダ
string_version=バージョン
string_visit=訪問
string_module=モジュール
string_style=スタイル
string_low=低
string_medium=中
string_high=高
string_active=アクティブ
string_inactive=非アクティブ
string_upload=アップロード
string_receiver=受信者
string_error=エラー
string_subject=件名
string_delay=遅延
string_memory=メモリ
string_cpu=CPU
string_groups=グループ
string_mail=メール
string_identification=識別
string_permissions=権限
string_websites=ウェブサイト
string_dashboards=ダッシュボード
string_language=言語
string_translation=翻訳
string_empty=空
string_page=ページ
string_include=含める
string_public=公開
string_private=非公開
string_image=画像
string_sort=並べ替え
string_sql_queries=SQLクエリ
string_referer=リファラー
string_hits=ヒット数
string_flush=フラッシュ
string_information=情報
string_tables=テーブル
string_back=戻る
string_field_list=フィールドリスト
string_value_list=値のリスト
string_failures=失敗
string_content=コンテンツ
string_line=行
string_users=ユーザー
string_create=作成
string_privisioned=プロビジョニング済み
string_not_privisioned=未プロビジョニング
string_not_blocked=ブロックされていません
string_blocked=ブロック済み
string_no_login=ログインなし
string_can_login=ログイン可能
string_page_builder=ページビルダー
string_object_builder=オブジェクトビルダー
string_permitted=許可済み
string_yes=はい
string_no=いいえ
string_download=ダウンロード
string_flush_table=テーブルをクリア
string_logging=ログ記録
string_request=リクエスト
string_visits=訪問
string_limit=制限
string_activities=アクティビティ
string_list=リスト
string_show_more=もっと表示
string_show_less=表示を減らす
string_delete_item=アイテムを削除
string_delete_table=テーブルを削除
string_allow_insecure=非安全を許可
string_strict_security=厳格なセキュリティ
string_templates=テンプレート
string_script_path=スクリプトパス
string_cms=CMS
string_token_switch=トークン切替
string_debugging=デバッグ
string_progress=進行状況
string_files=ファイル
string_short_description=短い説明
string_long_description=長い説明
string_creation_operation=作成操作
string_update_operation=更新操作
string_tasks=タスク
string_javascript=JavaScript
string_endpoint=エンドポイント
string_triggers=トリガー
string_builder=ビルダー
string_trace=トレース
string_ip_address=IPアドレス
string_reference=参照
string_videos=ビデオ
string_codename=コードネーム
string_included_libraries=含まれるライブラリ
string_initialized=初期化済み
string_last_use=最終使用
string_creation=作成
string_disable_item=アイテムを無効化
string_enable_item=アイテムを有効化
string_view_item=アイテムを見る
string_core_version=コアバージョン
string_framework_version=フレームワークバージョン
string_module_version=モジュールバージョン
string_php_date=PHP日付
string_mysql_date=MySQL日付
string_php_version=PHPバージョン
string_no_items=アイテムなし
string_back_to_website=ウェブサイトに戻る
string_install_item=アイテムをインストール
string_frontend_switch=フロントエンドスイッチ
string_please_choose_items=アイテムを選択してください
string_upload_in_progress=アップロード中
string_upload_completed=アップロード完了
string_new_password=新しいパスワード
string_current_password=現在のパスワード
string_confirm_new_password=新しいパスワードを確認
string_change_password=パスワードを変更
string_2fa=2要素認証