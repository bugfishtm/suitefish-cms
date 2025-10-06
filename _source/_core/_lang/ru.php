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
hive_login_changelanguage=Вы можете сменить язык
hive_login_changelanguage_here=здесь.
hive_login_lostpass=Забыли пароль?
hive_login_notregistered=Не зарегистрированы?
hive_login_rememberme=Использовать cookies?
hive_login_recoveraccount=Восстановить аккаунт
hive_login_haveaccount=Уже есть аккаунт?
hive_login_password_confirm=Подтвердите пароль
hive_login_mc_change_mail=Изменить электронную почту
hive_login_mc_backtohome=Вернуться на главную
hive_login_title_accactivation=Активация аккаунта
hive_cannotenterwhilenologin=Вы не можете зайти на эту страницу, если не вошли в систему!
hive_cannotenterwhilelogin=Вы не можете зайти на эту страницу, если вы уже вошли в систему!
hive_cannotoperatesiteerror=На этом модуле сайта произошла критическая ошибка, поэтому вы не можете выполнить никакую операцию!
hive_login_backtologin=Вернуться ко входу
hive_login_change_Lang=Сменить язык
hive_login_language_changed=Язык был изменен!

# Login Events - General
hive_login_msg_l_wrong=Неверная комбинация пароля и электронной почты.
hive_login_msg_csrf=Срок действия формы истек, попробуйте снова.
hive_login_msg_empty=Пожалуйста, введите необходимые данные!
hive_login_msg_ipban=Ваш IP-адрес заблокирован; попробуйте позже.
hive_login_msg_logout=Вы вышли из системы!
hive_login_msg_nomatchpass=Подтверждение пароля не совпадает с введенным паролем.
hive_login_doremember=Хотите запомнить пароль?

# Login Events - Login
hive_login_msg_l_ok=Вход выполнен успешно.
hive_login_msg_l_blocked=Вы не можете войти, так как ваш аккаунт заблокирован.
hive_login_msg_l_inactive=Ваш аккаунт еще не активирован! Восстановите пароль, чтобы активировать аккаунт, или нажмите на ссылку в письме активации, которое вы получили!
hive_login_msg_l_blockedpwf=Вы ввели неправильный пароль слишком много раз, и ваш аккаунт был заблокирован!
hive_login_msg_l_disabled=Ваш аккаунт отключен!
hive_login_mail_serror=Ошибка при попытке отправить электронное письмо. Это внутренняя ошибка, которая должна быть расследована, и о ней следует сообщить сотрудникам нашего сайта.
hive_login_msg_register_ok=Пожалуйста, проверьте ваш почтовый ящик, чтобы активировать новый аккаунт!
hive_login_msg_passfiltererror=Введенный пароль не соответствует правилам создания пароля!
hive_login_msg_mailexist=Вы пытаетесь зарегистрировать аккаунт с электронной почтой, которая уже существует!
hive_login_password_rules=Правила пароля
hive_login_password_sign=Требуемые символы:
hive_login_password_cap=Требуемые заглавные буквы:
hive_login_password_small=Требуемые строчные буквы:
hive_login_password_special=Требуемые специальные символы:
hive_login_password_numeric=Требуемые числовые символы:

# Login Events - Mail Change
hive_login_msg_m_ok=Вы успешно активировали новый адрес электронной почты!
hive_login_msg_m_er=Ошибка при попытке активировать новый адрес электронной почты; попробуйте снова.
hive_login_msg_m_exp=Срок действия кода активации электронной почты истек! Попробуйте снова изменить адрес электронной почты!
hive_login_msg_m_res=Электронная почта, которую вы пытались активировать, теперь используется другим аккаунтом, поэтому она не может быть связана с вашим аккаунтом!
hive_login_msg_m_block=Ваш аккаунт заблокирован для изменения электронной почты!
hive_login_msg_m_noadr=Запрос не удался. Попробуйте позже.
hive_login_mc_cmailtext=Ваш текущий адрес электронной почты:
hive_login_msg_rec_ok=Пожалуйста, проверьте почтовый ящик новой электронной почты, чтобы активировать новый адрес.
hive_login_msg_rec_err=Ошибка при попытке изменить адрес электронной почты.
hive_login_msg_rec_wait=Изменение электронной почты временно ограничено. Пожалуйста, попробуйте позже.
hive_login_msg_rec_exist=Электронная почта, которую вы пытаетесь изменить, уже используется другим аккаунтом!
hive_login_msg_rec_block=Ваш аккаунт заблокирован для изменения электронной почты!
hive_login_msg_rec_disable=Вы не можете изменить адрес электронной почты деактивированного аккаунта!

