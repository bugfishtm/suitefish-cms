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
hive_login_changelanguage=Puedes cambiar el idioma
hive_login_changelanguage_here=aquí.
hive_login_lostpass=¿Has olvidado tu contraseña?
hive_login_notregistered=¿No estás registrado?
hive_login_rememberme=¿Usar cookies?
hive_login_recoveraccount=Recuperar Cuenta
hive_login_haveaccount=¿Ya tienes una cuenta?
hive_login_password_confirm=Confirmar Contraseña
hive_login_mc_change_mail=Cambiar Correo Electrónico
hive_login_mc_backtohome=Volver a la Página Principal
hive_login_title_accactivation=Activación de Cuenta
hive_cannotenterwhilenologin=¡No puedes acceder a esta página si no has iniciado sesión!
hive_cannotenterwhilelogin=¡No puedes acceder a esta página si ya has iniciado sesión!
hive_cannotoperatesiteerror=Hay un error crítico en este módulo del sitio, por lo que actualmente no puedes realizar ninguna operación.
hive_login_backtologin=Volver a Iniciar Sesión
hive_login_change_Lang=Cambiar Idioma
hive_login_language_changed=¡El idioma ha sido cambiado!

# Login Events - General
hive_login_msg_l_wrong=Combinación de contraseña/correo electrónico incorrecta.
hive_login_msg_csrf=El formulario ha expirado, por favor intenta de nuevo.
hive_login_msg_empty=¡Por favor, ingresa los datos requeridos!
hive_login_msg_ipban=Tu IP está bloqueada actualmente; por favor intenta de nuevo más tarde.
hive_login_msg_logout=¡Has cerrado sesión!
hive_login_msg_nomatchpass=La confirmación de contraseña no coincide con la contraseña ingresada.
hive_login_doremember=¿Quieres recordar tu contraseña?

# Login Events - Login
hive_login_msg_l_ok=Inicio de sesión exitoso.
hive_login_msg_l_blocked=No puedes iniciar sesión porque tu cuenta está bloqueada.
hive_login_msg_l_inactive=¡Tu cuenta de usuario aún no está activada! Recupera tu contraseña para activar tu cuenta o haz clic en la URL del correo electrónico de activación que recibiste.
hive_login_msg_l_blockedpwf=¡Has ingresado la contraseña incorrecta demasiadas veces, y tu cuenta ha sido bloqueada!
hive_login_msg_l_disabled=¡Tu cuenta de usuario ha sido deshabilitada!
hive_login_mail_serror=Error al intentar enviar el correo electrónico. Este es un error interno que necesita ser investigado y debe ser informado al personal de nuestro sitio web.
hive_login_msg_register_ok=¡Por favor, revisa tu bandeja de entrada para activar tu nueva cuenta!
hive_login_msg_passfiltererror=La contraseña ingresada no cumple con las reglas de contraseñas.
hive_login_msg_mailexist=Estás intentando registrar una cuenta con un correo electrónico que ya existe.
hive_login_password_rules=Reglas de Contraseñas
hive_login_password_sign=Caracteres Requeridos:
hive_login_password_cap=Letras Mayúsculas Requeridas:
hive_login_password_small=Letras Minúsculas Requeridas:
hive_login_password_special=Caracteres Especiales Requeridos:
hive_login_password_numeric=Números Requeridos:

