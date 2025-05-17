# Initialization & Lockdown

This document describes the various constants and flags used in the `initialize.php` of the Hive system. These settings control initialization behaviors, maintenance modes, error handling, and lockdown states.

---

## Initialization Flags

These flags are used to control how Hive initializes and responds to different conditions:

- ``_HIVE_OVR_PRE_SETTING_MODE_``  
  *Pre-determine Hive mode to load specific Hive mode information.*

- ``_HIVE_PREVENT_INIT_``  
  *Prevents the initialization of Hive Mode. Useful for external site module scripts.*

- ``_HIVE_INTERNAL_MT_LOCK_OVR_``  
  *Overrides and prevents the display of the maintenance lock page.*

- ``_HIVE_INTERNAL_BACKUP_LOCK_OVR_``  
  *Overrides and prevents the display of the backup lock page.*

- ``_HIVE_INTERNAL_UPDATE_LOCK_OVR_``  
  *Overrides and prevents the display of the update lock page.*

- ``_HIVE_INTERNAL_INIT_ERROR_OVR_``  
  *Overrides and prevents the display of the error page for ``_HIVE_INTERNAL_INIT_ERROR_``.*

- ``_HIVE_INTERNAL_RNAME_ERROR_OVR_``  
  *Overrides and prevents the display of the error page for ``_HIVE_INTERNAL_RNAME_ERROR_``.*

- ``_HIVE_INTERNAL_DOWNGRADE_ERROR_OVR_``  
  *Overrides and prevents the display of the error page for ``_HIVE_INTERNAL_DOWNGRADE_ERROR_``.*

- ``_HIVE_INTERNAL_UPDATE_REQ_OVR_``  
  *Overrides and prevents the display of the error page for ``_HIVE_INTERNAL_UPDATE_REQ_``.*

- ``_HIVE_INTERNAL_VERSION_ERROR_OVR_``  
  *Overrides and prevents the display of the error page for ``_HIVE_INTERNAL_VERSION_ERROR_``.*

---

## Lockdown States

These constants indicate various lockdown or maintenance states:

- ``_HIVE_INTERNAL_MT_LOCK_``  
  *Maintenance Mode Lock is active. Also sets ``_HIVE_INTERNAL_LOCK_``.*

- ``_HIVE_INTERNAL_BACKUP_LOCK_``  
  *Backup Lock File is in place. Also sets ``_HIVE_INTERNAL_LOCK_``.*

- ``_HIVE_INTERNAL_UPDATE_LOCK_``  
  *Update Lockfile is active. Also sets ``_HIVE_INTERNAL_LOCK_``.*

---

## Error States for Site Modules

These flags indicate errors or required actions in site modules:

- ``_HIVE_INTERNAL_INIT_ERROR_``  
  *No valid site module found. Replacement for "check hive mode is array".*

- ``_HIVE_INTERNAL_RNAME_ERROR_``  
  *A different module RNAME is suddenly active. ``_HIVE_INTERNAL_VERSION_ERROR_`` will also be true.*

- ``_HIVE_INTERNAL_DOWNGRADE_ERROR_``  
  *Current module has been downgraded. ``_HIVE_INTERNAL_VERSION_ERROR_`` will also be true.*

- ``_HIVE_INTERNAL_UPDATE_REQ_``  
  *Database changes are pending. ``_HIVE_INTERNAL_VERSION_ERROR_`` will also be true.*

- ``_HIVE_INTERNAL_VERSION_ERROR_``  
  *Error with version numbers or consistency. Replacement for ``_HIVE_CRIT_ER_``.*

---

## Usage

Set or override these constants in your configuration or scripts as needed to control Hive's initialization, maintenance, and error handling behavior.

---

**Note:**  
These flags are primarily intended for internal use or advanced customization. Use with caution, as overriding certain errors or locks may expose your system to inconsistencies or maintenance issues.
