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
hive_login_changelanguage=언어를 변경할 수 있습니다
hive_login_changelanguage_here=여기에서.
hive_login_lostpass=비밀번호를 잊으셨나요?
hive_login_notregistered=회원이 아니신가요?
hive_login_rememberme=쿠키를 사용하시겠습니까?
hive_login_recoveraccount=계정 복구
hive_login_haveaccount=계정이 이미 있으신가요?
hive_login_password_confirm=비밀번호 확인
hive_login_mc_change_mail=이메일 변경
hive_login_mc_backtohome=홈으로 돌아가기
hive_login_title_accactivation=계정 활성화
hive_cannotenterwhilenologin=로그인하지 않으면 이 페이지에 접근할 수 없습니다!
hive_cannotenterwhilelogin=로그인 상태에서는 이 페이지에 접근할 수 없습니다!
hive_cannotoperatesiteerror=사이트 모듈에 치명적인 오류가 발생하여 현재 작업을 실행할 수 없습니다!
hive_login_backtologin=로그인 화면으로 돌아가기
hive_login_change_Lang=언어 변경
hive_login_language_changed=언어가 변경되었습니다!

# Login Events - General
hive_login_msg_l_wrong=잘못된 비밀번호/이메일 조합입니다.
hive_login_msg_csrf=폼이 만료되었습니다. 다시 시도해주세요.
hive_login_msg_empty=필수 데이터를 입력해주세요!
hive_login_msg_ipban=현재 귀하의 IP가 차단되었습니다. 나중에 다시 시도해주세요.
hive_login_msg_logout=로그아웃되었습니다!
hive_login_msg_nomatchpass=입력한 비밀번호와 비밀번호 확인이 일치하지 않습니다.
hive_login_doremember=비밀번호를 기억하시겠습니까?

# Login Events - Login
hive_login_msg_l_ok=로그인 성공.
hive_login_msg_l_blocked=계정이 차단되어 로그인이 불가능합니다.
hive_login_msg_l_inactive=사용자 계정이 아직 활성화되지 않았습니다! 비밀번호를 복구하여 계정을 활성화하거나 받은 이메일의 URL을 클릭하세요!
hive_login_msg_l_blockedpwf=비밀번호를 너무 많이 잘못 입력하여 계정이 차단되었습니다!
hive_login_msg_l_disabled=사용자 계정이 비활성화되었습니다!
hive_login_mail_serror=이메일 전송 중 오류가 발생했습니다. 이는 내부 오류로, 웹사이트 담당자에게 보고해야 합니다.
hive_login_msg_register_ok=새 계정을 활성화하려면 이메일 받은편지함을 확인하세요!
hive_login_msg_passfiltererror=입력한 비밀번호가 비밀번호 규칙을 충족하지 않습니다!
hive_login_msg_mailexist=이미 존재하는 이메일로 계정을 등록하려고 하고 있습니다!
hive_login_password_rules=비밀번호 규칙
hive_login_password_sign=필수 문자:
hive_login_password_cap=필수 대문자:
hive_login_password_small=필수 소문자:
hive_login_password_special=필수 특수 문자:
hive_login_password_numeric=필수 숫자:

# Login Events - Mail Change
hive_login_msg_m_ok=새 이메일이 성공적으로 활성화되었습니다!
hive_login_msg_m_er=새 이메일 주소를 활성화하는 중 오류가 발생했습니다. 다시 시도해주세요.
hive_login_msg_m_exp=이메일 활성화 코드가 만료되었습니다! 이메일 변경을 다시 시도해주세요.
hive_login_msg_m_res=활성화하려는 이메일이 다른 계정에서 사용 중이어서 귀하의 계정과 연결할 수 없습니다!
hive_login_msg_m_block=귀하의 계정은 이메일 변경이 차단되었습니다!
hive_login_msg_m_noadr=요청이 실패했습니다. 나중에 다시 시도해주세요.
hive_login_mc_cmailtext=현재 이메일은 다음과 같습니다:
hive_login_msg_rec_ok=새 이메일 받은편지함을 확인하여 새 이메일 주소를 활성화하세요.
hive_login_msg_rec_err=이메일 주소 변경 중 오류가 발생했습니다.
hive_login_msg_rec_wait=일정 시간 동안 이메일 변경이 제한됩니다. 나중에 다시 시도해 주세요.
hive_login_msg_rec_exist=변경하려는 이메일이 이미 다른 사용자 계정에서 사용 중입니다!
hive_login_msg_rec_block=귀하의 계정은 이메일 변경이 차단되었습니다!
hive_login_msg_rec_disable=비활성화된 계정의 이메일은 변경할 수 없습니다!