# Login Events - Mail Change
hive_login_msg_m_ok=¡Has activado exitosamente tu nuevo correo electrónico!
hive_login_msg_m_er=Error al intentar activar la nueva dirección de correo electrónico; por favor intenta de nuevo.
hive_login_msg_m_exp=¡El código de activación del correo electrónico ha expirado! Por favor, intenta cambiar tu correo electrónico nuevamente.
hive_login_msg_m_res=El correo electrónico que intentaste activar ahora está en uso en otra cuenta, por lo que no puede asociarse con tu cuenta.
hive_login_msg_m_block=Tu cuenta está bloqueada para cambios de correo electrónico.
hive_login_msg_m_noadr=La solicitud ha fallado. Por favor, intenta de nuevo más tarde.
hive_login_mc_cmailtext=Tu correo electrónico actual es:
hive_login_msg_rec_ok=Por favor, revisa la bandeja de entrada del nuevo correo electrónico para activar la nueva dirección de correo electrónico.
hive_login_msg_rec_err=Error al intentar cambiar la dirección de correo electrónico.
hive_login_msg_rec_wait=Los cambios de correo electrónico están restringidos por un período de tiempo. Por favor, inténtalo más tarde.
hive_login_msg_rec_exist=El correo electrónico que intentas cambiar ya está en uso por otra cuenta de usuario.
hive_login_msg_rec_block=Tu cuenta está bloqueada para cambios de correo electrónico.
hive_login_msg_rec_disable=¡No puedes cambiar el correo electrónico de una cuenta deshabilitada!

# Login Mails
hive_login_mail_pre_change=Activa tu nuevo correo aquí: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=Activa Tu Nuevo Correo Electrónico
hive_login_mail_title_register=Activa Tu Nueva Cuenta
hive_login_mail_pre_register=Haz clic en el siguiente enlace para activar tu cuenta: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=Recupera Tu Cuenta
hive_login_mail_pre_rec=Haz clic en el siguiente enlace para recuperar la contraseña de tu cuenta: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=¡Has activado exitosamente tu cuenta! Ahora puedes iniciar sesión en nuestras páginas de inicio de sesión en este sitio web.
hive_login_msg_a_er=Error al intentar activar la cuenta de usuario. Por favor intenta recuperar la contraseña de tu cuenta o registra una nueva cuenta.
hive_login_msg_a_exp=El token de activación es inválido. Por favor, recupera tu cuenta en la página de inicio de sesión para activar tu cuenta.
hive_login_msg_a_block=La activación de tu cuenta ha sido deshabilitada; por favor intenta de nuevo más tarde.

# Login - Recover Request
hive_login_msg_rr_recnewunk=El correo electrónico proporcionado no está registrado.
hive_login_msg_rr_recnope=Tu cuenta no tiene permiso para recuperar la contraseña.
hive_login_msg_rr_recnopede=Tu cuenta ha sido desactivada y no puede realizar nuevas solicitudes.
hive_login_msg_rr_recwait=Las solicitudes de recuperación están limitadas para evitar el uso indebido. Por favor, inténtalo más tarde.
hive_login_msg_rr_recnok=Por favor, revisa tu bandeja de entrada para un correo electrónico de restablecimiento de contraseña. Este correo contiene un enlace para recuperar tu contraseña.
hive_login_msg_recfr_ok=¡Por favor, revisa tu bandeja de entrada para obtener un enlace de recuperación de contraseña!

# Login - Recover Execute
hive_login_msg_pwtexpire=¡Este token de recuperación de contraseña ha expirado! Por favor, intenta recuperar tu cuenta nuevamente.
hive_login_msg_recexecerror=Error al intentar recuperar tu contraseña. Por favor intenta recuperar tu cuenta nuevamente.
hive_login_msg_recexecok=Ha recuperado su contraseña con éxito y ahora puede iniciar sesión con su nueva contraseña.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=Actualmente has iniciado sesión como otro usuario. Si continúas, cualquier cambio que hagas afectará a la cuenta con la que estás conectado, no a tu propia cuenta.
hive_login_msg_passc_enterold=Por favor, introduce tu contraseña actual.
hive_login_msg_passc_enternew=Por favor, introduce una nueva contraseña.
hive_login_msg_passc_enternewc=Por favor, confirma tu nueva contraseña.
hive_login_msg_passc_cwrong=La contraseña actual que has introducido no coincide con nuestros registros.
hive_login_msg_passc_ok=¡Tu contraseña se ha cambiado con éxito!
hive_login_msg_2fa=Configura la autenticación de dos factores (2FA) aquí para añadir seguridad adicional a tu cuenta. Cuando esté habilitada, verás un código y un código QR para conectar tu aplicación de autenticación. Puedes activar o desactivar la 2FA en cualquier momento desde esta sección.
hive_login_msg_2fa_request=Código 2FA (si está habilitado)
hive_login_msg_2fa_error=La 2FA está habilitada en tu cuenta, la clave 2FA proporcionada no es correcta. Por favor, inténtalo de nuevo.


