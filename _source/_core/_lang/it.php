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
hive_login_changelanguage=Puoi cambiare la lingua
hive_login_changelanguage_here=qui.
hive_login_lostpass=Password Dimenticata?
hive_login_notregistered=Non Sei Registrato?
hive_login_rememberme=Usare i Cookie?
hive_login_recoveraccount=Recupera Account
hive_login_haveaccount=Hai già un Account?
hive_login_password_confirm=Conferma Password
hive_login_mc_change_mail=Cambia E-Mail
hive_login_mc_backtohome=Ritorna alla Home
hive_login_title_accactivation=Attivazione Account
hive_cannotenterwhilenologin=Non puoi accedere a questa pagina se non sei loggato!
hive_cannotenterwhilelogin=Non puoi accedere a questa pagina se sei già loggato!
hive_cannotoperatesiteerror=C'è un errore critico in questo modulo del sito, quindi attualmente non puoi eseguire alcuna operazione!
hive_login_backtologin=Ritorna al Login
hive_login_change_Lang=Cambia Lingua
hive_login_language_changed=La lingua è stata cambiata!

# Login Events - General
hive_login_msg_l_wrong=Combinazione di Password/E-Mail errata.
hive_login_msg_csrf=Modulo scaduto, riprova.
hive_login_msg_empty=Inserisci i dati richiesti!
hive_login_msg_ipban=Il tuo IP è attualmente bloccato; riprova più tardi.
hive_login_msg_logout=Sei stato disconnesso!
hive_login_msg_nomatchpass=La conferma della password non corrisponde alla password inserita.
hive_login_doremember=Vuoi ricordare la tua password?

# Login Events - Login
hive_login_msg_l_ok=Accesso riuscito.
hive_login_msg_l_blocked=Non puoi accedere perché il tuo account è bloccato.
hive_login_msg_l_inactive=Il tuo account utente non è ancora attivato! Recupera la tua password per attivare il tuo account o clicca il link nell'E-Mail di attivazione che hai ricevuto!
hive_login_msg_l_blockedpwf=Hai inserito troppe volte la password sbagliata e il tuo account è stato bloccato!
hive_login_msg_l_disabled=Il tuo account utente è stato disabilitato!
hive_login_mail_serror=Errore durante il tentativo di inviare l'E-Mail. Questo è un errore interno che deve essere indagato e segnalato al personale del nostro sito web.
hive_login_msg_register_ok=Controlla la tua casella di posta elettronica per attivare il tuo nuovo account!
hive_login_msg_passfiltererror=La password inserita non soddisfa le regole per le password!
hive_login_msg_mailexist=Stai tentando di registrare un account con un'E-Mail già esistente!
hive_login_password_rules=Regole per la Password
hive_login_password_sign=Caratteri Richiesti:
hive_login_password_cap=Lettere Maiuscole Richieste:
hive_login_password_small=Lettere Minuscole Richieste:
hive_login_password_special=Caratteri Speciali Richiesti:
hive_login_password_numeric=Caratteri Numerici Richiesti:

# Login Events - Mail Change
hive_login_msg_m_ok=Hai attivato con successo la tua nuova E-Mail!
hive_login_msg_m_er=Errore durante l'attivazione del nuovo indirizzo E-Mail; riprova.
hive_login_msg_m_exp=Il codice di attivazione E-Mail è scaduto! Riprova a cambiare la tua E-Mail!
hive_login_msg_m_res=L'E-Mail che hai provato ad attivare è ora utilizzata da un altro account, quindi non può essere associata al tuo account!
hive_login_msg_m_block=Il tuo account è bloccato per i cambiamenti di E-Mail!
hive_login_msg_m_noadr=La richiesta è fallita. Riprova più tardi.
hive_login_mc_cmailtext=La tua E-Mail attuale è:
hive_login_msg_rec_ok=Controlla la nuova casella di posta elettronica per attivare il nuovo indirizzo E-Mail.
hive_login_msg_rec_err=Errore durante il tentativo di cambiare l'indirizzo E-Mail.
hive_login_msg_rec_wait=Le modifiche all'email sono limitate per un certo periodo di tempo. Per favore riprova più tardi.
hive_login_msg_rec_exist=L'E-Mail che stai tentando di cambiare è già utilizzata da un altro account!
hive_login_msg_rec_block=Il tuo account è bloccato per i cambiamenti di E-Mail!
hive_login_msg_rec_disable=Non puoi cambiare l'E-Mail di un account disabilitato!