# Login Mails
hive_login_mail_pre_change=Активируйте вашу новую почту здесь: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_change=Активируйте вашу новую электронную почту
hive_login_mail_title_register=Активируйте ваш новый аккаунт
hive_login_mail_pre_register=Нажмите на следующую ссылку, чтобы активировать ваш аккаунт: <a href="SF_ACTION_URL">SF_ACTION_URL</a>
hive_login_mail_title_rec=Восстановите ваш аккаунт
hive_login_mail_pre_rec=Нажмите на следующую ссылку, чтобы восстановить пароль вашего аккаунта: <a href="SF_ACTION_URL">SF_ACTION_URL</a>

# Login - Activation
hive_login_msg_a_ok=Вы успешно активировали ваш аккаунт! Теперь вы можете войти на страницы входа этого сайта.
hive_login_msg_a_er=Ошибка при попытке активировать пользовательский аккаунт. Попробуйте восстановить пароль или зарегистрировать новый аккаунт.
hive_login_msg_a_exp=Токен активации недействителен. Пожалуйста, восстановите ваш аккаунт на странице входа, чтобы активировать ваш аккаунт!
hive_login_msg_a_block=Активация вашего аккаунта отключена; попробуйте позже!

# Login - Recover Request
hive_login_msg_rr_recnewunk=Указанная электронная почта не зарегистрирована.
hive_login_msg_rr_recnope=Ваш аккаунт не имеет разрешения на восстановление пароля!
hive_login_msg_rr_recnopede=Ваш аккаунт деактивирован и не может создавать новые запросы!
hive_login_msg_rr_recwait=Запросы на восстановление ограничены для предотвращения злоупотреблений. Пожалуйста, попробуйте позже.
hive_login_msg_rr_recnok=Пожалуйста, проверьте ваш почтовый ящик для получения письма с восстановлением пароля. Это письмо содержит ссылку для восстановления пароля.
hive_login_msg_recfr_ok=Пожалуйста, проверьте ваш почтовый ящик, чтобы получить ссылку для восстановления пароля!

# Login - Recover Execute
hive_login_msg_pwtexpire=Срок действия токена восстановления пароля истек! Пожалуйста, попробуйте восстановить ваш аккаунт снова.
hive_login_msg_recexecerror=Ошибка при попытке восстановить пароль. Пожалуйста, попробуйте снова.
hive_login_msg_recexecok=Вы успешно восстановили пароль и теперь можете войти с новым паролем.

# Login - Pass Change / 2FA
hive_login_msg_passc_loginasact=Вы вошли в систему как другой пользователь. Если вы продолжите, любые изменения повлияют на текущую учетную запись, а не на вашу собственную.
hive_login_msg_passc_enterold=Пожалуйста, введите ваш текущий пароль.
hive_login_msg_passc_enternew=Пожалуйста, введите новый пароль.
hive_login_msg_passc_enternewc=Пожалуйста, подтвердите новый пароль.
hive_login_msg_passc_cwrong=Введённый текущий пароль не соответствует нашим записям.
hive_login_msg_passc_ok=Пароль успешно изменён!
hive_login_msg_2fa=Настройте двухфакторную аутентификацию (2FA), чтобы повысить безопасность вашей учетной записи. После включения вы увидите код и QR-код для подключения приложения-аутентификатора. Вы можете включить или отключить 2FA в любое время в этом разделе.
hive_login_msg_2fa_request=Код 2FA (если включено)
hive_login_msg_2fa_error=На вашей учетной записи включена 2FA, предоставленный код 2FA неверен, попробуйте еще раз.


