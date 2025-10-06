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
hive_login_changelanguage=Vous pouvez changer la langue
hive_login_changelanguage_here=ici.
hive_login_lostpass=Mot de passe oublié ?
hive_login_notregistered=Pas encore inscrit ?
hive_login_rememberme=Utiliser les cookies ?
hive_login_recoveraccount=Récupérer le compte
hive_login_haveaccount=Déjà un compte ?
hive_login_password_confirm=Confirmer le mot de passe
hive_login_mc_change_mail=Changer d'E-Mail
hive_login_mc_backtohome=Retour à l'accueil
hive_login_title_accactivation=Activation du compte
hive_cannotenterwhilenologin=Vous ne pouvez pas accéder à cette page si vous n'êtes pas connecté !
hive_cannotenterwhilelogin=Vous ne pouvez pas accéder à cette page si vous êtes connecté !
hive_cannotoperatesiteerror=Il y a une erreur critique sur ce module du site, vous ne pouvez actuellement effectuer aucune opération !
hive_login_backtologin=Retour à la connexion
hive_login_change_Lang=Changer la langue
hive_login_language_changed=La langue a été changée !

# Login Events - General
hive_login_msg_l_wrong=Combinaison E-Mail/Mot de passe incorrecte.
hive_login_msg_csrf=Formulaire expiré, veuillez réessayer.
hive_login_msg_empty=Veuillez entrer les données requises !
hive_login_msg_ipban=Votre IP est actuellement bloquée ; veuillez réessayer plus tard.
hive_login_msg_logout=Vous avez été déconnecté !
hive_login_msg_nomatchpass=La confirmation du mot de passe ne correspond pas au mot de passe entré.
hive_login_doremember=Voulez-vous vous souvenir de votre mot de passe ?

# Login Events - Login
hive_login_msg_l_ok=Connexion réussie.
hive_login_msg_l_blocked=Vous ne pouvez pas vous connecter car votre compte est bloqué.
hive_login_msg_l_inactive=Votre compte utilisateur n'est pas encore activé ! Récupérez votre mot de passe pour activer votre compte ou cliquez sur le lien dans l'E-Mail d'activation que vous avez reçu !
hive_login_msg_l_blockedpwf=Vous avez entré trop de fois un mauvais mot de passe, et votre compte a été bloqué !
hive_login_msg_l_disabled=Votre compte utilisateur a été désactivé !
hive_login_mail_serror=Erreur lors de l'envoi de l'E-Mail. C'est une erreur interne qui doit être signalée à l'équipe de notre site.
hive_login_msg_register_ok=Veuillez vérifier votre boîte E-Mail pour activer votre nouveau compte !
hive_login_msg_passfiltererror=Le mot de passe entré ne respecte pas les règles de mot de passe !
hive_login_msg_mailexist=Vous essayez d'enregistrer un compte avec un E-Mail qui existe déjà !
hive_login_password_rules=Règles de mot de passe
hive_login_password_sign=Caractères requis :
hive_login_password_cap=Lettres majuscules requises :
hive_login_password_small=Lettres minuscules requises :
hive_login_password_special=Caractères spéciaux requis :
hive_login_password_numeric=Caractères numériques requis :

