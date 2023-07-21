<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2020-12-10 09:49:04 --> Config Class Initialized
INFO - 2020-12-10 09:49:04 --> Hooks Class Initialized
DEBUG - 2020-12-10 09:49:05 --> UTF-8 Support Enabled
INFO - 2020-12-10 09:49:05 --> Utf8 Class Initialized
INFO - 2020-12-10 09:49:05 --> URI Class Initialized
DEBUG - 2020-12-10 09:49:06 --> No URI present. Default controller set.
INFO - 2020-12-10 09:49:06 --> Router Class Initialized
INFO - 2020-12-10 09:49:06 --> Output Class Initialized
INFO - 2020-12-10 09:49:06 --> Security Class Initialized
DEBUG - 2020-12-10 09:49:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2020-12-10 09:49:06 --> Input Class Initialized
INFO - 2020-12-10 09:49:07 --> Language Class Initialized
INFO - 2020-12-10 09:49:08 --> Language Class Initialized
INFO - 2020-12-10 09:49:08 --> Config Class Initialized
INFO - 2020-12-10 09:49:09 --> Loader Class Initialized
INFO - 2020-12-10 09:49:09 --> Helper loaded: url_helper
INFO - 2020-12-10 09:49:09 --> Helper loaded: form_helper
INFO - 2020-12-10 09:49:09 --> Helper loaded: html_helper
INFO - 2020-12-10 09:49:09 --> Helper loaded: security_helper
INFO - 2020-12-10 09:49:11 --> Database Driver Class Initialized
DEBUG - 2020-12-10 09:49:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2020-12-10 09:49:12 --> Session: Class initialized using 'files' driver.
INFO - 2020-12-10 09:49:12 --> Controller Class Initialized
INFO - 2020-12-10 09:49:13 --> Helper loaded: upload_helper
INFO - 2020-12-10 09:49:13 --> Helper loaded: image_upload_helper
INFO - 2020-12-10 09:49:14 --> Helper loaded: upload_pdf_helper
INFO - 2020-12-10 09:49:14 --> Helper loaded: upload_audio_video_helper
DEBUG - 2020-12-10 09:49:15 --> File loaded: C:\xampp\htdocs\medicalconceptsinhindi\application\modules/front/models/Mdl_front.php
INFO - 2020-12-10 09:49:15 --> Helper loaded: common_helper
INFO - 2020-12-10 09:49:15 --> Helper loaded: send_email_helper
ERROR - 2020-12-10 09:49:16 --> Query error: Table 'medical.upload_data' doesn't exist - Invalid query: SELECT `ud`.*, `sc`.`sub_category_id`, `sc`.`sub_category_name`, `md`.`meta_slug`
FROM `upload_data` `ud`
JOIN `sub_category` `sc` ON `sc`.`sub_category_id` = `ud`.`sub_category_id`
JOIN `category` `c` ON `c`.`category_id` = `sc`.`category_id`
LEFT JOIN `meta_tag_details` `md` ON `md`.`meta_upload_data_id` = `ud`.`upload_data_id` and `md`.`is_active` = 1
WHERE `sc`.`is_active` = '1'
AND `ud`.`is_active` = '1'
AND `ud`.`upload_type` = 'video'
AND `ud`.`is_active` = '1'
ORDER BY `ud`.`sort_order` asc
 LIMIT 3
ERROR - 2020-12-10 09:49:16 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\medicalconceptsinhindi\application\modules\front\models\Mdl_front.php 122
INFO - 2020-12-10 09:50:47 --> Config Class Initialized
INFO - 2020-12-10 09:50:47 --> Hooks Class Initialized
DEBUG - 2020-12-10 09:50:47 --> UTF-8 Support Enabled
INFO - 2020-12-10 09:50:47 --> Utf8 Class Initialized
INFO - 2020-12-10 09:50:47 --> URI Class Initialized
DEBUG - 2020-12-10 09:50:47 --> No URI present. Default controller set.
INFO - 2020-12-10 09:50:47 --> Router Class Initialized
INFO - 2020-12-10 09:50:47 --> Output Class Initialized
INFO - 2020-12-10 09:50:47 --> Security Class Initialized
DEBUG - 2020-12-10 09:50:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2020-12-10 09:50:47 --> Input Class Initialized
INFO - 2020-12-10 09:50:47 --> Language Class Initialized
INFO - 2020-12-10 09:50:47 --> Language Class Initialized
INFO - 2020-12-10 09:50:47 --> Config Class Initialized
INFO - 2020-12-10 09:50:47 --> Loader Class Initialized
INFO - 2020-12-10 09:50:47 --> Helper loaded: url_helper
INFO - 2020-12-10 09:50:47 --> Helper loaded: form_helper
INFO - 2020-12-10 09:50:47 --> Helper loaded: html_helper
INFO - 2020-12-10 09:50:47 --> Helper loaded: security_helper
INFO - 2020-12-10 09:50:47 --> Database Driver Class Initialized
DEBUG - 2020-12-10 09:50:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2020-12-10 09:50:47 --> Session: Class initialized using 'files' driver.
INFO - 2020-12-10 09:50:47 --> Controller Class Initialized
INFO - 2020-12-10 09:50:47 --> Helper loaded: upload_helper
INFO - 2020-12-10 09:50:47 --> Helper loaded: image_upload_helper
INFO - 2020-12-10 09:50:47 --> Helper loaded: upload_pdf_helper
INFO - 2020-12-10 09:50:47 --> Helper loaded: upload_audio_video_helper
DEBUG - 2020-12-10 09:50:47 --> File loaded: C:\xampp\htdocs\medicalconceptsinhindi\application\modules/front/models/Mdl_front.php
INFO - 2020-12-10 09:50:47 --> Helper loaded: common_helper
INFO - 2020-12-10 09:50:47 --> Helper loaded: send_email_helper
ERROR - 2020-12-10 09:50:47 --> Query error: Table 'medical.upload_data' doesn't exist - Invalid query: SELECT `ud`.*, `sc`.`sub_category_id`, `sc`.`sub_category_name`, `md`.`meta_slug`
FROM `upload_data` `ud`
JOIN `sub_category` `sc` ON `sc`.`sub_category_id` = `ud`.`sub_category_id`
JOIN `category` `c` ON `c`.`category_id` = `sc`.`category_id`
LEFT JOIN `meta_tag_details` `md` ON `md`.`meta_upload_data_id` = `ud`.`upload_data_id` and `md`.`is_active` = 1
WHERE `sc`.`is_active` = '1'
AND `ud`.`is_active` = '1'
AND `ud`.`upload_type` = 'video'
AND `ud`.`is_active` = '1'
ORDER BY `ud`.`sort_order` asc
 LIMIT 3
ERROR - 2020-12-10 09:50:47 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\medicalconceptsinhindi\application\modules\front\models\Mdl_front.php 122
