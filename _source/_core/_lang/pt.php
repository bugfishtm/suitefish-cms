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
## Substituições de Idioma Padrão do Backend para Scripts de Login
##########################################################################################

# Página - Ações
hive_login_changelanguage=Você pode alterar o idioma
hive_login_changelanguage_here=aqui.
hive_login_lostpass=Esqueceu a Senha?
hive_login_notregistered=Não Registrado?
hive_login_rememberme=Usar Cookies?
hive_login_recoveraccount=Recuperar Conta
hive_login_haveaccount=Já Tem uma Conta?
hive_login_password_confirm=Confirmar Senha
hive_login_mc_change_mail=Alterar E-Mail
hive_login_mc_backtohome=Voltar para a Página Inicial
hive_login_title_accactivation=Ativação da Conta
hive_cannotenterwhilenologin=Você não pode acessar esta página se não estiver logado!
hive_cannotenterwhilelogin=Você não pode acessar esta página se já estiver logado!
hive_cannotoperatesiteerror=Há um erro crítico neste módulo do site, portanto, você não pode executar nenhuma operação no momento!
hive_login_backtologin=Voltar para o Login
hive_login_change_Lang=Alterar Idioma
hive_login_language_changed=O idioma foi alterado!

# Eventos de Login - Geral
hive_login_msg_l_wrong=Combinação de Senha/E-Mail incorreta.
hive_login_msg_csrf=Formulário expirado, tente novamente.
hive_login_msg_empty=Por favor, insira os dados necessários!
hive_login_msg_ipban=Seu IP está bloqueado no momento; tente novamente mais tarde.
hive_login_msg_logout=Você foi desconectado!
hive_login_msg_nomatchpass=A confirmação de senha não corresponde à senha inserida.
hive_login_doremember=Você quer lembrar sua senha?

# Eventos de Login - Login
hive_login_msg_l_ok=Login bem-sucedido.
hive_login_msg_l_blocked=Você não pode fazer login porque sua conta está bloqueada.
hive_login_msg_l_inactive=Sua conta de usuário ainda não foi ativada! Recupere sua senha para ativar sua conta ou clique no link no E-Mail de ativação que você recebeu!
hive_login_msg_l_blockedpwf=Você inseriu a senha errada muitas vezes, e sua conta foi bloqueada!
hive_login_msg_l_disabled=Sua conta de usuário foi desativada!
hive_login_mail_serror=Erro ao tentar enviar o E-Mail. Este é um erro interno que precisa ser investigado e deve ser relatado à equipe do nosso site.
hive_login_msg_register_ok=Por favor, verifique sua caixa de entrada para ativar sua nova conta!
hive_login_msg_passfiltererror=A senha inserida não atende às regras de senha!
hive_login_msg_mailexist=Você está tentando registrar uma conta com um E-Mail que já existe!
hive_login_password_rules=Regras de Senha
hive_login_password_sign=Caracteres Necessários:
hive_login_password_cap=Letras Maiúsculas Necessárias:
hive_login_password_small=Letras Minúsculas Necessárias:
hive_login_password_special=Caracteres Especiais Necessários:
hive_login_password_numeric=Caracteres Numéricos Necessários:

# Eventos de Login - Alteração de E-Mail
hive_login_msg_m_ok=Você ativou com sucesso seu novo E-Mail!
hive_login_msg_m_er=Erro ao tentar ativar o novo endereço de E-Mail; tente novamente.
hive_login_msg_m_exp=O código de ativação do E-Mail expirou! Tente novamente para alterar seu E-Mail!
hive_login_msg_m_res=O E-Mail que você tentou ativar agora é usado em outra conta, então não pode ser associado à sua conta!
hive_login_msg_m_block=Sua conta está bloqueada para alterações de E-Mail!
hive_login_msg_m_noadr=A solicitação falhou. Por favor, tente novamente mais tarde.
hive_login_mc_cmailtext=Seu E-Mail atual é:
hive_login_msg_rec_ok=Por favor, verifique a nova caixa de entrada de E-Mail para ativar o novo endereço de E-Mail.
hive_login_msg_rec_err=Erro ao tentar alterar o endereço de E-Mail.
hive_login_msg_rec_wait=As alterações de e-mail estão restritas por um período de tempo. Por favor, tente novamente mais tarde.
hive_login_msg_rec_exist=O E-Mail que você está tentando alterar já é usado por outra conta de usuário!
hive_login_msg_rec_block=Sua conta está bloqueada para alterações de E-Mail!
hive_login_msg_rec_disable=Você não pode alterar o E-Mail de uma conta desativada!

