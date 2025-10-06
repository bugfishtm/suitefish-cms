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
hive_login_changelanguage=आप भाषा बदल सकते हैं
hive_login_changelanguage_here=यहां.
hive_login_lostpass=पासवर्ड भूल गए?
hive_login_notregistered=पंजीकृत नहीं हैं?
hive_login_rememberme=कुकीज़ का उपयोग करें?
hive_login_recoveraccount=खाता पुनर्प्राप्त करें
hive_login_haveaccount=क्या आपके पास पहले से एक खाता है?
hive_login_password_confirm=पासवर्ड की पुष्टि करें
hive_login_mc_change_mail=ई-मेल बदलें
hive_login_mc_backtohome=मुख्य पृष्ठ पर वापस जाएं
hive_login_title_accactivation=खाता सक्रियण
hive_cannotenterwhilenologin=यदि आप लॉगिन नहीं हैं तो आप इस पृष्ठ पर प्रवेश नहीं कर सकते!
hive_cannotenterwhilelogin=यदि आप लॉगिन हैं तो आप इस पृष्ठ पर प्रवेश नहीं कर सकते!
hive_cannotoperatesiteerror=इस साइट मॉड्यूल में एक गंभीर त्रुटि है, इसलिए आप वर्तमान में कोई भी ऑपरेशन नहीं कर सकते!
hive_login_backtologin=लॉगिन पर वापस जाएं
hive_login_change_Lang=भाषा बदलें
hive_login_language_changed=भाषा बदल दी गई है!

# Login Events - General
hive_login_msg_l_wrong=गलत पासवर्ड/ई-मेल संयोजन.
hive_login_msg_csrf=फॉर्म की समय सीमा समाप्त हो गई है, कृपया पुनः प्रयास करें.
hive_login_msg_empty=कृपया आवश्यक डेटा दर्ज करें!
hive_login_msg_ipban=आपका IP वर्तमान में अवरुद्ध है; कृपया बाद में पुनः प्रयास करें.
hive_login_msg_logout=आपको लॉगआउट कर दिया गया है!
hive_login_msg_nomatchpass=पासवर्ड की पुष्टि दर्ज किए गए पासवर्ड से मेल नहीं खाती.
hive_login_doremember=क्या आप अपना पासवर्ड याद रखना चाहते हैं?

# Login Events - Login
hive_login_msg_l_ok=लॉगिन सफल.
hive_login_msg_l_blocked=आप लॉगिन नहीं कर सकते क्योंकि आपका खाता अवरुद्ध है.
hive_login_msg_l_inactive=आपका उपयोगकर्ता खाता अभी तक सक्रिय नहीं है! अपना पासवर्ड पुनर्प्राप्त करके अपना खाता सक्रिय करें या आपको प्राप्त सक्रियण ई-मेल में दिए गए URL पर क्लिक करें!
hive_login_msg_l_blockedpwf=आपने कई बार गलत पासवर्ड दर्ज किया है, और आपका खाता अवरुद्ध कर दिया गया है!
hive_login_msg_l_disabled=आपका उपयोगकर्ता खाता अक्षम कर दिया गया है!
hive_login_mail_serror=ई-मेल भेजने का प्रयास करते समय त्रुटि हुई. यह एक आंतरिक त्रुटि है जिसे जांचने और हमारी वेबसाइट के कर्मचारियों को सूचित करने की आवश्यकता है.
hive_login_msg_register_ok=कृपया अपना नया खाता सक्रिय करने के लिए अपना ई-मेल इनबॉक्स जांचें!
hive_login_msg_passfiltererror=दर्ज किया गया पासवर्ड पासवर्ड नियमों को पूरा नहीं करता है!
hive_login_msg_mailexist=आप एक ई-मेल के साथ खाता पंजीकृत करने का प्रयास कर रहे हैं जो पहले से मौजूद है!
hive_login_password_rules=पासवर्ड नियम
hive_login_password_sign=आवश्यक अक्षर:
hive_login_password_cap=आवश्यक बड़े अक्षर:
hive_login_password_small=आवश्यक छोटे अक्षर:
hive_login_password_special=आवश्यक विशेष अक्षर:
hive_login_password_numeric=आवश्यक संख्यात्मक अक्षर:

