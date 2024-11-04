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

# Strings - Allgemein
string_email=E-Mail
string_password=Passwort
string_login=Anmelden
string_register=Registrieren
string_close=Schließen

# Seite - Aktionen
login_lostpass=Passwort vergessen?
login_notregistered=Nicht registriert?
login_rememberme=Cookies verwenden?
login_recoveraccount=Konto wiederherstellen
login_haveaccount=Bereits ein Konto?
login_password_confirm=Passwort bestätigen
login_mc_change_mail=E-Mail ändern
login_mc_backtohome=Zurück zur Startseite
login_title_accactivation=Kontenaktivierung

# Login-Ereignisse - Allgemein
hive_login_msg_l_wrong=Falsche Kombination aus Passwort/E-Mail.
hive_login_msg_csrf=Formular abgelaufen, bitte erneut versuchen.
hive_login_msg_empty=Bitte geben Sie die erforderlichen Daten ein!
hive_login_msg_ipban=Ihre IP ist derzeit blockiert; bitte versuchen Sie es später erneut.
hive_login_msg_logout=Sie wurden abgemeldet!
hive_login_msg_nomatchpass=Passwortbestätigung stimmt nicht mit dem eingegebenen Passwort überein.
login_doremember=Möchten Sie Ihr Passwort speichern?

# Login-Ereignisse - Login
hive_login_msg_l_ok=Anmeldung erfolgreich.
hive_login_msg_l_blocked=Sie können sich nicht anmelden, da Ihr Konto gesperrt ist.
hive_login_msg_l_inactive=Ihr Benutzerkonto ist noch nicht aktiviert! Stellen Sie Ihr Passwort wieder her, um Ihr Konto zu aktivieren, oder klicken Sie auf den Link in der Aktivierungs-E-Mail, die Sie erhalten haben!
hive_login_msg_l_blockedpwf=Sie haben zu oft das falsche Passwort eingegeben, und Ihr Konto wurde gesperrt!
hive_login_msg_l_disabled=Ihr Benutzerkonto wurde deaktiviert!
hive_login_mail_serror=Fehler beim Senden der E-Mail. Dies ist ein interner Fehler, der untersucht werden muss und sollte unserem Website-Team gemeldet werden.
hive_login_msg_register_ok=Bitte überprüfen Sie Ihren E-Mail-Posteingang, um Ihr neues Konto zu aktivieren!
hive_login_msg_passfiltererror=Das eingegebene Passwort entspricht nicht den Passwortregeln!
hive_login_msg_mailexist=Sie versuchen, ein Konto mit einer E-Mail zu registrieren, die bereits existiert!
login_password_rules=Passwortregeln
login_password_sign=Erforderliche Zeichen:
login_password_cap=Erforderliche Großbuchstaben:
login_password_small=Erforderliche Kleinbuchstaben:
login_password_special=Erforderliche Sonderzeichen:
login_password_numeric=Erforderliche Ziffern:

# Login-Ereignisse - E-Mail ändern
hive_login_msg_m_ok=Sie haben Ihre neue E-Mail erfolgreich aktiviert!
hive_login_msg_m_er=Fehler beim Aktivieren der neuen E-Mail-Adresse; bitte versuchen Sie es erneut.
hive_login_msg_m_exp=Der E-Mail-Aktivierungscode ist abgelaufen! Bitte versuchen Sie erneut, Ihre E-Mail zu ändern!
hive_login_msg_m_res=Die E-Mail, die Sie aktivieren wollten, wird bereits von einem anderen Konto verwendet und kann daher nicht mit Ihrem Konto verknüpft werden!
hive_login_msg_m_block=Ihr Konto ist für E-Mail-Änderungen gesperrt!
hive_login_msg_m_noadr=Die Anfrage ist fehlgeschlagen. Bitte versuchen Sie es später erneut.
login_mc_cmailtext=Ihre aktuelle E-Mail lautet:
hive_login_msg_rec_ok=Bitte überprüfen Sie den Posteingang der neuen E-Mail, um die neue E-Mail-Adresse zu aktivieren.
hive_login_msg_rec_err=Fehler beim Ändern der E-Mail-Adresse.
hive_login_msg_rec_wait=Sie müssen 120 Minuten warten, bevor Sie die E-Mail erneut ändern können!
hive_login_msg_rec_exist=Die E-Mail, die Sie ändern möchten, wird bereits von einem anderen Benutzerkonto verwendet!
hive_login_msg_rec_block=Ihr Konto ist für E-Mail-Änderungen gesperrt!
hive_login_msg_rec_disable=Sie können die E-Mail eines deaktivierten Kontos nicht ändern!

# Login-E-Mails
hive_login_mail_pre_change=Aktivieren Sie Ihre neue E-Mail hier:
hive_login_mail_title_change=Aktivieren Sie Ihre neue E-Mail
hive_login_mail_title_register=Aktivieren Sie Ihr neues Konto
hive_login_mail_pre_register=Klicken Sie auf den folgenden Link, um Ihr Konto zu aktivieren:
hive_login_mail_title_rec=Stellen Sie Ihr Konto wieder her
hive_login_mail_pre_rec=Klicken Sie auf den folgenden Link, um Ihr Passwort wiederherzustellen:

# Login - Aktivierung
hive_login_msg_a_ok=Sie haben Ihr Konto erfolgreich aktiviert! Sie können sich nun auf den Anmeldeseiten dieser Website anmelden.
hive_login_msg_a_er=Fehler beim Aktivieren des Benutzerkontos. Bitte versuchen Sie, Ihr Passwort wiederherzustellen oder ein neues Konto zu registrieren.
hive_login_msg_a_exp=Das Aktivierungstoken ist ungültig. Bitte stellen Sie Ihr Konto auf der Anmeldeseite wieder her, um Ihr Konto zu aktivieren!
hive_login_msg_a_block=Die Aktivierung für Ihr Konto wurde deaktiviert; bitte versuchen Sie es später erneut!

# Login - Wiederherstellungsanfrage
hive_login_msg_rr_recnewunk=Die angegebene E-Mail ist nicht registriert.
hive_login_msg_rr_recnope=Ihr Konto hat keine Berechtigung zur Passwortwiederherstellung!
hive_login_msg_rr_recnopede=Ihr Konto wurde deaktiviert und kann keine neuen Anfragen stellen!
hive_login_msg_rr_recwait=Sie müssen 120 Minuten warten, bevor Sie eine neue Wiederherstellungsanfrage stellen können!
hive_login_msg_rr_recnok=Bitte überprüfen Sie Ihren Posteingang auf eine Passwort-Reset-E-Mail. Diese E-Mail enthält einen Link zur Wiederherstellung Ihres Passworts.
hive_login_msg_recfr_ok=Bitte überprüfen Sie Ihren E-Mail-Posteingang, um einen Link zur Passwortwiederherstellung zu erhalten!

# Login - Wiederherstellung ausführen
hive_login_msg_pwtexpire=Dieser Passwort-Wiederherstellungstoken ist abgelaufen! Bitte versuchen Sie erneut, Ihr Konto wiederherzustellen.
hive_login_msg_recexecerror=Fehler bei der Wiederherstellung Ihres Passworts. Bitte versuchen Sie erneut, Ihr Konto wiederherzustellen.
hive_login_msg_recexecok=Sie haben Ihr Passwort erfolgreich wiederhergestellt und können sich nun mit Ihrem neuen Passwort anmelden.