# Login Mails
hive_login_mail_pre_change=새 이메일을 활성화하려면 여기로 이동하세요: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=새 이메일 활성화
hive_login_mail_title_register=새 계정 활성화
hive_login_mail_pre_register=계정을 활성화하려면 다음 링크를 클릭하세요: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=계정 복구
hive_login_mail_pre_rec=계정 비밀번호를 복구하려면 다음 링크를 클릭하세요: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=계정이 성공적으로 활성화되었습니다! 이 웹사이트의 로그인 페이지에서 로그인할 수 있습니다.
hive_login_msg_a_er=사용자 계정을 활성화하는 중 오류가 발생했습니다. 계정 비밀번호를 복구하거나 새 계정을 등록하세요.
hive_login_msg_a_exp=활성화 토큰이 유효하지 않습니다. 계정을 활성화하려면 로그인 페이지에서 계정을 복구하세요!
hive_login_msg_a_block=계정 활성화가 비활성화되었습니다. 나중에 다시 시도해주세요!

# Login - Recover Request
hive_login_msg_rr_recnewunk=제공된 이메일이 등록되어 있지 않습니다.
hive_login_msg_rr_recnope=계정에 비밀번호 복구 권한이 없습니다!
hive_login_msg_rr_recnopede=계정이 비활성화되어 새 요청을 만들 수 없습니다!
hive_login_msg_rr_recwait=오용을 방지하기 위해 복구 요청이 제한됩니다. 나중에 다시 시도해 주세요.
hive_login_msg_rr_recnok=비밀번호 재설정 이메일을 확인하세요. 이 이메일에는 비밀번호를 복구하는 링크가 포함되어 있습니다.
hive_login_msg_recfr_ok=비밀번호 복구 링크를 받으려면 이메일 받은편지함을 확인하세요!

# Login - Recover Execute
hive_login_msg_pwtexpire=비밀번호 복구 토큰이 만료되었습니다! 계정 복구를 다시 시도해주세요.
hive_login_msg_recexecerror=비밀번호를 복구하는 중 오류가 발생했습니다. 계정 복구를 다시 시도해주세요.
hive_login_msg_recexecok=비밀번호를 성공적으로 복구했습니다. 이제 새 비밀번호로 로그인할 수 있습니다.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=현재 다른 사용자로 로그인되어 있습니다. 계속 진행하면 변경 사항은 현재 로그인된 계정에 적용되며, 본인의 계정에는 적용되지 않습니다.
hive_login_msg_passc_enterold=현재 비밀번호를 입력하세요.
hive_login_msg_passc_enternew=새 비밀번호를 입력하세요.
hive_login_msg_passc_enternewc=새 비밀번호를 확인하세요.
hive_login_msg_passc_cwrong=입력한 현재 비밀번호가 기록과 일치하지 않습니다.
hive_login_msg_passc_ok=비밀번호가 성공적으로 변경되었습니다!
hive_login_msg_2fa=계정 보안을 강화하려면 여기에서 2단계 인증(2FA)을 설정하세요. 활성화되면 인증 앱과 연결하기 위한 코드와 QR 코드가 표시됩니다. 이 섹션에서 언제든지 2FA를 활성화하거나 비활성화할 수 있습니다.
hive_login_msg_2fa_request=2FA 코드(활성화된 경우)
hive_login_msg_2fa_error=계정에 2FA가 활성화되어 있으며, 입력하신 2FA 키가 올바르지 않습니다. 다시 시도해 주세요.