# Login Events - Mail Change
hive_login_msg_m_ok=आपने सफलतापूर्वक अपना नया ई-मेल सक्रिय कर लिया है!
hive_login_msg_m_er=नए ई-मेल पते को सक्रिय करने का प्रयास करते समय त्रुटि; कृपया पुनः प्रयास करें.
hive_login_msg_m_exp=ई-मेल सक्रियण कोड की समय सीमा समाप्त हो गई है! कृपया अपना ई-मेल बदलने का पुनः प्रयास करें!
hive_login_msg_m_res=जिस ई-मेल को आप सक्रिय करने का प्रयास कर रहे हैं, वह अब किसी अन्य खाते में उपयोग हो रहा है, इसलिए इसे आपके खाते से संबद्ध नहीं किया जा सकता!
hive_login_msg_m_block=आपके खाते को ई-मेल परिवर्तन से अवरुद्ध कर दिया गया है!
hive_login_msg_m_noadr=अनुरोध असफल रहा. कृपया बाद में पुनः प्रयास करें.
hive_login_mc_cmailtext=आपका वर्तमान ई-मेल है:
hive_login_msg_rec_ok=कृपया नया ई-मेल इनबॉक्स जांचें ताकि आप नए ई-मेल पते को सक्रिय कर सकें.
hive_login_msg_rec_err=ई-मेल पता बदलने का प्रयास करते समय त्रुटि हुई.
hive_login_msg_rec_wait=कुछ समय के लिए ईमेल परिवर्तन सीमित हैं। कृपया बाद में पुनः प्रयास करें।
hive_login_msg_rec_exist=जिस ई-मेल को आप बदलने का प्रयास कर रहे हैं, वह पहले से किसी अन्य उपयोगकर्ता खाते में उपयोग हो रहा है!
hive_login_msg_rec_block=आपका खाता ई-मेल परिवर्तन से अवरुद्ध है!
hive_login_msg_rec_disable=आप अक्षम खाते का ई-मेल नहीं बदल सकते!

# Login Mails
hive_login_mail_pre_change=अपना नया ई-मेल यहां सक्रिय करें: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=अपना नया ई-मेल सक्रिय करें
hive_login_mail_title_register=अपना नया खाता सक्रिय करें
hive_login_mail_pre_register=अपना खाता सक्रिय करने के लिए निम्नलिखित लिंक पर क्लिक करें: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=अपना खाता पुनर्प्राप्त करें
hive_login_mail_pre_rec=अपना खाता पासवर्ड पुनर्प्राप्त करने के लिए निम्नलिखित लिंक पर क्लिक करें: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=आपने सफलतापूर्वक अपना खाता सक्रिय कर लिया है! अब आप इस वेबसाइट पर हमारे लॉगिन पेज पर लॉगिन कर सकते हैं.
hive_login_msg_a_er=उपयोगकर्ता खाता सक्रिय करने का प्रयास करते समय त्रुटि हुई. कृपया अपना खाता पासवर्ड पुनर्प्राप्त करें या नया खाता पंजीकृत करें.
hive_login_msg_a_exp=सक्रियण टोकन अमान्य है. कृपया अपना खाता सक्रिय करने के लिए लॉगिन पेज पर अपना खाता पुनर्प्राप्त करें!
hive_login_msg_a_block=आपके खाते का सक्रियण अक्षम कर दिया गया है; कृपया बाद में पुनः प्रयास करें!

# Login - Recover Request
hive_login_msg_rr_recnewunk=दिया गया ई-मेल पंजीकृत नहीं है.
hive_login_msg_rr_recnope=आपके खाते को पासवर्ड पुनर्प्राप्त करने की अनुमति नहीं है!
hive_login_msg_rr_recnopede=आपका खाता निष्क्रिय कर दिया गया है और नए अनुरोध नहीं कर सकता!
hive_login_msg_rr_recwait=दुरुपयोग को रोकने के लिए रिकवरी अनुरोध सीमित हैं। कृपया बाद में पुनः प्रयास करें।
hive_login_msg_rr_recnok=कृपया पासवर्ड रीसेट ई-मेल के लिए अपना इनबॉक्स जांचें. इस मेल में आपके पासवर्ड को पुनर्प्राप्त करने के लिए एक लिंक है.
hive_login_msg_recfr_ok=कृपया पासवर्ड पुनर्प्राप्ति लिंक प्राप्त करने के लिए अपना ई-मेल इनबॉक्स जांचें!