# Login Events - Mail Change
hive_login_msg_m_ok=Vous avez activé votre nouvelle adresse E-Mail avec succès !
hive_login_msg_m_er=Erreur lors de l'activation de la nouvelle adresse E-Mail ; veuillez réessayer.
hive_login_msg_m_exp=Le code d'activation de l'E-Mail a expiré ! Veuillez réessayer de changer votre E-Mail !
hive_login_msg_m_res=L'E-Mail que vous avez essayé d'activer est maintenant utilisé sur un autre compte, il ne peut donc pas être associé à votre compte !
hive_login_msg_m_block=Votre compte est bloqué pour les changements d'E-Mail !
hive_login_msg_m_noadr=La demande a échoué. Veuillez réessayer plus tard.
hive_login_mc_cmailtext=Votre E-Mail actuel est :
hive_login_msg_rec_ok=Veuillez vérifier la boîte de réception de votre nouvel E-Mail pour activer la nouvelle adresse E-Mail.
hive_login_msg_rec_err=Erreur lors de la tentative de changement d'adresse E-Mail.
hive_login_msg_rec_wait=Les modifications d'adresse e-mail sont restreintes pendant un certain temps. Veuillez réessayer plus tard.
hive_login_msg_rec_exist=L'adresse E-Mail que vous essayez de changer est déjà utilisée par un autre compte utilisateur !
hive_login_msg_rec_block=Votre compte est bloqué pour les changements d'adresse E-Mail !
hive_login_msg_rec_disable=Vous ne pouvez pas changer l'adresse E-Mail d'un compte désactivé !

# Login Mails
hive_login_mail_pre_change=Activez votre nouvelle adresse mail ici : <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=Activez votre nouvelle adresse E-Mail
hive_login_mail_title_register=Activez votre nouveau compte
hive_login_mail_pre_register=Cliquez sur le lien suivant pour activer votre compte : <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=Récupérez votre compte
hive_login_mail_pre_rec=Cliquez sur le lien suivant pour récupérer le mot de passe de votre compte : <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=Vous avez activé votre compte avec succès ! Vous pouvez maintenant vous connecter sur nos pages de connexion sur ce site.
hive_login_msg_a_er=Erreur lors de la tentative d'activation du compte utilisateur. Veuillez essayer de récupérer votre mot de passe ou enregistrer un nouveau compte.
hive_login_msg_a_exp=Le jeton d'activation est invalide. Veuillez récupérer votre compte sur la page de connexion pour activer votre compte !
hive_login_msg_a_block=L'activation de votre compte a été désactivée ; veuillez réessayer plus tard !

# Login - Recover Request
hive_login_msg_rr_recnewunk=L'E-Mail fourni n'est pas enregistré.
hive_login_msg_rr_recnope=Votre compte n'a pas la permission de récupérer le mot de passe !
hive_login_msg_rr_recnopede=Votre compte a été désactivé et ne peut pas effectuer de nouvelles demandes !
hive_login_msg_rr_recwait=Les demandes de récupération sont limitées afin de prévenir les abus. Veuillez réessayer plus tard.
hive_login_msg_rr_recnok=Veuillez vérifier votre boîte de réception pour un E-Mail de réinitialisation de mot de passe. Cet E-Mail contient un lien pour récupérer votre mot de passe.
hive_login_msg_recfr_ok=Veuillez vérifier votre boîte E-Mail pour obtenir un lien de récupération de mot de passe !

# Login - Recover Execute
hive_login_msg_pwtexpire=Ce jeton de récupération de mot de passe a expiré ! Veuillez réessayer de récupérer votre compte.
hive_login_msg_recexecerror=Erreur lors de la tentative de récupération de votre mot de passe. Veuillez réessayer de récupérer votre compte.
hive_login_msg_recexecok=Vous avez récupéré votre mot de passe avec succès et pouvez maintenant vous connecter avec votre nouveau mot de passe.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=Vous êtes actuellement connecté en tant qu’un autre utilisateur. Si vous continuez, les modifications apportées affecteront le compte avec lequel vous êtes connecté, et non votre propre compte.
hive_login_msg_passc_enterold=Veuillez entrer votre mot de passe actuel.
hive_login_msg_passc_enternew=Veuillez entrer un nouveau mot de passe.
hive_login_msg_passc_enternewc=Veuillez confirmer votre nouveau mot de passe.
hive_login_msg_passc_cwrong=Le mot de passe actuel que vous avez saisi ne correspond pas à nos enregistrements.
hive_login_msg_passc_ok=Votre mot de passe a été changé avec succès !
hive_login_msg_2fa=Configurez l’authentification à deux facteurs (2FA) ici pour renforcer la sécurité de votre compte. Une fois activée, un code et un QR code s’afficheront pour connecter votre application d’authentification. Vous pouvez activer ou désactiver la 2FA à tout moment dans cette section.
hive_login_msg_2fa_request=Code 2FA (si activé)
hive_login_msg_2fa_error=La 2FA est activée sur votre compte, la clé 2FA fournie est incorrecte, veuillez réessayer.

