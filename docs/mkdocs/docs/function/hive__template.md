# Functions: `hive__template` 

## Functions Overview

| **Function Name** | **Parameters** | **Description** |
|------------------|----------------|-----------------|
| `hive__template_mail` | `$object`, `$template`, `$mail`, `$user_id`, `$url_if_needed` | Sends an email using a template system, with optional substitutions like user data and URLs. Handles various default templates (register, recover, change email). |
| `hive__template_mail_activate` | `$object`, `$get_token = "ref_token"`, `$get_user = "ref_user"`, `$message = true`, `$redirect = false` | Activates a user's new email address via a token-based confirmation. Displays messages and supports redirection. |
| `hive__template_user_activate` | `$object`, `$get_token = "ref_token"`, `$get_user = "ref_user"`, `$message = true`, `$redirect = false` | Activates a newly registered user account using a token confirmation link. Handles banned IPs, displays messages, and supports redirection. |
| `hive__template_login` | `$object`, `$cookies_allow = false`, `$message = true` | Handles user login process with CSRF protection, cookie option, IP ban checking, and error messaging. |
| `hive__template_recover_request` | `$object`, `$rec_url = false`, `$get_token = "rec_token"`, `$get_user = "rec_user"` | Initiates a password recovery request, sends recovery link by email using `hive__template_mail`, and validates CSRF token. |


## Parameter Descriptions

| **Parameter** | **Used In Function(s)** | **Description** |
|---------------|--------------------------|------------------|
| `$object` | All functions | The main application object containing subsystems like `user`, `mail_template`, `mail`, `lang`, `eventbox`, etc. |
| `$template` | `hive__template_mail` | Name of the mail template to use for email sending. |
| `$mail` | `hive__template_mail` | Email address of the user to send the message to. |
| `$user_id` | `hive__template_mail` | User ID used to retrieve personalized user data for substitution. |
| `$url_if_needed` | `hive__template_mail` | Optional URL to insert into the template (e.g., for confirmation links). |
| `$get_token` | `hive__template_mail_activate`, `hive__template_user_activate`, `hive__template_recover_request` | GET parameter name for the token sent in URL. |
| `$get_user` | Same as above | GET parameter name for the user ID sent in URL. |
| `$message` | Multiple functions | Whether to display success/error messages. |
| `$redirect` | `hive__template_mail_activate`, `hive__template_user_activate` | Optional redirection URL after processing activation. |
| `$cookies_allow` | `hive__template_login` | Indicates whether persistent login (cookie) is allowed. |
| `$rec_url` | `hive__template_recover_request` | Base URL used to construct the password recovery link (currently unused). |