# E-Mails de Login
hive_login_mail_pre_change=Ative seu novo E-Mail aqui: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=Ative Seu Novo E-Mail
hive_login_mail_title_register=Ative Sua Nova Conta
hive_login_mail_pre_register=Clique no link a seguir para ativar sua conta: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=Recupere Sua Conta
hive_login_mail_pre_rec=Clique no link a seguir para recuperar a senha de sua conta: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Ativação
hive_login_msg_a_ok=Você ativou com sucesso sua conta! Agora você pode fazer login nas páginas de login deste site.
hive_login_msg_a_er=Erro ao tentar ativar a conta de usuário. Tente recuperar sua senha ou registrar uma nova conta.
hive_login_msg_a_exp=O token de ativação é inválido. Recupere sua conta na página de login para ativar sua conta!
hive_login_msg_a_block=A ativação da sua conta foi desativada; tente novamente mais tarde!

# Login - Solicitação de Recuperação
hive_login_msg_rr_recnewunk=O E-Mail fornecido não está registrado.
hive_login_msg_rr_recnope=Sua conta não tem permissão para recuperar a senha!
hive_login_msg_rr_recnopede=Sua conta foi desativada e não pode fazer novas solicitações!
hive_login_msg_rr_recwait=As solicitações de recuperação são limitadas para evitar abusos. Por favor, tente novamente mais tarde.
hive_login_msg_rr_recnok=Por favor, verifique sua caixa de entrada para um E-Mail de redefinição de senha. Este E-Mail contém um link para recuperar sua senha.
hive_login_msg_recfr_ok=Por favor, verifique sua caixa de entrada para obter um link de recuperação de senha!

# Login - Execução de Recuperação
hive_login_msg_pwtexpire=Este Token de Recuperação de Senha expirou! Tente recuperar sua conta novamente.
hive_login_msg_recexecerror=Erro ao tentar recuperar sua senha. Tente novamente para recuperar sua conta.
hive_login_msg_recexecok=Você recuperou sua senha com sucesso e agora pode fazer login com sua nova senha.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=Você está conectado como outro usuário. Se continuar, quaisquer alterações feitas afetarão a conta em que você está logado, não a sua própria.
hive_login_msg_passc_enterold=Por favor, insira sua senha atual.
hive_login_msg_passc_enternew=Por favor, insira uma nova senha.
hive_login_msg_passc_enternewc=Por favor, confirme sua nova senha.
hive_login_msg_passc_cwrong=A senha atual inserida não corresponde aos nossos registros.
hive_login_msg_passc_ok=Sua senha foi alterada com sucesso!
hive_login_msg_2fa=Configure a autenticação de dois fatores (2FA) aqui para adicionar segurança extra à sua conta. Quando ativado, você verá um código e um código QR para conectar seu aplicativo autenticador. Você pode ativar ou desativar o 2FA a qualquer momento nesta seção.
hive_login_msg_2fa_request=Código 2FA (se ativado)
hive_login_msg_2fa_error=2FA está ativado em sua conta, a chave 2FA fornecida está incorreta, por favor tente novamente.

