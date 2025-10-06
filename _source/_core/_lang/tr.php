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
hive_login_changelanguage=Dili değiştirebilirsiniz
hive_login_changelanguage_here=buradan.
hive_login_lostpass=Şifremi unuttum?
hive_login_notregistered=Kayıtlı Değil Misiniz?
hive_login_rememberme=Çerezleri Kullan?
hive_login_recoveraccount=Hesap Kurtarma
hive_login_haveaccount=Zaten Hesabınız Var Mı?
hive_login_password_confirm=Şifreyi Doğrula
hive_login_mc_change_mail=E-Posta Değiştir
hive_login_mc_backtohome=Ana Sayfaya Dön
hive_login_title_accactivation=Hesap Aktivasyonu
hive_cannotenterwhilenologin=Giriş yapmadıysanız bu sayfaya giremezsiniz!
hive_cannotenterwhilelogin=Giriş yaptıysanız bu sayfaya giremezsiniz!
hive_cannotoperatesiteerror=Bu site modülünde kritik bir hata var, bu yüzden şu anda işlem yapamazsınız!
hive_login_backtologin=Giriş Sayfasına Geri Dön
hive_login_change_Lang=Dili Değiştir
hive_login_language_changed=Dil değiştirildi!

# Login Events - General
hive_login_msg_l_wrong=Yanlış Şifre/E-Posta kombinasyonu.
hive_login_msg_csrf=Form süresi dolmuş, lütfen tekrar deneyin.
hive_login_msg_empty=Lütfen gerekli verileri girin!
hive_login_msg_ipban=IP'niz şu anda engellenmiş; lütfen daha sonra tekrar deneyin.
hive_login_msg_logout=Çıkış yaptınız!
hive_login_msg_nomatchpass=Şifre doğrulaması girilen şifreyle uyuşmuyor.
hive_login_doremember=Şifrenizi hatırlamak istiyor musunuz?

# Login Events - Login
hive_login_msg_l_ok=Giriş başarılı.
hive_login_msg_l_blocked=Hesabınız engellendiği için giriş yapamazsınız.
hive_login_msg_l_inactive=Hesabınız henüz aktif edilmemiştir! Hesabınızı etkinleştirmek için şifrenizi kurtarın veya aldığınız aktivasyon E-Postasındaki URL'yi tıklayın!
hive_login_msg_l_blockedpwf=Çok fazla yanlış şifre girdiniz ve hesabınız engellendi!
hive_login_msg_l_disabled=Hesabınız devre dışı bırakıldı!
hive_login_mail_serror=E-Posta gönderme sırasında hata oluştu. Bu, araştırılması gereken dahili bir hatadır ve web sitemizin personeline bildirilmelidir.
hive_login_msg_register_ok=Yeni hesabınızı etkinleştirmek için lütfen E-Posta gelen kutunuzu kontrol edin!
hive_login_msg_passfiltererror=Girilen şifre, şifre kurallarına uymuyor!
hive_login_msg_mailexist=Zaten mevcut bir E-Posta ile hesap kaydettirmeye çalışıyorsunuz!
hive_login_password_rules=Şifre Kuralları
hive_login_password_sign=Gerekli Karakterler:
hive_login_password_cap=Gerekli Büyük Harfler:
hive_login_password_small=Gerekli Küçük Harfler:
hive_login_password_special=Gerekli Özel Karakterler:
hive_login_password_numeric=Gerekli Sayısal Karakterler:

# Login Events - Mail Change
hive_login_msg_m_ok=Yeni E-Postanızı başarıyla etkinleştirdiniz!
hive_login_msg_m_er=Yeni E-Posta adresini etkinleştirme sırasında hata oluştu; lütfen tekrar deneyin.
hive_login_msg_m_exp=E-Posta etkinleştirme kodu süresi dolmuş! Lütfen E-Postanızı değiştirmeyi tekrar deneyin!
hive_login_msg_m_res=Etkinleştirmeye çalıştığınız E-Posta şu anda başka bir hesapta kullanılmakta, bu yüzden hesabınıza bağlanamaz!
hive_login_msg_m_block=Hesabınız E-Posta değişikliklerine engellenmiş!
hive_login_msg_m_noadr=İstek başarısız oldu. Lütfen daha sonra tekrar deneyin.
hive_login_mc_cmailtext=Mevcut E-Postanız:
hive_login_msg_rec_ok=Yeni E-Posta adresinizi etkinleştirmek için lütfen yeni E-Posta gelen kutusunu kontrol edin.
hive_login_msg_rec_err=E-Posta adresini değiştirme sırasında hata oluştu.
hive_login_msg_rec_wait=E-posta değişiklikleri belirli bir süreyle sınırlandırılmıştır. Lütfen daha sonra tekrar deneyin.
hive_login_msg_rec_exist=Değiştirmeye çalıştığınız E-Posta, başka bir kullanıcı hesabı tarafından kullanılmakta!
hive_login_msg_rec_block=Hesabınız E-Posta değişikliklerinden engellenmiş!
hive_login_msg_rec_disable=Devre dışı bırakılmış bir hesabın E-Postasını değiştiremezsiniz!

# Login Mails
hive_login_mail_pre_change=Yeni E-Postanızı burada etkinleştirin: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=Yeni E-Postanızı Etkinleştirin
hive_login_mail_title_register=Yeni Hesabınızı Etkinleştirin
hive_login_mail_pre_register=Hesabınızı etkinleştirmek için aşağıdaki bağlantıya tıklayın: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=Hesabınızı Kurtarın
hive_login_mail_pre_rec=Hesap şifrenizi kurtarmak için aşağıdaki bağlantıya tıklayın: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=Hesabınızı başarıyla etkinleştirdiniz! Şimdi bu web sitesindeki giriş sayfalarımızdan giriş yapabilirsiniz.
hive_login_msg_a_er=Hesap etkinleştirilirken hata oluştu. Lütfen hesabınızın şifresini kurtarmayı deneyin veya yeni bir hesap kaydedin.
hive_login_msg_a_exp=Aktivasyon token'ı geçersiz. Hesabınızı etkinleştirmek için giriş sayfasında hesabınızı kurtarın!
hive_login_msg_a_block=Hesabınızın aktivasyonu devre dışı bırakıldı; lütfen daha sonra tekrar deneyin!

# Login - Recover Request
hive_login_msg_rr_recnewunk=Verilen E-Posta kayıtlı değil.
hive_login_msg_rr_recnope=Hesabınızın şifre kurtarma izni yok!
hive_login_msg_rr_recnopede=Hesabınız devre dışı bırakıldı ve yeni istekler yapamaz!
hive_login_msg_rr_recwait=Kötüye kullanımı önlemek için kurtarma istekleri sınırlandırılmıştır. Lütfen daha sonra tekrar deneyin.
hive_login_msg_rr_recnok=Şifre sıfırlama E-Postasını gelen kutunuzda kontrol edin. Bu E-Posta, şifrenizi kurtarmak için bir bağlantı içerir.
hive_login_msg_recfr_ok=Şifre kurtarma bağlantısı almak için lütfen E-Posta gelen kutunuzu kontrol edin!

# Login - Recover Execute
hive_login_msg_pwtexp=Bu Şifre Kurtarma Token'ı süresi dolmuş! Hesabınızı kurtarmayı tekrar deneyin.
hive_login_msg_recexecerror=Şifrenizi kurtarma sırasında hata oluştu. Hesabınızı kurtarmayı tekrar deneyin.
hive_login_msg_recexecok=Şifrenizi başarıyla kurtardınız ve şimdi yeni şifrenizle giriş yapabilirsiniz.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=Şu anda farklı bir kullanıcı olarak giriş yaptınız. Devam ederseniz, yaptığınız değişiklikler kendi hesabınızı değil, giriş yaptığınız hesabı etkileyecektir.
hive_login_msg_passc_enterold=Lütfen mevcut şifrenizi girin.
hive_login_msg_passc_enternew=Lütfen yeni bir şifre girin.
hive_login_msg_passc_enternewc=Lütfen yeni şifrenizi onaylayın.
hive_login_msg_passc_cwrong=Girdiğiniz mevcut şifre kayıtlarımızla eşleşmiyor.
hive_login_msg_passc_ok=Şifreniz başarıyla değiştirildi!
hive_login_msg_2fa=Hesabınıza ekstra güvenlik eklemek için burada iki faktörlü kimlik doğrulamayı (2FA) ayarlayın. Etkinleştirildiğinde, kimlik doğrulayıcı uygulamanızla bağlantı kurmak için bir kod ve QR kodu görürsünüz. Bu bölümden 2FA’yı istediğiniz zaman etkinleştirebilir veya devre dışı bırakabilirsiniz.
hive_login_msg_2fa_request=2FA Kodu (etkinse)
hive_login_msg_2fa_error=Hesabınızda 2FA etkin, sağladığınız 2FA anahtarı doğru değil, lütfen tekrar deneyin.