# Login - Recover Execute
hive_login_msg_pwtexpire=यह पासवर्ड पुनर्प्राप्ति टोकन समाप्त हो गया है! कृपया अपना खाता पुनर्प्राप्त करने का पुनः प्रयास करें.
hive_login_msg_recexecerror=आपका पासवर्ड पुनर्प्राप्त करने का प्रयास करते समय त्रुटि हुई. कृपया अपना खाता पुनर्प्राप्त करने का पुनः प्रयास करें.
hive_login_msg_recexecok=आपने सफलतापूर्वक अपना पासवर्ड पुनर्प्राप्त कर लिया है और अब आप अपने नए पासवर्ड के साथ लॉगिन कर सकते हैं.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=आप वर्तमान में किसी अन्य उपयोगकर्ता के रूप में लॉग इन हैं। यदि आप आगे बढ़ते हैं, तो किए गए सभी परिवर्तन आपके खाते पर नहीं बल्कि लॉग इन किए गए खाते पर प्रभाव डालेंगे।
hive_login_msg_passc_enterold=कृपया अपना वर्तमान पासवर्ड दर्ज करें।
hive_login_msg_passc_enternew=कृपया एक नया पासवर्ड दर्ज करें।
hive_login_msg_passc_enternewc=कृपया अपने नए पासवर्ड की पुष्टि करें।
hive_login_msg_passc_cwrong=आपका वर्तमान पासवर्ड हमारे रिकॉर्ड से मेल नहीं खाता।
hive_login_msg_passc_ok=आपका पासवर्ड सफलतापूर्वक बदल दिया गया है!
hive_login_msg_2fa=अपने खाते की सुरक्षा बढ़ाने के लिए यहां दो-कारक प्रमाणीकरण (2FA) सेट करें। सक्षम होने पर, आपको एक कोड और एक QR कोड दिखाई देगा जिससे आप अपने ऑथेंटिकेटर ऐप को कनेक्ट कर सकते हैं। आप किसी भी समय इस अनुभाग से 2FA को सक्षम या अक्षम कर सकते हैं।
hive_login_msg_2fa_request=2FA कोड (यदि सक्षम है)
hive_login_msg_2fa_error=आपके खाते पर 2FA सक्षम है, आपका दिया गया 2FA कोड सही नहीं है, कृपया पुनः प्रयास करें।