##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=¿Habilitar el sitio de cambio de correo del usuario CMS predeterminado?
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=¿Habilitar el sitio de cambio de contraseña del usuario CMS predeterminado?
hive_var-_HIVE_ENABLESITE_RECOVER_=¿Habilitar el sitio de recuperación de usuario del CMS predeterminado?
hive_var-_HIVE_ENABLESITE_LOGIN_=¿Habilitar el sitio de inicio de sesión del CMS predeterminado?
hive_var-_HIVE_ENABLESITE_LOGOUT_=¿Habilitar el sitio de cierre de sesión del CMS predeterminado?
hive_var-_HIVE_ENABLESITE_REGISTER_=¿Habilitar el sitio de registro del CMS predeterminado?
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=¿Habilitar el sitio de cambio de idioma predeterminado del CMS?
hive_var-_HIVE_ENABLESITE_MODESWITCH_=¿Habilitar el cambio entre frontend/backend del CMS?
hive_var-_HIVE_ENABLESITE_2FA_=¿Habilitar el sitio de autenticación en dos pasos del CMS?
hive_var-_HIVE_ENABLESITE_ACTIVATE_=¿Habilitar el sitio de activación del usuario del CMS?
hive_var-_HIVE_LANG_DEFAULT_=Idioma predeterminado.
hive_var-_REDIS_=Estado de activación de Redis.
hive_var-_REDIS_HOST_=Servidor Redis.
hive_var-_REDIS_PORT_=Puerto Redis.
hive_var-_SMTP_MAILS_HEADER_=Encabezado de correo electrónico predeterminado.
hive_var-_SMTP_MAILS_FOOTER_=Pie de correo electrónico predeterminado.
hive_var-_SMTP_SENDER_MAIL_=Correo electrónico del remitente predeterminado.
hive_var-_SMTP_SENDER_NAME_=Nombre del remitente predeterminado.
hive_var-_SMTP_MAILS_IN_HTML_=¿Enviar correos electrónicos en formato HTML?
hive_var-_SMTP_INSECURE_=¿Permitir conexiones de servidor inseguras?
hive_var-_SMTP_DEBUG_=Estado de depuración de correos electrónicos. (0-3)
hive_var-_SMTP_HOST_=Servidor de correo.
hive_var-_SMTP_PORT_=Puerto de correo.
hive_var-_SMTP_AUTH_=Método de autenticación de correo electrónico.
hive_var-_SMTP_USER_=Usuario de correo electrónico.
hive_var-_SMTP_PASS_=Contraseña de correo electrónico.
hive_var-_USER_MAX_SESSION_=Fecha de expiración de la sesión en días.
hive_var-_USER_TOKEN_TIME_=Tiempo de expiración del token de usuario en minutos.
hive_var-_USER_AUTOBLOCK_=Bloqueo automático de usuarios tras varios intentos fallidos.
hive_var-_USER_WAIT_COUNTER_=Tiempo de espera entre solicitudes de recuperación y activación/registro en minutos.
hive_var-_USER_LOG_SESSIONS_=¿Registrar sesiones expiradas en la base de datos?
hive_var-_USER_LOG_IP_=¿Registrar IPs en la base de datos?
hive_var-_USER_PF_SIGNS_=Filtro de contraseña: requiere signos al menos.
hive_var-_USER_PF_CAPSIGNS_=Filtro de contraseña: letras mayúsculas al menos.
hive_var-_USER_PF_SMSIGNS_=Filtro de contraseña: letras minúsculas al menos.
hive_var-_USER_PF_SPSIGNS_=Filtro de contraseña: signos especiales al menos.
hive_var-_USER_PF_NUMSIGNS_=Filtro de contraseña: signos numéricos al menos.
hive_var-_UPDATER_CODE_=¿Código requerido para ejecutar el gestor de actualizaciones? (puede ser sobrescrito por ruleset.cfg)
hive_var-_HIVE_CURL_LOGGING_=¿Activar registro de Curl?
hive_var-_HIVE_IP_LIMIT_=Límite de fallos para bloqueo de IPs.
hive_var-_HIVE_REFERER_=¿Habilitar funcionalidad de registro de referer?
hive_var-_HIVE_CSRF_TIME_=Tiempo en segundos de validez de los tokens CSRF para formularios.
hive_var-_HIVE_JS_ACTION_ACTIVE_=¿Activar el script de registro de errores de JavaScript?
hive_var-_HIVE_TITLE_=Título predeterminado del sitio web.
hive_var-_HIVE_TITLE_SPACER_=Separador de pestañas del sitio web.
hive_var-_HIVE_PHP_DEBUG_=¿Activar modo depuración de PHP?
hive_var-_HIVE_MYSQL_DEBUG_=¿Activar modo depuración de MySQL?
hive_var-_HIVE_URL_SEO_=¿Usar URLs optimizadas para SEO?
hive_var-_HIVE_ROBOTS_CREATE_=¿Crear archivo robots.txt inicial?
hive_var-_CRON_ENABLE_LOG_=¿Habilitar protocolo de ejecución de cron?
hive_var-_USER_REC_DROP_=Eliminar llaves de recuperación obsoletas al iniciar sesión o recuperar la cuenta
hive_var-_USER_MULTI_LOGIN_=Permitir múltiples inicios de sesión simultáneos por usuario
hive_var-_HIVE_BENCHMARK_EXECUTE_=Habilitar registro de benchmarks en index.php
hive_var-_HIVE_HITCOUNTER_EXECUTE_=Habilitar registro del contador de visitas en index.php

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=Correo electrónico
string_password=Contraseña
string_close=Cerrar
string_delete=Eliminar
string_url=URL
string_name=Nombre
string_date=Fecha
string_details=Detalles
string_operation=Operación
string_add=Añadir
string_execute=Ejecutar
string_executed=Ejecutado
string_coming_soon=Próximamente
string_value=Valor
string_edit=Editar
string_not_available=No disponible
string_identifier=Identificador
string_latest_version=Última versión
string_description=Descripción
string_install=Instalar
string_framework=Framework
String_internal=Interno
string_library=Biblioteca
string_extension=Extensión
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=ID de proceso
string_status=Estado
string_parameter=Parámetro
string_type=Tipo
string_waiting=Esperando
string_done=Hecho
string_settings=Configuraciones
string_deprecated=Obsoleto
string_theme=Tema
string_valid=Válido
string_invalid=Inválido
string_general=General
string_update=Actualizar
string_cleanup=Limpiar
string_object=Objeto
string_restricted=Restringido
string_confirm=Confirmar
string_reset=Restablecer
string_logout=Cerrar sesión
string_website=Sitio web
string_login=Iniciar sesión
string_favicon=Favicon
string_visibility=Visibilidad
string_developer=Desarrollador
string_user=Usuario
string_redis=Redis
string_cancel=Cancelar
string_local=Local
string_online=En línea
string_save=Guardar
string_meta=Meta
string_administration=Administración
string_block=Bloquear
string_unblock=Desbloquear
string_confirmed=Confirmado
string_data=Datos
string_inheritance=Herencia
string_relations=Relaciones
string_docker=Docker
string_background_worker=Trabajador en segundo plano
string_refresh=Actualizar
string_token=Token
string_activate=Activar
string_session=Sesión
string_license=Licencia
string_github=Github
string_documentation=Documentación
string_author=Autor
string_switch=Cambiar
string_readme=Léeme
string_disabled=Desactivado
string_enabled=Activado
string_rename=Renombrar
string_hardlink=Enlace Físico
string_create_folder=Crear Carpeta
string_location=Ubicación
string_truncate=Truncar
string_delete_data=Eliminar Datos
string_not_found=No Encontrado
string_objects=Objetos
string_pages=Páginas
string_please_wait=Por Favor Espere
string_default=Predeterminado
string_register=Registrarse
string_recover=Recuperar
string_notifications=Notificaciones
string_calender=Calendario
string_profile=Perfil
string_manage=Gestionar
string_view=Ver
string_key=Clave
string_enable=Activar
string_disable=Desactivar
string_folder=Carpeta
string_version=Versión
string_visit=Visitar
string_module=Módulo
string_style=Estilo
string_low=Bajo
string_medium=Medio
string_high=Alto
string_active=Activo
string_inactive=Inactivo
string_upload=Subir
string_receiver=Receptor
string_error=Error
string_subject=Asunto
string_delay=Retraso
string_memory=Memoria
string_cpu=CPU
string_groups=Grupos
string_mail=Correo electrónico
string_identification=Identificación
string_permissions=Permisos
string_websites=Sitios web
string_dashboards=Tableros
string_language=Idioma
string_translation=Traducción
string_empty=Vacío
string_page=Página
string_include=Incluir
string_public=Público
string_private=Privado
string_image=Imagen
string_sort=Ordenar
string_sql_queries=Consultas SQL
string_referer=Referente
string_hits=Visitas
string_flush=Limpiar
string_information=Información
string_tables=Tablas
string_back=Atrás
string_field_list=Lista de campos
string_value_list=Lista de valores
string_failures=Fallos
string_content=Contenido
string_line=Línea
string_users=Usuarios
string_create=Crear
string_privisioned=Provisionado
string_not_privisioned=No Provisionado
string_not_blocked=No Bloqueado
string_blocked=Bloqueado
string_no_login=Sin Inicio de Sesión
string_can_login=Puede Iniciar Sesión
string_page_builder=Constructor de Páginas
string_object_builder=Constructor de Objetos
string_permitted=Permitido
string_yes=Sí
string_no=No
string_download=Descargar
string_flush_table=Vaciar Tabla
string_logging=Registro
string_request=Solicitud
string_visits=Visitas
string_limit=Límite
string_activities=Actividades
string_list=Lista
string_show_more=Mostrar Más
string_show_less=Mostrar Menos
string_delete_item=Eliminar Elemento
string_delete_table=Eliminar Tabla
string_allow_insecure=Permitir Inseguro
string_strict_security=Seguridad Estricta
string_templates=Plantillas
string_script_path=Ruta del Script
string_cms=CMS
string_token_switch=Interruptor de Token
string_debugging=Depuración
string_progress=Progreso
string_files=Archivos
string_short_description=Descripción Corta
string_long_description=Descripción Larga
string_creation_operation=Operación de Creación
string_update_operation=Operación de Actualización
string_tasks=Tareas
string_javascript=JavaScript
string_endpoint=Endpoint
string_triggers=Disparadores
string_builder=Constructor
string_trace=Rastro
string_ip_address=Dirección IP
string_reference=Referencia
string_videos=Videos
string_codename=Nombre Clave
string_included_libraries=Bibliotecas Incluidas
string_initialized=Inicializado
string_last_use=Último Uso
string_creation=Creación
string_disable_item=Desactivar Ítem
string_enable_item=Activar Ítem
string_view_item=Ver Ítem
string_core_version=Versión Core
string_framework_version=Versión Framework
string_module_version=Versión Módulo
string_php_date=Fecha PHP
string_mysql_date=Fecha MySQL
string_php_version=Versión PHP
string_no_items=No hay Ítems
string_back_to_website=Volver al Sitio Web
string_install_item=Instalar Ítem
string_frontend_switch=Interruptor Frontend
string_please_choose_items=Por favor elija Ítems
string_upload_in_progress=Subida en Progreso
string_upload_completed=Subida Completada
string_new_password=Nueva contraseña
string_current_password=Contraseña actual
string_confirm_new_password=Confirmar nueva contraseña
string_change_password=Cambiar contraseña
string_2fa=2FA