##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=Varsayılan CMS Kullanıcı E-Posta Değişim Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=Varsayılan CMS Kullanıcı Şifre Değişim Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_RECOVER_=Varsayılan CMS Kullanıcı Kurtarma Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_LOGIN_=Varsayılan CMS Kullanıcı Giriş Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_LOGOUT_=Varsayılan CMS Kullanıcı Çıkış Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_REGISTER_=Varsayılan CMS Kullanıcı Kayıt Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=Varsayılan CMS Dil Değişim Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_MODESWITCH_=Varsayılan CMS Arayüz/Yönetici Geçiş Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_2FA_=Varsayılan CMS Kullanıcı 2FA Sitesi etkinleştirilsin mi?
hive_var-_HIVE_ENABLESITE_ACTIVATE_=Varsayılan CMS Kullanıcı Aktivasyon Sitesi etkinleştirilsin mi?
hive_var-_HIVE_LANG_DEFAULT_=Varsayılan Dil.
hive_var-_REDIS_=Redis etkinlik durumu.
hive_var-_REDIS_HOST_=Redis Sunucusu.
hive_var-_REDIS_PORT_=Redis Portu.
hive_var-_SMTP_MAILS_HEADER_=Varsayılan E-Posta Başlığı.
hive_var-_SMTP_MAILS_FOOTER_=Varsayılan E-Posta Altbilgisi.
hive_var-_SMTP_SENDER_MAIL_=Varsayılan Gönderen E-Postası.
hive_var-_SMTP_SENDER_NAME_=Varsayılan Gönderen Adı.
hive_var-_SMTP_MAILS_IN_HTML_=E-postalar HTML olarak gönderilsin mi?
hive_var-_SMTP_INSECURE_=Güvensiz sunucu bağlantılarına izin verilsin mi?
hive_var-_SMTP_DEBUG_=E-posta Hata Ayıklama Durumu (0-3).
hive_var-_SMTP_HOST_=E-Posta Sunucusu.
hive_var-_SMTP_PORT_=E-Posta Sunucu Portu.
hive_var-_SMTP_AUTH_=E-Posta Kimlik Doğrulama Yöntemi.
hive_var-_SMTP_USER_=E-Posta Kullanıcı Adı.
hive_var-_SMTP_PASS_=E-Posta Şifresi.
hive_var-_USER_MAX_SESSION_=Oturumun geçerlilik süresi (gün).
hive_var-_USER_TOKEN_TIME_=Kullanıcı Token Geçerlilik Süresi (dakika).
hive_var-_USER_AUTOBLOCK_=Başarısız girişlerden sonra otomatik kullanıcı engelleme.
hive_var-_USER_WAIT_COUNTER_=Kurtarma ve aktivasyon/kayıt talepleri arasında bekleme süresi (dakika).
hive_var-_USER_LOG_SESSIONS_=Süresi dolmuş oturumlar veritabanına kaydedilsin mi?
hive_var-_USER_LOG_IP_=IP adresleri veritabanına kaydedilsin mi?
hive_var-_USER_PF_SIGNS_=Şifre Filtresi: En az sembol gerektirir.
hive_var-_USER_PF_CAPSIGNS_=Şifre Filtresi: En az büyük harf gerektirir.
hive_var-_USER_PF_SMSIGNS_=Şifre Filtresi: En az küçük harf gerektirir.
hive_var-_USER_PF_SPSIGNS_=Şifre Filtresi: En az özel karakter gerektirir.
hive_var-_USER_PF_NUMSIGNS_=Şifre Filtresi: En az sayı gerektirir.
hive_var-_UPDATER_CODE_=Güncelleme yöneticisini çalıştırmak için gerekli kod? (ruleset.cfg tarafından geçersiz kılınabilir)
hive_var-_HIVE_CURL_LOGGING_=Curl günlüğü etkinleştirilsin mi?
hive_var-_HIVE_IP_LIMIT_=IP adresi engellenmeden önceki başarısızlık sınırı.
hive_var-_HIVE_REFERER_=Referer günlüğü işlevi etkinleştirilsin mi?
hive_var-_HIVE_CSRF_TIME_=Formlar için CSRF token geçerlilik süresi (saniye).
hive_var-_HIVE_JS_ACTION_ACTIVE_=JavaScript hata günlüğü eylemi etkinleştirilsin mi?
hive_var-_HIVE_TITLE_=Varsayılan Web Sitesi Başlığı.
hive_var-_HIVE_TITLE_SPACER_=Varsayılan Sekme Ayırıcı.
hive_var-_HIVE_PHP_DEBUG_=PHP Hata Ayıklama Modu etkinleştirilsin mi?
hive_var-_HIVE_MYSQL_DEBUG_=MySQL Hata Ayıklama Modu etkinleştirilsin mi?
hive_var-_HIVE_URL_SEO_=SEO uyumlu URL'ler kullanılsın mı?
hive_var-_HIVE_ROBOTS_CREATE_=Başlangıç robots.txt dosyası oluşturulsun mu?
hive_var-_CRON_ENABLE_LOG_=Cron yürütme protokolü etkinleştirilsin mi?
hive_var-_USER_REC_DROP_=Giriş veya hesap kurtarma sırasında eski kurtarma anahtarlarını kaldır
hive_var-_USER_MULTI_LOGIN_=Kullanıcı başına birden fazla eşzamanlı oturuma izin ver
hive_var-_HIVE_BENCHMARK_EXECUTE_=index.php üzerinde benchmark kaydını etkinleştir
hive_var-_HIVE_HITCOUNTER_EXECUTE_=index.php üzerinde hit sayaç kaydını etkinleştir

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=E-Posta
string_password=Şifre
string_close=Kapat
string_delete=Sil
string_url=URL
string_name=İsim
string_date=Tarih
string_details=Ayrıntılar
string_operation=İşlem
string_add=Ekle
string_execute=Çalıştır
string_executed=Çalıştırıldı
string_coming_soon=Çok Yakında
string_value=Değer
string_edit=Düzenle
string_not_available=Mevcut değil
string_identifier=Tanımlayıcı
string_latest_version=En Son Sürüm
string_description=Açıklama
string_install=Yükle
string_framework=Framework
String_internal=Dahili
string_library=Kütüphane
string_extension=Uzantı
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=İşlem Kimliği
string_status=Durum
string_parameter=Parametre
string_type=Tür
string_waiting=Bekleniyor
string_done=Tamamlandı
string_settings=Ayarlar
string_deprecated=Kullanımdan kaldırıldı
string_theme=Tema
string_valid=Geçerli
string_invalid=Geçersiz
string_general=Genel
string_update=Güncelle
string_cleanup=Temizle
string_object=Nesne
string_restricted=Kısıtlı
string_confirm=Onayla
string_reset=Sıfırla
string_logout=Çıkış Yap
string_website=Web Sitesi
string_login=Giriş Yap
string_favicon=Favicon
string_visibility=Görünürlük
string_developer=Geliştirici
string_user=Kullanıcı
string_redis=Redis
string_cancel=İptal
string_local=Yerel
string_online=Çevrimiçi
string_save=Kaydet
string_meta=Meta
string_administration=Yönetim
string_block=Engelle
string_unblock=Engeli Kaldır
string_confirmed=Onaylandı
string_data=Veri
string_inheritance=Kalıtım
string_relations=İlişkiler
string_docker=Docker
string_background_worker=Arkaplan İşçisi
string_refresh=Yenile
string_token=Jeton
string_activate=Etkinleştir
string_sessionOturum
string_license=Lisans
string_github=Github
string_documentation=Dokümantasyon
string_author=Yazar
string_switch=Değiştir
string_readme=BeniOku
string_disabled=Devre Dışı
string_enabled=Etkin
string_rename=Yeniden Adlandır
string_hardlink=Hardlink
string_create_folder=Klasör Oluştur
string_location=Konum
string_truncate=Kısalt
string_delete_data=Veriyi Sil
string_not_found=Bulunamadı
string_objects=Nesneler
string_pages=Sayfalar
string_please_wait=Lütfen Bekleyin
string_default=Varsayılan
string_register=Kaydol
string_recover=Kurtar
string_notifications=Bildirimler
string_calender=Takvim
string_profile=Profil
string_manage=Yönet
string_view=Görüntüle
string_key=Anahtar
string_enable=Etkinleştir
string_disable=Devre Dışı Bırak
string_folder=Klasör
string_version=Sürüm
string_visit=Ziyaret Et
string_module=Modül
string_style=Stil
string_low=Düşük
string_medium=Orta
string_high=Yüksek
string_active=Aktif
string_inactive=Pasif
string_upload=Yükle
string_receiver=Alıcı
string_error=Hata
string_subject=Konu
string_delay=Gecikme
string_memory=Bellek
string_cpu=CPU
string_groups=Gruplar
string_mail=E-posta
string_identification=Kimlik
string_permissions=İzinler
string_websites=Web siteleri
string_dashboards=Panolar
string_language=Dil
string_translation=Çeviri
string_empty=Boş
string_page=Sayfa
string_include=Dahil et
string_public=Genel
string_private=Özel
string_image=Görüntü
string_sort=Sırala
string_sql_queries=SQL Sorguları
string_referer=Yönlendiren
string_hits=İsabet
string_flush=Temizle
string_information=Bilgi
string_tables=Tablolar
string_back=Geri
string_field_list=Alan Listesi
string_value_list=Değer Listesi
string_failures=Hatalar
string_content=İçerik
string_line=Satır
string_users=Kullanıcılar
string_create=Oluştur
string_privisioned=Sağlandı
string_not_privisioned=Sağlanmadı
string_not_blocked=Engellenmedi
string_blocked=Engellendi
string_no_login=Giriş Yok
string_can_login=Giriş Yapabilir
string_page_builder=Sayfa Oluşturucu
string_object_builder=Nesne Oluşturucu
string_permitted=İzin Verildi
string_yes=Evet
string_no=Hayır
string_download=İndir
string_flush_table=Tabloyu Temizle
string_logging=Günlük Kaydı
string_request=İstek
string_visits=Ziyaretler
string_limit=Sınır
string_activities=Etkinlikler
string_list=Liste
string_show_more=Daha Fazla Göster
string_show_less=Daha Az Göster
string_delete_item=Öğeyi Sil
string_delete_table=Tabloyu Sil
string_allow_insecure=Güvensize İzin Ver
string_strict_security=Katı Güvenlik
string_templates=Şablonlar
string_script_path=Betik Yolu
string_cms=CMS
string_token_switch=Token Değiştirici
string_debugging=Hata Ayıklama
string_progress=İlerleme
string_files=Dosyalar
string_short_description=Kısa Açıklama
string_long_description=Uzun Açıklama
string_creation_operation=Oluşturma İşlemi
string_update_operation=Güncelleme İşlemi
string_tasks=Görevler
string_javascript=JavaScript
string_endpoint=Uç Nokta
string_triggers=Tetikleyiciler
string_builder=Oluşturucu
string_trace=İz
string_ip_address=IP Adresi
string_reference=Referans
string_videos=Videolar
string_codename=Kod Adı
string_included_libraries=Dahil Edilen Kütüphaneler
string_initialized=Başlatıldı
string_last_use=Son Kullanım
string_creation=Oluşturma
string_disable_item=Öğeyi Devre Dışı Bırak
string_enable_item=Öğeyi Etkinleştir
string_view_item=Öğeyi Görüntüle
string_core_version=Çekirdek Sürümü
string_framework_version=Çerçeve Sürümü
string_module_version=Modül Sürümü
string_php_date=PHP Tarihi
string_mysql_date=MySQL Tarihi
string_php_version=PHP Sürümü
string_no_items=Öğe Yok
string_back_to_website=Siteye Geri Dön
string_install_item=Öğeyi Kur
string_frontend_switch=Önyüz Anahtarı
string_please_choose_items=Lütfen Öğeleri Seçin
string_upload_in_progress=Yükleme Devam Ediyor
string_upload_completed=Yükleme Tamamlandı
string_new_password=Yeni Şifre
string_current_password=Mevcut Şifre
string_confirm_new_password=Yeni Şifreyi Onayla
string_change_password=Şifreyi Değiştir
string_2fa=2FA