##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=Ativar o site de alteração de e-mail do usuário CMS?
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=Ativar o site de alteração de senha do usuário CMS?
hive_var-_HIVE_ENABLESITE_RECOVER_=Ativar o site de recuperação de usuário CMS?
hive_var-_HIVE_ENABLESITE_LOGIN_=Ativar o site de login do usuário CMS?
hive_var-_HIVE_ENABLESITE_LOGOUT_=Ativar o site de logout do usuário CMS?
hive_var-_HIVE_ENABLESITE_REGISTER_=Ativar o site de registro do usuário CMS?
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=Ativar o site de mudança de idioma CMS?
hive_var-_HIVE_ENABLESITE_MODESWITCH_=Ativar o site de alternância entre frontend/backend?
hive_var-_HIVE_ENABLESITE_2FA_=Ativar o site de autenticação 2FA do usuário CMS?
hive_var-_HIVE_ENABLESITE_ACTIVATE_=Ativar o site de ativação do usuário CMS?
hive_var-_HIVE_LANG_DEFAULT_=Idioma padrão.
hive_var-_REDIS_=Status de ativação do Redis.
hive_var-_REDIS_HOST_=Host do Redis.
hive_var-_REDIS_PORT_=Porta do Redis.
hive_var-_SMTP_MAILS_HEADER_=Cabeçalho de e-mail padrão.
hive_var-_SMTP_MAILS_FOOTER_=Rodapé de e-mail padrão.
hive_var-_SMTP_SENDER_MAIL_=E-mail do remetente padrão.
hive_var-_SMTP_SENDER_NAME_=Nome do remetente padrão.
hive_var-_SMTP_MAILS_IN_HTML_=Enviar e-mails em HTML?
hive_var-_SMTP_INSECURE_=Permitir conexões inseguras?
hive_var-_SMTP_DEBUG_=Nível de debug do e-mail (0-3).
hive_var-_SMTP_HOST_=Host do e-mail.
hive_var-_SMTP_PORT_=Porta do e-mail.
hive_var-_SMTP_AUTH_=Método de autenticação do e-mail.
hive_var-_SMTP_USER_=Usuário do e-mail.
hive_var-_SMTP_PASS_=Senha do e-mail.
hive_var-_USER_MAX_SESSION_=Validade da sessão em dias.
hive_var-_USER_TOKEN_TIME_=Tempo de expiração do token do usuário (em minutos).
hive_var-_USER_AUTOBLOCK_=Bloquear automaticamente após várias tentativas falhadas.
hive_var-_USER_WAIT_COUNTER_=Tempo de espera entre recuperação e registro/ativação (em minutos).
hive_var-_USER_LOG_SESSIONS_=Registrar sessões expiradas no banco de dados?
hive_var-_USER_LOG_IP_=Registrar IPs no banco de dados?
hive_var-_USER_PF_SIGNS_=Filtro de senha: exigir símbolos.
hive_var-_USER_PF_CAPSIGNS_=Filtro de senha: exigir letras maiúsculas.
hive_var-_USER_PF_SMSIGNS_=Filtro de senha: exigir letras minúsculas.
hive_var-_USER_PF_SPSIGNS_=Filtro de senha: exigir caracteres especiais.
hive_var-_USER_PF_NUMSIGNS_=Filtro de senha: exigir números.
hive_var-_UPDATER_CODE_=Código necessário para executar o gerenciador de atualizações (pode ser sobrescrito por ruleset.cfg).
hive_var-_HIVE_CURL_LOGGING_=Ativar log de CURL?
hive_var-_HIVE_IP_LIMIT_=Limite de falhas antes do IP ser bloqueado.
hive_var-_HIVE_REFERER_=Ativar funcionalidade de registro de Referer?
hive_var-_HIVE_CSRF_TIME_=Tempo de validade do token CSRF (em segundos).
hive_var-_HIVE_JS_ACTION_ACTIVE_=Ativar script de log de erros JavaScript?
hive_var-_HIVE_TITLE_=Título padrão do site.
hive_var-_HIVE_TITLE_SPACER_=Espaçador padrão do título da aba.
hive_var-_HIVE_PHP_DEBUG_=Ativar modo de debug PHP?
hive_var-_HIVE_MYSQL_DEBUG_=Ativar modo de debug MySQL?
hive_var-_HIVE_URL_SEO_=Usar URLs amigáveis para SEO?
hive_var-_HIVE_ROBOTS_CREATE_=Criar arquivo robots.txt inicial?
hive_var-_CRON_ENABLE_LOG_=Ativar protocolo de execução do cron?
hive_var-_USER_REC_DROP_=Remover chaves de recuperação obsoletas no login ou recuperação de conta
hive_var-_USER_MULTI_LOGIN_=Permitir vários logins simultâneos por usuário
hive_var-_HIVE_BENCHMARK_EXECUTE_=Ativar registro de benchmark em index.php
hive_var-_HIVE_HITCOUNTER_EXECUTE_=Ativar registro do contador de acessos em index.php

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=E-mail
string_password=Senha
string_close=Fechar
string_delete=Excluir
string_url=URL
string_name=Nome
string_date=Data
string_details=Detalhes
string_operation=Operação
string_add=Adicionar
string_execute=Executar
string_executed=Executado
string_coming_soon=Em breve
string_value=Valor
string_edit=Editar
string_not_available=Não disponível
string_identifier=Identificador
string_latest_version=Última versão
string_description=Descrição
string_install=Instalar
string_framework=Framework
String_internal=Interno
string_library=Biblioteca
string_extension=Extensão
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=ID do Processo
string_status=Status
string_parameter=Parâmetro
string_type=Tipo
string_waiting=Aguardando
string_done=Concluído
string_settings=Configurações
string_deprecated=Obsoleto
string_theme=Tema
string_valid=Válido
string_invalid=Inválido
string_general=Geral
string_update=Atualizar
string_cleanup=Limpeza
string_object=Objeto
string_restricted=Restrito
string_confirm=Confirmar
string_reset=Redefinir
string_logout=Sair
string_website=Site
string_login=Entrar
string_favicon=Favicon
string_visibility=Visibilidade
string_developer=Desenvolvedor
string_user=Usuário
string_redis=Redis
string_cancel=Cancelar
string_local=Local
string_online=Online
string_save=Salvar
string_meta=Meta
string_administration=Administração
string_block=Bloquear
string_unblock=Desbloquear
string_confirmed=Confirmado
string_data=Dados
string_inheritance=Herança
string_relations=Relações
string_docker=Docker
string_background_worker=Trabalhador em Segundo Plano
string_refresh=Atualizar
string_token=Token
string_activate=Ativar
string_session=Sessão
string_license=Licença
string_github=Github
string_documentation=Documentação
string_author=Autor
string_switch=Trocar
string_readme=Leia-me
string_disabled=Desativado
string_enabled=Ativado
string_rename=Renomear
string_hardlink=Link Físico
string_create_folder=Criar Pasta
string_location=Localização
string_truncate=Truncar
string_delete_data=Excluir Dados
string_not_found=Não Encontrado
string_objects=Objetos
string_pages=Páginas
string_please_wait=Por Favor, Aguarde
string_default=Padrão
string_register=Registrar
string_recover=Recuperar
string_notifications=Notificações
string_calender=Calendário
string_profile=Perfil
string_manage=Gerenciar
string_view=Visualizar
string_key=Chave
string_enable=Ativar
string_disable=Desativar
string_folder=Pasta
string_version=Versão
string_visit=Visitar
string_module=Módulo
string_style=Estilo
string_low=Baixo
string_medium=Médio
string_high=Alto
string_active=Ativo
string_inactive=Inativo
string_upload=Enviar
string_receiver=Receptor
string_error=Erro
string_subject=Assunto
string_delay=Atraso
string_memory=Memória
string_cpu=CPU
string_groups=Grupos
string_mail=E-mail
string_identification=Identificação
string_permissions=Permissões
string_websites=Sites
string_dashboards=Painéis
string_language=Idioma
string_translation=Tradução
string_empty=Vazio
string_page=Página
string_include=Incluir
string_public=Público
string_private=Privado
string_image=Imagem
string_sort=Ordenar
string_sql_queries=Consultas SQL
string_referer=Referência
string_hits=Acessos
string_flush=Limpar
string_information=Informações
string_tables=Tabelas
string_back=Voltar
string_field_list=Lista de campos
string_value_list=Lista de valores
string_failures=Falhas
string_content=Conteúdo
string_line=Linha
string_users=Usuários
string_create=Criar
string_privisioned=Provisionado
string_not_privisioned=Não Provisionado
string_not_blocked=Não Bloqueado
string_blocked=Bloqueado
string_no_login=Sem Login
string_can_login=Pode Fazer Login
string_page_builder=Construtor de Páginas
string_object_builder=Construtor de Objetos
string_permitted=Permitido
string_yes=Sim
string_no=Não
string_download=Baixar
string_flush_table=Limpar Tabela
string_logging=Registro
string_request=Requisição
string_visits=Visitas
string_limit=Limite
string_activities=Atividades
string_list=Lista
string_show_more=Mostrar Mais
string_show_less=Mostrar Menos
string_delete_item=Excluir Item
string_delete_table=Excluir Tabela
string_allow_insecure=Permitir Inseguro
string_strict_security=Segurança Rigorosa
string_templates=Modelos
string_script_path=Caminho do Script
string_cms=CMS
string_token_switch=Alternador de Token
string_debugging=Depuração
string_progress=Progresso
string_files=Arquivos
string_short_description=Descrição Curta
string_long_description=Descrição Longa
string_creation_operation=Operação de Criação
string_update_operation=Operação de Atualização
string_tasks=Tarefas
string_javascript=JavaScript
string_endpoint=Endpoint
string_triggers=Gatilhos
string_builder=Construtor
string_trace=Rastreamento
string_ip_address=Endereço IP
string_reference=Referência
string_videos=Vídeos
string_codename=Codinome
string_included_libraries=Bibliotecas Incluídas
string_initialized=Inicializado
string_last_use=Último Uso
string_creation=Criação
string_disable_item=Desativar Item
string_enable_item=Ativar Item
string_view_item=Visualizar Item
string_core_version=Versão Core
string_framework_version=Versão Framework
string_module_version=Versão do Módulo
string_php_date=Data PHP
string_mysql_date=Data MySQL
string_php_version=Versão PHP
string_no_items=Sem Itens
string_back_to_website=Voltar ao Site
string_install_item=Instalar Item
string_frontend_switch=Chave Frontend
string_please_choose_items=Por favor, escolha os Itens
string_upload_in_progress=Upload em Progresso
string_upload_completed=Upload Concluído
string_new_password=Nova Senha
string_current_password=Senha Atual
string_confirm_new_password=Confirmar Nova Senha
string_change_password=Alterar Senha
string_2fa=2FA