##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=기본 CMS 사용자 이메일 변경 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=기본 CMS 사용자 비밀번호 변경 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_RECOVER_=기본 CMS 사용자 복구 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_LOGIN_=기본 CMS 사용자 로그인 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_LOGOUT_=기본 CMS 사용자 로그아웃 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_REGISTER_=기본 CMS 사용자 등록 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=기본 CMS 언어 전환 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_MODESWITCH_=기본 CMS 프론트/백엔드 전환 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_2FA_=기본 CMS 사용자 2FA 사이트를 활성화하시겠습니까?
hive_var-_HIVE_ENABLESITE_ACTIVATE_=기본 CMS 사용자 활성화 사이트를 활성화하시겠습니까?
hive_var-_HIVE_LANG_DEFAULT_=기본 언어.
hive_var-_REDIS_=Redis 활성화 상태.
hive_var-_REDIS_HOST_=Redis 호스트.
hive_var-_REDIS_PORT_=Redis 포트.
hive_var-_SMTP_MAILS_HEADER_=기본 이메일 헤더.
hive_var-_SMTP_MAILS_FOOTER_=기본 이메일 푸터.
hive_var-_SMTP_SENDER_MAIL_=기본 발신자 이메일.
hive_var-_SMTP_SENDER_NAME_=기본 발신자 이름.
hive_var-_SMTP_MAILS_IN_HTML_=HTML 형식으로 이메일 전송?
hive_var-_SMTP_INSECURE_=보안되지 않은 연결 허용?
hive_var-_SMTP_DEBUG_=이메일 디버그 상태 (0-3).
hive_var-_SMTP_HOST_=이메일 호스트.
hive_var-_SMTP_PORT_=이메일 포트.
hive_var-_SMTP_AUTH_=이메일 인증 방식.
hive_var-_SMTP_USER_=이메일 사용자명.
hive_var-_SMTP_PASS_=이메일 비밀번호.
hive_var-_USER_MAX_SESSION_=세션 만료 기간(일).
hive_var-_USER_TOKEN_TIME_=사용자 토큰 만료 시간(분).
hive_var-_USER_AUTOBLOCK_=실패 로그인 횟수 초과 시 자동 차단.
hive_var-_USER_WAIT_COUNTER_=복구 및 등록/활성화 요청 간 대기 시간 (분).
hive_var-_USER_LOG_SESSIONS_=만료된 세션을 데이터베이스에 기록?
hive_var-_USER_LOG_IP_=IP를 데이터베이스에 기록?
hive_var-_USER_PF_SIGNS_=비밀번호 필터: 최소 기호 포함.
hive_var-_USER_PF_CAPSIGNS_=비밀번호 필터: 최소 대문자 포함.
hive_var-_USER_PF_SMSIGNS_=비밀번호 필터: 최소 소문자 포함.
hive_var-_USER_PF_SPSIGNS_=비밀번호 필터: 최소 특수문자 포함.
hive_var-_USER_PF_NUMSIGNS_=비밀번호 필터: 최소 숫자 포함.
hive_var-_UPDATER_CODE_=업데이트 관리자 실행 코드 (ruleset.cfg에서 덮어쓸 수 있음).
hive_var-_HIVE_CURL_LOGGING_=CURL 로깅 활성화?
hive_var-_HIVE_IP_LIMIT_=IP 차단 전 최대 실패 횟수.
hive_var-_HIVE_REFERER_=Referer 로깅 기능 활성화?
hive_var-_HIVE_CSRF_TIME_=CSRF 토큰 유효 시간 (초).
hive_var-_HIVE_JS_ACTION_ACTIVE_=JavaScript 오류 로깅 스크립트 활성화?
hive_var-_HIVE_TITLE_=기본 웹사이트 제목.
hive_var-_HIVE_TITLE_SPACER_=기본 탭 제목 구분자.
hive_var-_HIVE_PHP_DEBUG_=PHP 디버그 모드 활성화?
hive_var-_HIVE_MYSQL_DEBUG_=MySQL 디버그 모드 활성화?
hive_var-_HIVE_URL_SEO_=SEO 친화적인 URL을 사용하시겠습니까?
hive_var-_HIVE_ROBOTS_CREATE_=초기 robots.txt 파일을 생성하시겠습니까?
hive_var-_CRON_ENABLE_LOG_=cron 실행 프로토콜을 활성화하시겠습니까?
hive_var-_USER_REC_DROP_=로그인 또는 계정 복구 시 사용 중단된 복구 키를 제거하기
hive_var-_USER_MULTI_LOGIN_=사용자당 여러 동시 로그인 허용
hive_var-_HIVE_BENCHMARK_EXECUTE_=index.php에서 벤치마크 로깅 활성화
hive_var-_HIVE_HITCOUNTER_EXECUTE_=index.php에서 히트 카운터 로깅 활성화

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=이메일
string_password=비밀번호
string_close=닫기
string_delete=삭제
string_url=URL
string_name=이름
string_date=날짜
string_details=세부사항
string_operation=작업
string_add=추가
string_execute=실행
string_executed=실행됨
string_coming_soon=곧 출시 예정
string_value=값
string_edit=편집
string_not_available=사용 불가
string_identifier=식별자
string_latest_version=최신 버전
string_description=설명
string_install=설치
string_framework=프레임워크
String_internal=내부
string_library=라이브러리
string_extension=확장
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=프로세스 ID
string_status=상태
string_parameter=매개변수
string_type=유형
string_waiting=대기 중
string_done=완료
string_settings=설정
string_deprecated=더 이상 사용되지 않음
string_theme=테마
string_valid=유효함
string_invalid=무효함
string_general=일반
string_update=업데이트
string_cleanup=정리
string_object=객체
string_restricted=제한됨
string_confirm=확인
string_reset=재설정
string_logout=로그아웃
string_website=웹사이트
string_login=로그인
string_favicon=파비콘
string_visibility=가시성
string_developer=개발자
string_user=사용자
string_redis=Redis
string_cancel=취소
string_local=로컬
string_online=온라인
string_save=저장
string_meta=메타
string_administration=관리
string_block=차단
string_unblock=차단 해제
string_confirmed=확인됨
string_data=데이터
string_inheritance=상속
string_relations=관계
string_docker=도커
string_background_worker=백그라운드 작업자
string_refresh=새로 고침
string_token=토큰
string_activate=활성화
string_session=세션
string_license=라이선스
string_github=깃허브
string_documentation=문서
string_author=작성자
string_switch=전환
string_readme=리드미
string_disabled=비활성화됨
string_enabled=활성화됨
string_rename=이름 바꾸기
string_hardlink=하드링크
string_create_folder=폴더 만들기
string_location=위치
string_truncate=잘라내기
string_delete_data=데이터 삭제
string_not_found=찾을 수 없음
string_objects=객체
string_pages=페이지
string_please_wait=잠시 기다려 주세요
string_default=기본값
string_register=등록
string_recover=복구
string_notifications=알림
string_calender=달력
string_profile=프로필
string_manage=관리
string_view=보기
string_key=키
string_enable=활성화
string_disable=비활성화
string_folder=폴더
string_version=버전
string_visit=방문
string_module=모듈
string_style=스타일
string_low=낮음
string_medium=중간
string_high=높음
string_active=활성
string_inactive=비활성
string_upload=업로드
string_receiver=수신자
string_error=오류
string_subject=제목
string_delay=지연
string_memory=메모리
string_cpu=CPU
string_groups=그룹
string_mail=이메일
string_identification=식별
string_permissions=권한
string_websites=웹사이트
string_dashboards=대시보드
string_language=언어
string_translation=번역
string_empty=비어 있음
string_page=페이지
string_include=포함
string_public=공개
string_private=비공개
string_image=이미지
string_sort=정렬
string_sql_queries=SQL 쿼리
string_referer=참조자
string_hits=조회수
string_flush=플러시
string_information=정보
string_tables=테이블
string_back=뒤로
string_field_list=필드 목록
string_value_list=값 목록
string_failures=실패
string_content=콘텐츠
string_line=라인
string_users=사용자
string_create=생성
string_privisioned=프로비저닝됨
string_not_privisioned=프로비저닝되지 않음
string_not_blocked=차단되지 않음
string_blocked=차단됨
string_no_login=로그인 없음
string_can_login=로그인 가능
string_page_builder=페이지 빌더
string_object_builder=오브젝트 빌더
string_permitted=허용됨
string_yes=예
string_no=아니요
string_download=다운로드
string_flush_table=테이블 비우기
string_logging=로깅
string_request=요청
string_visits=방문
string_limit=제한
string_activities=활동
string_list=목록
string_show_more=더 보기
string_show_less=간단히 보기
string_delete_item=항목 삭제
string_delete_table=테이블 삭제
string_allow_insecure=비보안 허용
string_strict_security=엄격한 보안
string_templates=템플릿
string_script_path=스크립트 경로
string_cms=CMS
string_token_switch=토큰 전환
string_debugging=디버깅
string_progress=진행
string_files=파일
string_short_description=간단 설명
string_long_description=상세 설명
string_creation_operation=생성 작업
string_update_operation=업데이트 작업
string_tasks=작업
string_javascript=자바스크립트
string_endpoint=엔드포인트
string_triggers=트리거
string_builder=빌더
string_trace=추적
string_ip_address=IP 주소
string_reference=참조
string_videos=동영상
string_codename=코드명
string_included_libraries=포함된 라이브러리
string_initialized=초기화됨
string_last_use=마지막 사용
string_creation=생성
string_disable_item=항목 비활성화
string_enable_item=항목 활성화
string_view_item=항목 보기
string_core_version=코어 버전
string_framework_version=프레임워크 버전
string_module_version=모듈 버전
string_php_date=PHP 날짜
string_mysql_date=MySQL 날짜
string_php_version=PHP 버전
string_no_items=항목 없음
string_back_to_website=웹사이트로 돌아가기
string_install_item=항목 설치
string_frontend_switch=프론트엔드 스위치
string_please_choose_items=항목을 선택하세요
string_upload_in_progress=업로드 진행 중
string_upload_completed=업로드 완료
string_new_password=새 비밀번호
string_current_password=현재 비밀번호
string_confirm_new_password=새 비밀번호 확인
string_change_password=비밀번호 변경
string_2fa=2단계 인증