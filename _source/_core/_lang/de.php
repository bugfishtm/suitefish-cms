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

# Seite - Aktionen
hive_login_changelanguage=Sie können die Sprache ändern
hive_login_changelanguage_here=hier.
hive_login_lostpass=Passwort vergessen?
hive_login_notregistered=Nicht registriert?
hive_login_rememberme=Cookies verwenden?
hive_login_recoveraccount=Konto wiederherstellen
hive_login_haveaccount=Bereits ein Konto?
hive_login_password_confirm=Passwort bestätigen
hive_login_mc_change_mail=E-Mail ändern
hive_login_mc_backtohome=Zurück zur Startseite
hive_login_title_accactivation=Kontenaktivierung
hive_cannotenterwhilenologin=Sie können diese Seite nicht betreten, wenn Sie nicht eingeloggt sind!
hive_cannotenterwhilelogin=Sie können diese Seite nicht betreten, wenn Sie eingeloggt sind!
hive_cannotoperatesiteerror=Es liegt ein kritischer Fehler im Modul dieser Seite vor, daher können Sie derzeit keine Aktionen ausführen!
hive_login_backtologin=Zurück zum Login
hive_login_change_Lang=Sprache ändern
hive_login_language_changed=Die Sprache wurde geändert!

# Login-Ereignisse - Allgemein
hive_login_msg_l_wrong=Falsche Passwort/E-Mail-Kombination.
hive_login_msg_csrf=Formular abgelaufen, bitte erneut versuchen.
hive_login_msg_empty=Bitte geben Sie die erforderlichen Daten ein!
hive_login_msg_ipban=Ihre IP ist derzeit gesperrt; bitte versuchen Sie es später erneut.
hive_login_msg_logout=Sie wurden ausgeloggt!
hive_login_msg_nomatchpass=Die Passwortbestätigung stimmt nicht mit dem eingegebenen Passwort überein.
hive_login_doremember=Möchten Sie Ihr Passwort speichern?

# Login-Ereignisse - Login
hive_login_msg_l_ok=Login erfolgreich.
hive_login_msg_l_blocked=Sie können sich nicht einloggen, da Ihr Konto gesperrt ist.
hive_login_msg_l_inactive=Ihr Benutzerkonto ist noch nicht aktiviert! Stellen Sie Ihr Passwort wieder her, um Ihr Konto zu aktivieren, oder klicken Sie auf die URL in der Aktivierungs-E-Mail, die Sie erhalten haben!
hive_login_msg_l_blockedpwf=Sie haben zu oft ein falsches Passwort eingegeben, und Ihr Konto wurde gesperrt!
hive_login_msg_l_disabled=Ihr Benutzerkonto wurde deaktiviert!
hive_login_mail_serror=Fehler beim Versuch, eine E-Mail zu senden. Dies ist ein interner Fehler, der untersucht werden muss und dem Personal unserer Website gemeldet werden sollte.
hive_login_msg_register_ok=Bitte überprüfen Sie Ihren E-Mail-Posteingang, um Ihr neues Konto zu aktivieren!
hive_login_msg_passfiltererror=Das eingegebene Passwort erfüllt nicht die Passwortregeln!
hive_login_msg_mailexist=Sie versuchen, ein Konto mit einer bereits existierenden E-Mail zu registrieren!
hive_login_password_rules=Passwortregeln
hive_login_password_sign=Erforderliche Zeichen:
hive_login_password_cap=Erforderliche Großbuchstaben:
hive_login_password_small=Erforderliche Kleinbuchstaben:
hive_login_password_special=Erforderliche Sonderzeichen:
hive_login_password_numeric=Erforderliche Zahlen:

# Login-Ereignisse - E-Mail-Änderung
hive_login_msg_m_ok=Sie haben Ihre neue E-Mail erfolgreich aktiviert!
hive_login_msg_m_er=Fehler beim Aktivieren der neuen E-Mail-Adresse; bitte versuchen Sie es erneut.
hive_login_msg_m_exp=Der Aktivierungscode für die E-Mail ist abgelaufen! Bitte versuchen Sie erneut, Ihre E-Mail zu ändern!
hive_login_msg_m_res=Die E-Mail, die Sie aktivieren wollten, wird jetzt von einem anderen Konto verwendet und kann daher nicht mit Ihrem Konto verknüpft werden!
hive_login_msg_m_block=Ihr Konto ist für E-Mail-Änderungen gesperrt!
hive_login_msg_m_noadr=Die Anfrage ist fehlgeschlagen. Bitte versuchen Sie es später erneut.
hive_login_mc_cmailtext=Ihre aktuelle E-Mail ist:
hive_login_msg_rec_ok=Bitte überprüfen Sie den Posteingang der neuen E-Mail, um die neue E-Mail-Adresse zu aktivieren.
hive_login_msg_rec_err=Fehler beim Versuch, die E-Mail-Adresse zu ändern.
hive_login_msg_rec_wait=E-Mail-Änderungen sind für einen bestimmten Zeitraum eingeschränkt. Bitte versuchen Sie es später erneut.
hive_login_msg_rec_exist=Die E-Mail, die Sie ändern möchten, wird bereits von einem anderen Benutzerkonto verwendet!
hive_login_msg_rec_block=Ihr Konto ist für E-Mail-Änderungen gesperrt!
hive_login_msg_rec_disable=Sie können die E-Mail eines deaktivierten Kontos nicht ändern!

# Login-Mails
hive_login_mail_pre_change=Aktivieren Sie Ihre neue E-Mail hier: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=Aktivieren Sie Ihre neue E-Mail
hive_login_mail_title_register=Aktivieren Sie Ihr neues Konto
hive_login_mail_pre_register=Klicken Sie auf den folgenden Link, um Ihr Konto zu aktivieren: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=Stellen Sie Ihr Konto wieder her
hive_login_mail_pre_rec=Klicken Sie auf den folgenden Link, um Ihr Passwort wiederherzustellen: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Aktivierung
hive_login_msg_a_ok=Sie haben Ihr Konto erfolgreich aktiviert! Sie können sich jetzt auf dieser Website einloggen.
hive_login_msg_a_er=Fehler beim Versuch, das Benutzerkonto zu aktivieren. Bitte versuchen Sie, Ihr Passwort wiederherzustellen oder ein neues Konto zu registrieren.
hive_login_msg_a_exp=Das Aktivierungstoken ist ungültig. Bitte stellen Sie Ihr Konto auf der Login-Seite wieder her, um Ihr Konto zu aktivieren!
hive_login_msg_a_block=Die Aktivierung für Ihr Konto wurde deaktiviert; bitte versuchen Sie es später erneut!

# Login - Wiederherstellungsanfrage
hive_login_msg_rr_recnewunk=Die angegebene E-Mail ist nicht registriert.
hive_login_msg_rr_recnope=Ihr Konto hat keine Berechtigung, das Passwort wiederherzustellen!
hive_login_msg_rr_recnopede=Ihr Konto wurde deaktiviert und kann keine neuen Anfragen stellen!
hive_login_msg_rr_recwait=Wiederherstellungsanfragen sind zur Vermeidung von Missbrauch begrenzt. Bitte versuchen Sie es später erneut.
hive_login_msg_rr_recnok=Bitte überprüfen Sie Ihren Posteingang auf eine Passwort-Reset-E-Mail. Diese E-Mail enthält einen Link zur Wiederherstellung Ihres Passworts.
hive_login_msg_recfr_ok=Bitte überprüfen Sie Ihren E-Mail-Posteingang, um einen Link zur Passwortwiederherstellung zu erhalten!

# Login - Wiederherstellung ausführen
hive_login_msg_pwtexpire=Dieses Passwort-Wiederherstellungs-Token ist abgelaufen! Bitte versuchen Sie erneut, Ihr Konto wiederherzustellen.
hive_login_msg_recexecerror=Fehler beim Versuch, Ihr Passwort wiederherzustellen. Bitte versuchen Sie erneut, Ihr Konto wiederherzustellen.
hive_login_msg_recexecok=Sie haben Ihr Passwort erfolgreich wiederhergestellt und können sich jetzt mit Ihrem neuen Passwort einloggen.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=Sie sind derzeit als ein anderer Benutzer angemeldet. Wenn Sie fortfahren, wirken sich alle Änderungen auf das Konto aus, mit dem Sie angemeldet sind – nicht auf Ihr eigenes.
hive_login_msg_passc_enterold=Bitte geben Sie Ihr aktuelles Passwort ein.
hive_login_msg_passc_enternew=Bitte geben Sie ein neues Passwort ein.
hive_login_msg_passc_enternewc=Bitte bestätigen Sie Ihr neues Passwort.
hive_login_msg_passc_cwrong=Das eingegebene aktuelle Passwort stimmt nicht mit unseren Unterlagen überein.
hive_login_msg_passc_ok=Ihr Passwort wurde erfolgreich geändert!
hive_login_msg_2fa=Richten Sie hier die Zwei-Faktor-Authentifizierung (2FA) ein, um zusätzliche Sicherheit für Ihr Konto zu erhalten. Bei Aktivierung sehen Sie einen Code und einen QR-Code, um Ihre Authentifizierungs-App zu verbinden. Sie können 2FA jederzeit in diesem Bereich aktivieren oder deaktivieren.
hive_login_msg_2fa_request=2FA-Code (falls aktiviert)
hive_login_msg_2fa_error=Die 2FA ist für Ihr Konto aktiviert. Der eingegebene 2FA-Schlüssel ist nicht korrekt. Bitte versuchen Sie es erneut.