##########################################################################################################################################
# Setup Explanations - CMS
##########################################################################################################################################

hive_var-_HIVE_ENABLESITE_MAILCHANGE_=Включить сайт смены электронной почты пользователя CMS?
hive_var-_HIVE_ENABLESITE_PASSCHANGE_=Включить сайт смены пароля пользователя CMS?
hive_var-_HIVE_ENABLESITE_RECOVER_=Включить сайт восстановления пользователя CMS?
hive_var-_HIVE_ENABLESITE_LOGIN_=Включить сайт входа пользователя CMS?
hive_var-_HIVE_ENABLESITE_LOGOUT_=Включить сайт выхода пользователя CMS?
hive_var-_HIVE_ENABLESITE_REGISTER_=Включить сайт регистрации пользователя CMS?
hive_var-_HIVE_ENABLESITE_LANGCHANGE_=Включить сайт смены языка CMS?
hive_var-_HIVE_ENABLESITE_MODESWITCH_=Включить сайт переключения между интерфейсами CMS?
hive_var-_HIVE_ENABLESITE_2FA_=Включить сайт двухфакторной аутентификации пользователя CMS?
hive_var-_HIVE_ENABLESITE_ACTIVATE_=Включить сайт активации пользователя CMS?
hive_var-_HIVE_LANG_DEFAULT_=Язык по умолчанию.
hive_var-_REDIS_=Статус активации Redis.
hive_var-_REDIS_HOST_=Хост Redis.
hive_var-_REDIS_PORT_=Порт Redis.
hive_var-_SMTP_MAILS_HEADER_=Заголовок электронного письма по умолчанию.
hive_var-_SMTP_MAILS_FOOTER_=Нижний колонтитул электронного письма по умолчанию.
hive_var-_SMTP_SENDER_MAIL_=Электронная почта отправителя по умолчанию.
hive_var-_SMTP_SENDER_NAME_=Имя отправителя по умолчанию.
hive_var-_SMTP_MAILS_IN_HTML_=Отправлять письма в формате HTML?
hive_var-_SMTP_INSECURE_=Разрешить небезопасные соединения?
hive_var-_SMTP_DEBUG_=Статус отладки электронной почты (0-3).
hive_var-_SMTP_HOST_=Почтовый хост.
hive_var-_SMTP_PORT_=Почтовый порт.
hive_var-_SMTP_AUTH_=Метод аутентификации почты.
hive_var-_SMTP_USER_=Имя пользователя почты.
hive_var-_SMTP_PASS_=Пароль почты.
hive_var-_USER_MAX_SESSION_=Срок действия сессии в днях.
hive_var-_USER_TOKEN_TIME_=Срок действия токена пользователя в минутах.
hive_var-_USER_AUTOBLOCK_=Автоблокировка после определённого количества неудачных входов.
hive_var-_USER_WAIT_COUNTER_=Ожидание между запросами восстановления и активации/регистрации (в минутах).
hive_var-_USER_LOG_SESSIONS_=Журналировать истекшие сессии?
hive_var-_USER_LOG_IP_=Сохранять IP-адреса в базе данных?
hive_var-_USER_PF_SIGNS_=Фильтр паролей: обязательны символы.
hive_var-_USER_PF_CAPSIGNS_=Фильтр паролей: обязательны заглавные буквы.
hive_var-_USER_PF_SMSIGNS_=Фильтр паролей: обязательны строчные буквы.
hive_var-_USER_PF_SPSIGNS_=Фильтр паролей: обязательны специальные символы.
hive_var-_USER_PF_NUMSIGNS_=Фильтр паролей: обязательны цифры.
hive_var-_UPDATER_CODE_=Код для запуска менеджера обновлений (может быть переопределён ruleset.cfg).
hive_var-_HIVE_CURL_LOGGING_=Активировать логирование CURL?
hive_var-_HIVE_IP_LIMIT_=Лимит неудачных попыток для блокировки IP.
hive_var-_HIVE_REFERER_=Включить логирование Referer?
hive_var-_HIVE_CSRF_TIME_=Время действия CSRF токенов (в секундах).
hive_var-_HIVE_JS_ACTION_ACTIVE_=Активировать скрипт логирования JavaScript ошибок?
hive_var-_HIVE_TITLE_=Заголовок сайта по умолчанию.
hive_var-_HIVE_TITLE_SPACER_=Разделитель вкладки сайта.
hive_var-_HIVE_PHP_DEBUG_=Включить режим отладки PHP?
hive_var-_HIVE_MYSQL_DEBUG_=Включить режим отладки MySQL?
hive_var-_HIVE_URL_SEO_=Использовать SEO-дружелюбные URL?
hive_var-_HIVE_ROBOTS_CREATE_=Создать начальный файл robots.txt?
hive_var-_CRON_ENABLE_LOG_=Включить протокол выполнения cron?
hive_var-_USER_REC_DROP_=Удалять устаревшие ключи восстановления при входе или восстановлении учетной записи
hive_var-_USER_MULTI_LOGIN_=Разрешить несколько одновременных входов для одного пользователя
hive_var-_HIVE_BENCHMARK_EXECUTE_=Включить ведение журнала бенчмарка на index.php
hive_var-_HIVE_HITCOUNTER_EXECUTE_=Включить ведение журнала счетчика посещений на index.php