# Login Mails
hive_login_mail_pre_change=Attiva la tua nuova mail qui: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=Attiva la Tua Nuova E-Mail
hive_login_mail_title_register=Attiva il Tuo Nuovo Account
hive_login_mail_pre_register=Clicca il seguente link per attivare il tuo account: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=Recupera il Tuo Account
hive_login_mail_pre_rec=Clicca il seguente link per recuperare la password del tuo account: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=Hai attivato con successo il tuo account! Ora puoi accedere alle nostre pagine di login su questo sito.
hive_login_msg_a_er=Errore durante il tentativo di attivare l'account utente. Prova a recuperare la password del tuo account o registrane uno nuovo.
hive_login_msg_a_exp=Il token di attivazione non è valido. Recupera il tuo account nella pagina di login per attivare il tuo account!
hive_login_msg_a_block=L'attivazione per il tuo account è stata disabilitata; riprova più tardi!

# Login - Recover Request
hive_login_msg_rr_recnewunk=L'E-Mail fornita non è registrata.
hive_login_msg_rr_recnope=Il tuo account non ha il permesso di recuperare la password!
hive_login_msg_rr_recnopede=Il tuo account è stato disattivato e non può effettuare nuove richieste!
hive_login_msg_rr_recwait=Le richieste di recupero sono limitate per prevenire abusi. Per favore riprova più tardi.
hive_login_msg_rr_recnok=Controlla la tua casella di posta per un'E-Mail di reset della password. Questa mail contiene un link per recuperare la tua password.
hive_login_msg_recfr_ok=Controlla la tua casella di posta elettronica per ottenere un link per il recupero della password!

# Login - Recover Execute
hive_login_msg_pwtexpire=Questo Token per il Recupero della Password è scaduto! Riprova a recuperare il tuo account.
hive_login_msg_recexecerror=Errore durante il tentativo di recuperare la password. Prova di nuovo a recuperare il tuo account.
hive_login_msg_recexecok=Hai recuperato con successo la tua password e ora puoi accedere con la tua nuova password.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=Sei attualmente connesso come un altro utente. Se procedi, le modifiche influenzeranno l'account con cui sei attualmente connesso, non il tuo.
hive_login_msg_passc_enterold=Inserisci la tua password attuale.
hive_login_msg_passc_enternew=Inserisci una nuova password.
hive_login_msg_passc_enternewc=Conferma la nuova password.
hive_login_msg_passc_cwrong=La password attuale inserita non corrisponde ai nostri registri.
hive_login_msg_passc_ok=La tua password è stata cambiata con successo!
hive_login_msg_2fa=Imposta l'autenticazione a due fattori (2FA) qui per aggiungere ulteriore sicurezza al tuo account. Quando abilitata, vedrai un codice e un QR code per collegare la tua app di autenticazione. Puoi attivare o disattivare la 2FA in qualsiasi momento da questa sezione.
hive_login_msg_2fa_request=Codice 2FA (se abilitato)
hive_login_msg_2fa_error=La 2FA è attiva sul tuo account, la chiave 2FA fornita non è corretta. Riprova.