##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=Standard-CMS-Benutzer E-Mail-Änderungsseite aktivieren?
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=Standard-CMS-Benutzer Passwortänderungsseite aktivieren?
hive_var-_HIVE_ENABLESITE_RECOVER_=Standard-CMS-Benutzer Wiederherstellungsseite aktivieren?
hive_var-_HIVE_ENABLESITE_LOGIN_=Standard-CMS-Benutzer Login-Seite aktivieren?
hive_var-_HIVE_ENABLESITE_LOGOUT_=Standard-CMS-Benutzer Logout-Seite aktivieren?
hive_var-_HIVE_ENABLESITE_REGISTER_=Standard-CMS-Benutzer Registrierungsseite aktivieren?
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=Standard-CMS-Sprachwechsel-Seite aktivieren?
hive_var-_HIVE_ENABLESITE_MODESWITCH_=Standard-CMS-Frontend/Backend-Wechselseite aktivieren?
hive_var-_HIVE_ENABLESITE_2FA_=Standard-CMS-Benutzer 2FA-Seite aktivieren?
hive_var-_HIVE_ENABLESITE_ACTIVATE_=Standard-CMS-Benutzeraktivierungsseite aktivieren?
hive_var-_HIVE_LANG_DEFAULT_=Standardsprache.
hive_var-_REDIS_=Redis-Aktivierungsstatus.
hive_var-_REDIS_HOST_=Redis-Host.
hive_var-_REDIS_PORT_=Redis-Port.
hive_var-_SMTP_MAILS_HEADER_=Standard-E-Mail-Kopfzeile.
hive_var-_SMTP_MAILS_FOOTER_=Standard-E-Mail-Fußzeile.
hive_var-_SMTP_SENDER_MAIL_=Standard-Absender-E-Mail.
hive_var-_SMTP_SENDER_NAME_=Standard-Absendername.
hive_var-_SMTP_MAILS_IN_HTML_=E-Mails im HTML-Format senden?
hive_var-_SMTP_INSECURE_=Unsichere Serververbindungen zulassen?
hive_var-_SMTP_DEBUG_=E-Mail-Debug-Status (0-3).
hive_var-_SMTP_HOST_=E-Mail-Host.
hive_var-_SMTP_PORT_=E-Mail-Port.
hive_var-_SMTP_AUTH_=E-Mail-Authentifizierungsmethode.
hive_var-_SMTP_USER_=E-Mail-Benutzername.
hive_var-_SMTP_PASS_=E-Mail-Passwort.
hive_var-_USER_MAX_SESSION_=Sitzungsablaufdatum in Tagen.
hive_var-_USER_TOKEN_TIME_=Ablaufzeit des Benutzertokens in Minuten.
hive_var-_USER_AUTOBLOCK_=Automatisches Blockieren nach fehlgeschlagenen Anmeldungen.
hive_var-_USER_WAIT_COUNTER_=Wartezeit zwischen Wiederherstellungs- und Aktivierungs-/Registrierungsanfragen in Minuten.
hive_var-_USER_LOG_SESSIONS_=Abgelaufene Sitzungen in Datenbank protokollieren?
hive_var-_USER_LOG_IP_=IP-Adressen in der Datenbank protokollieren?
hive_var-_USER_PF_SIGNS_=Passwortfilter: Mindestens Zeichen erforderlich.
hive_var-_USER_PF_CAPSIGNS_=Passwortfilter: Mindestens Großbuchstaben.
hive_var-_USER_PF_SMSIGNS_=Passwortfilter: Mindestens Kleinbuchstaben.
hive_var-_USER_PF_SPSIGNS_=Passwortfilter: Mindestens Sonderzeichen.
hive_var-_USER_PF_NUMSIGNS_=Passwortfilter: Mindestens Zahlen.
hive_var-_UPDATER_CODE_=Code zum Ausführen des Update-Managers erforderlich? (kann durch ruleset.cfg überschrieben werden)
hive_var-_HIVE_CURL_LOGGING_=Curl-Logging aktivieren?
hive_var-_HIVE_IP_LIMIT_=Fehlergrenze für IP-Sperrung.
hive_var-_HIVE_REFERER_=Referer-Protokollierung aktivieren?
hive_var-_HIVE_CSRF_TIME_=Gültigkeitsdauer von CSRF-Token in Sekunden.
hive_var-_HIVE_JS_ACTION_ACTIVE_=JavaScript-Fehlerprotokollierung aktivieren?
hive_var-_HIVE_TITLE_=Standard-Webseitentitel.
hive_var-_HIVE_TITLE_SPACER_=Standard-Webseiten-Tab-Trenner.
hive_var-_HIVE_PHP_DEBUG_=PHP-Debug-Modus aktivieren?
hive_var-_HIVE_MYSQL_DEBUG_=MySQL-Debug-Modus aktivieren?
hive_var-_HIVE_URL_SEO_=SEO-freundliche URLs verwenden?
hive_var-_HIVE_ROBOTS_CREATE_=Initiale robots.txt-Datei erstellen?
hive_var-_CRON_ENABLE_LOG_=Cron-Ausführungsprotokoll aktivieren?
hive_var-_USER_REC_DROP_=Veraltete Wiederherstellungsschlüssel beim Login oder bei der Kontowiederherstellung entfernen
hive_var-_USER_MULTI_LOGIN_=Mehrere gleichzeitige Anmeldungen pro Benutzer zulassen
hive_var-_HIVE_BENCHMARK_EXECUTE_=Benchmark-Protokollierung auf index.php aktivieren
hive_var-_HIVE_HITCOUNTER_EXECUTE_=Aufrufzähler-Protokollierung auf index.php aktivieren

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=E-Mail
string_password=Passwort
string_close=Schließen
string_delete=Löschen
string_url=URL
string_name=Name
string_date=Datum
string_details=Details
string_operation=Vorgang
string_add=Hinzufügen
string_execute=Ausführen
string_executed=Ausgeführt
string_coming_soon=Demnächst
string_value=Wert
string_edit=Bearbeiten
string_not_available=Nicht verfügbar
string_identifier=Kennung
string_latest_version=Neueste Version
string_description=Beschreibung
string_install=Installieren
string_framework=Framework
String_internal=Intern
string_library=Bibliothek
string_extension=Erweiterung
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=Prozess-ID
string_status=Status
string_parameter=Parameter
string_type=Typ
string_waiting=Warten
string_done=Erledigt
string_settings=Einstellungen
string_deprecated=Veraltet
string_theme=Thema
string_valid=Gültig
string_invalid=Ungültig
string_general=Allgemein
string_update=Aktualisieren
string_cleanup=Bereinigen
string_object=Objekt
string_restricted=Eingeschränkt
string_confirm=Bestätigen
string_reset=Zurücksetzen
string_logout=Abmelden
string_website=Webseite
string_login=Anmelden
string_favicon=Favicon
string_visibility=Sichtbarkeit
string_developer=Entwickler
string_user=Benutzer
string_redis=Redis
string_cancel=Abbrechen
string_local=Lokal
string_online=Online
string_save=Speichern
string_meta=Meta
string_administration=Verwaltung
string_block=Blockieren
string_unblock=Entsperren
string_confirmed=Bestätigt
string_data=Daten
string_inheritance=Vererbung
string_relations=Beziehungen
string_docker=Docker
string_background_worker=Hintergrundarbeiter
string_refresh=Aktualisieren
string_token=Token
string_activate=Aktivieren
string_session=Sitzung
string_license=Lizenz
string_github=Github
string_documentation=Dokumentation
string_author=Autor
string_switch=Wechseln
string_readme=Liesmich
string_disabled=Deaktiviert
string_enabled=Aktiviert
string_rename=Umbenennen
string_hardlink=Hardlink
string_create_folder=Ordner Erstellen
string_location=Standort
string_truncate=Abschneiden
string_delete_data=Daten Löschen
string_not_found=Nicht Gefunden
string_objects=Objekte
string_pages=Seiten
string_please_wait=Bitte Warten
string_default=Standard
string_register=Registrieren
string_recover=Wiederherstellen
string_notifications=Benachrichtigungen
string_calender=Kalender
string_profile=Profil
string_manage=Verwalten
string_view=Anzeigen
string_key=Schlüssel
string_enable=Aktivieren
string_disable=Deaktivieren
string_folder=Ordner
string_version=Version
string_visit=Besuchen
string_module=Modul
string_style=Stil
string_low=Niedrig
string_medium=Mittel
string_high=Hoch
string_active=Aktiv
string_inactive=Inaktiv
string_upload=Hochladen
string_receiver=Empfänger
string_error=Fehler
string_subject=Betreff
string_delay=Verzögerung
string_memory=Speicher
string_cpu=CPU
string_groups=Gruppen
string_mail=E-Mail
string_identification=Identifikation
string_permissions=Berechtigungen
string_websites=Websites
string_dashboards=Dashboards
string_language=Sprache
string_translation=Übersetzung
string_empty=Leer
string_page=Seite
string_include=Einfügen
string_public=Öffentlich
string_private=Privat
string_image=Bild
string_sort=Sortieren
string_sql_queries=SQL-Abfragen
string_referer=Verweis
string_hits=Zugriffe
string_flush=Leeren
string_information=Informationen
string_tables=Tabellen
string_back=Zurück
string_field_list=Feldliste
string_value_list=Werteliste
string_failures=Fehler
string_content=Inhalt
string_line=Zeile
string_users=Benutzer
string_create=Erstellen
string_privisioned=Bereitgestellt
string_not_privisioned=Nicht Bereitgestellt
string_not_blocked=Nicht Blockiert
string_blocked=Blockiert
string_no_login=Kein Login
string_can_login=Login Möglich
string_page_builder=Seiten-Builder
string_object_builder=Objekt-Builder
string_permitted=Erlaubt
string_yes=Ja
string_no=Nein
string_download=Herunterladen
string_flush_table=Tabelle Leeren
string_logging=Protokollierung
string_request=Anfrage
string_visits=Besuche
string_limit=Limit
string_activities=Aktivitäten
string_list=Liste
string_show_more=Mehr Anzeigen
string_show_less=Weniger Anzeigen
string_delete_item=Element Löschen
string_delete_table=Tabelle Löschen
string_allow_insecure=Unsicher Erlauben
string_strict_security=Strikte Sicherheit
string_templates=Vorlagen
string_script_path=Skriptpfad
string_cms=CMS
string_token_switch=Token-Schalter
string_debugging=Fehlersuche
string_progress=Fortschritt
string_files=Dateien
string_short_description=Kurze Beschreibung
string_long_description=Lange Beschreibung
string_creation_operation=Erstellungsoperation
string_update_operation=Aktualisierungsoperation
string_tasks=Aufgaben
string_javascript=JavaScript
string_endpoint=Endpunkt
string_triggers=Trigger
string_builder=Builder
string_trace=Spur
string_ip_address=IP-Adresse
string_reference=Referenz
string_videos=Videos
string_codename=Codename
string_included_libraries=Inklusive Bibliotheken
string_initialized=Initialisiert
string_last_use=Letzte Nutzung
string_creation=Erstellung
string_disable_item=Element deaktivieren
string_enable_item=Element aktivieren
string_view_item=Element anzeigen
string_core_version=Core Version
string_framework_version=Framework Version
string_module_version=Modul Version
string_php_date=PHP Datum
string_mysql_date=MySQL Datum
string_php_version=PHP Version
string_no_items=Keine Elemente
string_back_to_website=Zurück zur Webseite
string_install_item=Element installieren
string_frontend_switch=Frontend-Schalter
string_please_choose_items=Bitte wählen Sie Elemente
string_upload_in_progress=Upload läuft
string_upload_completed=Upload abgeschlossen
string_new_password=Neues Passwort
string_current_password=Aktuelles Passwort
string_confirm_new_password=Neues Passwort bestätigen
string_change_password=Passwort ändern
string_2fa=2FA