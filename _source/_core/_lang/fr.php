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
string_password=Mot de passe
string_login=Se connecter
string_register=S'inscrire
string_close=Fermer

# Page - Actions
login_lostpass=Mot de passe oublié ?
login_notregistered=Pas encore inscrit ?
login_rememberme=Utiliser les cookies ?
login_recoveraccount=Récupérer le compte
login_haveaccount=Vous avez déjà un compte ?
login_password_confirm=Confirmer le mot de passe
login_mc_change_mail=Changer l'E-Mail
login_mc_backtohome=Retour à l'accueil
login_title_accactivation=Activation du compte

# Login Events - General
hive_login_msg_l_wrong=Combinaison E-Mail/Mot de passe incorrecte.
hive_login_msg_csrf=Le formulaire a expiré, veuillez réessayer.
hive_login_msg_empty=Veuillez entrer les données requises !
hive_login_msg_ipban=Votre adresse IP est actuellement bloquée, veuillez réessayer plus tard.
hive_login_msg_logout=Vous avez été déconnecté !
hive_login_msg_nomatchpass=La confirmation du mot de passe ne correspond pas au mot de passe saisi.
login_doremember=Voulez-vous vous souvenir de votre mot de passe ?

# Login Events - Login
hive_login_msg_l_ok=Connexion réussie.
hive_login_msg_l_blocked=Vous ne pouvez pas vous connecter car votre compte est bloqué.
hive_login_msg_l_inactive=Votre compte utilisateur n'est pas encore activé ! Récupérez votre mot de passe pour activer votre compte ou cliquez sur l'URL dans l'E-Mail d'activation que vous avez reçu !
hive_login_msg_l_blockedpwf=Vous avez saisi le mauvais mot de passe trop de fois et votre compte a été bloqué !
hive_login_msg_l_disabled=Votre compte utilisateur a été désactivé !
hive_login_mail_serror=Erreur lors de l'envoi de l'E-Mail. C'est une erreur interne qui doit être investiguée et signalée à notre équipe de support.
hive_login_msg_register_ok=Veuillez vérifier votre boîte de réception pour activer votre nouveau compte !
hive_login_msg_passfiltererror=Le mot de passe saisi ne respecte pas les règles de sécurité !
hive_login_msg_mailexist=Vous tentez d'enregistrer un compte avec un E-Mail qui existe déjà !
login_password_rules=Règles du mot de passe
login_password_sign=Caractères requis :
login_password_cap=Lettres majuscules requises :
login_password_small=Lettres minuscules requises :
login_password_special=Caractères spéciaux requis :
login_password_numeric=Caractères numériques requis :

# Login Events - Mail Change
hive_login_msg_m_ok=Vous avez activé avec succès votre nouveau E-Mail !
hive_login_msg_m_er=Erreur lors de l'activation du nouvel E-Mail, veuillez réessayer.
hive_login_msg_m_exp=Le code d'activation de l'E-Mail a expiré ! Veuillez réessayer de changer votre E-Mail !
hive_login_msg_m_res=L'E-Mail que vous avez essayé d'activer est déjà utilisé sur un autre compte, il ne peut donc pas être associé à votre compte !
hive_login_msg_m_block=Votre compte est bloqué pour les changements d'E-Mail !
hive_login_msg_m_noadr=La demande a échoué. Veuillez réessayer plus tard.
login_mc_cmailtext=Votre E-Mail actuelle est :
hive_login_msg_rec_ok=Veuillez vérifier la boîte de réception de votre nouveau E-Mail pour activer l'adresse E-Mail.
hive_login_msg_rec_err=Erreur lors de la tentative de changement d'E-Mail.
hive_login_msg_rec_wait=Vous devez attendre 120 minutes entre les changements d'E-Mail !
hive_login_msg_rec_exist=L'E-Mail que vous tentez de changer est déjà utilisée par un autre compte utilisateur !
hive_login_msg_rec_block=Votre compte est bloqué pour les changements d'E-Mail !
hive_login_msg_rec_disable=Vous ne pouvez pas changer l'E-Mail d'un compte désactivé !

# Login Mails
hive_login_mail_pre_change=Activez votre nouvel E-Mail ici :
hive_login_mail_title_change=Activez votre nouvel E-Mail
hive_login_mail_title_register=Activez votre nouveau compte
hive_login_mail_pre_register=Cliquez sur le lien suivant pour activer votre compte :
hive_login_mail_title_rec=Récupérer votre compte
hive_login_mail_pre_rec=Cliquez sur le lien suivant pour récupérer votre mot de passe :

# Login - Activation
hive_login_msg_a_ok=Vous avez activé votre compte avec succès ! Vous pouvez maintenant vous connecter sur nos pages de connexion sur ce site.
hive_login_msg_a_er=Erreur lors de l'activation du compte utilisateur. Veuillez essayer de récupérer votre mot de passe ou inscrire un nouveau compte.
hive_login_msg_a_exp=Le token d'activation est invalide. Veuillez récupérer votre compte sur la page de connexion pour activer votre compte !
hive_login_msg_a_block=L'activation de votre compte a été désactivée, veuillez réessayer plus tard !

# Login - Recover Request
hive_login_msg_rr_recnewunk=L'E-Mail fourni n'est pas enregistré.
hive_login_msg_rr_recnope=Votre compte n'a pas l'autorisation de récupérer le mot de passe !
hive_login_msg_rr_recnopede=Votre compte a été désactivé et ne peut pas effectuer de nouvelles demandes !
hive_login_msg_rr_recwait=Vous devez attendre 120 minutes avant de commencer une nouvelle demande de récupération !
hive_login_msg_rr_recnok=Veuillez vérifier votre boîte de réception pour un E-Mail de réinitialisation du mot de passe. Ce mail contient un lien pour récupérer votre mot de passe.
hive_login_msg_recfr_ok=Veuillez vérifier votre boîte de réception pour obtenir un lien de récupération de mot de passe !

# Login - Recover Execute
hive_login_msg_pwtexp=Ce token de récupération de mot de passe a expiré ! Veuillez réessayer de récupérer votre compte.
hive_login_msg_recexecerror=Erreur lors de la tentative de récupération de votre mot de passe. Veuillez réessayer de récupérer votre compte.
hive_login_msg_recexecok=Vous avez récupéré votre mot de passe avec succès et pouvez maintenant vous connecter avec votre nouveau mot de passe.