##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=डिफ़ॉल्ट CMS उपयोगकर्ता ईमेल परिवर्तन साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=डिफ़ॉल्ट CMS उपयोगकर्ता पासवर्ड परिवर्तन साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_RECOVER_=डिफ़ॉल्ट CMS उपयोगकर्ता रिकवरी साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_LOGIN_=डिफ़ॉल्ट CMS उपयोगकर्ता लॉगिन साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_LOGOUT_=डिफ़ॉल्ट CMS उपयोगकर्ता लॉगआउट साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_REGISTER_=डिफ़ॉल्ट CMS उपयोगकर्ता रजिस्ट्रेशन साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=डिफ़ॉल्ट CMS भाषा परिवर्तन साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_MODESWITCH_=डिफ़ॉल्ट CMS फ्रंटएंड/बैकएंड स्विच साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_2FA_=डिफ़ॉल्ट CMS उपयोगकर्ता टू-फैक्टर ऑथेंटिकेशन साइट सक्षम करें।
hive_var-_HIVE_ENABLESITE_ACTIVATE_=डिफ़ॉल्ट CMS उपयोगकर्ता सक्रियण साइट सक्षम करें।
hive_var-_HIVE_LANG_DEFAULT_=डिफ़ॉल्ट भाषा।
hive_var-_REDIS_=Redis सक्रियण स्थिति।
hive_var-_REDIS_HOST_=Redis होस्ट।
hive_var-_REDIS_PORT_=Redis पोर्ट।
hive_var-_SMTP_MAILS_HEADER_=डिफ़ॉल्ट ईमेल हेडर।
hive_var-_SMTP_MAILS_FOOTER_=डिफ़ॉल्ट ईमेल फुटर।
hive_var-_SMTP_SENDER_MAIL_=डिफ़ॉल्ट प्रेषक ईमेल।
hive_var-_SMTP_SENDER_NAME_=डिफ़ॉल्ट प्रेषक नाम।
hive_var-_SMTP_MAILS_IN_HTML_=ईमेल HTML में भेजें?
hive_var-_SMTP_INSECURE_=असुरक्षित सर्वर कनेक्शन की अनुमति दें?
hive_var-_SMTP_DEBUG_=ईमेल डिबग स्थिति (0-3)।
hive_var-_SMTP_HOST_=ईमेल होस्ट।
hive_var-_SMTP_PORT_=ईमेल पोर्ट।
hive_var-_SMTP_AUTH_=ईमेल प्रमाणीकरण विधि।
hive_var-_SMTP_USER_=ईमेल उपयोगकर्ता नाम।
hive_var-_SMTP_PASS_=ईमेल पासवर्ड।
hive_var-_USER_MAX_SESSION_=सत्र समाप्ति समय (दिनों में)।
hive_var-_USER_TOKEN_TIME_=उपयोगकर्ता टोकन समाप्ति समय (मिनटों में)।
hive_var-_USER_AUTOBLOCK_=कई असफल लॉगिन के बाद उपयोगकर्ता को स्वतः ब्लॉक करें।
hive_var-_USER_WAIT_COUNTER_=पुनर्प्राप्ति और पंजीकरण/सक्रियण के बीच प्रतीक्षा समय (मिनटों में)।
hive_var-_USER_LOG_SESSIONS_=डेटाबेस में समाप्त सत्र लॉग करें?
hive_var-_USER_LOG_IP_=डेटाबेस में IP लॉग करें?
hive_var-_USER_PF_SIGNS_=पासवर्ड फ़िल्टर: कम से कम चिह्नों की आवश्यकता है।
hive_var-_USER_PF_CAPSIGNS_=पासवर्ड फ़िल्टर: कम से कम एक बड़ा अक्षर चाहिए।
hive_var-_USER_PF_SMSIGNS_=पासवर्ड फ़िल्टर: कम से कम एक छोटा अक्षर चाहिए।
hive_var-_USER_PF_SPSIGNS_=पासवर्ड फ़िल्टर: कम से कम एक विशेष चिह्न चाहिए।
hive_var-_USER_PF_NUMSIGNS_=पासवर्ड फ़िल्टर: कम से कम एक संख्या चाहिए।
hive_var-_UPDATER_CODE_=अपडेट मैनेजर चलाने के लिए आवश्यक कोड (ruleset.cfg द्वारा ओवरराइड किया जा सकता है)।
hive_var-_HIVE_CURL_LOGGING_=Curl लॉगिंग सक्रिय करें?
hive_var-_HIVE_IP_LIMIT_=ब्लॉक करने से पहले IP पर असफल प्रयासों की सीमा।
hive_var-_HIVE_REFERER_=Referer लॉगिंग फ़ंक्शन सक्षम करें?
hive_var-_HIVE_CSRF_TIME_=CSRF टोकन की वैधता (सेकंडों में)।
hive_var-_HIVE_JS_ACTION_ACTIVE_=JavaScript त्रुटि लॉगिंग स्क्रिप्ट सक्षम करें?
hive_var-_HIVE_TITLE_=डिफ़ॉल्ट वेबसाइट शीर्षक।
hive_var-_HIVE_TITLE_SPACER_=डिफ़ॉल्ट वेबसाइट टैब स्पेसर।
hive_var-_HIVE_PHP_DEBUG_=PHP डिबग मोड सक्षम करें?
hive_var-_HIVE_MYSQL_DEBUG_=MySQL डिबग मोड सक्षम करें?
hive_var-_HIVE_URL_SEO_=SEO के अनुकूल URL का उपयोग करें?
hive_var-_HIVE_ROBOTS_CREATE_=प्रारंभिक robots.txt फ़ाइल बनाएँ?
hive_var-_CRON_ENABLE_LOG_=क्रॉन निष्पादन प्रोटोकॉल सक्षम करें?
hive_var-_USER_REC_DROP_=लॉगिन या खाता पुनर्प्राप्ति पर अप्रचलित रिकवरी कुंजियाँ हटाएँ
hive_var-_USER_MULTI_LOGIN_=प्रति उपयोगकर्ता कई एकसाथ लॉगिन की अनुमति दें
hive_var-_HIVE_BENCHMARK_EXECUTE_=index.php पर बेंचमार्क लॉगिंग सक्षम करें
hive_var-_HIVE_HITCOUNTER_EXECUTE_=index.php पर हिट काउंटर लॉगिंग सक्षम करें

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=ईमेल
string_password=पासवर्ड
string_close=बंद करें
string_delete=हटाएं
string_url=यूआरएल
string_name=नाम
string_date=तारीख
string_details=विवरण
string_operation=क्रिया
string_add=जोड़ें
string_execute=चलाएं
string_executed=चलाया गया
string_coming_soon=जल्द आ रहा है
string_value=मूल्य
string_edit=संपादित करें
string_not_available=उपलब्ध नहीं है
string_identifier=पहचानकर्ता
string_latest_version=नवीनतम संस्करण
string_description=विवरण
string_install=इंस्टॉल करें
string_framework=फ्रेमवर्क
String_internal=आंतरिक
string_library=लाइब्रेरी
string_extension=एक्सटेंशन
string_css=सीएसएस
string_php=पीएचपी
string_mysql=मायएसक्यूएल
string_process_id=प्रक्रिया आईडी
string_status=स्थिति
string_parameter=पैरामीटर
string_type=प्रकार
string_waiting=प्रतीक्षा में
string_done=पूरा हुआ
string_settings=सेटिंग्स
string_deprecated=अप्रचलित
string_theme=थीम
string_valid=वैध
string_invalid=अवैध
string_general=सामान्य
string_update=अपडेट करें
string_cleanup=साफ़ करें
string_object=ऑब्जेक्ट
string_restricted=प्रतिबंधित
string_confirm=पुष्टि करें
string_reset=रीसेट
string_logout=लॉग आउट
string_website=वेबसाइट
string_login=लॉगिन
string_favicon=फेविकॉन
string_visibility=दृश्यता
string_developer=डेवलपर
string_user=उपयोगकर्ता
string_redis=रेडिस
string_cancel=रद्द करें
string_local=स्थानीय
string_online=ऑनलाइन
string_save=सहेजें
string_meta=मेटा
string_administration=प्रशासन
string_block=ब्लॉक करें
string_unblock=ब्लॉक हटाएं
string_confirmed=पुष्ट
string_data=डेटा
string_inheritance=विरासत
string_relations=संबंध
string_docker=डॉकर
string_background_worker=पृष्ठभूमि कार्यकर्ता
string_refresh=रिफ्रेश करें
string_token=टोकन
string_activate=सक्रिय करें
string_session=सत्र
string_license=लाइसेंस
string_github=गिटहब
string_documentation=प्रलेखन
string_author=लेखक
string_switch=स्विच करें
string_readme=रीडमी
string_disabled=अक्षम
string_enabled=सक्रिय
string_rename=नाम बदलें
string_hardlink=हार्डलिंक
string_create_folder=फ़ोल्डर बनाएं
string_location=स्थान
string_truncate=संक्षिप्त करें
string_delete_data=डेटा हटाएं
string_not_found=नहीं मिला
string_objects=वस्तुएं
string_pages=पृष्ठ
string_please_wait=कृपया प्रतीक्षा करें
string_default=डिफ़ॉल्ट
string_register=पंजीकरण करें
string_recover=पुनः प्राप्त करें
string_notifications=सूचनाएं
string_calender=कैलेंडर
string_profile=प्रोफ़ाइल
string_manage=प्रबंधन करें
string_view=देखें
string_key=कुंजी
string_enable=सक्रिय करें
string_disable=अक्षम करें
string_folder=फ़ोल्डर
string_version=संस्करण
string_visit=देखें
string_module=मॉड्यूल
string_style=शैली
string_low=निम्न
string_medium=मध्यम
string_high=उच्च
string_active=सक्रिय
string_inactive=निष्क्रिय
string_upload=अपलोड करें
string_receiver=प्राप्तकर्ता
string_error=त्रुटि
string_subject=विषय
string_delay=विलंब
string_memory=मेमोरी
string_cpu=CPU
string_groups=समूह
string_mail=ईमेल
string_identification=पहचान
string_permissions=अनुमतियाँ
string_websites=वेबसाइट्स
string_dashboards=डैशबोर्ड
string_language=भाषा
string_translation=अनुवाद
string_empty=खाली
string_page=पृष्ठ
string_include=शामिल करें
string_public=सार्वजनिक
string_private=निजी
string_image=छवि
string_sort=क्रमबद्ध करें
string_sql_queries=SQL क्वेरीज़
string_referer=संदर्भकर्ता
string_hits=हिट्स
string_flush=फ़्लश
string_information=जानकारी
string_tables=तालिकाएँ
string_back=वापस
string_field_list=फ़ील्ड सूची
string_value_list=मान सूची
string_failures=विफलताएँ
string_content=सामग्री
string_line=पंक्ति
string_users=उपयोगकर्ता
string_create=सृजन करें
string_privisioned=प्रावधानित
string_not_privisioned=अप्रावधानित
string_not_blocked=अवरोधित नहीं
string_blocked=अवरोधित
string_no_login=लॉगिन नहीं
string_can_login=लॉगिन कर सकते हैं
string_page_builder=पेज बिल्डर
string_object_builder=ऑब्जेक्ट बिल्डर
string_permitted=अनुमति प्राप्त
string_yes=हाँ
string_no=नहीं
string_download=डाउनलोड
string_flush_table=टेबल साफ़ करें
string_logging=लॉगिंग
string_request=अनुरोध
string_visits=दौरे
string_limit=सीमा
string_activities=गतिविधियाँ
string_list=सूची
string_show_more=और दिखाएं
string_show_less=कम दिखाएं
string_delete_item=आइटम हटाएं
string_delete_table=टेबल हटाएं
string_allow_insecure=असुरक्षित की अनुमति दें
string_strict_security=कठोर सुरक्षा
string_templates=टेम्पलेट्स
string_script_path=स्क्रिप्ट पथ
string_cms=CMS
string_token_switch=टोकन स्विच
string_debugging=डीबगिंग
string_progress=प्रगति
string_files=फ़ाइलें
string_short_description=संक्षिप्त विवरण
string_long_description=विस्तृत विवरण
string_creation_operation=निर्माण प्रक्रिया
string_update_operation=अपडेट प्रक्रिया
string_tasks=कार्य
string_javascript=जावास्क्रिप्ट
string_endpoint=एंडपॉइंट
string_triggers=ट्रिगर्स
string_builder=बिल्डर
string_trace=ट्रेस
string_ip_address=आईपी पता
string_reference=संदर्भ
string_videos=वीडियो
string_codename=कोडनाम
string_included_libraries=शामिल लाइब्रेरी
string_initialized=प्रारंभित
string_last_use=अंतिम उपयोग
string_creation=निर्माण
string_disable_item=आइटम निष्क्रिय करें
string_enable_item=आइटम सक्रिय करें
string_view_item=आइटम देखें
string_core_version=कोर संस्करण
string_framework_version=फ्रेमवर्क संस्करण
string_module_version=मॉड्यूल संस्करण
string_php_date=PHP तिथि
string_mysql_date=MySQL तिथि
string_php_version=PHP संस्करण
string_no_items=कोई आइटम नहीं
string_back_to_website=वेबसाइट पर वापस जाएं
string_install_item=आइटम स्थापित करें
string_frontend_switch=फ्रंटएंड स्विच
string_please_choose_items=कृपया आइटम चुनें
string_upload_in_progress=अपलोड प्रगति पर है
string_upload_completed=अपलोड पूरा हुआ
string_new_password=नया पासवर्ड
string_current_password=वर्तमान पासवर्ड
string_confirm_new_password=नया पासवर्ड पुष्टि करें
string_change_password=पासवर्ड बदलें
string_2fa=2FA