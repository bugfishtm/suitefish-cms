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
string_email=Correo Electrónico
string_password=Contraseña
string_login=Iniciar Sesión
string_register=Registrarse
string_close=Cerrar

# Page - Actions
login_lostpass=¿Olvidaste tu Contraseña?
login_notregistered=¿No estás Registrado?
login_rememberme=¿Usar Cookies?
login_recoveraccount=Recuperar Cuenta
login_haveaccount=¿Ya tienes una Cuenta?
login_password_confirm=Confirmar Contraseña
login_mc_change_mail=Cambiar Correo Electrónico
login_mc_backtohome=Volver al Inicio
login_title_accactivation=Activación de Cuenta

# Login Events - General
hive_login_msg_l_wrong=Combinación incorrecta de Correo Electrónico/Contraseña.
hive_login_msg_csrf=El formulario ha caducado, por favor intenta de nuevo.
hive_login_msg_empty=¡Por favor ingresa los datos requeridos!
hive_login_msg_ipban=Tu IP está bloqueada actualmente; por favor intenta de nuevo más tarde.
hive_login_msg_logout=¡Has cerrado sesión!
hive_login_msg_nomatchpass=La confirmación de la contraseña no coincide con la contraseña ingresada.
login_doremember=¿Deseas recordar tu contraseña?

# Login Events - Login
hive_login_msg_l_ok=Inicio de sesión exitoso.
hive_login_msg_l_blocked=No puedes iniciar sesión porque tu cuenta está bloqueada.
hive_login_msg_l_inactive=¡Tu cuenta de usuario aún no está activada! Recupera tu contraseña para activar tu cuenta o haz clic en el enlace del correo de activación que recibiste.
hive_login_msg_l_blockedpwf=¡Has ingresado la contraseña incorrecta demasiadas veces y tu cuenta ha sido bloqueada!
hive_login_msg_l_disabled=¡Tu cuenta de usuario ha sido deshabilitada!
hive_login_mail_serror=Error al intentar enviar el correo electrónico. Este es un error interno que debe investigarse y debe ser reportado al personal de nuestro sitio web.
hive_login_msg_register_ok=¡Por favor revisa tu bandeja de entrada para activar tu nueva cuenta!
hive_login_msg_passfiltererror=¡La contraseña ingresada no cumple con las reglas de la contraseña!
hive_login_msg_mailexist=Está intentando registrar una cuenta con un correo electrónico que ya existe.
login_password_rules=Reglas de Contraseña
login_password_sign=Caracteres Requeridos:
login_password_cap=Letras Mayúsculas Requeridas:
login_password_small=Letras Minúsculas Requeridas:
login_password_special=Caracteres Especiales Requeridos:
login_password_numeric=Números Requeridos:

# Login Events - Mail Change
hive_login_msg_m_ok=¡Has activado exitosamente tu nuevo correo electrónico!
hive_login_msg_m_er=Error al intentar activar la nueva dirección de correo electrónico; por favor intenta de nuevo.
hive_login_msg_m_exp=¡El código de activación del correo electrónico ha caducado! Por favor, intenta cambiar tu correo electrónico de nuevo.
hive_login_msg_m_res=El correo electrónico que intentaste activar ya se usa en otra cuenta, por lo que no puede asociarse a tu cuenta.
hive_login_msg_m_block=Tu cuenta está bloqueada para cambios de correo electrónico.
hive_login_msg_m_noadr=La solicitud ha fallado. Por favor intenta de nuevo más tarde.
login_mc_cmailtext=Tu correo electrónico actual es:
hive_login_msg_rec_ok=Por favor revisa la bandeja de entrada del nuevo correo electrónico para activar la nueva dirección.
hive_login_msg_rec_err=Error al intentar cambiar la dirección de correo electrónico.
hive_login_msg_rec_wait=¡Debes esperar 120 minutos entre cambios de correo electrónico!
hive_login_msg_rec_exist=El correo electrónico que intentas cambiar ya está siendo utilizado por otra cuenta de usuario.
hive_login_msg_rec_block=Tu cuenta está bloqueada para cambios de correo electrónico.
hive_login_msg_rec_disable=¡No puedes cambiar el correo electrónico de una cuenta deshabilitada!

# Login Mails
hive_login_mail_pre_change=Activa tu nuevo correo aquí:
hive_login_mail_title_change=Activa Tu Nuevo Correo Electrónico
hive_login_mail_title_register=Activa Tu Nueva Cuenta
hive_login_mail_pre_register=Haz clic en el siguiente enlace para activar tu cuenta:
hive_login_mail_title_rec=Recupera Tu Cuenta
hive_login_mail_pre_rec=Haz clic en el siguiente enlace para recuperar la contraseña de tu cuenta:

# Login - Activation
hive_login_msg_a_ok=¡Has activado tu cuenta exitosamente! Ahora puedes iniciar sesión en nuestra página de inicio de sesión en este sitio web.
hive_login_msg_a_er=Error al intentar activar la cuenta de usuario. Por favor intenta recuperar tu contraseña o registra una nueva cuenta.
hive_login_msg_a_exp=¡El token de activación es inválido! Por favor recupera tu cuenta en la página de inicio de sesión para activar tu cuenta.
hive_login_msg_a_block=La activación de tu cuenta ha sido deshabilitada; por favor intenta de nuevo más tarde.

# Login - Recover Request
hive_login_msg_rr_recnewunk=El correo electrónico proporcionado no está registrado.
hive_login_msg_rr_recnope=¡Tu cuenta no tiene permiso para recuperar la contraseña!
hive_login_msg_rr_recnopede=Tu cuenta ha sido desactivada y no puede hacer nuevas solicitudes.
hive_login_msg_rr_recwait=¡Debes esperar 120 minutos antes de iniciar una nueva solicitud de recuperación!
hive_login_msg_rr_recnok=Por favor revisa tu bandeja de entrada para recibir un correo electrónico de restablecimiento de contraseña. Este correo contiene un enlace para recuperar tu contraseña.
hive_login_msg_recfr_ok=Por favor revisa tu bandeja de entrada para obtener un enlace de recuperación de contraseña.

# Login - Recover Execute
hive_login_msg_pwtexpire=¡El token de recuperación de contraseña ha caducado! Por favor intenta recuperar tu cuenta de nuevo.
hive_login_msg_recexecerror=Error al intentar recuperar tu contraseña. Por favor intenta recuperar tu cuenta nuevamente.
hive_login_msg_recexecok=¡Has recuperado exitosamente tu contraseña y ahora puedes iniciar sesión con tu nueva contraseña.