##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=Activer le site de changement d'email utilisateur CMS par défaut.
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=Activer le site de changement de mot de passe utilisateur CMS par défaut.
hive_var-_HIVE_ENABLESITE_RECOVER_=Activer le site de récupération utilisateur CMS par défaut.
hive_var-_HIVE_ENABLESITE_LOGIN_=Activer le site de connexion utilisateur CMS par défaut.
hive_var-_HIVE_ENABLESITE_LOGOUT_=Activer le site de déconnexion utilisateur CMS par défaut.
hive_var-_HIVE_ENABLESITE_REGISTER_=Activer le site d'inscription utilisateur CMS par défaut.
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=Activer le site de changement de langue CMS par défaut.
hive_var-_HIVE_ENABLESITE_MODESWITCH_=Activer le site de bascule frontend/backend CMS par défaut.
hive_var-_HIVE_ENABLESITE_2FA_=Activer le site d'authentification à deux facteurs CMS.
hive_var-_HIVE_ENABLESITE_ACTIVATE_=Activer le site d'activation utilisateur CMS par défaut.
hive_var-_HIVE_LANG_DEFAULT_=Langue par défaut.
hive_var-_REDIS_=Statut d'activation de Redis.
hive_var-_REDIS_HOST_=Hôte Redis.
hive_var-_REDIS_PORT_=Port Redis.
hive_var-_SMTP_MAILS_HEADER_=En-tête email par défaut.
hive_var-_SMTP_MAILS_FOOTER_=Pied de page email par défaut.
hive_var-_SMTP_SENDER_MAIL_=Adresse email de l'expéditeur par défaut.
hive_var-_SMTP_SENDER_NAME_=Nom de l'expéditeur par défaut.
hive_var-_SMTP_MAILS_IN_HTML_=Envoyer les emails en HTML ?
hive_var-_SMTP_INSECURE_=Autoriser les connexions serveur non sécurisées ?
hive_var-_SMTP_DEBUG_=Niveau de débogage des emails (0-3).
hive_var-_SMTP_HOST_=Hôte email.
hive_var-_SMTP_PORT_=Port email.
hive_var-_SMTP_AUTH_=Méthode d'authentification email.
hive_var-_SMTP_USER_=Nom d'utilisateur email.
hive_var-_SMTP_PASS_=Mot de passe email.
hive_var-_USER_MAX_SESSION_=Durée d'expiration des sessions (en jours).
hive_var-_USER_TOKEN_TIME_=Durée de validité du token utilisateur (en minutes).
hive_var-_USER_AUTOBLOCK_=Bloquer automatiquement les utilisateurs après un certain nombre d'échecs de connexion.
hive_var-_USER_WAIT_COUNTER_=Temps d'attente entre récupération et inscription/activation (en minutes).
hive_var-_USER_LOG_SESSIONS_=Enregistrer les sessions expirées en base de données ?
hive_var-_USER_LOG_IP_=Enregistrer les adresses IP en base de données ?
hive_var-_USER_PF_SIGNS_=Filtre mot de passe : nécessite des signes au minimum.
hive_var-_USER_PF_CAPSIGNS_=Filtre mot de passe : nécessite des majuscules.
hive_var-_USER_PF_SMSIGNS_=Filtre mot de passe : nécessite des minuscules.
hive_var-_USER_PF_SPSIGNS_=Filtre mot de passe : nécessite des caractères spéciaux.
hive_var-_USER_PF_NUMSIGNS_=Filtre mot de passe : nécessite des chiffres.
hive_var-_UPDATER_CODE_=Code requis pour exécuter le gestionnaire de mise à jour (modifiable via ruleset.cfg).
hive_var-_HIVE_CURL_LOGGING_=Activer la journalisation Curl ?
hive_var-_HIVE_IP_LIMIT_=Nombre d'échecs avant le blocage IP.
hive_var-_HIVE_REFERER_=Activer la journalisation des referers ?
hive_var-_HIVE_CSRF_TIME_=Durée de validité des tokens CSRF (en secondes).
hive_var-_HIVE_JS_ACTION_ACTIVE_=Activer le script de journalisation des erreurs JavaScript ?
hive_var-_HIVE_TITLE_=Titre du site web par défaut.
hive_var-_HIVE_TITLE_SPACER_=Séparateur par défaut pour l'onglet du site.
hive_var-_HIVE_PHP_DEBUG_=Activer le mode débogage PHP ?
hive_var-_HIVE_MYSQL_DEBUG_=Activer le mode débogage MySQL ?
hive_var-_HIVE_URL_SEO_=Utiliser des URL conviviales pour le SEO ?
hive_var-_HIVE_ROBOTS_CREATE_=Créer le fichier robots.txt initial ?
hive_var-_CRON_ENABLE_LOG_=Activer le protocole d’exécution cron ?
hive_var-_USER_REC_DROP_=Supprimer les clés de récupération obsolètes lors de la connexion ou de la récupération du compte
hive_var-_USER_MULTI_LOGIN_=Autoriser plusieurs connexions simultanées par utilisateur
hive_var-_HIVE_BENCHMARK_EXECUTE_=Activer la journalisation des benchmarks sur index.php
hive_var-_HIVE_HITCOUNTER_EXECUTE_=Activer le compteur de visites sur index.php

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=E-mail
string_password=Mot de passe
string_close=Fermer
string_delete=Supprimer
string_url=URL
string_name=Nom
string_date=Date
string_details=Détails
string_operation=Opération
string_add=Ajouter
string_execute=Exécuter
string_executed=Exécuté
string_coming_soon=Bientôt disponible
string_value=Valeur
string_edit=Éditer
string_not_available=Non disponible
string_identifier=Identifiant
string_latest_version=Dernière version
string_description=Description
string_install=Installer
string_framework=Framework
String_internal=Interne
string_library=Bibliothèque
string_extension=Extension
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=ID de processus
string_status=Statut
string_parameter=Paramètre
string_type=Type
string_waiting=En attente
string_done=Terminé
string_settings=Paramètres
string_deprecated=Obsolète
string_theme=Thème
string_valid=Valide
string_invalid=Invalide
string_general=Général
string_update=Mettre à jour
string_cleanup=Nettoyage
string_object=Objet
string_restricted=Restreint
string_confirm=Confirmer
string_reset=Réinitialiser
string_logout=Déconnexion
string_website=Site web
string_login=Connexion
string_favicon=Favicon
string_visibility=Visibilité
string_developer=Développeur
string_user=Utilisateur
string_redis=Redis
string_cancel=Annuler
string_local=Local
string_online=En ligne
string_save=Enregistrer
string_meta=Meta
string_administration=Administration
string_block=Bloquer
string_unblock=Débloquer
string_confirmed=Confirmé
string_data=Données
string_inheritance=Héritage
string_relations=Relations
string_docker=Docker
string_background_worker=Travailleur en arrière-plan
string_refresh=Rafraîchir
string_token=Jeton
string_activate=Activer
string_session=Session
string_license=Licence
string_github=Github
string_documentation=Documentation
string_author=Auteur
string_switch=Changer
string_readme=Lisezmoi
string_disabled=Désactivé
string_enabled=Activé
string_rename=Renommer
string_hardlink=Lien Physique
string_create_folder=Créer un Dossier
string_location=Emplacement
string_truncate=Tronquer
string_delete_data=Supprimer les Données
string_not_found=Non Trouvé
string_objects=Objets
string_pages=Pages
string_please_wait=Veuillez Patienter
string_default=Par Défaut
string_register=Inscription
string_recover=Récupérer
string_notifications=Notifications
string_calender=Calendrier
string_profile=Profil
string_manage=Gérer
string_view=Voir
string_key=Clé
string_enable=Activer
string_disable=Désactiver
string_folder=Dossier
string_version=Version
string_visit=Visiter
string_module=Module
string_style=Style
string_low=Faible
string_medium=Moyen
string_high=Élevé
string_active=Actif
string_inactive=Inactif
string_upload=Téléverser
string_receiver=Destinataire
string_error=Erreur
string_subject=Sujet
string_delay=Délai
string_memory=Mémoire
string_cpu=CPU
string_groups=Groupes
string_mail=E-mail
string_identification=Identification
string_permissions=Autorisations
string_websites=Sites web
string_dashboards=Tableaux de bord
string_language=Langue
string_translation=Traduction
string_empty=Vide
string_page=Page
string_include=Inclure
string_public=Public
string_private=Privé
string_image=Image
string_sort=Trier
string_sql_queries=Requêtes SQL
string_referer=Référent
string_hits=Accès
string_flush=Vider
string_information=Informations
string_tables=Tables
string_back=Retour
string_field_list=Liste des champs
string_value_list=Liste des valeurs
string_failures=Échecs
string_content=Contenu
string_line=Ligne
string_users=Utilisateurs
string_create=Créer
string_privisioned=Provisionné
string_not_privisioned=Non Provisionné
string_not_blocked=Non Bloqué
string_blocked=Bloqué
string_no_login=Pas de Connexion
string_can_login=Peut Se Connecter
string_page_builder=Constructeur de Pages
string_object_builder=Constructeur d'Objets
string_permitted=Autorisé
string_yes=Oui
string_no=Non
string_download=Télécharger
string_flush_table=Vider la Table
string_logging=Journalisation
string_request=Requête
string_visits=Visites
string_limit=Limite
string_activities=Activités
string_list=Liste
string_show_more=Afficher Plus
string_show_less=Afficher Moins
string_delete_item=Supprimer l'Élément
string_delete_table=Supprimer la Table
string_allow_insecure=Autoriser l'Insecure
string_strict_security=Sécurité Stricte
string_templates=Modèles
string_script_path=Chemin du Script
string_cms=CMS
string_token_switch=Commutateur de Jeton
string_debugging=Débogage
string_progress=Progression
string_files=Fichiers
string_short_description=Description Courte
string_long_description=Description Longue
string_creation_operation=Opération de Création
string_update_operation=Opération de Mise à Jour
string_tasks=Tâches
string_javascript=JavaScript
string_endpoint=Point de terminaison
string_triggers=Déclencheurs
string_builder=Constructeur
string_trace=Trace
string_ip_address=Adresse IP
string_reference=Référence
string_videos=Vidéos
string_codename=Nom de code
string_included_libraries=Bibliothèques incluses
string_initialized=Initialisé
string_last_use=Dernière utilisation
string_creation=Création
string_disable_item=Désactiver l'élément
string_enable_item=Activer l'élément
string_view_item=Voir l'élément
string_core_version=Version du noyau
string_framework_version=Version du framework
string_module_version=Version du module
string_php_date=Date PHP
string_mysql_date=Date MySQL
string_php_version=Version PHP
string_no_items=Pas d'éléments
string_back_to_website=Retour au site Web
string_install_item=Installer l'élément
string_frontend_switch=Commutateur frontend
string_please_choose_items=Veuillez choisir les éléments
string_upload_in_progress=Téléversement en cours
string_upload_completed=Téléversement terminé
string_new_password=Nouveau mot de passe
string_current_password=Mot de passe actuel
string_confirm_new_password=Confirmer le nouveau mot de passe
string_change_password=Changer le mot de passe
string_2fa=2FA