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
string_email=E-Mail
string_password=Password
string_login=Accesso
string_register=Registrati
string_close=Chiudi

# Page - Actions
login_lostpass=Password dimenticata?
login_notregistered=Non registrato?
login_rememberme=Usa i cookie?
login_recoveraccount=Recupera Account
login_haveaccount=Hai già un account?
login_password_confirm=Conferma password
login_mc_change_mail=Cambia E-Mail
login_mc_backtohome=Torna alla home
login_title_accactivation=Attivazione Account

# Login Events - General
hive_login_msg_l_wrong=Combinazione E-Mail/Password errata.
hive_login_msg_csrf=Il modulo è scaduto, per favore riprova.
hive_login_msg_empty=Per favore inserisci i dati richiesti!
hive_login_msg_ipban=Il tuo IP è attualmente bloccato; per favore riprova più tardi.
hive_login_msg_logout=Sei stato disconnesso!
hive_login_msg_nomatchpass=La conferma della password non corrisponde alla password inserita.
login_doremember=Vuoi ricordare la tua password?

# Login Events - Login
hive_login_msg_l_ok=Accesso riuscito.
hive_login_msg_l_blocked=Non puoi accedere perché il tuo account è bloccato.
hive_login_msg_l_inactive=Il tuo account utente non è ancora attivato! Recupera la tua password per attivare il tuo account o clicca sul link nell'E-Mail di attivazione che hai ricevuto!
hive_login_msg_l_blockedpwf=Hai inserito la password sbagliata troppe volte, e il tuo account è stato bloccato!
hive_login_msg_l_disabled=Il tuo account utente è stato disabilitato!
hive_login_mail_serror=Errore durante l'invio dell'E-Mail. Questo è un errore interno che deve essere investigato e dovrebbe essere segnalato al nostro staff.
hive_login_msg_register_ok=Controlla la tua casella di posta per attivare il tuo nuovo account!
hive_login_msg_passfiltererror=La password inserita non rispetta le regole di sicurezza!
hive_login_msg_mailexist=Stai cercando di registrare un account con una E-Mail che esiste già!
login_password_rules=Regole per la password
login_password_sign=Caratteri richiesti:
login_password_cap=Lettere maiuscole richieste:
login_password_small=Lettere minuscole richieste:
login_password_special=Caratteri speciali richiesti:
login_password_numeric=Caratteri numerici richiesti:

# Login Events - Mail Change
hive_login_msg_m_ok=Hai attivato con successo la tua nuova E-Mail!
hive_login_msg_m_er=Errore durante l'attivazione del nuovo indirizzo E-Mail; riprova per favore.
hive_login_msg_m_exp=Il codice di attivazione E-Mail è scaduto! Riprova a cambiare la tua E-Mail!
hive_login_msg_m_res=L'E-Mail che stai cercando di attivare è già in uso su un altro account, quindi non può essere associata al tuo account!
hive_login_msg_m_block=Il tuo account è bloccato dal cambiamento dell'E-Mail!
hive_login_msg_m_noadr=La richiesta è fallita. Riprova più tardi.
login_mc_cmailtext=La tua E-Mail attuale è:
hive_login_msg_rec_ok=Controlla la casella di posta della nuova E-Mail per attivare il nuovo indirizzo.
hive_login_msg_rec_err=Errore durante il tentativo di cambiare l'indirizzo E-Mail.
hive_login_msg_rec_wait=Devi aspettare 120 minuti tra i cambiamenti di E-Mail!
hive_login_msg_rec_exist=L'E-Mail che stai cercando di cambiare è già in uso da un altro account utente!
hive_login_msg_rec_block=Il tuo account è bloccato dal cambiamento dell'E-Mail!
hive_login_msg_rec_disable=Non puoi cambiare l'E-Mail di un account disabilitato!

# Login Mails
hive_login_mail_pre_change=Attiva la tua nuova E-Mail qui:
hive_login_mail_title_change=Attiva la tua nuova E-Mail
hive_login_mail_title_register=Attiva il tuo nuovo account
hive_login_mail_pre_register=Clicca sul seguente link per attivare il tuo account:
hive_login_mail_title_rec=Recupera il tuo account
hive_login_mail_pre_rec=Clicca sul seguente link per recuperare la tua password:

# Login - Activation
hive_login_msg_a_ok=Hai attivato con successo il tuo account! Ora puoi accedere alle nostre pagine di login su questo sito.
hive_login_msg_a_er=Errore durante l'attivazione dell'account utente. Per favore prova a recuperare la password del tuo account o registrati per un nuovo account.
hive_login_msg_a_exp=Il token di attivazione non è valido. Per favore recupera il tuo account sulla pagina di login per attivare il tuo account!
hive_login_msg_a_block=L'attivazione per il tuo account è stata disabilitata; riprova più tardi!

# Login - Recover Request
hive_login_msg_rr_recnewunk=L'E-Mail fornita non è registrata.
hive_login_msg_rr_recnope=Il tuo account non ha il permesso di recuperare la password!
hive_login_msg_rr_recnopede=Il tuo account è stato disattivato e non può fare nuove richieste!
hive_login_msg_rr_recwait=Devi aspettare 120 minuti prima di iniziare una nuova richiesta di recupero!
hive_login_msg_rr_recnok=Controlla la tua casella di posta per una E-Mail di reset della password. Questa mail contiene un link per recuperare la tua password.
hive_login_msg_recfr_ok=Controlla la tua casella di posta per ottenere un link di recupero della password!

# Login - Recover Execute
hive_login_msg_pwtexp=Questo token di recupero della password è scaduto! Riprova a recuperare il tuo account.
hive_login_msg_recexecerror=Errore durante il tentativo di recupero della password. Riprova a recuperare il tuo account.
hive_login_msg_recexecok=Hai recuperato con successo la tua password e ora puoi accedere con la nuova password.