##########################################################################################################################################
# Strings
##########################################################################################################################################

string_email=Электронная почта
string_password=Пароль
string_close=Закрыть
string_delete=Удалить
string_url=URL
string_name=Имя
string_date=Дата
string_details=Детали
string_operation=Операция
string_add=Добавить
string_execute=Выполнить
string_executed=Выполнено
string_coming_soon=Скоро будет
string_value=Значение
string_edit=Редактировать
string_not_available=Недоступно
string_identifier=Идентификатор
string_latest_version=Последняя версия
string_description=Описание
string_install=Установить
string_framework=Фреймворк
String_internal=Внутренний
string_library=Библиотека
string_extension=Расширение
string_css=CSS
string_php=PHP
string_mysql=MySQL
string_process_id=ID процесса
string_status=Статус
string_parameter=Параметр
string_type=Тип
string_waiting=Ожидание
string_done=Готово
string_settings=Настройки
string_deprecated=Устаревшее
string_theme=Тема
string_valid=Действительно
string_invalid=Недействительно
string_general=Общее
string_update=Обновить
string_cleanup=Очистка
string_object=Объект
string_restricted=Ограничено
string_confirm=Подтвердить
string_reset=Сбросить
string_logout=Выйти
string_website=Веб-сайт
string_login=Войти
string_favicon=Фавикон
string_visibility=Видимость
string_developer=Разработчик
string_user=Пользователь
string_redis=Redis
string_cancel=Отмена
string_local=Локальный
string_online=Онлайн
string_save=Сохранить
string_meta=Мета
string_administration=Администрирование
string_block=Блокировать
string_unblock=Разблокировать
string_confirmed=Подтверждено
string_data=Данные
string_inheritance=Наследование
string_relations=Связи
string_docker=Docker
string_background_worker=Фоновый рабочий
string_refresh=Обновить
string_token=Токен
string_activate=Активировать
string_session=Сессия
string_license=Лицензия
string_github=Github
string_documentation=Документация
string_author=Автор
string_switch=Переключить
string_readme=ПрочтиМеня
string_disabled=Отключено
string_enabled=Включено
string_rename=Переименовать
string_hardlink=Жесткая Ссылка
string_create_folder=Создать Папку
string_location=Местоположение
string_truncate=Усечь
string_delete_data=Удалить Данные
string_not_found=Не Найдено
string_objects=Объекты
string_pages=Страницы
string_please_wait=Пожалуйста, Подождите
string_default=По Умолчанию
string_register=Зарегистрироваться
string_recover=Восстановить
string_notifications=Уведомления
string_calender=Календарь
string_profile=Профиль
string_manage=Управлять
string_view=Просмотр
string_key=Ключ
string_enable=Включить
string_disable=Отключить
string_folder=Папка
string_version=Версия
string_visit=Посетить
string_module=Модуль
string_style=Стиль
string_low=Низкий
string_medium=Средний
string_high=Высокий
string_active=Активный
string_inactive=Неактивный
string_upload=Загрузить
string_receiver=Получатель
string_error=Ошибка
string_subject=Тема
string_delay=Задержка
string_memory=Память
string_cpu=ЦП
string_groups=Группы
string_mail=Эл. почта
string_identification=Идентификация
string_permissions=Разрешения
string_websites=Веб-сайты
string_dashboards=Панели
string_language=Язык
string_translation=Перевод
string_empty=Пусто
string_page=Страница
string_include=Включить
string_public=Публичный
string_private=Приватный
string_image=Изображение
string_sort=Сортировать
string_sql_queries=SQL-запросы
string_referer=Источник
string_hits=Хиты
string_flush=Очистить
string_information=Информация
string_tables=Таблицы
string_back=Назад
string_field_list=Список полей
string_value_list=Список значений
string_failures=Ошибки
string_content=Содержание
string_line=Строка
string_users=Пользователи
string_create=Создать
string_privisioned=Предоставлено
string_not_privisioned=Не Предоставлено
string_not_blocked=Не Заблокировано
string_blocked=Заблокировано
string_no_login=Нет Входа
string_can_login=Можно Войти
string_page_builder=Конструктор Страниц
string_object_builder=Конструктор Объектов
string_permitted=Разрешено
string_yes=Да
string_no=Нет
string_download=Скачать
string_flush_table=Очистить Таблицу
string_logging=Журналирование
string_request=Запрос
string_visits=Посещения
string_limit=Ограничение
string_activities=Деятельность
string_list=Список
string_show_more=Показать Больше
string_show_less=Показать Меньше
string_delete_item=Удалить Элемент
string_delete_table=Удалить Таблицу
string_allow_insecure=Разрешить Небезопасное
string_strict_security=Строгая Безопасность
string_templates=Шаблоны
string_script_path=Путь к Скрипту
string_cms=CMS
string_token_switch=Переключатель Токена
string_debugging=Отладка
string_progress=Прогресс
string_files=Файлы
string_short_description=Краткое описание
string_long_description=Подробное описание
string_creation_operation=Операция создания
string_update_operation=Операция обновления
string_tasks=Задачи
string_javascript=JavaScript
string_endpoint=Конечная точка
string_triggers=Триггеры
string_builder=Конструктор
string_trace=Трассировка
string_ip_address=IP-адрес
string_reference=Ссылка
string_videos=Видео
string_codename=Кодовое имя
string_included_libraries=Включённые библиотеки
string_initialized=Инициализировано
string_last_use=Последнее использование
string_creation=Создание
string_disable_item=Отключить элемент
string_enable_item=Включить элемент
string_view_item=Просмотреть элемент
string_core_version=Версия ядра
string_framework_version=Версия фреймворка
string_module_version=Версия модуля
string_php_date=Дата PHP
string_mysql_date=Дата MySQL
string_php_version=Версия PHP
string_no_items=Нет элементов
string_back_to_website=Назад на сайт
string_install_item=Установить элемент
string_frontend_switch=Переключатель фронтенда
string_please_choose_items=Пожалуйста, выберите элементы
string_upload_in_progress=Загрузка в процессе
string_upload_completed=Загрузка завершена
string_new_password=Новый пароль
string_current_password=Текущий пароль
string_confirm_new_password=Подтвердите новый пароль
string_change_password=Изменить пароль
string_2fa=2FA