##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=Abilita il sito di modifica email dell'utente CMS predefinito.
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=Abilita il sito di modifica password dell'utente CMS predefinito.
hive_var-_HIVE_ENABLESITE_RECOVER_=Abilita il sito di recupero dell'utente CMS predefinito.
hive_var-_HIVE_ENABLESITE_LOGIN_=Abilita il sito di accesso dell'utente CMS predefinito.
hive_var-_HIVE_ENABLESITE_LOGOUT_=Abilita il sito di disconnessione dell'utente CMS predefinito.
hive_var-_HIVE_ENABLESITE_REGISTER_=Abilita il sito di registrazione dell'utente CMS predefinito.
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=Abilita il sito di cambio lingua CMS predefinito.
hive_var-_HIVE_ENABLESITE_MODESWITCH_=Abilita il sito di cambio modalità frontend/backend CMS predefinito.
hive_var-_HIVE_ENABLESITE_2FA_=Abilita il sito CMS di autenticazione a due fattori.
hive_var-_HIVE_ENABLESITE_ACTIVATE_=Abilita il sito di attivazione dell'utente CMS predefinito.
hive_var-_HIVE_LANG_DEFAULT_=Lingua predefinita.
hive_var-_REDIS_=Stato di attivazione di Redis.
hive_var-_REDIS_HOST_=Host Redis.
hive_var-_REDIS_PORT_=Porta Redis.
hive_var-_SMTP_MAILS_HEADER_=Intestazione email predefinita.
hive_var-_SMTP_MAILS_FOOTER_=Piè di pagina email predefinito.
hive_var-_SMTP_SENDER_MAIL_=Email del mittente predefinita.
hive_var-_SMTP_SENDER_NAME_=Nome del mittente predefinito.
hive_var-_SMTP_MAILS_IN_HTML_=Inviare email in HTML?
hive_var-_SMTP_INSECURE_=Consentire connessioni server non sicure?
hive_var-_SMTP_DEBUG_=Stato debug email (0-3).
hive_var-_SMTP_HOST_=Host email.
hive_var-_SMTP_PORT_=Porta email.
hive_var-_SMTP_AUTH_=Metodo di autenticazione email.
hive_var-_SMTP_USER_=Nome utente email.
hive_var-_SMTP_PASS_=Password email.
hive_var-_USER_MAX_SESSION_=Scadenza sessione in giorni.
hive_var-_USER_TOKEN_TIME_=Scadenza token utente in minuti.
hive_var-_USER_AUTOBLOCK_=Blocca automaticamente gli utenti dopo un certo numero di accessi falliti.
hive_var-_USER_WAIT_COUNTER_=Tempo di attesa tra richieste di recupero e registrazione/attivazione in minuti.
hive_var-_USER_LOG_SESSIONS_=Registrare le sessioni scadute nel database?
hive_var-_USER_LOG_IP_=Registrare gli IP nel database?
hive_var-_USER_PF_SIGNS_=Filtro password: Richiede almeno dei caratteri.
hive_var-_USER_PF_CAPSIGNS_=Filtro password: Richiede almeno lettere maiuscole.
hive_var-_USER_PF_SMSIGNS_=Filtro password: Richiede almeno lettere minuscole.
hive_var-_USER_PF_SPSIGNS_=Filtro password: Richiede almeno caratteri speciali.
hive_var-_USER_PF_NUMSIGNS_=Filtro password: Richiede almeno numeri.
hive_var-_UPDATER_CODE_=Codice richiesto per eseguire il gestore di aggiornamenti (può essere sovrascritto da ruleset.cfg).
hive_var-_HIVE_CURL_LOGGING_=Attivare il logging Curl?
hive_var-_HIVE_IP_LIMIT_=Limite di errori prima di bloccare gli IP.
hive_var-_HIVE_REFERER_=Abilitare la registrazione dei referer?
hive_var-_HIVE_CSRF_TIME_=Tempo di validità dei token CSRF in secondi.
hive_var-_HIVE_JS_ACTION_ACTIVE_=Abilitare lo script di logging degli errori JavaScript?
hive_var-_HIVE_TITLE_=Titolo predefinito del sito web.
hive_var-_HIVE_TITLE_SPACER_=Spaziatore predefinito per la scheda del sito.
hive_var-_HIVE_PHP_DEBUG_=Attivare la modalità di debug PHP?
hive_var-_HIVE_MYSQL_DEBUG_=Attivare la modalità di debug MySQL?
hive_var-_HIVE_URL_SEO_=Utilizzare URL ottimizzati per la SEO?
hive_var-_HIVE_ROBOTS_CREATE_=Creare il file robots.txt iniziale?
hive_var-_CRON_ENABLE_LOG_=Abilitare il protocollo di esecuzione cron?
hive_var-_USER_REC_DROP_=Rimuovere le chiavi di recupero deprecate al login o al recupero dell'account
hive_var-_USER_MULTI_LOGIN_=Consentire più accessi simultanei per utente
hive_var-_HIVE_BENCHMARK_EXECUTE_=Abilitare la registrazione del benchmark su index.php
hive_var-_HIVE_HITCOUNTER_EXECUTE_=Abilitare la registrazione del contatore di accessi su index.php

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=Email
string_password=Password
string_close=Chiudi
string_delete=Elimina
string_url=URL
string_name=Nome
string_date=Data
string_details=Dettagli
string_operation=Operazione
string_add=Aggiungi
string_execute=Esegui
string_executed=Eseguito
string_coming_soon=Prossimamente
string_value=Valore
string_edit=Modifica
string_not_available=Non disponibile
string_identifier=Identificatore
string_latest_version=Ultima versione
string_description=Descrizione
string_install=Installa
string_framework=Framework
String_internal=Interno
string_library=Libreria
string_extension=Estensione
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=ID processo
string_status=Stato
string_parameter=Parametro
string_type=Tipo
string_waiting=In attesa
string_done=Completato
string_settings=Impostazioni
string_deprecated=Deprecato
string_theme=Tema
string_valid=Valido
string_invalid=Non valido
string_general=Generale
string_update=Aggiorna
string_cleanup=Pulizia
string_object=Oggetto
string_restricted=Limitato
string_confirm=Conferma
string_reset=Ripristina
string_logout=Disconnetti
string_website=Sito web
string_login=Accedi
string_favicon=Favicon
string_visibility=Visibilità
string_developer=Sviluppatore
string_user=Utente
string_redis=Redis
string_cancel=Annulla
string_local=Locale
string_online=Online
string_save=Salva
string_meta=Meta
string_administration=Amministrazione
string_block=Blocca
string_unblock=Sblocca
string_confirmed=Confermato
string_data=Dati
string_inheritance=Eredità
string_relations=Relazioni
string_docker=Docker
string_background_worker=Lavoratore in background
string_refresh=Aggiorna
string_token=Token
string_activate=Attiva
string_session=Sessione
string_license=Licenza
string_github=Github
string_documentation=Documentazione
string_author=Autore
string_switch=Cambia
string_readme=Leggimi
string_disabled=Disabilitato
string_enabled=Abilitato
string_rename=Rinomina
string_hardlink=Collegamento Fisico
string_create_folder=Crea Cartella
string_location=Posizione
string_truncate=Tronca
string_delete_data=Elimina Dati
string_not_found=Non Trovato
string_objects=Oggetti
string_pages=Pagine
string_please_wait=Attendere Prego
string_default=Predefinito
string_register=Registrati
string_recover=Recupera
string_notifications=Notifiche
string_calender=Calendario
string_profile=Profilo
string_manage=Gestisci
string_view=Visualizza
string_key=Chiave
string_enable=Abilita
string_disable=Disabilita
string_folder=Cartella
string_version=Versione
string_visit=Visita
string_module=Modulo
string_style=Stile
string_low=Basso
string_medium=Medio
string_high=Alto
string_active=Attivo
string_inactive=Inattivo
string_upload=Carica
string_receiver=Destinatario
string_error=Errore
string_subject=Oggetto
string_delay=Ritardo
string_memory=Memoria
string_cpu=CPU
string_groups=Gruppi
string_mail=Email
string_identification=Identificazione
string_permissions=Permessi
string_websites=Siti web
string_dashboards=Cruscotti
string_language=Lingua
string_translation=Traduzione
string_empty=Vuoto
string_page=Pagina
string_include=Includi
string_public=Pubblico
string_private=Privato
string_image=Immagine
string_sort=Ordina
string_sql_queries=Query SQL
string_referer=Referente
string_hits=Visite
string_flush=Svuota
string_information=Informazioni
string_tables=Tabelle
string_back=Indietro
string_field_list=Elenco campi
string_value_list=Elenco valori
string_failures=Errori
string_content=Contenuto
string_line=Riga
string_users=Utenti
string_create=Crea
string_privisioned=Provisionato
string_not_privisioned=Non Provisionato
string_not_blocked=Non Bloccato
string_blocked=Bloccato
string_no_login=Nessun Accesso
string_can_login=Può Accedere
string_page_builder=Costruttore di Pagine
string_object_builder=Costruttore di Oggetti
string_permitted=Permesso
string_yes=Sì
string_no=No
string_download=Scarica
string_flush_table=Svuota Tabella
string_logging=Registrazione
string_request=Richiesta
string_visits=Visite
string_limit=Limite
string_activities=Attività
string_list=Elenco
string_show_more=Mostra di Più
string_show_less=Mostra di Meno
string_delete_item=Elimina Voce
string_delete_table=Elimina Tabella
string_allow_insecure=Consenti Non Sicuro
string_strict_security=Sicurezza Rigorosa
string_templates=Modelli
string_script_path=Percorso Script
string_cms=CMS
string_token_switch=Interruttore Token
string_debugging=Debugging
string_progress=Progresso
string_files=File
string_short_description=Descrizione Breve
string_long_description=Descrizione Lunga
string_creation_operation=Operazione di Creazione
string_update_operation=Operazione di Aggiornamento
string_tasks=Attività
string_javascript=JavaScript
string_endpoint=Endpoint
string_triggers=Trigger
string_builder=Costruttore
string_trace=Traccia
string_ip_address=Indirizzo IP
string_reference=Riferimento
string_videos=Video
string_codename=Nome in Codice
string_included_libraries=Librerie Incluse
string_initialized=Inizializzato
string_last_use=Ultimo Utilizzo
string_creation=Creazione
string_disable_item=Disabilita Elemento
string_enable_item=Abilita Elemento
string_view_item=Visualizza Elemento
string_core_version=Versione Core
string_framework_version=Versione Framework
string_module_version=Versione Modulo
string_php_date=Data PHP
string_mysql_date=Data MySQL
string_php_version=Versione PHP
string_no_items=Nessun Elemento
string_back_to_website=Indietro al Sito
string_install_item=Installa Elemento
string_frontend_switch=Interruttore Frontend
string_please_choose_items=Per favore scegli Elementi
string_upload_in_progress=Caricamento in Corso
string_upload_completed=Caricamento Completato
string_new_password=Nuova password
string_current_password=Password attuale
string_confirm_new_password=Conferma nuova password
string_change_password=Cambia password
string_2fa=2FA